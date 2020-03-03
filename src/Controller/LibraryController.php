<?php


namespace App\Controller;


use App\Entity\Book;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
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
        $bookManager = $this->get('app.book_manager');
        $books = $bookManager->getBooks();

        return $this->render('index.html.twig', array('books' => $books));
    }

    /**
     * @Route("/newBook", name="newBook")
     */
    public function newBook()
    {
        return $this->render('newBook.html.twig');
    }

    /**
     * @Route("/addBook", name="addBook")
     * @Method("POST")
     */
    public function addBook(ValidatorInterface $validator, Request $request)
    {
        $serializer = $this->get('serializer');
        $bookManager = $this->get('app.book_manager');

        $book = new Book();
        $book->setName($_POST["Name"]);
        $book->setAuthor($_POST["Author"]);
        $book->setYear($_POST["Year"]);
        $errors = $validator->validate($book);

        if (count($errors))
        {
            $errorsString = (string) $errors;
            return new Response("<script>alert($errorsString)</script>");
        }
//        try {
            $result = $bookManager->addBook($book);
//        } catch (\InvalidArgumentException $exception) {
//            return new Response("<script>allert($exception)</script>");
//        }
        return new JsonResponse(null, JsonResponse::HTTP_OK);
    }

    /**
     * @Route("/showBook", name="showBook")
     * @Method("GET")
     */
    public function showBook(Request $request)
    {
        $bookManager = $this->get('app.book_manager');
        $book = $bookManager->getBook($_GET['id']);

        return $this->render('show.html.twig', array('book' => $book));
    }

    /**
     * @Route("/updateBook", name="updateBook")
     * @Method("POST")
     */
    public function updateBook(Request $request)
    {

    }
}