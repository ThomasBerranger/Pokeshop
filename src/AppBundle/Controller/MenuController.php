<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Article;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MenuController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        $homeNavbar = true;

        $articles = $this->getDoctrine()->getRepository(Article::class)->getLastLimited();

        $articlesFavorites = $this->getDoctrine()->getRepository(Article::class)->getMostPopular();

        return $this->render('menu/index.html.twig', array(
            'homeNavbar' => $homeNavbar,
            'articles' =>$articles,
            'articlesFavorites' =>$articlesFavorites
        ));
    }

    /**
     * @Route("/basket", name="basket")
     */
    public function basketAction()
    {
        $articles = $this->getUser()->getBasketArticle();

        $totalPrice = 0;
        foreach ($articles as $article)
        {
            $totalPrice = $totalPrice + $article->getPrice();
        }

        return $this->render('menu/basket.html.twig', array(
            "articles" => $articles,
            "totalPrice" => $totalPrice
        ));
    }
}
