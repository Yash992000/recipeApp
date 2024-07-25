<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Data</title>
</head>
<style type="text/css">
    body{
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        form{
            width: 400px;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 1.0);
        }
        fieldset{
            border: 1px solid black;
            padding: 10px;
            margin: 0;
        }
        legend{
            font-weight: bold;
            margin-bottom: 5px;
        }
        label{
            display: block;
            margin-bottom: 10px;

        }
        input{
            margin-bottom: 20px;
        }
        select{
            margin-top: 5px;
            margin-bottom: 10px;
        }
</style>
<body>
    <?php
        // Connect to MySQL
        $conn = mysqli_connect("mysql", "root", " ", "food");

        // Check Connection
        if($conn === false){
            die("Error : Could not connect. ".mysqli_connect_error());
        }

        // Check if ID is provided in the URL
        if(isset($_GET['recipeId'])) {
            $id = mysqli_real_escape_string($conn, $_GET['recipeId']);
            
            // Fetch data of the selected record
            $sql = "SELECT * FROM recipe WHERE recipeId='$id'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);

            if($row) {
                ?>
                <form action="update.php" method="post">
                    <fieldset>
                    <legend>
                        Modify Recipe Details
                    </legend>
                    <input type="hidden" name="recipeId" value="<?php echo $row['recipeId']; ?>">
                    <label>Enter Recipe Name : </label>
                    <input type="text" name="recipeName" value="<?php echo $row['recipeName']; ?>">
                    <label>Enter Preparation Time (In Hour) : </label>
                    <input type="text" name="preTime" maxlength="2" value="<?php echo $row['preparationTime']; ?>"> Minutes
                    <label>Choose Difficulty Level (Choose From 1 to 3) : </label>
                    <select name="level">
                        <option value="Level 1" <?php if($row['difficultyLevel'] == 'Level 1') echo 'selected'; ?>>Level 1</option>
                        <option value="Level 2" <?php if($row['difficultyLevel'] == 'Level 2') echo 'selected'; ?>>Level 2</option>
                        <option value="Level 3" <?php if($row['difficultyLevel'] == 'Level 3') echo 'selected'; ?>>Level 3</option>
                        </select>
                    <label>Enter Type : </label>
                    <input type="radio" name="category" value="0" <?php if($row['recipeCategory'] == 1) echo 'checked'; ?>>Vegetarian
                    <input type="radio" name="category" value="1" <?php if($row['recipeCategory'] == 0) echo 'checked'; ?>>Non-Vegetarian
                        
                    
                    <br><br><input type="submit" name="Submit" value="Update">

                    </fieldset>
                </form>
                <?php
            } else {
                echo "Error: Record not found.";
            }
        } else {
            echo "Error: No ID provided.";
        }

        // Close Connection
        mysqli_close($conn);
    ?>
</body>
</html>
