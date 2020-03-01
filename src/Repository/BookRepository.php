<?php

namespace App\Repository;

use App\Entity\Book;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query\ResultSetMapping;

class BookRepository extends EntityRepository
{

    public function addBook(Book $book)
    {
        return true;
    }
}
