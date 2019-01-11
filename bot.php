<?php


require_once('./line_class.php');


$channelAccessToken = '[placehere]'; //sesuaikan 
$channelSecret = '[placehere]';//sesuaikan

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
    			'text'=>'Halo Kamu ngetik ini ya : '.$pesan_datang
    			)
    		)
    	);
}

$result = json_encode($balas);

$client->replyMessage($balas);

?>
</body>
</html>
