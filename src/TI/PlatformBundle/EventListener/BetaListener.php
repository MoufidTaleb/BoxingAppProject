<?php

namespace TI\PlatformBundle\EventListener;

use Symfony\Component\HttpFoundation\Response;
use TI\PlatformBundle\Beta\BetaHTMLAdder;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;

/**
 * Class BetaListener
 * @package TI\PlatformBundle\EventListener
 * A listener, made for executing the BetaHTMLAdder service, he's configured in the services.yml file of Symfony
 */
class BetaListener
{
    protected $betaHTML;
    protected $endDate;

    public function __construct(BetaHTMLAdder $betaHTML, $endDate){
        $this->betaHTML = $betaHTML;
        $this->endDate = new \Datetime($endDate);
    }

    public function processBeta(FilterResponseEvent $event){

        if(!$event->isMasterRequest()){
            return;
        }

        $remainingDays = $this->endDate->diff(new \DateTime())->days;

        if($remainingDays <= 0){
            return;
        }
        $response = $this->betaHTML->addBeta($event->getResponse(), $remainingDays);

        $event->setResponse($response);
    }
}