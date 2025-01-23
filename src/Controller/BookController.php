<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mercure\HubInterface;
use Symfony\Component\Mercure\Update;
use Symfony\Component\Routing\Attribute\Route;

class BookController extends AbstractController
{
    #[Route('/publish')]
    public function publish(HubInterface $hub): Response
    {
        $update = new Update(
            '/books',
            json_encode(['name' => 'A really good book.', 'status' => 'toes']),
            true
        );

        $hub->publish($update);

        return new Response('published!');
    }
}
