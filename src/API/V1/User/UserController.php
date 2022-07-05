<?php

declare(strict_types=1);

namespace App\API\V1\User;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class UserController extends AbstractController
{
    #[Route('/user', name: 'user.info', methods: ['GET'])]
    public function info(NormalizerInterface $normalizer): JsonResponse
    {
        return new JsonResponse([
            'user' => $normalizer->normalize($this->getUser(), 'json', ['groups' => 'client_account']),
        ]);
    }
}