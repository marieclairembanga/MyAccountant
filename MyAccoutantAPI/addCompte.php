<?php
if (isset($_SERVER['HTTP_ORIGIN'])) {
        header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Max-Age: 86400');    // cache for 1 day
    }
 
    // Access-Control headers are received during OPTIONS requests
    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
 
        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
            header("Access-Control-Allow-Methods: GET, POST, OPTIONS");         
 
        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
            header("Access-Control-Allow-Headers:        {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
 
        exit(0);
    }
 
  require "dbconnect.php";

$data = file_get_contents("php://input");
            $request = json_decode($data);
			$type = $request->type;
			$dateCreate = $request->dateCreate;
			$solde= $request->solde;
			$user_id= $request->user_id;
        
	}
	
		$type =stripslashes($type);
		$dateCreate =stripslashes($dateCreate);
		$solde= stripslashes($solde);
		$user_id= stripslashes($user_id);
  
	      $sql = "INSERT INTO compte (type, dateCreate, solde, user_id )
          VALUES ('$type','$dateCreate','$solde','$user_id')";
          if ($con->query($sqli) == TRUE) {
	      $response= "insertion successfull";
   
          } else {
            $response= "Error: " . $sqli . "<br>" . $con->error;
            }
     
 	 
	echo json_encode( $response); 
?>


-