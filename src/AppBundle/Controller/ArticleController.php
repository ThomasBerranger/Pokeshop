<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Article;
use AppBundle\Entity\Pokemon;
use AppBundle\Form\ArticleType;
use AppBundle\Service\FileUploader;
use AppBundle\Service\PokeApi;
use AppBundle\Service\Service;
use Doctrine\DBAL\DBALException;
use Doctrine\DBAL\Driver\PDOException;
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
    public function detailsAction(Article $article)
    {
        return $this->render('article/details.html.twig',  array(
            "article" => $article
        ));
    }



    /**
     * @Route("/article/delete/{id}", name="article_delete")
     */
    public function deleteAction(Article $article, Service $service)
    {
        $fs = new Filesystem();
        dump($article);die;

        //$fs->remove(array('symlink', './../web/uploads/articles_pictures/'.$article->getPicture(), 'activity.log'));
        //$service->removeAndFlush($article);
        return $this->redirectToRoute('article_list');
    }



    /**
     * @Route("/article/add_basket/{id}", name="article_add_basket")
     */
    public function addBasketAction(Article $article, Service $service)
    {
        $user = $this->getUser()->addBasketArticle($article);

        try {
            $service->persistAndFlush($user);
        }
        catch (DBALException $e){
            $this->addFlash('error', 'It seems you already have this article in your basket');
            return $this->redirectToRoute('article_details', array('id' => $article->getId()));
        }

        return $this->redirectToRoute('basket');
    }



    /**
     * @Route("/article/remove_basket/{id}", name="article_remove_basket")
     */
    public function removeBasketAction(Article $article, Service $service)
    {
        $user = $this->getUser();

        $user->removeBasketArticle($article);

        $service->persistAndFlush($user);

        $this->addFlash('remove_fav', 'Article removed from your basket');

        return $this->redirectToRoute('basket');
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
