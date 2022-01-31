<?php
$access_token = '8LDWtWTIbzxMwRVesUfcU+k23XKJgiz6sf5xgIgkmov/SmGA39BYkqMLOm76tYiXcP1m5P+qMu59LccnmqQIYMjCWa6VmsCYNurdFTLZM7teoqLlNDcNQ7a4j44gLJ1Gb3Lr/ATrPcUA/daju6+cpwdB04t89/1O/w1cDnyilFU=';


$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
