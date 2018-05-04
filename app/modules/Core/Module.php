<?php

namespace CyberWorks\Modules\Core;

use Slim\App;
use Interop\Container\ContainerInterface;

class Module
{
    public function initDependencies(ContainerInterface $container)
    {
        $container['errorHandler'] = function ($container) {
            return new Controllers\Error\ErrorController($container);
        };

        $container['notFoundHandler'] = function ($container) {
            return new Controllers\Error\NotFoundController($container);
        };

        $container['DashController'] = function ($container) {
            return new Controllers\DashController($container);
        };
    }

    public function initMiddleware(App $app)
    {

    }

    public function initRoutes(App $app)
    {
        $app->get('/', 'DashController:index')->setName('dashboard');
    }

    public function initViewElements($view)
    {

    }
}