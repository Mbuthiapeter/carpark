<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

include_once("../objects/parkingspot.php");

$parkingspot = new ParkingSpot();

$parkingspot ->status = 0;

// get the type of the vehicle from the url 
$type = isset($_GET['type']) ? $_GET['type'] : die();

$response = array();

switch ($type) {
	case 'car':
		$spot = $parkingspot->getOneSpot();
		if($spot){
			
				$response["id"] = $spot["id"];
				$response["name"] = $spot["name"];

			http_response_code(200);
			echo json_encode($response);
		} else{

	 	http_response_code(404);
     	echo json_encode(array("message" => "The parking is full"));
		}
		break;

	case 'bus':
		$spots = $parkingspot->getFreeSpots();

		if(count($spots) > 0){
			$detail = array();
			$buspark;

			foreach ($spots as $spot) {		
			$id = $spot["id"];
			array_push($detail, $id);
			}

			for ($i=0; $i < count($detail); $i++) { 

				if (($detail[$i]+2) == ($detail[$i +2])) {
					$buspark = $detail[$i];
					break;
				}
			}			
			$response["id"] = $buspark;

			http_response_code(200);
			echo json_encode($response);
		} else{

	 	http_response_code(404);
     	echo json_encode(array("message" => "The parking is full"));
		}
		break;

	case 'trailer':
		$spots = $parkingspot->getFreeSpots();

		if(count($spots) > 0){
			$detail = array();
			$trailerpark;
			
			foreach ($spots as $spot) {		
			$id = $spot["id"];
			array_push($detail, $id);
			}
			for ($i=0; $i < count($detail); $i++) { 

				if (($detail[$i]+4) == ($detail[$i +4])) {
					$trailerpark = $detail[$i];
					break;
				}
			}			
			$response["id"] = $trailerpark;

			http_response_code(200);
			echo json_encode($response);
		} else{

	 	http_response_code(404);
     	echo json_encode(array("message" => "The parking is full"));
		}
		break;

	case 'motorbike':
		$state = 0;
		$maxBikes = 5;
		$spot = $parkingspot->getBikeSpot($state, $maxBikes);
		if($spot){
			
				$response["id"] = $spot["id"];
				$response["name"] = $spot["name"];

			http_response_code(200);
			echo json_encode($response);
		} else{

	 	http_response_code(404);
     	echo json_encode(array("message" => "The parking is full"));
		}
		break;			
	
	default:
		# code...
		break;
}
?>