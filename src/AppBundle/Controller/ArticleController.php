<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Article;
use AppBundle\Entity\Pokemon;
use AppBundle\Form\ArticleType;
use AppBundle\Service\FileUploader;
use AppBundle\Service\PokeApi;
use AppBundle\Service\Service;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Filesystem\Filesystem;

class ArticleController extends Controller
{

    /**
     * @Route("/article/add", name="article_add")
     */
    public function addAction(Request $request, FileUploader $fileUploader, Service $service)
    {
        $article = new Article();
        $user = $this->getUser();
        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $article->setOwner($user);

            $file = $article->getPicture();
            if ($file)
            {
                $fileName = $fileUploader->upload($file, "article");
                $article->setPicture($fileName);
            }

            $service->persistAndFlush($article);

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
     * @Route("/article/list", name="article_list")
     */
    public function listAction(Request $request)
    {
        $article = $this->getDoctrine()->getRepository(Article::class)->findAll();


        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $article, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            9/*limit per page*/
        );

        return $this->render('article/list.html.twig',  array(
            "articles" => $pagination
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
     * @Route("/article/delete/{id}", name="article_delete")
     */
    public function deleteAction($id, Service $service)
    {
        $fs = new Filesystem();
        $article = $this->getDoctrine()->getRepository(Article::class)->find($id);
        $fs->remove(array('symlink', './../web/uploads/articles_pictures/'.$article->getPicture(), 'activity.log'));
        $service->removeAndFlush($article);
        return $this->redirectToRoute('article_list');
    }




    /**
     * @Route("/article/dumpApi", name="article_dump_api")
     */
    public function dumpApiAction(Request $request)
    {
        /** @var PokeApi $pokeApi */
        $pokeApi = $this->get(PokeApi::class);
        $numberTotalOfPoke = /*496*/3;

        set_time_limit(0); // Temps d'execution illimité

        foreach (range(1, $numberTotalOfPoke) as $number)
        {
            $pokemon = new Pokemon();

            $data = $pokeApi->getOnePokemonInfo($number);
            $parsedData = $pokeApi->parseResultOnePokemon($data);

            $databaseOnePokemon = [];

            $databaseOnePokemon["number"] = $parsedData["id"];
            $databaseOnePokemon["name"] = $parsedData["name"];
            $databaseOnePokemon["type1"] = $parsedData["type1"];
            $databaseOnePokemon["type2"] = $parsedData["type2"];

            /*
                        $pokemon->setNumber($databaseOnePokemon["number"]);
                        $pokemon->setName($databaseOnePokemon["name"]);
                        $pokemon->setType1($databaseOnePokemon["type1"]);
                        $pokemon->setType2($databaseOnePokemon["type2"]);


                        $em = $this->getDoctrine()->getManager();
                        $em->persist($pokemon);
                        $em->flush();
            */

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
