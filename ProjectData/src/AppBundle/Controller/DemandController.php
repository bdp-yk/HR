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
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        if (!isset($demande)) {
            $demande = new Demande();
        }
        $demande->setEmployeEmetteur($this->getUser());
//        dump($demande);
//die();
        $__form = $this->createForm(DemandeType::class, $demande);
        $__form->handleRequest($request);

        if ($__form->isSubmitted()) {

            $em = $this->getDoctrine()->getManager();
//            $demande->setEmployeEmetteur( $this->getUser());
            $em->persist($demande);
            $em->flush();
//            ServiceProvidingItem::notifier("test", "hello");
            return $this->redirectToRoute("demandlisting");
        }
        return $this->render('AppBundle:DemandsForms:DemandEdit.html.twig', array('__form' => $__form->createView()));
    }

    /**
     * @param Request $request
     * @param null $filter
     * @Route("/",name="demandlisting")
     */
    public function listAction(Request $request, $filter = null)
    {
        $em = $this->getDoctrine()->getManager();

        $demands=$em->getRepository(Demande::class)->findAll();
        return $this->render('AppBundle:DemandsForms:DemandListing.html.twig', array('demands' => $demands));
    }
}
