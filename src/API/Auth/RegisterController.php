<?php

declare(strict_types=1);

namespace App\API\Auth;

use App\API\Auth\Request\CreateClientRequest;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Exception\NotNormalizableValueException;
use Symfony\Component\Serializer\Exception\PartialDenormalizationException;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\ConstraintViolation;
use Symfony\Component\Validator\ConstraintViolationInterface;
use Symfony\Component\Validator\ConstraintViolationList;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class RegisterController extends AbstractController
{
    #[Route('/create-client', name: 'auth.create-client', methods: ['POST'])]
    public function createClient(
        Request $request,
        UserPasswordHasherInterface $passwordHasher,
        EntityManagerInterface $entityManager,
        SerializerInterface $serializer,
        ValidatorInterface $validator
    ) {
        try {
            /** @var CreateClientRequest $credentials */
            $credentials = $serializer->deserialize($request->getContent(), CreateClientRequest::class, 'json', [
                DenormalizerInterface::COLLECT_DENORMALIZATION_ERRORS => true,
            ]);
        } catch (PartialDenormalizationException $e) {
            $violations = new ConstraintViolationList();
            /** @var NotNormalizableValueException $exception */
            foreach ($e->getErrors() as $exception) {
                $message = sprintf('The type must be one of "%s" ("%s" given).', implode(', ', $exception->getExpectedTypes()), $exception->getCurrentType());
                $violations->add(new ConstraintViolation($message, '', [], null, $exception->getPath(), null));
            }

            return $this->json($violations, 400);
        }

        $errors = $validator->validate($credentials);
        if (count($errors) !== 0) {
            $responseData = [
                'status' => 'Ошибки валидации',
                'errors' => []
            ];
            /** @var ConstraintViolationInterface $error */
            foreach ($errors as $error) {
                $responseData['errors'] = [
                    'field' => $error->getPropertyPath(),
                    'message' => $error->getMessage(),
                ];
            }
            return $this->json($responseData, 400);
        }

        $user = new User();
        $user->setEmail($credentials->email);
        $user->setPassword($passwordHasher->hashPassword($user, $credentials->password));
        $entityManager->persist($user);
        $entityManager->flush();

        return $this->json([
            'status' => 'Клиент успешно создан',
            'user' => $serializer->normalize($user, 'json', ['groups' => 'client_account'])
        ]);
    }
}