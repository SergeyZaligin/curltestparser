<?php
include_once 'Curl.php';
$c = Curl::app('http://ipap.ru')
    ->set(CURLOPT_HEADER, 1)
    ->set(CURLOPT_FOLLOWLOCATION, false);

//$html = $c->request('svedeniya-ob-ipap/otzyvy'); // 301 redirect /otzyvy
$data = $c->request('news');
//secho $data['html'];
//echo $data['headers'];
echo "<pre>";
print_r($data['headers']);
echo "</pre>";
