<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Evennement;
use AppBundle\Entity\Media;
use AppBundle\FeaturedServices\ServiceProvidingItem;
use http\Env\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AppBundle\Form\EvennementType;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class EvenementController
 * @package AppBundle\Controller
 * @Route("/event")
 */
class EvenementController extends Controller
{
    /**
     * @Route("/addevent/{event}",name="eventadd")
     */
    public function addoffreAction(Request $request, Evennement $event = null)

    {

        $event = new Evennement();
        $form = $this->createForm(EvennementType::class, $event);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $m = new Media();
//            $m->setSource($event->getMediaEvent()->getClientOriginalName());
//            $m->setType($event->getMediaEvent()->getClientMimeType());
            $m->setSource("");

            $m->setType("");

            $event->setMediaEvent($m);
            dump($event);

            $em->persist($m);
            $em->persist($event);
            //Commit
            $em->flush();

            $data['message'] = $event->getTitle();
            $data['link'] = "/event/display/" . $event->getId();
            ServiceProvidingItem::notifier('event-update', $data);
        }
        return $this->render('@App/event/update_insert.html.twig', array(
            'form' => $form->createView()
        ));


    }

    /**
     * @Route("/updateevent/{event}")
     */
    public function updateoffreAction(Request $request, Evennement $event = null)

    {
        if (!$event)

            $event = new Evennement();
        $form = $this->createForm(EvennementType::class, $event);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            dump($event);

            $em->persist($event);
            $em->flush();
        }
        return $this->render('@App/event/update_insert.html.twig', array(
            'form' => $form->createView()
        ));


    }

    /**
     * @Route("/",name="listing")
     */
    public function listAction(Request $request)
    {
        $var = new Evennement();
        $repository = $this->getDoctrine()->getRepository("AppBundle:Evennement");
        $evenements = $repository->findAll();
        return $this->render('@App/event/listevent.html.twig', array(
            'evennements' => $evenements));
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/display/{id}")
     */
    public function displayEventAction(Request $request,int $id)
    {
        $repository = $this->getDoctrine()->getRepository(Evennement::class);

        $evenement = $repository->findOneBy(array("id"=>$id));
        return $this->render('@App/event/display.html.twig', array(
            'evenement' => $evenement));
    }


    /**
     * @Route("/deleteevent/{event}")
     */

    public function deleteindexAction(Request $request, Evennement $event = null)

    {

        $em = $this->getDoctrine()->getManager();
        $em->remove($event);
        //Commit
        $em->flush();
        return $this->redirectToRoute('listing');


    }


}
