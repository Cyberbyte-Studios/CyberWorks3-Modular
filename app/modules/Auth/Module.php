<?php

namespace CyberWorks\Modules\Auth;

use Slim\App;
use Interop\Container\ContainerInterface;

class Module
{
    public function initDependencies(ContainerInterface $container)
    {
        $container['AuthController'] = function ($container) {
            return new Controllers\AuthController($container);
        };
    }

    public function initMiddleware(App $app)
    {

    }

    public function initRoutes(App $app)
    {

    }

    public function initViewElements($view)
    {

    }
}