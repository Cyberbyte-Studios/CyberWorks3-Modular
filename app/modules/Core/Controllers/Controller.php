<?php

namespace CyberWorks\Modules\Core\Controllers;

use Interop\Container\ContainerInterface;

class Controller
{
    protected $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function __get($property)
    {
        if ($this->container->{$property}) return $this->container->{$property};
    }
}