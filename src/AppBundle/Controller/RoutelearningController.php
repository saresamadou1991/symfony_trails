<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class RoutelearningController extends Controller
{
	/**
	 * @Route("/blog/{page}", defaults={"page"=1}, requirements={"page":"\d+"})
	 */
	public function indexAction($page)
	{
		echo "This is the ".$page." of the blog website";
		
		return new Response();
	}
	
	
	/**
	 * @Route("/blog/{slug}")
	 */
	
	public function showAction($slug, $_route)
	{
		echo "This slug value is".$slug." And the route called is ".$_route;
		
		return new Response();
	}

}

