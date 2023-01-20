<?php

class Home extends Controller
{
    public function index()
    {
        $this->view('header');
        $this->view('footer');
    }

    public function landing_page()
    {
        echo 'landing page';
    }
}
