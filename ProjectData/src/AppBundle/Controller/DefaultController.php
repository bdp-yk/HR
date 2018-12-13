<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


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
     * @Route("dashboard")
     */
    public function indexAction($name)
    {
        return $this->render('@App/index.html.twig');
    }
}
