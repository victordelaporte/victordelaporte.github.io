<?php

namespace App\Notification;

use Twig\Environment;
use App\Entity\Contact;

class ContactNotification {

    private $mailer;

    private $renderer;

    public function __construct(\Swift_Mailer $mailer, Environment $renderer)
    {
        $this->mailer= $mailer;
        $this->renderer = $renderer;
    }
    public function notify(Contact $contact){
        $message = (new \Swift_Message('Agence :' . $contact->getLastname()))
        ->setFrom($contact->getEmail())
        ->setTo('victor.delaporte4@gmail.com')
        //->setReplyTo($contact->getEmail())
        ->setBody($this->renderer->render('emails/contactTemplate.html.twig', [
            'contact' => $contact
        ]), 'text/html');

        $this->mailer->send($message);

    }

}