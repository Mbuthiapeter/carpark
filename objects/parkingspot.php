<?php
/**
 * Handles all the functions and properties of the parking spot
 */
class ParkingSpot 
{
	private $conn;

	private $tbl_name ="parkspots";

	public $id;
	public $name;
	public $status;
	public $motorbikecount;
	
	function __construct()
	{
		include_once("../config/db_connect.php");
		$db = new DbConnect();
		$this->conn = $db->connect();

	}

	function getFreeSpots(){
		$query = "SELECT * FROM " .$this->tbl_name. " WHERE status = ? ORDER BY id ASC";
		$stmt = $this->conn->prepare($query); 
		$stmt->bindParam(1,$this->status);
		$stmt->execute();
		$spots = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $spots;
		$stmt = null;
	}

	function getOneSpot(){
		$query = "SELECT * FROM " .$this->tbl_name. " WHERE status = ? ORDER BY id ASC LIMIT 1";
		$stmt = $this->conn->prepare($query); 
		$stmt->bindParam(1,$this->status);
		$stmt->execute();
		$spot = $stmt->fetch(PDO::FETCH_ASSOC);
		return $spot;
		$stmt = null;
	}

	function getBikeSpot($state, $maxBikes){
		$bikeState = 2;
		$query = "SELECT * FROM " .$this->tbl_name. " WHERE status = ? OR (status = ? AND motorbikecount < ?) ORDER BY id ASC LIMIT 1";
		$stmt = $this->conn->prepare($query); 
		$stmt->bindParam(1,$state);
		$stmt->bindParam(2,$bikeState);
		$stmt->bindParam(3,$maxBikes);
		$stmt->execute();
		$spot = $stmt->fetch(PDO::FETCH_ASSOC);
		return $spot;
		$stmt = null;
	}

	function parkCar(){
		$query = "UPDATE " . $this->tbl_name . " SET status = 1 WHERE id = ?";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->id);
		$stmt->execute();	
        return $stmt-> rowCount();
        $stmt = null;
        	}

    function parkBus(){
    	$nextValue = $this->id + 1;
    	$thirdvalue = $this->id + 2;
		$query = "UPDATE " . $this->tbl_name . " SET status = 3 WHERE id IN (?,?,?)";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->id);
		$stmt->bindParam(2, $nextValue);
		$stmt->bindParam(3, $thirdvalue);
		$stmt->execute();	
        return $stmt-> rowCount();
        $stmt = null;
        	}

    function parkTrailer(){
    	$nextValue = $this->id + 1;
    	$thirdvalue = $this->id + 2;
    	$fourthvalue = $this->id + 3;
    	$fifthvalue = $this->id + 4;
		$query = "UPDATE " . $this->tbl_name . " SET status = 5 WHERE id IN (?,?,?,?,?)";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->id);
		$stmt->bindParam(2, $nextValue);
		$stmt->bindParam(3, $thirdvalue);
		$stmt->bindParam(4, $fourthvalue);
		$stmt->bindParam(5, $fifthvalue);
		$stmt->execute();	
        return $stmt-> rowCount();
        $stmt = null;
        	}

    function parkBike(){
    	$bikeCount = $this->getMotorbikeCount($this->id);
    	if ($bikeCount >= 5) {
    		return null;
    	}
    	$newCount = $bikeCount + 1;
		$query = "UPDATE " . $this->tbl_name . " SET status = 2, motorbikecount = ? WHERE id = ?";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1,$newCount);
		$stmt->bindParam(2, $this->id);
		$stmt->execute();	
        return $stmt-> rowCount();
        $stmt = null;
        	}

    function getMotorbikeCount($id){
		$query = "SELECT motorbikecount FROM " .$this->tbl_name. " WHERE id = ? ";
		$stmt = $this->conn->prepare($query); 
		$stmt->bindParam(1,$id);
		$stmt->execute();
		$bikecount = $stmt->fetchColumn();
		return $bikecount;
		$stmt = null;
        	} 

    function getVehicleTypeParked(){
		$query = "SELECT status FROM " .$this->tbl_name. " WHERE id = ? ";
		$stmt = $this->conn->prepare($query); 
		$stmt->bindParam(1,$this->id);
		$stmt->execute();
		$type = $stmt->fetchColumn();
		return $type;
		$stmt = null;
        	}

    function unparkCar(){
		$query = "UPDATE " . $this->tbl_name . " SET status = 0 WHERE id = ?";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->id);
		$stmt->execute();	
        return $stmt-> rowCount();
        $stmt = null;
        	} 

    function unparkBike(){
    	$query;
    	$bikeCount = $this->getMotorbikeCount($this->id);

    	if ($bikeCount > 1) {
    		$query = "UPDATE " . $this->tbl_name . " SET motorbikecount = ? WHERE id = ?";
    	} else{
    		$query = "UPDATE " . $this->tbl_name . " SET status = 0, motorbikecount = ? WHERE id = ?";
    	}
    	$newCount = $bikeCount - 1;
		
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1,$newCount);
		$stmt->bindParam(2, $this->id);
		$stmt->execute();	
        return $stmt-> rowCount();
        $stmt = null;
        	} 

    function unparkBus(){
    	$nextValue = $this->id + 1;
    	$thirdvalue = $this->id + 2;
		$query = "UPDATE " . $this->tbl_name . " SET status = 0 WHERE id IN (?,?,?)";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->id);
		$stmt->bindParam(2, $nextValue);
		$stmt->bindParam(3, $thirdvalue);
		$stmt->execute();	
        return $stmt-> rowCount();
        $stmt = null;
        	}  

    function unparkTrailer(){
    	$nextValue = $this->id + 1;
    	$thirdvalue = $this->id + 2;
    	$fourthvalue = $this->id + 3;
    	$fifthvalue = $this->id + 4;
		$query = "UPDATE " . $this->tbl_name . " SET status = 0 WHERE id IN (?,?,?,?,?)";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->id);
		$stmt->bindParam(2, $nextValue);
		$stmt->bindParam(3, $thirdvalue);
		$stmt->bindParam(4, $fourthvalue);
		$stmt->bindParam(5, $fifthvalue);
		$stmt->execute();	
        return $stmt-> rowCount();
        $stmt = null;
        	}    	  	   	   	    	   	    	     	    	
}
?>