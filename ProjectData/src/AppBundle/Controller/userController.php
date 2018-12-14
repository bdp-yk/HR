<?php

namespace AppBundle\Controller;


use AppBundle\Form\UtilisateurType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Entity\User;

use AppBundle\Entity\Media;

/**
 * Class userController
 * @package AppBundle\Controller
 * @Route("/user")
 */


class userController extends Controller
{
    /**
     * @Route("/",name="ListUser")
     */

    public function listAction(Request $request)

    {
        $var = new User();


        $repository = $this->getDoctrine()->getRepository(User::class);
        $personne = $repository->findAll();
        return $this->render('@App/user/listuser.html.twig', array(
            'Utilisateur' => $personne));
        dump($personne);
        die();


    }


    /**
     * @Route("/update_user/{personne}",name="profile_update")
     */
    public function updateindexAction(Request $request, User $personne = null)

    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        if(!$personne)
            $personne = $this->getUser();
        $form = $this->createForm(UtilisateurType::class, $personne);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            dump($personne);

            $em->persist($personne);

            $em->flush();
        }

        return $this->render('@App/user/UpdateUserProfile.html.twig', array(
            '__form' => $form->createView()
        ));
    }

    /**
     * @Route("/add/{personne}")
     */
    public function addindexAction(Request $request, User $personne = null)

    {

        $personne = new User();
        $form = $this->createForm(UtilisateurType::class, $personne);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            dump($personne);
//            die();
            $m=new Media();
            $m->setSource("ezaeza.png");
            $m->setType("aaaa");
            $personne->setPhotoProfil($m);
            dump($personne);
//            die();
            $em->persist($m);
            $em->persist($personne);

            $em->flush();
        }
        return $this->render('@App/user/updateuser.html.twig', array(
            'form' => $form->createView()
        ));
    }
    /**
     * @Route("/deleteuser/{user}")
     */
    public function deleteindexAction(Request $request, User $user = null)

    {

        $em = $this->getDoctrine()->getManager();
        $em->remove($user);
        //Commit
        $em->flush();
        return $this->redirectToRoute('ListUser');

    }


    /**
     * @Route("/abs", name="homepage")
     */
    public
    function indexAbsenceAction(Request $request)
    {
        $absence = new Absence();
        $form = $this->createForm(AbsenceType::class, $absence);

        return $this->render('@App/Absence/index.html.twig', array(
            'absence_form' => $form->createView()
        ));
        // replace this example code with whatever you need0
    }
}