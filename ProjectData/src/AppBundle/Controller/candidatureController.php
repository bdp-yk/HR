<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Candidature;
use AppBundle\Form\CandidatureType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class candidatureController extends Controller
{
    /**
     * @Route("/addcandidature/{personne}")
     */
    public function addindexAction(Request $request, Candidature $personne =null)

    {

        $personne = new Candidature();
        $form = $this->createForm(CandidatureType::class, $personne);

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
     * @Route("/updatecandidature/{personne}")
     */
    public function updateindexAction(Request $request,Candidature $personne = null)

    {
        if (!$personne)
            $personne = new Candidature();
        $form = $this->createForm(CandidatureType::class, $personne);

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
     * @Route("/deleteoffre/{candidature}")
     */

    public function deleteindexAction(Request $request, Candidature $candidature = null)

    {

        $em = $this->getDoctrine()->getManager();
        $em->remove($candidature);
        //Commit
        $em->flush();
        return $this->redirectToRoute('ok');
        // return $this->render('AppBundle/Default/list');
        //return $this->render('@App/delete.html.twig');
    }
    /**
     * @Route("/OK",name="ok")
     */

    public function listAction(Request $request)

    { $var=new Candidature();


        $repository = $this->getDoctrine()->getRepository("AppBundle:Candidature");
        $personne = $repository->findAll();
        return $this->render('@App/doc.html.twig', array(
            'Utilisateur'=>$personne));
        dump($personne);
        die();



    }


}
