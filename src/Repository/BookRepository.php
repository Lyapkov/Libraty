<?php

namespace App\Repository;

use App\Entity\Book;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query\ResultSetMapping;

class BookRepository extends EntityRepository
{

    public function addBook(Book $book)
    {
        $em = $this->getEntityManager();
        $em->persist($book);
        $em->flush();
        return $this->find($book->getId());
    }

    public function getBook(int $id)
    {
        $em = $this->getEntityManager();
        return $em->find(Book::class, $id);
    }

    public function updateBook(Book $book)
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = "UPDATE book as b SET b.name = :name, b.year = :year, b.author = :author 
                WHERE b.id = :id;";

        $stmt = $conn->prepare($sql);
        $stmt->execute(['id' => $book->getId(), 'name' => $book->getName(), 'author' => $book->getAuthor(), 'year' => $book->getYear()]);

        return true;
    }
}
