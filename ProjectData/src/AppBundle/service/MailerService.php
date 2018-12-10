<?php
/**
 * Created by PhpStorm.
 * User: khlifi
 * Date: 09/12/2018
 * Time: 17:44
 */


namespace AppBundle\service;
class MailerService
{
    private $fromEmail;
    private $mailer;
    private $templating;
    public function __construct(\Swift_Mailer $mailer, $fromEmail, \Twig_Environment $templating)
    {
        $this->fromEmail = $fromEmail;
        $this->mailer = $mailer;
        $this->templating = $templating;
    }
    public function sendMessage($message, $to ,$forward = true, $attachementFile = null) {
        $message = (new \Swift_Message('Hello Email'))
            ->setFrom($this->fromEmail)
            ->setTo($to)
            ->setBody(
                $message
                ,
                'text/html');
        if ($attachementFile){
            $attachement = \Swift_Attachment::newInstance($attachementFile, 'Attachement', 'application/pdf' );
            $message->attach($attachement);
        }
        $this->mailer->send($message);
        if($forward){
            return    $this->templating->render('@App/index.html.twig');
        }
    }
}