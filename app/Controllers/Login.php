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
        $data = $cache->get('users');
        if (!is_array($data)) {
            $data = [];
        }
        if (empty($email) && empty($password)) {
            echo "Empty email and password.";
            echo "<br />";
            echo "<pre>";
            print_r($data);
            echo "</pre>";
        } else if (!empty($email)) {
            if (!empty($data[$email]) && $data[$email]['password'] == $password) {
                echo "I am in";
            } else {
                echo "I am out";
                $data[$email] = [
                    'password' => $password,
                ];
                $cache->save('users', $data);
            }
        } else {
            echo "I am out";
        }
    }

    public function clearCatche()
    {
        $cache = \Config\Services::cache();
        $cache->delete('users');
    }
}
