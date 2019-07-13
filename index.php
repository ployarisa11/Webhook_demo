<?php 

// $method = $_SERVER['REQUEST_METHOD'];

// // Process only when method is POST
// if($method == 'POST'){
	$requestBody = file_get_contents('php://input');
	$json = json_decode($requestBody);

	$weight = $json->queryResult->parameters->weight;
	$height = $json->queryResult->parameters->height/100;
	$bmi = round(($weight / ($height * $height)),2);
	$result = "none";
	
	if ($bmi < 18.5) {
		$result = "XS";
	} 

	elseif ($bmi>= 18.5 && $bmi < 23) {
		$result = "S";
	}

	elseif ($bmi >= 23 && $bmi < 25) {
		$result = "M";
	}

	elseif ($bmi >= 25 && $bmi < 30) {
		$result = "L";
	}

	elseif ($bmi >= 30) {
		$result = "XL";
	}


		

	// $text = $json->queryResult->parameters->text;
	// $responseId = $json->resposeId;

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
       "fulfillmentText" => $result
   );

   echo(json_encode($fulfillment));
// }
// else
// {
// 	echo "Method not allowed";
// }

?>