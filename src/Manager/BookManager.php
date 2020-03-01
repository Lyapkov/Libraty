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
        $this->doctrine->getRepository(Book::class)->addBook($book);

    }
}