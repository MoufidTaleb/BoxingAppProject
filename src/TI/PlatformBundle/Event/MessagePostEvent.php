<?php

namespace TI\PlatformBundle\Event;

use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Class MessagePostEvent
 * @package TI\PlatformBundle\Event
 * This class is just a simple event who can be triggered when a message is posted
 */
class MessagePostEvent extends Event
{
    protected $message;
    protected $user;

    public function __construct($message, UserInterface $user){
        $this->message = $message;
        $this->user = $user;
    }

    public function getMessage(){
        return $this->message;
    }

    public function setMessage($message){
        $this->message = $message;
    }

    public function getUser(){
        return $this->user;
    }
}