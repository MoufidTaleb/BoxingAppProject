<?php

namespace TI\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class TIUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
