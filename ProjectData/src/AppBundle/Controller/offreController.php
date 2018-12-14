<?php

namespace AppBundle\Controller;
use AppBundle\AppBundle;
use AppBundle\Entity\Media;

use AppBundle\Entity\OffreEmploie;
use AppBundle\Entity\User;
use AppBundle\Form\OffreEmploieType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class offreController
 * @package AppBundle\Controller
 * @Route("/offre")
 */
class offreController extends Controller
{
    /**
     * @Route("/addoffre/{offre}",name="addoffre")
     */
    public function addoffreAction(Request $request, OffreEmploie $offre = null)

    {

        $offre = new OffreEmploie();
        $form = $this->createForm(OffreEmploieType::class, $offre);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();

            $m=new Media();
            $m->setSource('aa.png');
            $m->setType('image/png');
            $offre->setMediaOffre($m);

            $em->persist($m);

            $em->persist($offre);

            $em->flush();
            return $this->redirectToRoute('listingoffre');
        }
        return $this->render('@App/offre/update_insert.html.twig', array(
            '__form' => $form->createView()
        ));


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
            $em->flush();
        }
        return $this->render('@App/offre/update_insert.html.twig', array(
            '__form' => $form->createView()
        ));



    }
    /**
     * @Route("/",name="listingoffre")
     */
    public function listAction(Request $request)
    { $var=new OffreEmploie();
        $repository = $this->getDoctrine()->getRepository("AppBundle:OffreEmploie");
        $offre = $repository->findAll();

        return $this->render('@App/offre/listoffre.html.twig', array(
            'offre'=>$offre));
        dump($offre);
        die();
    }

    /**
     * @Route("/deleteoffre/{offre}")
     */

    public function deleteindexAction(Request $request, OffreEmploie $offre = null)

    {

        $em = $this->getDoctrine()->getManager();
        $em->remove($offre);
        $em->flush();
        return $this->redirectToRoute('listingoffre');


    }


}
