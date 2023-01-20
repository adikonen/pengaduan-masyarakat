<?php

class Flasher 
{
    public static bool $isError;

    public static function set($status, $message) 
    {
        $_SESSION['flash'] = [
            'status' => $status,
            'message' => $message
        ];
    }

    public static function flash() 
    {
        if (isset($_SESSION['flash'])) {
            $flash = $_SESSION['flash'];
            $message = $flash['message'];
            $type = $_SESSION['flash']['status'] != 'success' ? 'alert-danger' : 'alert-success';
    
            echo <<<html
                <div class="alert $type">
                    $message
                </div>
            html;
    
            unset($_SESSION['flash']);
        }            
    }

}