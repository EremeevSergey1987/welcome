<?php
libxml_use_internal_errors(true);
$content = file_get_contents('https://www.nytimes.com/');

$domContent = new DOMDocument();

$domContent->loadHTML($content);
$siteContent = $domContent->getElementById('site-content')->nodeValue;
file_put_contents('main_page.html', $siteContent);
