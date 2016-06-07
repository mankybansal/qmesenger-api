<?php
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://1.186.4.203:8080/process/text/1?text=This%20is%20an%20");
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_exec($ch);
curl_close($ch);

 ?>
