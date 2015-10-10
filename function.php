<?php
function curl($url){
    $ip = rand(40,80).".".rand(1,255).".".rand(1,255).".".rand(1,255);
    $headers = array("CLIENT-IP: $ip,X-FORWARDED-FOR: $ip");
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($curl, CURLOPT_AUTOREFERER, 1);
    curl_setopt($curl, CURLOPT_TIMEOUT, 10);
    curl_setopt($curl, CURLOPT_HEADER, 0);
	curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $tmpInfo = curl_exec($curl);
    curl_close($curl);
    return $tmpInfo;
}
?>