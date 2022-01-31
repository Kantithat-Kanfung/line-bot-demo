<?php



require "vendor/autoload.php";

/ Get POST body content
$content = file_get_contents('php://input');



$events = json_decode($content, true);

if (!is_null($events['events'])){

$access_token = '8LDWtWTIbzxMwRVesUfcU+k23XKJgiz6sf5xgIgkmov/SmGA39BYkqMLOm76tYiXcP1m5P+qMu59LccnmqQIYMjCWa6VmsCYNurdFTLZM7teoqLlNDcNQ7a4j44gLJ1Gb3Lr/ATrPcUA/daju6+cpwdB04t89/1O/w1cDnyilFU=';

$channelSecret = '585c2145e3e8d1ceae5b3d1e4cca412b';

$pushID = 'U1ce60a5062bd06e0ac0bcde45603b380';

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);

$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello world');
$response = $bot->pushMessage($pushID, $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();
  
}







