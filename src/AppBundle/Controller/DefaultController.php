<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Task;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Product;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


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
	
	/**
	 * @Route("/newtask")
	 */
	public function newAction(Request $request)
	{
		$task = new Task();
		$task->setTask('Write a blog Post');
		$task->setDueDate(new \DateTime('tomorrow'));
		
		$form = $this->createFormBuilder($task)
				->add('task', TextType::class)
				->add('dueDate', DateType::class, array('label' => 'Due date choice'))
				->add('save', SubmitType::class, array('label' => 'Create Task'))
				->getForm();
				
		$form->handleRequest($request);
		
		if($form->isSubmitted() && $form->isValid())
		{
			return $this->redirectToRoute('task_success');
		}
						
		return $this->render('default/new.html.twig', array('form'=> $form->createView(),));
	}
}
