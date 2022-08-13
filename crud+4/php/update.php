<?php 

if (isset($_GET['id'])) {
	include "connection.php";

	function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
	}

	$id = validate($_GET['id']);

	$sql = "SELECT * FROM images WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
    	$row = mysqli_fetch_assoc($result);
    }else {
    	header("Location: read.php");
    }


}else if(isset($_POST['update'])){
    include "../connection.php";
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
	}

	$name = validate($_POST['name']);
	$description = validate($_POST['description']);
	$year = validate($_POST['year']);
	$category = validate($_POST['category']);
	$picture = validate($_POST['picture']);
	$price = validate($_POST['price']);
	$id = validate($_POST['id']);

	if (empty($name)) {
		header("Location: ../update.php?id=$id&error=Name is required");
	}else if (empty($description)) {
		header("Location: ../update.php?id=$id&error=Description is required");
	}
        else if (empty($year)) {
		header("Location: ../update.php?id=$id&error=year is required");
	}
        else if (empty($category)) {
		header("Location: ../update.php?id=$id&error=category is required");
	}
        else if (empty($picture)) {
		header("Location: ../update.php?id=$id&error=Description is required");
	}
        else if (empty($price)) {
		header("Location: ../update.php?id=$id&error=price is required");
	}
        else {

       $sql = "UPDATE images
               SET name='$name', description='$description' , year='$year' , category='$category'
               , picture='$picture' , price='$price'
               WHERE id=$id ";
       $result = mysqli_query($conn, $sql);
       if ($result) {
       	  header("Location: ../read.php?success=successfully updated");
       }else {
          header("Location: ../update.php?id=$id&error=unknown error occurred&$user_data");
       }
	}
}else {
	header("Location: read.php");
}