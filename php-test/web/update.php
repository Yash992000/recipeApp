<?php
	// Connect to MySQL
	$conn = mysqli_connect("mysql", "root", " ", "food");

	// Check Connection
	if($conn === false){
	    die("Error : Could not connect. ".mysqli_connect_error());
	}

	// Check if form data is submitted
	if($_SERVER["REQUEST_METHOD"] == "POST") {
	    // Retrieve form data
	    // Request data from form
	    $recipeId = $_REQUEST['recipeId'];
		$recipeName = $_REQUEST['recipeName'];
		$preparationTime = $_REQUEST['preTime'];
		$difficultyLevel = $_REQUEST['level'];
		$recipeCategory = $_REQUEST['category'];
	
		$isVeg = ($recipeCategory == '0') ? 1 : 0;
	    
	    // Update Data
	    $sql = "UPDATE recipe SET recipeName='$recipeName', preparationTime='$preparationTime', difficultyLevel='$difficultyLevel', recipeCategory='$isVeg' WHERE recipeId='$recipeId'";
	    if(mysqli_query($conn, $sql)){
	        echo "<script>alert('Data updated successfully.');</script>";
	        // header("Location: view.php"); // Redirect to view.php after updating
			echo "<script>window.location.href = 'view.php';</script>";
	        exit(); // Make sure to exit after redirecting
	    } else {
	        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
	    }
	} else {
	    echo "Error: Form data not submitted.";
	}

	// Close Connection
	mysqli_close($conn);
?>