<?php 


$method = $_SERVER['REQUEST_METHOD'];



// Process only when method is POST
if($method == 'POST'){
	
	
	// $json = json_decode($requestBody);


	date_default_timezone_set("Asia/Bangkok");

	$date = date("Y-m-d");

	// switch ($text) {
	// 	case 'hi':
	// 		$speech = "Hi, Nice to meet you";
	// 		break;

	// 	case 'bye':
	// 		$speech = "Bye, good night";
	// 		break;

	// 	case 'anything':
	// 		$speech = "Yes, you can type anything here.";
	// 		break;
		
	// 	default:
	// 		$speech = $text;
			// break;
	}
	// $requestBody ->reply('Hi, how can I help?');

	// echo json_encode($text);
	
	// $agent->reply('Hi, how can I help?');
	// $response = new \stdClass();
	// $response->speech = $speech;
	// $response->displayText = $speech;
	// $response->source = "webhook";
	
	echo $date;

}
else
{
	echo "Method not allowed";
}

?>