<?php

namespace CyberWorks\Modules\Auth\Controllers;

use CyberWorks\Modules\Auth\Models\Group;
use CyberWorks\Modules\Core\Controllers\Controller;

class AuthController extends Controller
{
    public function loginPage($request, $response)
    {

    }

    private function attempt($username, $password)
    {
        $user = User::where('name', $username)->orWhere('email', $username)->first();
        if (!$user) {
            return false;
        }
        if (password_verify($password, $user->password)) {
            $_SESSION['user_id'] = $user->id;
            $_SESSION['isIPS'] = false;
            return true;
        }
        return false;
    }

    public function login($request, $response)
    {
        $auth = $this->attempt($request->getParam('username'), $request->getParam('password'));

        if (!$auth) return $response->withRedirect($this->router->pathFor('auth.login'));

        return $response->withRedirect($this->router->pathFor('dashboard'));
    }

    public function logout($request, $response)
    {
        unset($_SESSION['user_id']);

        return $response->withRedirect($this->router->pathFor('auth.login'));
    }

    public function isAuthed()
    {
        return isset($_SESSION['user_id']);
    }

    public function user()
    {
        if ($this->isAuthed()) return User::find($_SESSION['user_id']);

        return false;
    }

    public function group()
    {
        if (!($this->isAuthed())) return false;

        $user = $this->user();
        $group = Group::find($user->group_id);

        return $group;
    }

    public function isSuperUser()
    {
        if (!($this->isAuthed())) return false;

        $user = $this->user();

        return $user->super_user;
    }
}