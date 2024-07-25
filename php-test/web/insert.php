<?php


	// Connect Mysql

	$conn = mysqli_connect("localhost", "root", "", "food");

	// Check Connection

	if($conn === false){
		die("Error : Could not connect. ".mysqli_connect_error());
	}
	else{
		echo "Connected Successfully";
	}

	// Request data from form
	$recipeName = $_REQUEST['recipeName'];
	$preparationTime = $_REQUEST['preTime'];
	$difficultyLevel = $_REQUEST['level'];
	$recipeCategory = $_REQUEST['category'];

    $isVeg = ($recipeCategory == '0') ? 1 : 0;


	// Insert Data
    $sql = "INSERT INTO recipe (recipeName, preparationTime, difficultyLevel, recipeCategory) 
        VALUES ('$recipeName', '$preparationTime', '$difficultyLevel', '$isVeg')";


	if(mysqli_query($conn, $sql)){
		echo "Data inserted successfully...";
		// echo nl2br("\n $name \n $email \n $contact \n $dob \n $gender");
		header("Location: index.php");
        exit(); // Make sure to exit after redirecting
	}
	else{
		echo "ERROR : Data Not Inserted.".mysqli_error($conn);
	}

	mysqli_close($conn);

?>