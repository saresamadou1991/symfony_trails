<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request; 

class RoutelearningController extends Controller
{
	/**
	 * @Route("/blog/{page}", defaults={"page"=1}, requirements={"page":"\d+"})
	 */
	public function indexAction($page, Request $request)
	{
		echo "This is the ".$page." of the blog website"." <br/>The request format is ".$request->getRequestFormat();
		
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

