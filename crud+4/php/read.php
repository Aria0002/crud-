<?php  

include "connection.php";

$query = "SELECT * FROM images ORDER BY id DESC";
$result = mysqli_query($conn, $query);