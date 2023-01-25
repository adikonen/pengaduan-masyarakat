<?php

class Auth extends Controller
{
    public function index()
    {
        return redirect('auth/login');
    }

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
        return redirect('home');
    }

    public function register()
    {   
        guest_only();
        $this->view('auth/register');
    }   

    /**
     * register masyarakat
     */
    public function register_store()
    {
        guest_only();
        http_post_only();

        $db = new Database;

        $count = $db->query('INSERT INTO masyarakat (nik, nama, username, password, telp) VALUES (:nik, :nama, :username, :password, :telp)')
            ->bind(':nik', $_POST['nik'])
            ->bind(':nama', $_POST['nama'])
            ->bind(':username', $_POST['username'])
            ->bind(':password', $_POST['password'])
            ->bind(':telp', $_POST['telp'])
            ->rowCount();

        if ($count > 0) {
            $user = $db->query('SELECT * FROM masyarakat WHERE nik = :nik')->bind(':nik', $_POST['nik'])->first();
            login($user);
            return successRedirect('home', "Selamat datang {$_POST['username']}");
        }

        return failRedirect('auth/register', 'Gagal melakukan pendaftaran!');
    }
}