<?php
namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class HelloController extends  Controller
{
	/**
		* @Route("/hello/{name}", name="hello")
	*/
	public function indexAction($name, Request $request)
	{
		$session = $request->getSession();
		$session->set('foo', 'bar');
		
		$foobar = $session->get('foo');
		
		return new Response('hello '.$name.' Your session variables : '.$foobar
		.'<br/> Is AJAX request '.$request->isXmlHttpRequest().
		'<br/> '.$request->server->get('HTTP_HOST').
		'<br/>' . 'Request '.$request->headers->get('host'), Response::HTTP_OK );
		
	}
	
	/**
	 * @Route("/base")
	 */
	public function showBaseAction()
	{
		return $this->redirect('http://www.google.com');
	}
	
	
	/**
	 * @Route("/redirection")
	 */
	public function forwardToLuckCtlAction()
	{
		$response = $this->forward('AppBundle:Lucky:apiNumber');
		
		return $response;
	}
}


