<?php


namespace App\Manager;


use App\Entity\Book;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * Class ArticleManager
 * @package App\Manager
 */
class BookManager
{
    public $doctrine;

    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    public function addBook(Book $book)
    {
        return $this->doctrine->getRepository(Book::class)->addBook($book);
    }

    public function getBooks()
    {
        return $this->doctrine->getRepository(Book::class)->findAll();
    }

    public function getBook(int $id)
    {
        return $this->doctrine->getRepository(Book::class)->find($id);
    }

    public function updateBook(Book $book)
    {
        return $this->doctrine->getRepository(Book::class)->updateBook($book);
    }
}