<?php 
require "connection.php";

header('Access-Control-Allow-Origin: *');

if(!$con){
  die("Connection failed :" . mysqli_connect_error());
}

//chekck method
$method = $_SERVER['REQUEST_METHOD'];

if(  $method == "POST" 
    && isset($_POST['name']) 
    && isset($_POST['date'])
    && isset($_POST['time'])
  ){

  $query =  "INSERT INTO `items` (`name`,`date`,`time`,`state`) 
  VALUES ('".$_POST['name']."','".$_POST['date']."','".$_POST['time']."','0')";
  
    if ($con->query($query) === TRUE) {
                  $res = array('status'=>200 , 'data'=>'added successfully');
                  echo json_encode($res);
    } else {
        $res = array('status'=>400 , 'data'=>$con->error);
        echo json_encode($res);
    }
    }else{
      echo "Error";
    }
$con->close();
?>