<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Candidature;
use AppBundle\Form\CandidatureType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
class CandidateController extends Controller
{

    /**
     * @Route("/addcandidature/{personne}")
     */
    public function candidatureAction(Request $request, Candidature $personne =null)
    {
        if (!$personne)
            $personne = new Candidature();
        $form = $this->createForm(CandidatureType::class, $personne);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            dump($personne);
            $em->persist($personne);
            $em->flush();
        }
        return $this->render('@App/x.html.twig', array(
            'form' => $form->createView()
        ));

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

            $em->flush();
        }
        return $this->render('@App/candidature/update_insert.html.twig', array(
            'form' => $form->createView()
        ));
    }

    /**
     * @Route("/listcandidate",name="listingcandidate")
     */
    public function listAction(Request $request)
    { $personne=new Candidature();
        $repository = $this->getDoctrine()->getRepository("AppBundle:Candidature");
        $personne = $repository->findAll();
        return $this->render('@App/candidature/listcandidate.html.twig', array(
            'Utilisateur'=>$personne));
        dump($personne);
        die();
    }
    /**
     * @Route("/deletecandidature/{candidature}")
     */
    public function deleteindexAction(Request $request, Candidature $candidature = null)

    {

        $em = $this->getDoctrine()->getManager();
        $em->remove($candidature);
        //Commit
        $em->flush();
        return $this->redirectToRoute('listingcandidate');

    }




}
