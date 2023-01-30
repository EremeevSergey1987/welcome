<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, 'https://catfact.ninja/fact');
curl_setopt($curl, CURLOPT_HTTPGET, 1);
curl_setopt($curl, CURLOPT_PORT, 443);
echo curl_exec($curl);