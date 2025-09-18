<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

final class ReviewsController extends AbstractController {

    #[Route('/reviews', name: 'app_reviews', methods: ['POST'])]
    public function createReview(Request $request,
            EntityManagerInterface $entityManager,
            SerializerInterface $serializer,
            ValidatorInterface $validator,
            \App\Repository\BookRepository $bookRepository): JsonResponse {

        $jsonValidation = json_decode($request->getContent(), true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            return $this->json([
                        'success' => false,
                        'message' => "JSON inválido, valide la información proporcionada {$request->getContent()}",
                        'error' => json_last_error_msg()
                            ], Response::HTTP_BAD_REQUEST);
        }

        $review = $serializer->deserialize($request->getContent(), \App\Entity\Review::class, 'json');
        $errors = $validator->validate($review);
        if (count($errors) > 0) {
            return $this->json($errors, Response::HTTP_BAD_REQUEST);
        }
        $book = $bookRepository->find($jsonValidation['book']);
        if (!$book) {
            return $this->json([
                        'success' => false,
                        'message' => "El Libro indicado no existe, valide e intente nuevamente",
                        'error' => json_last_error_msg()
                            ], Response::HTTP_NOT_FOUND);
        }
        $review->setBook($book);
        $entityManager->persist($review);
        $entityManager->flush();

        return $this->json([
                    'success' => true,
                    'message' => "Reseña almacenada con exito bajo el id {$review->getId()} y con fecha {$review->getCreatedAt()->format('Y-m-d')}",
                        ], Response::HTTP_ACCEPTED);
    }
}
