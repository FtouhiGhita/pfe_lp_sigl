<?php 
session_start();
	if(isset($_SESSION["idSession"])){
	    $id = $_SESSION["idSession"];
	    $role = $_SESSION["roleSession"];

	    $myObj = new stdClass();
		$myObj->id = $id;
		$myObj->role = $role;

		$myJSON = json_encode($myObj);

		echo $myJSON;
	}                  
?>