<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use AppBundle\Form\UserEditType;
use AppBundle\Service\Service;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{

    /**
     * @Route("/user/edit", name="user_edit")
     */
    public function editAction(Request $request, Service $service)
    {
        $id = $this->getUser()->getId();

        $user = $this->getDoctrine()->getRepository(User::class)->find($id);

        $form = $this->createForm(UserEditType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {

            $user = $form->getData();

            $service->persistAndFlush($user);

            return $this->redirectToRoute('logout');
        }

        return $this->render('user/edit.html.twig', array(
            'form' => $form->createView(),
            'user' => $user
        ));
    }

    /**
     * @Route("/user/delete/{id}", name="user_delete", requirements={"id"="\d+"})
     */
    public function deleteAction($id, Service $service)
    {
        $fs = new Filesystem();
        $user = $this->getDoctrine()->getRepository(User::class)->find($id);
        // $fs->remove(array('symlink', './../web/uploads/users_pictures/'.$user->getPicture(), 'activity.log'));
        $service->removeAndFlush($user);
        return $this->redirectToRoute('logout');
    }
}
