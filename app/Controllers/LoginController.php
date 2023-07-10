<?php

namespace Bank\Controllers;

use Bank\App;
use Bank\FileWriter;
use Bank\Messages;
use Bank\OldData;

class LoginController
{

    public function index()
    {
        $old = OldData::getFlashData();
        
        return App::view('auth\index', [
            'pageTitle' => 'Login',
            'inLogin' => true,
            'old' => $old,
        ]);
    }

    public function login(array $data)
    {
        $email = $data['email'] ?? '';
        $password = $data['password'] ?? '';

        $user = App::get('users')->getUserByEmailAndPass($email, $password);
        if ($user) {
            $_SESSION['email'] = $email;
            $_SESSION['name'] = $user['name'];
            Messages::addMessage('success', 'You have successfully logged in');
            header('Location: /');
            die;
        }

        Messages::addMessage('danger', 'Incorrect email or password');
        OldData::flashData($data);
        header('Location: /login');
        die;
    }

    public function logout()
    {
        unset($_SESSION['email']);
        unset($_SESSION['name']);
        Messages::addMessage('success', '
        You have successfully logged out
        ');
        header('Location: /');
        exit;
    }
}