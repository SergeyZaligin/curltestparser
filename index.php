<?php
include_once 'Curl.php';
//$c = Curl::app('http://ipap.ru')
//    ->set(CURLOPT_HEADER, 1)
//    ->set(CURLOPT_FOLLOWLOCATION, false);
$c = Curl::app('https://en.wikipedia.org/wiki/Main_Page')
        ->headers(1)
        ->ssl(0);
//$html = $c->request('svedeniya-ob-ipap/otzyvy'); // 301 redirect /otzyvy
$data = $c->request('news');
//secho $data['html'];
//echo $data['headers'];
//echo "<pre>";
print_r($data);
//echo "</pre>";
