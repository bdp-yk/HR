<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

use AppBundle\service\MailerService;
use Symfony\Component\HttpFoundation\Response;




class SecurityControllerController extends Controller
{
    /**
     * @Route("/log", name="login")
     */

    public function loginAction(AuthenticationUtils $authenticationUtils)
    {
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('@App/login.html.twig', array(
            'last_username' => $lastUsername,
            'error'         => $error,
        ));
    }

    /**
     * @Route("/home",name="home")
     */
    public function  redirectAction(){

        $authchecker =$this->container->get('security.authorization_checker');
        if($authchecker->isGranted('ROLE_ADMIN')){return $this->render('@App/testmail.html.twig');}
        else if ($authchecker->isGranted('ROLE_USER'))
        {return $this->render('@App/user.html.twig');}

        else {return new Response('Invalid credentials');}






    }
    /**
     * @Route("/mail",name="email")
     */
    public function MailAction(MailerService $mailerService)
    {
        $message = (new \Swift_Message('Hello Email'))
            ->setFrom('khlifizouhaier9@gmail.com')
            ->setTo(['khlifizouhaier8@gmail.com','khlifizouhaier9@gmail.com'])
            ->setBody('You should see me from the profiler!');

        // $mailerService->send($message);
        $mailerService->sendMessage('Bonjour', ['khlifizouhaier8@gmail.com', 'khlifizouhaier9@gmail.com'], false);
        return $this->render('@App/testmail.html.twig');
    }
}
