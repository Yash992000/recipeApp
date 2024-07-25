<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipes</title>
    <link rel="stylesheet" href="user.css">    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"> <!-- Font Awesome for stars -->
</head>
<body>
    <div class="container">
        <h1>Recipe Collection</h1>

        <div class="recipes">
            <?php
            // Connect to MySQL
            $conn = mysqli_connect("mysql", "root", " ", "food");

            // Check connection
            if ($conn === false) {
                die("Error: Could not connect. " . mysqli_connect_error());
            }

            // Fetch recipes from database
            $sql = "SELECT * FROM recipe";
            $result = mysqli_query($conn, $sql);

            // Check if records were found
            if (mysqli_num_rows($result) > 0) {
                // Output data of each row
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<div class='recipe'>";
                    echo "<h2>{$row['recipeName']}</h2>";
                    echo "<p><strong>Preparation Time:</strong> {$row['preparationTime']} Minutes</p>";
                    echo "<p><strong>Difficulty Level:</strong> {$row['difficultyLevel']}</p>";
                    echo "<p><strong>Category:</strong> " . ($row['recipeCategory'] == '0' ? 'Vegetarian' : 'Non-Vegetarian') . "</p>";
                    
                    // Display current rating if available
                    $recipeId = $row['recipeId'];
                    $avgRating = getAverageRating($conn, $recipeId);
                    echo "<div class='ratings'>";
                    echo "<span class='average-rating'>" . number_format($avgRating, 1) . "</span>";
                    echo "<div class='stars'>";
                    echo getStars($avgRating);
                    echo "</div>";
                    echo "</div>";

                    // Form for rating
                    echo "<form action='submit_rating.php' method='post'>";
                    echo "<input type='hidden' name='recipeId' value='{$row['recipeId']}'>";
                    echo "<label for='rating'>Your Rating:</label>";
                    echo "<select name='rating' id='rating' required>";
                    echo "<option value=''>Select rating</option>";
                    echo "<option value='1'>1</option>";
                    echo "<option value='2'>2</option>";
                    echo "<option value='3'>3</option>";
                    echo "<option value='4'>4</option>";
                    echo "<option value='5'>5</option>";
                    echo "</select>";
                    echo "<br>";
                    echo "<input type='submit' value='Submit Rating'>";
                    echo "</form>";

                    echo "</div>";
                }
            } else {
                echo "<p>No recipes found.</p>";
            }

            // Close connection
            mysqli_close($conn);

            // Function to calculate average rating for a recipe
            function getAverageRating($conn, $recipeId) {
                $sql = "SELECT AVG(rating) AS avgRating FROM ratings WHERE recipeId = '$recipeId'";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                return $row['avgRating'] ?: 0; // If no ratings, return 0
            }

            // Function to generate star icons based on rating
            function getStars($rating) {
                $fullStars = floor($rating);
                $halfStars = ceil($rating - $fullStars);
                $emptyStars = 5 - $fullStars - $halfStars;

                $stars = "";
                // Full stars
                for ($i = 0; $i < $fullStars; $i++) {
                    $stars .= "<i class='fas fa-star'></i>";
                }
                // Half stars
                for ($i = 0; $i < $halfStars; $i++) {
                    $stars .= "<i class='fas fa-star-half-alt'></i>";
                }
                // Empty stars
                for ($i = 0; $i < $emptyStars; $i++) {
                    $stars .= "<i class='far fa-star'></i>";
                }

                return $stars;
            }
            ?>
        </div>
    </div>
</body>
</html>
