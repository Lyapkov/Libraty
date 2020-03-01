<?php


namespace App\Controller;


use App\Entity\Book;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class LibraryController extends Controller
{
    /**
     * @Route("/", name="index")
     */
    public function library()
    {

        return $this->render('show.html.twig');
    }

    /**
     * @Route("/addBook", name="addBook")
     * @Method("POST")
     */
    public function test(ValidatorInterface $validator, Request $request)
    {
        $bookManager = $this->get('app.book_manager');

        $book = new Book();
        $book->setName($_POST["Name"]);
        $book->setAuthor($_POST["Author"]);
        $book->setYear($_POST["Year"]);
        $errors = $validator->validate($book);

        if (count($errors))
        {
            $errorsString = (string) $errors;
            return new Response($errorsString);
        }
        $result = $bookManager->addBook($book);
        return $this->render('show.html.twig');
    }

    /**
     * @Route("/newBook", name="newBook")
     */
    public function addBook()
    {

        return $this->render('newBook.html.twig');
    }
}