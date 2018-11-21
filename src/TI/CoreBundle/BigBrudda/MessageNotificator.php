<?php

namespace TI\CoreBundle\BigBrudda;

use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Class MessageNotificator
 * @package TI\CoreBundle\BigBrudda
 * This class is made to notify by email that a new message has been posted
 */
class MessageNotificator
{
    protected $mailer;

    public function __construct(\Swift_Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function notifyByEmail($message, UserInterface $user)
    {
        $message = \Swift_Message::newInstance()
            ->setSubject("Nouveau message d'un utilisateur surveillé")
            ->setFrom('admin@website.com')
            ->setTo('moufid.taleb@gmail.com')
            ->setBody("L'utilisateur surveillé " . $user->getUsername() . " a posté le message suivant: " . $message .);

        $this->mailer->send($message);
    }
}