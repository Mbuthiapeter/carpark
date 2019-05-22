<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

include_once("../objects/parkingspot.php");

$parkingspot = new ParkingSpot();

// get the status of the spot from the url and  set it in the parkingSpot object
$parkingspot ->status = isset($_GET['status']) ? $_GET['status'] : die();

$response = array();

$spots = $parkingspot ->getFreeSpots();
$response["spots"]= array();
if(count($spots) > 0){

	foreach ($spots as $spot) {
		$detail = array();
		$detail["id"] = $spot["id"];
		$detail["name"] = $spot["name"];
		array_push($response["spots"], $detail);
	}
	
	http_response_code(200);
	echo json_encode($response);
} else{

	 http_response_code(404);
     echo json_encode(array("message" => "The parking is full"));
}


?>