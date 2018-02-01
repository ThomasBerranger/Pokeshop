<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Article;
use AppBundle\Entity\User;
use AppBundle\Form\UserEditType;
use AppBundle\Service\Service;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;


class UserController extends Controller
{
    /**
     * @Route("/user/edit", name="user_edit")
     */
    public function editAction(Request $request, Service $service)
    {
        $user = $this->getUser();

        $form = $this->createForm(UserEditType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {

            $user = $form->getData();

            $service->persistAndFlush($user);

            return $this->redirectToRoute('homepage');
        }

        return $this->render('user/edit.html.twig', array(
            'form' => $form->createView(),
            'user' => $user
        ));
    }

    /**
     * @Route("/user/delete/{id}", name="user_delete", requirements={"id"="\d+"})
     */
    public function deleteAction(User $user, Service $service, TokenStorageInterface $tokenStorage)
    {
        $fs = new Filesystem();
        $fs->remove(array('symlink', './../web/uploads/users_pictures/'.$user->getPicture(), 'activity.log'));
        $service->removeAndFlush($user);
        $tokenStorage->setToken(null); //Supprime le tokken pour éviter erreure
        return $this->redirectToRoute('login');
    }

    /**
     * @Route("/user/add_favorite/{id}", name="user_add_favorite", requirements={"id"="\d+"})
     */
    public function addFavoriteAction(Article $article, Service $service)
    {
        $user = $this->getUser();

        $user->addPokemonsFavorite($article->getPokemon());

        $service->persistAndFlush($user);

        return $this->redirectToRoute('article_details',  array(
            "id" => $article->getId()
        ));
    }

    /**
     * @Route("/user/remove_favorite/{id}", name="user_remove_favorite", requirements={"id"="\d+"})
     */
    public function removeFavoriteAction(Article $article, Service $service)
    {
        $user = $this->getUser();

        $user->removePokemonsFavorite($article->getPokemon());

        $service->persistAndFlush($user);

        return $this->redirectToRoute('article_details',  array(
            "id" => $article->getId()
        ));
    }
}
