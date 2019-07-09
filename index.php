<?php 
date_default_timezone_set("Asia/Bangkok");
$method = $_SERVER['REQUEST_METHOD'];

// Process only when method is POST
if($method == 'POST'){
	$date = date("Y-m-d");
	$time = date("H:i:s");
	$requestBody = file_get_contents('php://input');
	
	

	$json = json_decode($requestBody);


	$text = $json->queryResult->parameters->text;


	switch ($text) {
		case 'hi':
			$speech = "Hi, Nice to meet you";
			break;

		case 'bye':
			$speech = "Bye, good night";
			break;

		case 'anything':
			$speech = "Yes, you can type anything here.";
			break;
		
		default:
			$speech = $date;
			break;
	}

	
	$response = new \stdClass();
	$response->speech = $speech;
	$response->displayText = $speech;
	$response->source = "webhook";
	echo json_encode($response);
}
else
{
	echo "Method not allowed";
}

?>