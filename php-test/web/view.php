<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manage Data</title>
    <style type="text/css">
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        form {
            width: 600px;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 1.0);
        }
        fieldset {
            border: 1px solid black;
            padding: 10px;
            margin: 0;
        }
        legend {
            font-weight: bold;
            margin-bottom: 5px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        h3 {
            margin-top: -5px;
        }
    </style>
</head>
<body>
    <div>
    <form method="get">
        <fieldset>
	        <legend>Manage Data</legend>
	        <h3>Search : <input type="text" name="search"></h3>
	        <input type="submit" value="Search"><br><br>

        <table>
            <thead>
                <tr>
                    <th>Unique ID</th>
                    <th>Recipe Name</th>
                    <th>Preparation Time</th>
                    <th>Difficulty Level</th>
                    <th>Category</th>
                    <th>Delete</th>
                    <th>Update</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Connect to MySQL
                $conn = mysqli_connect("mysql", "root", " ", "food");

                // Check Connection
                if ($conn === false) {
                    die("Error: Could not connect. " . mysqli_connect_error());
                }

                // Initialize search variable
                $search = "";

                // Check if search query parameter is provided
                if (isset($_GET['search'])) {
                    $search = mysqli_real_escape_string($conn, $_GET['search']);
                    $sql = "SELECT * FROM recipe WHERE recipeName LIKE '%$search%'";
                } else {
                    $sql = "SELECT * FROM recipe";
                }

                // Fetch Data
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['recipeId'] . "</td>";
                        echo "<td>" . $row['recipeName'] . "</td>";
                        echo "<td>" . $row['preparationTime'] . " Minutes</td>";
                        echo "<td>" . $row['difficultyLevel'] . "</td>";
                        echo "<td>" . $row['recipeCategory'] . "</td>";
                        echo "<td>" . "<a href='./delete.php?recipeId=".$row['recipeId']."'>Delete</a>" ."</td>";
                        echo "<td>" . "<a href='./modify.php?recipeId=".$row['recipeId']."'>Modify</a>" ."</td>";

                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No data found</td></tr>";
                }

                // Close Connection
                mysqli_close($conn);
                ?>
            </tbody>
        </table>
        <br><br>
        <center>
            <button id="index">
                <a href="index.php" style="color:black; text-decoration: none;">Insert Recipe </a>
            </button>
        </center>
		</fieldset>
    </form>
    </div>

</body>
</html>
