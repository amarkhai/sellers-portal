<?php

declare(strict_types=1);

namespace App\API\Admin;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class UserController extends AbstractController
{
    #[Route('/user', name: 'user_list', methods: ['GET'])]
    public function list(Request $request, UserRepository $userRepository, NormalizerInterface $normalizer)
    {
        $limit = $request->get('limit', 20);
        $offset = $request->get('offset', 0);
        $users = $userRepository->findBy([], null, $limit, $offset);
        return new JsonResponse([
            'users' => $normalizer->normalize($users, 'json', ['groups' => 'admin_panel']),
            'count' => count($users),
            'limit' => $limit,
            'offset' => $offset,
        ]);
    }
}