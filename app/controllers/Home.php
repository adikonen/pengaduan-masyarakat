<?php

class Home extends Controller
{
    public function index()
    {
        $this->view('masyarakat/template/header');
        $this->view('masyarakat/home');
        $this->view('masyarakat/template/footer');
    }
}
