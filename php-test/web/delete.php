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
	
	// Check if ID is provided in the URL
    if(isset($_GET['recipeId'])) {

        $id = mysqli_real_escape_string($conn, $_GET['recipeId']);

        // Delete Data
        $sql = "DELETE FROM recipe WHERE recipeId='$id'";
        if(mysqli_query($conn, $sql)){
            echo "Data deleted successfully.";
            header("Location: view.php");
            exit(); // Make sure to exit after redirecting
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }
    } else {
        echo "Error: No ID provided.";
    }

	// Close Connection

	mysqli_close($conn);

?>