<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BooksFixtures extends Fixture {

    public function load(ObjectManager $manager): void {
        // $product = new Product();
        // $manager->persist($product);

        $book1 = new \App\Entity\Book();
        $book1->setTitle("El Arte de Programar");
        $book1->setAuthor("Donald Knuth");
        $book1->setPublishedYear(1968);
        $manager->persist($book1);

        $book2 = new \App\Entity\Book();
        $book2->setTitle("Clean Code");
        $book2->setAuthor("Robert C. Martin");
        $book2->setPublishedYear(2008);
        $manager->persist($book2);

        $book3 = new \App\Entity\Book();
        $book3->setTitle("Refactoring");
        $book3->setAuthor("Martin Fowler");
        $book3->setPublishedYear(1999);
        $manager->persist($book3);

        $manager->flush();
    }

    public static function getGroups(): array {
        return ['book_data'];
    }
}
