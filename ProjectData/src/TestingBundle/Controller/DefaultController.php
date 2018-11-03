<?php

namespace TestingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        return $this->render('@Testing/index.html.twig');
    }
    /**
     * @Route("examples/profile")
     */
    public function profileAction()
    {
        return $this->render('@Testing/examples/profile.html.twig');
    }
    /**
     * @Route("examples/icons")
     */
    public function iconsAction()
    {
        return $this->render('@Testing/examples/icons.html.twig');
    }
    /**
     * @Route("examples/maps")
     */
    public function mapsAction()
    {
        return $this->render('@Testing/examples/maps.html.twig');
    }
    /**
     * @Route("examples/tables")
     */
    public function tablesAction()
    {
        return $this->render('@Testing/examples/tables.html.twig');
    }
    /**
     * @Route("examples/login")
     */
    public function loginAction()
    {
        return $this->render('@Testing/examples/login.html.twig');
    }
    /**
     * @Route("examples/register")
     */
    public function registerAction()
    {
        return $this->render('@Testing/examples/register.html.twig');
    }

}
