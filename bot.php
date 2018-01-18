<?php
$access_token = 'MvaBOn28FTS3LauWjll8BKWyV3jxSw+4WfcvERCq+ANM03tnQ9vtZI0DJBxgT2IWU6ouir3bOeDcpShjwTOJib4P6jWHYh31pVMM2CAwUeUqzuUdkGGYXsR3x7oaG1TdhFw2oumm6taqN300id4ffAdB04t89/1O/w1cDnyilFU=';

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
			$text = $event['message']['text'];
			// Get replyToken
			$replyToken = $event['replyToken'];

			// Build message to reply back
      $context = substr($text, 0, 2);


      if(strtoupper($context) == "PL"){

        $forwardtext = strstr($text, '+', true);
        $num1 = substr($forwardtext, 3);
        $num2  = substr($text, (strpos($text, '+') ?: -1) + 1);
        $sumall = $num1+$num2;
        $messages = [
          'type' => 'text',
          'text' => $sumall
        ];
      }
      else if(strtoupper($context) == "MU"){

        $messages = [
          'type' => 'text',
          'text' => 'คูณ'
        ];
      }
      else if(strtoupper($context) == "MI"){

        $messages = [
          'type' => 'text',
          'text' => 'ลบ'
        ];
      }

      else if(strtoupper($context) == "DI"){

        $messages = [
          'type' => 'text',
          'text' => 'หาร'
        ];
      }

      else {

        $messages = [
          'type' => 'text',
          'text' => 'ไม่พบสิ่งที่คุณต้องการ โปรดลองใหม่อีกครั้งนะครับ :)'
        ];
      }
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
echo "OK";
