<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class ArticleController extends Controller
{
	/**
	 * @Route("
	 * /articles/{_locale}/{year}/{title}.{_format}",
	 * defaults={"_format":"html"},
	 * requirements={"_locale":"en|fr", "_format":"html|rss", "year":"/d+"})
	 */
	
	public function showAction($_locale, $year, $title)
	{
		
	}
	
	/**
	 * @Route("/articles", name="article_list")
	 */
	public function recentArticlesAction($max = 3)
	{
		$articles ="";
		
		return $this->render('article/recent_list.html.twig', array('articles' => $articles));
	}
}
