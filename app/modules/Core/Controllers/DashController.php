<?php

namespace CyberWorks\Modules\Core\Controllers;

class DashController extends Controller
{
    public function index($request, $response) {
        return $this->view->render($response, 'dash.twig');
    }
}