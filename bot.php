<?php


require_once('./line_class.php');


$channelAccessToken = '6wK6e4545iqR5SY8TTe7gShmcSdP6oUDj3NrUOUIfXDqNRZKCM53rw5SSydefHUC632IQ5B2BsFOfPPSDfMxe5GtPpDE9gz9CBVZ7tgKiGtqrlLK0lE6bWxqSyaT5zITg7CeeP2cRQUZ1s6D7lje0wdB04t89/1O/w1cDnyilFU='; //sesuaikan 
$channelSecret = '5e89a49481f2b6f6ff99f7f78061dbf9';//sesuaikan

$client = new LINEBotTiny($channelAccessToken, $channelSecret);

//
var_dump($client->parseEvents());


$userId = $client->parseEvents()[0]['source']['userId'];
$groupId=$client->parseEvents()[0]['source']['groupId'];
$roomId=$client->parseEvents()[0]['source']['roomId'];
$replyToken = $client->parseEvents() [0]['replyToken'];
$timestamp =$client->parseEvents() [0]['timestamp'];
$message = $client->parseEvents() [0]['message'];
$latitude= $client->parseEvents() [0]['message']['latitude'];
$longitude= $client->parseEvents() [0]['message']['longitude'];
$postback=$client->parseEvents() [0]['postback'];
$messageid = $client->parseEvents() [0]['message']['id'];
$profil = $client->profil($userId);
$pesan_datang = $message['text'];
$post_datang= $message['postback'];
$upPesan = strtoupper($pesan_datang);


     
if($message['type'] == 'text') {
 
    $balas=array(
    	'replyToken'=>$replyToken,
    	'messages'=>array(
    		array(
    			'type'=>'text',
    			'text'=>$pesan_datang
    			)
    		)
    	);
}

$result = json_encode($balas);

$client->replyMessage($balas);

?>
</body>
</html>
