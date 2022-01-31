<?php // callback.php

require "vendor/autoload.php";
require_once('vendor/linecorp/line-bot-sdk/line-bot-sdk-tiny/LINEBotTiny.php');

$access_token = '8LDWtWTIbzxMwRVesUfcU+k23XKJgiz6sf5xgIgkmov/SmGA39BYkqMLOm76tYiXcP1m5P+qMu59LccnmqQIYMjCWa6VmsCYNurdFTLZM7teoqLlNDcNQ7a4j44gLJ1Gb3Lr/ATrPcUA/daju6+cpwdB04t89/1O/w1cDnyilFU=';



// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			//$text = $event['source']['userId'];
			// Get replyToken
			$replyToken = $event['replyToken'];
			
			$text = "";
			
			if($event['message']['text'] == "ทักครับ")
			{
				$text = "สวัสดีค่ะ";
			}
			else if($event['message']['text'] == "ทำไรอยู่")
			{
				$text = "นอนเล่นค่ะ";
			}
			else
			{
				$text = "คุณล่ะ ทำอะไรอยู่?";
			}

			// Build message to reply back
			$messages = [
				'type' => 'text',
				'text' => $text
			];
			
		

			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);

			echo $result . "\r\n";
		}
	}
}
echo "OK 123";
