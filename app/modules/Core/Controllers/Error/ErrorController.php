<?php

namespace CyberWorks\Modules\Core\Controllers\Error;

use CyberWorks\Modules\Core\Controllers\Controller;

class ErrorController extends Controller
{
    public function __invoke($request, $response, $exception)
    {
        $this->container->logger->error($exception);

        return $this->view->render($response->withStatus(500), 'errors/500.twig');
    }
}