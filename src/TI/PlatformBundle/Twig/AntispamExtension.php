<?php


namespace TI\PlatformBundle\Twig;

use TI\PlatformBundle\Antispam\Antispam;

class AntispamExtension extends \Twig_Extension
{
    private $antispam;

    public function __construct(Antispam $antispam)
    {
        $this->antispam = $antispam;
    }

    public function checkIfArgumentIsSpam($text){
        return $this->antispam->isSpam($text);
    }

    public function getFunctions(){
        return array(
            new \Twig_SimpleFunction('checkIfSpam', array($this, 'checkIfArgumentIsSpam')),
        );
    }

    public function getName(){
        return 'Antispam';
    }
}