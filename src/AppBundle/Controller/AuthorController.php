<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Author;

 class AuthorController extends Controller
{
	/**
	 * @Route("/checkauthor")
	 */
	public function authorAction()
	{
		$author = new Author();
		$author->setName("Aboudou");
		$author->setGender("other");
		
		$validator = $this->get('validator');
		
		$errors = $validator->validate($author);
		
		if(count($errors) > 0)
		{
			return $this->render('author/validation.html.twig', array('errors' =>$errors ));
		}
		
		return new Response('The author object is validate!');
	}
}
