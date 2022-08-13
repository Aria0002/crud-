<?php 
include '../connection.php';
if (isset($_POST['create'])) {
	include "../connection.php";

	

	$name = $_POST['name'];
	$description = $_POST['description'];
	$year = $_POST['year'];
	$category = $_POST['category'];
    $price = $_POST['price'];

	$picture_name = $_FILES['picture']['name'];
	$picture_tmp_name = $_FILES['picture']['tmp_name'];
	$picture_folder = '../images/' . $picture_name;

	
	$user_data = 'name='.$name. '&description='.$description . '&year='.$year . '&categorie='.$category 
	. '&picture='.$picture_name . '&price='.$price;

	if (empty($name)) {
		header("Location: ../index.php?error=Name is required&$user_data");
	}else if (empty($description)) {
		header("Location: ../index.php?error=description is required&$user_data");
	}
	else if (empty($year)) {
		header("Location: ../index.php?error=year is required&$user_data");
	}
	else if (empty($category)) {
		header("Location: ../index.php?error=category is required&$user_data");
	}
	else if (empty($picture_name)) {
		header("Location: ../index.php?error=picture is required&$user_data");
	}
	else if (empty($price)) {
		header("Location: ../index.php?error=price is required&$user_data");
	}
	else {
		$query = "INSERT INTO `images`(`name`, `description` , `year` , `category` , `picture` , `price`) 
		
		VALUES ('$name','$description','$year','$category','$picture_name' ,'$price')";


       $result = mysqli_query($conn, $query);
       if ($result) {

		echo $picture_folder;
		echo "<br>";
		echo $picture_tmp_name;
	    move_uploaded_file($picture_tmp_name, $picture_folder);
        header("Location: ../read.php?success=successfully created");
       }else {
        header("Location: ../index.php?error=unknown error occurred&$user_data");
       }
	}

}