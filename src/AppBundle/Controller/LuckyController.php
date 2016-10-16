<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;


class LuckyController extends Controller
{
	/**
		* @Route("/lucky/number/{count}")
	*/
	public function numberAction($count)
	{
		$number = array();
		
		for($i=0; $i<$count; $i++)
		{
			$number[] = rand(0, 100);	
		}
		$numberlist = implode(',', $number);
		
		$html = $this->container->get('templating')->render(
		'lucky/number.html.twig',
		array('luckynumberlist'=> $numberlist));
		
		return new Response($html);
	}
	
	/**
	 * @Route("/api/lucky/number")
	 */
	public function apiNumberAction()
	{
		$data = array('lucky_number' => rand(0, 100) );
		
		return new JsonResponse($data);
	}
}