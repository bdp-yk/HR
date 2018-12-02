<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Entity\Utilisateur;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $rep = $this->getDoctrine()->getRepository("AppBundle:Utilisateur");
//        dump($rep->findAll());
//        die();
        return $this->render('@App/index.html.twig');
        // replace this example code with whatever you need0
    }
}
