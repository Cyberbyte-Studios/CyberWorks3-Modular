<?php

namespace CyberWorks\Loader;

use Slim\App;

class ModuleLoader
{
    protected $app;
    protected $container;

    public function __construct(App $app, $modules=[]) {
        $this->app = $app;
        $this->container = $app->getContainer();

        foreach ($modules as $module) {
            $this->initModule($module);
        }
    }

    private function initModule($name) {
        $class = $name . '\Module';
        $module = new $class;

        $module->initDependencies($this->app->getContainer());
        $module->initMiddleware($this->app);
        $module->initRoutes($this->app);
    }
}