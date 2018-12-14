<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Demande;
use AppBundle\FeaturedServices\ServiceProvidingItem;
use AppBundle\Form\DemandeType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class DemandController
 * @package AppBundle\Controller
 * @Route("/demand")
 */
class DemandController extends Controller
{
    /**
     * @Route("/edit/{demande}",name="demandeditor")
     */
    public function indexAction(Request $request, Demande $demande = null)
    {
        if (!isset($demande)) {
            $demande = new Demande();
        }
        $__form = $this->createForm(DemandeType::class, $demande);

        $__form->handleRequest($request);

        if ($__form->isSubmitted() && $__form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            dump($demande);
            $em->persist($demande);
            $em->flush();
            ServiceProvidingItem::notifier("test", "hello");
        }
        return $this->render('AppBundle:DemandsForms:DemandEdit.html.twig', array('__form' => $__form->createView()));
    }

    /**
     * @param Request $request
     * @param null $filter
     * @Route("/")
     */
    public function listAction(Request $request, $filter = null)
    {
        $em = $this->getDoctrine()->getManager();
        $demands=$em->getRepository(Demande::class)->findOneBy(array(
            'employe_emetteur' => 
        ), array('updated_at' => 'DESC'));

        return $this->render('AppBundle:DemandsForms:DemandListing.html.twig', array('demands' => $demands));
    }
}
