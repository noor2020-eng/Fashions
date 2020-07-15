<?php
//connect to // Db
$conn = mysqli_connect('localhost', 'root', '', 'noorfations');

//check connections
if(!$conn){
  echo 'connections error' . mysqli_connect_error();
}
?>