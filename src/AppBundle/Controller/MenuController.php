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

        $article = $this->getDoctrine()->getRepository(Article::class)->getLastLimited();

        return $this->render('menu/index.html.twig', array(
            'homeNavbar' => $homeNavbar,
            'articles' =>$article
        ));
    }

    /**
     * @Route("/basket", name="basket")
     */
    public function basketAction()
    {
        return $this->render('menu/basket.html.twig');
    }
}
