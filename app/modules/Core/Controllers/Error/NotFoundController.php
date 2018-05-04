<?php

namespace CyberWorks\Modules\Core\Controllers\Error;

use CyberWorks\Modules\Core\Controllers\Controller;

class NotFoundController extends Controller
{
    public function __invoke($request, $response)
    {
        return $this->view->render($response->withStatus(404), 'errors/404.twig');
    }
}