<?php

use CyberWorks\Loader\ModuleLoader;
use Illuminate\Translation\Translator;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Translation\FileLoader;
use Noodlehaus\Config;

require __DIR__ . '/../vendor/autoload.php';

$config = Config::load(__DIR__. '/../config/core.config.php');

$devMode = $config->get('development', false);
if (!$devMode) {
    if (file_exists(__DIR__. '/../public/installer.php')) die('You need to delete installer.php first');
}

$app = new \Slim\App($config->get("slim"));
$container = $app->getContainer();

$capsule = new \Illuminate\Database\Capsule\Manager;
$capsule->addConnection($container['settings']['db']);
$capsule->setAsGlobal();
$capsule->bootEloquent();

$container['db'] = function ($container) use ($capsule) {
    return $capsule;
};

$container['config'] = function ($container) {
    return Noodlehaus\Config::load(__DIR__. '/../config/app.config.php');
};

$container['translator'] = function ($container) {
    $locale = $container->config->get('lang');
    $translator = new Translator(new FileLoader(new Filesystem(), __DIR__ . '/../resources/lang'), $locale);
    $translator->setLocale($locale);
    $translator->setFallback('en');
    return $translator;
};

$loader = new ModuleLoader($app, $config->get("modules"));