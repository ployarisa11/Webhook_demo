<?php 

// $method = $_SERVER['REQUEST_METHOD'];

// // Process only when method is POST
// if($method == 'POST'){
	$requestBody = file_get_contents('php://input');
	$json = json_decode($requestBody);

	$weight = $json->queryResult->parameters->weight;
	$height = $json->queryResult->parameters->height;
	$height = $height/100;
	// $bmi = ($weight / ($height * $height);
	

	// $text = $json->queryResult->parameters->text;
	// $responseId = $json->responseId;

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
	// 		$speech = 'pppp';
	// 		break;
	// }

	// $response = new \stdClass();
	// $response->speech = $speech;
	// $response->displayText = $speech;
	// $response->source = "webhook";

	// $response = "It is $temperature degrees with";
	// echo json_encode($response);

	//show user
	$fulfillment = array(
       "fulfillmentText" => $height
   );

   echo(json_encode($fulfillment));
// }
// else
// {
// 	echo "Method not allowed";
// }

?>