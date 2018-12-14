<?php

namespace AppBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
 use AppBundle\service\MailerService;


class mailingController extends Controller
{


    /**
     * @Route("/mail",name="email")
     */
    public function MailAction(MailerService $mailerService)
    {
        $message = (new \Swift_Message('HR_Management'))
            ->setFrom('khlifizouhaier9@gmail.com')
            ->setTo(['khlifizouhaier8@gmail.com','khlifizouhaier9@gmail.com'])
            ->setBody('You should see me from the profiler!');

        // $mailerService->send($message);
        $mailerService->sendMessage('There are an Event this saturday at 14/12/2018  in Room 202.!', ['khlifizouhaier8@gmail.com', 'khlifizouhaier9@gmail.com'], false);
        return $this->render('@App/testmail.html.twig');
    }
}
