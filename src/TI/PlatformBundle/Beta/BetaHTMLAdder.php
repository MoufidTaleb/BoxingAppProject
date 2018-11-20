<?php

namespace TI\PlatformBundle\Beta;

use Symfony\Component\HttpFoundation\Response;

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