<?php
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
		<form action="php/create.php" 
		      method="post"
			  enctype='multipart/form-data' 
			  >
            
		   <h4 class="display-4 text-center">Create</h4><hr><br>
		   <?php if (isset($_GET['error'])) { ?>
		   <div class="alert alert-danger" role="alert">
			  <?php echo $_GET['error']; ?>
		    </div>
		   <?php } ?>
		   <div class="form-group">
		     <label for="name">Name</label>
		     <input type="name" 
		           class="form-control" 
		           id="name" 
		           name="name" 
		           value="<?php if(isset($_GET['name']))
		                           echo($_GET['name']); ?>" 
		           placeholder="Enter name">
		   </div>

		   <div class="form-group">
		     <label for="description">Description</label>
		     <input type="text" 
		           class="form-control" 
		           id="email" 
		           name="description" 
		           value="<?php if(isset($_GET['description']))
		                           echo($_GET['description']); ?>"
		           placeholder="Write description">
		   </div>

		   <div class="form-group">
		     <label for="year">Year</label>
		     <input type="date" 
		           class="form-control" 
		           id="year" 
		           name="year" 
		           value="<?php if(isset($_GET['year']))
		                           echo($_GET['year']); ?>"
		           placeholder="Which year">
		   </div>

		   <div class="form-group">
		     <label for="category">Category</label>
		     <input type="text" 
		           class="form-control" 
		           id="category" 
		           name="category" 
		           value="<?php 
				   if(isset($_GET['category']))
		                           echo($_GET['category']); ?>"
		           placeholder="Which category">
		   </div>

		   <div class="form-group">
		     <label for="picture">picture</label>
		     <input type="file" 
		           class="form-control" 
		           id="picture" 
		           name="picture" 
		           value="<?php

				if(isset($_GET['picture']))
				echo "<img src='".$_GET['picture']."'>";
		    ?>
		           placeholder="Choose picture">
		   </div>

		   <div class="form-group">
		     <label for="price">price</label>
		     <input type="number" 
		           class="form-control" 
		           id="price" 
		           name="price" 
		           value="<?php if(isset($_GET['price']))
		                           echo($_GET['price']); ?>"
		           placeholder="How much?">
		   </div>

		   <button type="submit" 
		          class="btn btn-primary"
		          name="create">Create</button>
		    <a href="read.php" class="link-primary">View</a>
	    </form>
	</div>
</body>
</html>