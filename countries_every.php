<?php

include_once('lib/Curl.php');
include_once('lib/simple_html_dom.php');
	
set_time_limit(0);
    
$c = Curl::app('https://en.wikipedia.org')->config_load('wiki.cnf');
					

$countries = json_decode(file_get_contents('res/all'));                
$done = 0;   
        
foreach ($countries as $href => $name) {
    $data = $c->request($href);
    file_put_contents('res/country_every/' . $name, $data['html']);
    $done++;    

    sleep(mt_rand(0, 1));
}
    
    
echo "done: $done<br>";