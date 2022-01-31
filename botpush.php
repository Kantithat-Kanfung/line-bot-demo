<?php



require "vendor/autoload.php";

$access_token = '8LDWtWTIbzxMwRVesUfcU+k23XKJgiz6sf5xgIgkmov/SmGA39BYkqMLOm76tYiXcP1m5P+qMu59LccnmqQIYMjCWa6VmsCYNurdFTLZM7teoqLlNDcNQ7a4j44gLJ1Gb3Lr/ATrPcUA/daju6+cpwdB04t89/1O/w1cDnyilFU=';

$channelSecret = 'U1ce60a5062bd06e0ac0bcde45603b380';

$pushID = 'U7ef7a449f2a5c2057eacfc02ba2eb286';

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);

$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello world');
$response = $bot->pushMessage($pushID, $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();







