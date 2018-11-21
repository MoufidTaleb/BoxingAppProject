<?php

namespace TI\PlatformBundle\Beta;

use Symfony\Component\HttpFoundation\Response;

/**
 * Class BetaHTMLAdder
 * @package TI\PlatformBundle\Beta
 * This service is used to add the Beta mention, with remaining time in the Navbar. Automatically ignored after the release date.
 * This service is listened by another: BetaListener
 */
class BetaHTMLAdder
{
    public function addBeta(Response $response, $remainingDays)
    {
        $content = $response->getContent();

        $html = 'Beta J-'.(int) $remainingDays.' !';
        $content = str_replace(
          '<p class="navbar-text">',
          '<p class="navbar-text" style="color: red;">'.$html,
          $content
        );

        $response->setContent($content);

        return $response;
    }
}