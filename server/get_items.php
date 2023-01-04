<?php 
require "connection.php";

header('Access-Control-Allow-Origin: *');

if(!$con){
  die("Connection failed :" . mysqli_connect_error());
}

//chekck method
$method = $_SERVER['REQUEST_METHOD'];

if($method == "GET"){

  $query =  "SELECT * FROM items  ORDER BY date DESC , time DESC" ;

  $items = mysqli_query($con , $query);
  $items_json = array();
  while($row = mysqli_fetch_assoc($items)){
    array_push($items_json , $row);
  }

  $res = array('status'=> 200 , 'data'=>$items_json);

  echo json_encode($res);
}
$con->close();
?>