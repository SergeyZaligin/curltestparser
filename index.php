<?php
include_once 'Curl.php';
$c = Curl::app('http://ipap.ru')
    ->set(CURLOPT_HEADER, 0);
$html = $c->request('news');

echo $html;
