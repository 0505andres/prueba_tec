<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;

class ReviewsFixtures extends Fixture implements FixtureGroupInterface {

    public function load(ObjectManager $manager): void {

        $books = [
            $this->getReference(1),
            $this->getReference(2),
            $this->getReference(3),
        ];
        if (count($books) == 3) {
            foreach ($books as $key => $book) {
                for ($i = 0; $i < 3; $i++) {
                    $review = new \App\Entity\Review();
                    $review->setBook($book);
                    $review->setComment("Comentario inicial Libro $key");
                    $review->setRating(rand(1, 5));
                    $manager->persist($review);
                }
            }
        }

        $manager->flush();
    }

    public static function getGroups(): array {
        return ['review_data'];
    }
}
