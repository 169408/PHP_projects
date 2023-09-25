<?php

function dump($date) {
    echo "<pre>";
    var_dump($date);
    echo "</pre>";
}

function print_arr($date) {
    echo "<pre>";
    print_r($date);
    echo "</pre>";
}

function dd($date) {
    dump($date);
    die;
}

function abort($code = 404) {
    http_response_code($code);
    require_once VIEWS . "/errors/{$code}.php";
    die;
}

function load($fillable = []) {
    $data = [];
    foreach ($_POST as $key => $value) {
        if(in_array($key, $fillable)) {
            $data[$key] = $value;
        }
    }
    return $data;
}

function hsc($str) {
    return htmlspecialchars($str, ENT_QUOTES);
}

function old($fieldname) {
    return isset($_POST[$fieldname]) ? hsc($_POST[$fieldname]) : "";
}

function redirect($url = '') {
    if($url) {
        $redirect = $url;
    } else {
        $redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : PATH;
    }
    header("Location: {$redirect}");
    die;
}

function get_alerts() {
    if(!empty($_SESSION["success"])) {
        require_once VIEWS . '/alerts/alert_success.php';
        unset($_SESSION["success"]);
    }
    if(!empty($_SESSION["error"])) {
        require_once VIEWS . '/alerts/alert_error.php';
        unset($_SESSION["error"]);
    }
}