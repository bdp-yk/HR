<?php

namespace AppBundle\Controller;

use AppBundle\Entity\OffreEmploie;
use AppBundle\Form\OffreEmploieType;
use AppBundle\Form\UtilisateurType;
use http\Env\Response;
use AppBundle\Entity\Absence;
use AppBundle\Form\AbsenceType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Entity\Utilisateur;


class DefaultController extends Controller
{
    /**
     * @Route("/OK",name="ok")
     */

    public function listAction(Request $request)

    {
        $var = new Utilisateur();


        $repository = $this->getDoctrine()->getRepository("AppBundle:Utilisateur");
        $personne = $repository->findAll();
        return $this->render('@App/doc.html.twig', array(
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
            //Commit
            $em->flush();
        }

        return $this->render('@App/x.html.twig', array(
            'form' => $form->createView()
        ));


        $rep = $this->getDoctrine()->getRepository("AppBundle:Utilisateur");
//        dump($rep->findAll());
//        die();
        return $this->render('@App/index.html.twig');
        // replace this example code with whatever you need0
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

            $em->persist($personne);
            //Commit
            $em->flush();
        }
        return $this->render('@App/x.html.twig', array(
            'form' => $form->createView()
        ));
        /*return $this->render('AppBundle:Default:list',array(
            'form' => $form->createView()
        ));*/


    }

    /**
     * @Route("/addoffre/{offre}")
     */
    public function addoffreAction(Request $request, OffreEmploie $offre = null)

    {

        $offre = new OffreEmploie();
        $form = $this->createForm(OffreEmploieType::class, $offre);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            dump($offre);

            $em->persist($offre);
            //Commit
            $em->flush();
        }
        return $this->render('@App/form.html.twig', array(
            'form' => $form->createView()
        ));
        //if ($form->get('save')->isClicked()) {}
        /*return $this->render('AppBundle:Default:list',array(
            'form' => $form->createView()
        ));*/


    }

    /**
     * @Route("/updateoffre/{offre}")
     */
    public function updateoffreAction(Request $request, OffreEmploie $offre = null)

    {
        if (!$offre)

            $offre = new OffreEmploie();
        $form = $this->createForm(OffreEmploieType::class, $offre);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            dump($offre);

            $em->persist($offre);
            //Commit
            $em->flush();
        }
        return $this->render('@App/x.html.twig', array(
            'form' => $form->createView()
        ));
        /*return $this->render('AppBundle:Default:list',array(
            'form' => $form->createView()
        ));*/


    }

    /**
     * @Route("/deleteoffre/{offre}")
     */

    public function deleteindexAction(Request $request, OffreEmploie $offre = null)

    {

        $em = $this->getDoctrine()->getManager();
        $em->remove($offre);
        //Commit
        $em->flush();
        return $this->redirectToRoute('ok');
        // return $this->render('AppBundle/Default/list');
        //return $this->render('@App/delete.html.twig');


    }

    /**
     * @Route("/", name="homepage")
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