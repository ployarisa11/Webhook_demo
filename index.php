<?php 

$method = $_SERVER['REQUEST_METHOD'];

// Process only when method is POST
if($method == 'POST'){
	//$requestBody = file_get_contents('php://input');
	// $json = json_decode($requestBody);


	// $text = $json->queryResult->parameters->text;


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
	// 		break;
	// }
	date_default_timezone_set("Asia/Bangkok");
	$date = date("Y-m-d");
	$time = date("H:i:s");
	$json = file_get_contents('php://input');
	$request = json_decode($json, true);
	$queryText = $request["queryResult"]["queryText"];
	$userId = $request['originalDetectIntentRequest']['payload']['data']['source']['userId'];
	$myfile = fopen("log$date.txt", "a") or die("Unable to open file!");
	$log = $date."-".$time."\t".$userId."\t".$queryText."\n";
	fwrite($myfile,$log);
	fclose($myfile);
	
	$speech = $date
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