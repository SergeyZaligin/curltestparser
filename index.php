<?php
include_once 'Curl.php';

$c = Curl::app('http://agencytop.loc')
        ->headers(1)
        ->http(false)
        ->post(true)
        ->cookie('/1.txt');

$data = $c->request('user/login');
$data = $c->request('/');

//echo "<pre>";
print_r($data);
//echo "</pre>";
