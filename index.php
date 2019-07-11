<?php 

// $method = $_SERVER['REQUEST_METHOD'];

// // Process only when method is POST
// if($method == 'POST'){
// 	$requestBody = file_get_contents('php://input');
// 	$json = json_decode($requestBody);

// 	$text = $json->queryResult->parameters->text;
// 	// $responseId = $json->responseId;

// 	switch ($text) {
// 		case 'hi':
// 			$speech = "Hi, Nice to meet you";
// 			break;

// 		case 'bye':
// 			$speech = "Bye, good night";
// 			break;

// 		case 'anything':
// 			$speech = "Yes, you can type anything here.";
// 			break;
		
// 		default:
// 			$speech = 'pppp';
// 			break;
// 	}

// 	$response = new \stdClass();
// 	$response->speech = $speech;
// 	$response->displayText = $speech;
// 	$response->source = "webhook";

// 	echo json_encode($response);
// }
// else
// {
// 	echo "Method not allowed";
// }

function processMessage($update) {
    if($update["result"]["action"] == "sayHello"){
        sendMessage(array(
            "source" => $update["result"]["source"],
            "speech" => "Hello from webhook",
            "displayText" => "Hello from webhook",
            "contextOut" => array()
        ));
    }
}

function sendMessage($parameters) {
    echo json_encode($parameters);
}

$update_response = file_get_contents("php://input");
$update = json_decode($update_response, true);
if (isset($update["result"]["action"])) {
    processMessage($update);
}

?>