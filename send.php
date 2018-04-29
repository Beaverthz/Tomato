<?php

$url = 'http://www.wp.pl';
print file_get_contents('http://192.168.1.116:8080/EmailAPI/sendemail?emails=ar.amalvy007@gmail.com&hotel=Arabia&message=BiriyaniPorattaComboNew')
/*$handle = curl_init($url);
curl_setopt($handle,  CURLOPT_RETURNTRANSFER, TRUE);

/* Get the HTML or whatever is linked in $url. */
//$response = curl_exec($handle);

/* Check for 404 (file not found). */
//$httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);

//echo $httpCode;

//curl_close($handle);



?>