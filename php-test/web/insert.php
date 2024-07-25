<?php
	// Connect Mysql
	$conn = mysqli_connect("mysql", "root", " ", "food");
	
	// Check Connection
	if($conn === false){
		die("Error : Could not connect. ".mysqli_connect_error());
	}
	// else{
	// 	echo "Connected Successfully";
	// }

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
		echo "<script>alert('Data inserted successfully...');</script>";
		// echo nl2br("\n $name \n $email \n $contact \n $dob \n $gender");
		// header("Location: index.php");
		echo "
			<script>window.location.href = 'index.php';</script>
		";
        exit(); // Make sure to exit after redirecting
	}
	else{
		echo "<script>alert('ERROR : Data Not Inserted.');</script>";
	}

	mysqli_close($conn);

?>