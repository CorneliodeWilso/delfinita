<?php 

$method = $_SERVER['REQUEST_METHOD'];

 
if($method == 'POST'){
	$requestBody = file_get_contents('php://input');
	$json = json_decode($requestBody);

	$text = $json->result->parameters->text;

	switch ($text) {
		case 'hola':
			$speech = "Hola, como estas";
			break;

		case 'Adios':
			$speech = "Adios, cuidate mucho";
			break;

		case 'Cualquier cosa':
			$speech = "claro, puedes preguntar lo que sea.";
			break;
		
		default:
			$speech = "Lo siento, me he quedado sin palabras.";
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
	echo "Metodo no encontrado";
}

?>