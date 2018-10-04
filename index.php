<?php
include_once 'Curl.php';
//$c = Curl::app('http://ipap.ru')
//    ->set(CURLOPT_HEADER, 1)
//    ->set(CURLOPT_FOLLOWLOCATION, false);
$c = Curl::app('http://agencytop.loc')
        ->headers(1)
        ->http(false)
        ->post(true)
        ->cookie('/1.txt');
//$html = $c->request('svedeniya-ob-ipap/otzyvy'); // 301 redirect /otzyvy
$data = $c->request('user/login');
$data = $c->request('/');
//secho $data['html'];
//echo $data['headers'];
//echo "<pre>";
print_r($data);
//echo "</pre>";
