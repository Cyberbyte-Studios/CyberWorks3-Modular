<?php

use CyberWorks\Loader\ModuleLoader;
use Noodlehaus\Config;

require __DIR__ . '/../vendor/autoload.php';

$app = new \Slim\App();
$container = $app->getContainer();
$config = Config::load(__DIR__. '/../config/config.php');

$container['config'] = function ($container) {
    return Noodlehaus\Config::load(__DIR__. '/../config/config.php');
};

$loader = new ModuleLoader($app, $config->get("modules"));