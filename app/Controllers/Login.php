<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Login extends BaseController
{
    public function login()
    {
        return view('login');
    }

    public function processLogin()
    {
        $cache = \Config\Services::cache();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $catcheEmail = $cache->get('email');
        $catchePassword = $cache->get('password');
        if (empty($email) && empty($password)) {
            echo "Empty email and password.";
            echo "<br />";
            echo $catcheEmail . " - " . $catchePassword;
        } else {
            if ($email == $catcheEmail && $password == $catchePassword) {
                echo "I am in.";
                echo "<br />";
            } else {
                echo "I am out.";
                echo "<br />";
                $cache->save('email', $email);
                $cache->save('password', $password);
            }
            echo $email . " - " . $password;
        }
    }

    public function clearCatche()
    {
        $cache = \Config\Services::cache();
        $cache->delete('email');
        $cache->delete('password');
    }
}
