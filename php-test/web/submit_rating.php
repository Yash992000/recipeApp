<?php
// Connect to MySQL
$conn = mysqli_connect("mysql", "root", " ", "food");

// Check connection
if ($conn === false) {
    die("Error: Could not connect. " . mysqli_connect_error());
}

// Check if form data is submitted and valid
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $recipeId = mysqli_real_escape_string($conn, $_POST['recipeId']);
    $rating = mysqli_real_escape_string($conn, $_POST['rating']);

    // Validate rating (example: between 1 and 5)
    if ($rating >= 1 && $rating <= 5) {
        // Insert rating into ratings table
        $sql = "INSERT INTO ratings (recipeId, rating) VALUES ('$recipeId', '$rating')";

        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Rating submitted successfully.');</script>";
            // Redirect back to user.php or any other page after successful submission
            // header("Location: user.php");
            echo "
			    <script>window.location.href = 'user.php';</script>
		    ";
            exit();
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }
    } else {
        echo "Invalid rating. Please select a rating between 1 and 5.";
    }
} else {
    echo "Error: Form data not submitted.";
}

// Close connection
mysqli_close($conn);
?>
