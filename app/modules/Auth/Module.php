<?php

namespace CyberWorks\Modules\Auth;

use Slim\App;
use MartynBiz\Slim3Module\AbstractModule;

class Module extends AbstractModule
{
    public function initClassLoader(ClassLoader $classLoader)
    {
        $classLoader->setPsr4("CyberWorks\\Modules\\Auth\\", __DIR__ . "/src");
    }

    public function initDependencies(Container $container)
    {
    }

    public function initMiddleware(App $app)
    {

    }

    public function initRoutes(App $app)
    {

    }
}