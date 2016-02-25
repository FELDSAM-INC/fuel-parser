<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Parser;

/**
 * Twig extension for the stopwatch helper.
 *
 * @author Wouter J <wouter@wouterj.nl>
 */
class Twig_Extension_Stopwatch extends \Twig_Extension
{
    private $stopwatch;

    /**
     * @var bool
     */
    private $enabled;

    public function __construct($stopwatch = null, $enabled = true)
    {
        $this->stopwatch = $stopwatch;
        $this->enabled = $enabled;
    }

    public function getStopwatch()
    {
        return $this->stopwatch;
    }

    public function getTokenParsers()
    {
        return array(
            /*
             * {% stopwatch foo %}
             * Some stuff which will be recorded on the timeline
             * {% endstopwatch %}
             */
            new Twig_TokenParser_Stopwatch($this->stopwatch !== null && $this->enabled),
        );
    }

    public function getName()
    {
        return 'stopwatch';
    }
}