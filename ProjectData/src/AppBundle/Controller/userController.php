<?php

namespace AppBundle\Controller;


use AppBundle\Form\UtilisateurType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Entity\Utilisateur;

use AppBundle\Entity\Media;

class userController extends Controller
{
    /**
     * @Route("/listuser",name="ListUser")
     */

    public function listAction(Request $request)

    {
        $var = new Utilisateur();


        $repository = $this->getDoctrine()->getRepository("AppBundle:Utilisateur");
        $personne = $repository->findAll();
        return $this->render('@App/user/listuser.html.twig', array(
            'Utilisateur' => $personne));
        dump($personne);
        die();


    }


    /**
     * @Route("/update/{personne}")
     */
    public function updateindexAction(Request $request, Utilisateur $personne = null)

    {
        if (!$personne)
            $personne = new Utilisateur();
        $form = $this->createForm(UtilisateurType::class, $personne);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            dump($personne);

            $em->persist($personne);

            $em->flush();
        }

        return $this->render('@App/user/updateuser.html.twig', array(
            'form' => $form->createView()
        ));
    }

    /**
     * @Route("/add/{personne}")
     */
    public function addindexAction(Request $request, Utilisateur $personne = null)

    {

        $personne = new Utilisateur();
        $form = $this->createForm(UtilisateurType::class, $personne);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            dump($personne);
//            die();
            $m=new Media();
            $m->setSource($personne->getPhotoProfil()->getClientOriginalName());
            $m->setType($personne->getPhotoProfil()->getClientMimeType());
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
    public function deleteindexAction(Request $request, Utilisateur $user = null)

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