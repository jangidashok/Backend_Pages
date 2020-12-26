<?php
$server = "localhost";
$user = "root";
$pass = "";
$database = "megalith_info";
$conn = mysqli_connect($server,$user,$pass,$database);
if(!$conn){
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Error !</strong> Sorry for inconvenience we are not able to connect server.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
?>