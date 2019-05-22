<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

include_once("../objects/parkingspot.php");

$parkingspot = new ParkingSpot();

// get the parking spot from the url and  set it in the parkingSpot object
$parkingspot ->id = isset($_GET['id']) ? $_GET['id'] : die();
$type = $parkingspot -> getVehicleTypeParked();

switch ($type) {
	case 1:
		if($parkingspot->unparkCar()){
    		http_response_code(200);
    		echo json_encode(array("message" => "Car unparked."));
			}else{
    		http_response_code(503);
    		echo json_encode(array("message" => "Unable to unpark."));
			}
		break;

	case 2:
		if($parkingspot->unparkBike()){
    		http_response_code(200);
    		echo json_encode(array("message" => "Bike unparked."));
			}else{
    		http_response_code(503);
    		echo json_encode(array("message" => "Unable to unpark."));
			}
		break;

	case 3:
		if($parkingspot->unparkBus()){
    		http_response_code(200);
    		echo json_encode(array("message" => "Bus unparked."));
			}else{
    		http_response_code(503);
    		echo json_encode(array("message" => "Unable to unpark."));
			}
		break;

	case 5:
		if($parkingspot->unparkTrailer()){
    		http_response_code(200);
    		echo json_encode(array("message" => "Trailer unparked."));
			}else{
    		http_response_code(503);
    		echo json_encode(array("message" => "Unable to unpark."));
			}
		break;			
	
	default:
		# code...
		break;
}
?>