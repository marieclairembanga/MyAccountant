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
  
   /* $sql = "SELECT id FROM users where login = 'toto' ";
      $result = mysqli_query($con,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);      
      $count = mysqli_num_rows($result);		
      if($count == 0) {
	      $sqli = "INSERT INTO users (login, password, pays, profession, revenu_mens, plafond )
          VALUES ('toto','password','pays','profession','20000','1000')";
          if ($con->query($sqli) == TRUE) {
	      $response= "Registration successfull";
   
          } else {
            $response= "Error: " . $sqli . "<br>" . $con->error;
            }
    
      }else {
      
		 $response= "Already exist";
      }*/
  
   $data = file_get_contents("php://input");
    if (isset($data)) {
        $request = json_decode($data);
        $login = $request->login;
		$password = $request->password;
 
	}

$login = stripslashes($login);
$password = stripslashes($password);

      
	  $sql = "SELECT id FROM users WHERE login = '$login' and password = '$password' ";
      $result = mysqli_query($con,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      //$active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $mylogin and $mypassword, table row must be 1 row
		
      if($count >0) {
     $response= "You've Login succesfuly";
      }else {
    $response= "Your Login or Password is invalid" . $sql . "<br>" . $con->error;
		
      }
   


	 
	echo json_encode( $response); 

?>