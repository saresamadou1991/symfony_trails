<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Product;
use Symfony\Component\HttpFoundation\Response;


class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
        ]);
    }
	
	
	/**
	 * @Route("/article/create")
	 */
	public function createAcion()
	{
		$product = new Product();
		$product->setName("Mouse");
		$product->setPrice(20.90);
		$product->setDescription("hp keyboard");
		
		$em = $this->getDoctrine()->getManager();
		
		$em->persist($product);
		
		$em->flush();
		
		return new Response('Saved new product with id'.$product->getId());
		
	}
	
	/**
	 * @Route("/article/update/{productId}")
	 */
	public function updateAction($productId)
	{
		$em = $this->getDoctrine()->getManager();
		
		$product = $em->getRepository('AppBundle:Product')->find($productId);
		
		if(!$product)
		{
			throw $this->createNotFoundException(
			'No product found for id'.$productId);
		}
		
		$product->setName("HP Mouse");
		$em->flush();
		
		return new Response('Updated successfully product '.$product->getName());
	}
}
