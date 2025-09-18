<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Response;

final class BooksController extends AbstractController {

    #[Route('/books', name: 'app_books')]
    public function index(\Doctrine\ORM\EntityManagerInterface $em, \App\Repository\BookRepository $repository): JsonResponse {

        $books = $repository->getAll();

        return $this->json($books, Response::HTTP_ACCEPTED);
    }
}
