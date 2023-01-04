<?php
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASSWORD','Khaliliphone7s++');
define('DB_NAME','todo_app');
 
function connect()
{
    $connect = mysqli_connect(DB_HOST , DB_USER , DB_PASSWORD , DB_NAME);

    if(mysqli_connect_errno()){
        die("failed to connect" . mysqli_connect_error());
    }
    mysqli_set_charset($connect,"utf8");

    return $connect;
}

$con = connect();
?>
