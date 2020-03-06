<?php


namespace App\Manager;


use App\Entity\Book;
use Doctrine\Common\Persistence\ManagerRegistry;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Class ArticleManager
 * @package App\Manager
 */
class BookManager
{
    private $doctrine;
    private $validator;

    public function __construct(ManagerRegistry $doctrine, ValidatorInterface $validator)
    {
        $this->doctrine = $doctrine;
        $this->validator = $validator;
    }

    public function addBook(Book $book)
    {
        $this->validator($book);

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
        $this->validator($book);

        return $this->doctrine->getRepository(Book::class)->updateBook($book);
    }
}