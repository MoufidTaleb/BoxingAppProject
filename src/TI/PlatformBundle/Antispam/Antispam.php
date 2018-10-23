<?php

namespace TI\PlatformBundle\Antispam;


class Antispam
{
    private $minLength;

    public function __construct($minLength)
    {
        $this->minLength = (int) $mingLength;
    }

    /**
     * Verify if the text is spam
     * @param string $content
     * @return bool
     */
    public function isSpam($content)
    {
        return strlen($content) < $minLength;
    }
}