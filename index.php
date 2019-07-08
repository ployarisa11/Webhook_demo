<?php 

$method = $_SERVER['REQUEST_METHOD'];

// Process only when method is POST
if($method == 'POST'){
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
			$speech = $text;
			break;
	}


	$fulfillmentText = new \stdClass();
	$fulfillmentText->speech = $speech;
	$fulfillmentText->displayText = $speech;
	$fulfillmentText->source = "webhook";
	echo json_encode($fulfillmentText);
}
else
{
	echo "Method not allowed";
}

?>