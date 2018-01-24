<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Article;
use AppBundle\Entity\Pokemon;
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
    public function listAction()
    {
        $article = $this->getDoctrine()->getRepository(Article::class)->findAll();

        return $this->render('article/list.html.twig',  array(
            "articles" => $article
        ));
    }


    /**
     * @Route("/article/details/{id}", name="article_details")
     */
    public function detailsAction($id)
    {
        $article = $this->getDoctrine()->getRepository(Article::class)->find($id);

        return $this->render('article/details.html.twig',  array(
            "article" => $article
        ));
    }


    /**
     * @Route("/article/add", name="article_add")
     */
    public function addAction(Request $request)
    {
        $article = new Article();
        $user = $this->getUser();
        $form = $this->createForm(ArticleType::class, $article);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $article->setOwner($user);

            $picture = $article->getPicture();
            if ( $picture )
            {
                $pictureName = md5(uniqid()).'.'.$picture->guessExtension();
                $picture->move(
                    $this->getParameter('articles_pictures_directory'),
                    $pictureName
                );
                $article->setPicture($pictureName);
            }

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


    /**
     * @Route("/article/dumApi", name="article_dump_api")
     */
    public function dumpApiAction(Request $request)
    {
        /** @var PokeApi $pokeApi */
        $pokeApi = $this->get(PokeApi::class);
        $numberTotalOfPoke = /*496*/151;

        set_time_limit(0); // Temps d'execution illimité

        foreach (range(96, $numberTotalOfPoke) as $number)
        {
            $pokemon = new Pokemon();

            $data = $pokeApi->getOnePokemonInfo($number);
            $parsedData = $pokeApi->parseResultOnePokemon($data);

            $databaseOnePokemon = [];

            $databaseOnePokemon["number"] = $parsedData["id"];
            $databaseOnePokemon["name"] = $parsedData["name"];
            $databaseOnePokemon["type1"] = $parsedData["type1"];
            $databaseOnePokemon["type2"] = $parsedData["type2"];


            $pokemon->setNumber($databaseOnePokemon["number"]);
            $pokemon->setName($databaseOnePokemon["name"]);
            $pokemon->setType1($databaseOnePokemon["type1"]);
            $pokemon->setType2($databaseOnePokemon["type2"]);


            $em = $this->getDoctrine()->getManager();
            $em->persist($pokemon);
            $em->flush();


            dump($databaseOnePokemon);
        }



        $data = $pokeApi->getPokeEvolveChainUrl(33);
        $parsedData = $pokeApi->parseResultEvolutionChain($data);

        dump($parsedData);die;


        return $this->render('article/list.html.twig', [
            'data' => $data
        ]);
    }
}
