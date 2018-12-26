<?php 
/***************************************/
/* ESPERO PARAMETROS POR EL DIALOGFLOW */
/***************************************/
$method = $_SERVER['REQUEST_METHOD'];

/*************************************/
/* RECIBO PARAMETROS POR METODO POST */
/*************************************/
//if($method == 'POST'){
	$requestBody = file_get_contents('php://input');
	$json = json_decode($requestBody);
	$text = $json->queryResult->parameters->text;
	
	$intent = $json->intent->name;	
	$evento = $json->intent->displayName;
	$idioma = $json->languageCode;

	switch ($text) {
		default:
			$speech = "PRUEBA DE RESPUESTA DE EVENTO USANDO EL JSON V2 QUE SUPO A GOBIERNO DE SANTOS APLICARLO.";
			break;
	}

	$response = new \stdClass();
	$responsemsg = new \stdClass();
	
	$response->payload->google->expectUserResponse = false;
	$response->payload->google->richResponse->items[0]->simpleResponse->textToSpeech=$speech;

echo json_encode($response);
?>
