<?php

function getLoginAccount()
{
    if (!isset($_SESSION['user'])) {
        return null;
    }

    return $_SESSION['user'];
}

function dd($vars)
{
    var_dump($vars);
    die;
}

function redirect($location)
{
    $path = BASE_URL . "/$location";
    header("Location: $path");
    die;    
}

function e($word) {
    if ($word == null) {
        return null;
    }

    return htmlspecialchars($word);
}

function http_post_only() {
    $method = $_SERVER['REQUEST_METHOD'];
    if (strtoupper($method) != 'POST') {
        echo '405';
        abort(405);
    }
}

function http_get_only() {
    $method = $_SERVER['REQUEST_METHOD'];
    if (strtoupper($method) != 'GET') {
        echo 405;
        abort(405);
    }
}

function successRedirect($path, $message) {
    Flasher::set('success', $message);
    return redirect($path);
}

function failRedirect($path, $message) {
    Flasher::set('error', $message);
    return redirect($path);
}

function abort($code = 404, ?callable $onfailure = null) {
    http_response_code($code);
    if (is_callable($onfailure)) {
        $controller = new Controller;
        $onfailure($controller);
    }
    die;
}

function nowDate()
{
    return date('Y-m-d');
}

function now() {
    return date('Y-m-d H:i:s');
}

function login_required() {
    $user = getLoginAccount();
    if ($user == null) {
        redirect('auth/login');
    }
}

function guest_only() {
    $user = getLoginAccount();
    if ($user != null) {
        redirect('home');
    }
}

function staff_only() {
    $user = getLoginAccount();
    if (! (isset($user['level']))) {
        return redirect('home');
    }
}

function masyarakat_only() {
    $user = getLoginAccount();

    if (isset($user['level'])) {
        return redirect('admin');
    }

}

function login($data) {
    if (isset($data['password'])) {
        unset($data['password']);
    }

    $_SESSION['user'] = $data;
}

function uploadFile($dir, $file){
    $dir = trim($dir, '/');
    $dir .= '/';

    if (!empty($file["tmp_name"])) {
		$fileinfo = PATHINFO($file["name"]);
		$newFilename = $fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
		$location = $dir . $newFilename;
        move_uploaded_file($file["tmp_name"], $location);
 
		// mysqli_query($con,"insert into image_tb (img_location) values ('$location')");
        return $location;
	}

    return null;
}

function renderStorageUrl(){}
