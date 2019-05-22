<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

include_once("../objects/parkingspot.php");

$parkingspot = new ParkingSpot();

// get the parking spot and vehicle from the url and  set it in the parkingSpot object
$type = isset($_GET['type']) ? $_GET['type'] : die();
$parkingspot ->id = isset($_GET['id']) ? $_GET['id'] : die();

switch ($type) {
	case 'car':
		 if($parkingspot->parkCar()){
    		http_response_code(200);
    		echo json_encode(array("message" => "Car parked."));
			}else{
    		http_response_code(503);
    		echo json_encode(array("message" => "Unable to park."));
			}
		break;

	case 'bus':
		if($parkingspot->parkBus()){
    		http_response_code(200);
    		echo json_encode(array("message" => "Bus parked."));
			}else{
    		http_response_code(503);
    		echo json_encode(array("message" => "Unable to park."));
			}
		break;

	case 'trailer':
		if($parkingspot->parkTrailer()){
    		http_response_code(200);
    		echo json_encode(array("message" => "Trailer parked."));
			}else{
    		http_response_code(503);
    		echo json_encode(array("message" => "Unable to park."));
			}
		break;

	case 'motorbike':
		if($parkingspot->parkBike()){
    		http_response_code(200);
    		echo json_encode(array("message" => "Bike parked."));
			}else{
    		http_response_code(503);
    		echo json_encode(array("message" => "Unable to park."));
			}
		break;	

	default:
		# code...
		break;
}
?>