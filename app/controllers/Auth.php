<?php

class Auth extends Controller
{
    public function login()
    {
        guest_only();
        $this->view('auth/login');
    }

    public function authenticate()
    {
        guest_only();
        http_post_only();

        $db = new Database;
        $user = $db->query('SELECT * FROM petugas WHERE username = :username AND password = :password')
            ->bind(':username',$_POST['username'])
            ->bind(':password',$_POST['password'])
            ->first();
        
        if ($user) {
            login($user);
            return redirect('admin/index');
        }

        $user = $db->query('SELECT * FROM masyarakat WHERE username = :username AND password = :password')
            ->bind(':username',$_POST['username'])
            ->bind(':password',$_POST['password'])
            ->first();

        if ($user) {
            login($user);
            return redirect('home/index');
        }

        return failRedirect('auth/login', 'Username atau password tidak cocok!');
    }

    public function logout()
    {
        login_required();
        http_post_only();

        unset($_SESSION['user']);
    }
}