<?php

declare(strict_types=1);

namespace App\Controller;

use App\Mercure\MyTokenProvider;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

class TokenController extends AbstractController
{
    public function __construct(private MyTokenProvider $jwtService) {}

    #[Route('/api/token', name: 'api_token')]
    public function getToken(): JsonResponse
    {
        $topics = ['/books']; // Define the topics the token can subscribe to
        $token = $this->jwtService->getJwt();

        return new JsonResponse(['token' => $token]);
    }
}
