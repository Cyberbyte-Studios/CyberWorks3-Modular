<?php

namespace CyberWorks\Modules\Core;

use Slim\App;
use Interop\Container\ContainerInterface;

class Module
{
    public function __construct()
    {
    }

    public function initDependencies(ContainerInterface $container)
    {
    }

    public function initMiddleware(App $app)
    {

    }

    public function initRoutes(App $app)
    {
        $app->get('/hello', function ($request, $response, $args) {
            return $response->write("HELLO");
        });
    }
}