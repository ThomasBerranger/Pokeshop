<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Article;
use AppBundle\Form\ArticleType;
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
        $numberTotalOfPoke = /*496*/1;

        foreach (range(1, $numberTotalOfPoke) as $number)
        {
            $data = $pokeApi->getOnePokemonInfo($number);
            $parsedData = $pokeApi->parseResultOnePokemon($data);

            $databaseOnePokemon = [];

            $databaseOnePokemon["number"] = $parsedData["id"];
            $databaseOnePokemon["name"] = $parsedData["name"];
            $databaseOnePokemon["type1"] = $parsedData["type1"];
            $databaseOnePokemon["type2"] = $parsedData["type2"];

            dump($databaseOnePokemon);
        }



        $data = $pokeApi->getPokeEvolveChainUrl(33);
        $parsedData = $pokeApi->parseResultEvolutionChain($data);

        dump($parsedData);die;


        return $this->render('article/list.html.twig', [
            'data' => $data
        ]);
    }

    /**
     * @Route("/article/add", name="article_add")
     */
    public function addAction(Request $request)
    {
        $article = new Article();
        $form = $this->createForm(ArticleType::class, $article);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $article = $this->getUser();
            $article->setOwner($article);

            $em = $this->getDoctrine()->getManager();
            $em->persist($article);
            $em->flush();


            return $this->redirectToRoute('homepage');
        }

        return $this->render(
            'article/add.html.twig',
            array(
                'form' => $form->createView(),
            )
        );

    }
}
