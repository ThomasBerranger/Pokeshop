<?php

namespace AppBundle\Controller;

use AppBundle\Service\PokeApi;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ArticleController extends Controller
{
    /**
     * @Route("/article/list", name="article_list")
     */
    public function listAction(Request $request)
    {
        /** @var PokeApi $pokeApi */
        $pokeApi = $this->get(PokeApi::class);
        $data = $pokeApi->getPokeInfo(1);
        $parsedData = $pokeApi->parseResult($data);

        dump($parsedData);

        return $this->render('article/list.html.twig', [
            'data' => $parsedData
        ]);
    }
}
