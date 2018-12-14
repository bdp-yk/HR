<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Evennement;
use AppBundle\Entity\Media;
use http\Env\Response;
use Pusher\Pusher;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AppBundle\Form\EvennementType;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class EvenementController extends Controller
{
    /**
     * @Route("/addevent/{event}")
     */
    public function addoffreAction(Request $request, Evennement $event = null)

    {

        $event = new Evennement();
        $form = $this->createForm(EvennementType::class, $event);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $m=new Media();
            $m->setSource($event->getMediaEvent()->getClientOriginalName());
            $m->setType($event->getMediaEvent()->getClientMimeType());
            $event->setMediaEvent($m);
            dump($event);

            $em->persist($m);
            $em->persist($event);
            //Commit
            $em->flush();
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
     * @Route("/listevent",name="listing")
     */
    public function listAction(Request $request)
    { $var=new Evennement();
        $repository = $this->getDoctrine()->getRepository("AppBundle:Evennement");
        $evenements = $repository->findAll();

        dump($evenements[0]);
//        die();
        return $this->render('@App/event/listevent.html.twig', array(
            'evennements'=>$evenements));
    }

    /**
     * @Route("/deleteevent/{event}")
     */

    public function deleteindexAction(Request $request,Evennement $event = null)

    {

        $em = $this->getDoctrine()->getManager();
        $em->remove($event);
        //Commit
        $em->flush();
        return $this->redirectToRoute('listing');


    }

    /**
     * @param $message
     * @param $event_id
     * @Route("/notify/{message}/{event_id}")
     * @return Response
     * @throws \Pusher\PusherException
     */
    public function notifier(Request $request, $message, $event_id){
        $options = array(
            'cluster' => 'eu',
            'useTLS' => true
        );
        $pusher = new Pusher(
            'e59775b63526c7a39ddf',
            '90488c426ffdccc3dc1f',
            '672117',
            $options
        );

        $data['message'] = $message;
        $data['event'] ="/event/display?id=". $event_id;
        $pusher->trigger('event-notifier', 'event-update', $data);

        return $this->redirectToRoute('listingoffre');
    }

}
