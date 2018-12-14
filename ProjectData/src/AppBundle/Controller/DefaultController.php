<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;


/**
 * Class DefaultController
 * @package AppBundle\Controller
 * @Route("/")
 */
class DefaultController extends Controller
{
    /**
     * @param $name
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/dashboard",name="d")
     */


    public function indexAction()
    {
        return $this->render('@App/HomeLayout.html.twig');
    }
}
