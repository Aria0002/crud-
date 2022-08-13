<?php include "php/read.php";
require "connection.php";
session_start();

if(!isset($_SESSION["username"])) {
    header("Location: login/login.php");
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Create</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

	<div class="container">
		<div class="box">
			<h4 class="display-4 text-center">Read</h4><br>
			<?php if (isset($_GET['success'])) { ?>
		    <div class="alert alert-success" role="alert">
			  <?php echo $_GET['success']; ?>
		    </div>
		    <?php } ?>
			<?php if (mysqli_num_rows($result)) { ?>
			<table class="table table-striped">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Name</th>
			      <th scope="col">Description</th>
				  <th scope="col">Year</th>
				  <th scope="col">Category</th>
				  <th scope="col">Picture</th>
				  <th scope="col">Price</th>
			      <th scope="col">Action</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php 

				$sel = "SELECT * FROM images";
				$que = mysqli_query($conn,$sel);

				$output = "";
				$row = mysqli_fetch_array($que);

			  	   $i = 0;
			  	   while($rows = mysqli_fetch_assoc($result)){
			  	   $i++;
			  	 ?>
			    <tr>
			      <th scope="row"><?=$i?></th>
			      <td><?=$rows['name']?></td>
			      <td><?php echo $rows['description']; ?></td>
			      <td><?php echo $rows['year']; ?></td>
			      <td><?php echo $rows['category']; ?></td>
			      <td><?php echo "<img src='images/".$rows['picture']. "'height='80px'>" ?></td>
			      <td><?php echo $rows['price']; ?></td>
				
				  <td><a href="update.php?id=<?=$rows['id']?>" 
			      	     class="btn btn-success">Update</a>

			      	  <a href="php/delete.php?id=<?=$rows['id']?>" 
			      	     class="btn btn-danger">Delete</a>
			      </td>
			    </tr>
			    <?php } ?>
			  </tbody>
			</table>
			<?php } ?>
			<div class="link-right">
				<a href="index.php" class="link-primary">Create</a>
			</div>
			<a href="login/logout.php">Klik here to log out</a>
		</div>
	</div>
</body>
</html>