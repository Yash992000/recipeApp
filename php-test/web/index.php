<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Recipe Form</title>
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
			margin-bottom: 5px;

		}
		input{
			margin-bottom: 10px;
		}
		select{
			margin-top: 5px;
			margin-bottom: 10px;
		}
	</style>
</head>
<body>
	<div>
		<form action="insert.php" method="post">
			<fieldset>
				<legend>
					Enter Recipe Details
				</legend>
				<label>Enter Recipe Name : </label>
				<input type="text" name="recipeName">
				<label>Enter Preparation Time (In Hour) : </label>
				<input type="text" name="preTime" maxlength="2"> Minutes
				<label>Choose Difficulty Level (Choose From 1 to 3) : </label>
				<select name="level">
					<option value="Level 1">Low</option>
					<option value="Level 2">Medium</option>
					<option value="Level 3">High</option>
				</select>
				<label>Enter Type : </label>
				<input type="radio" name="category" value="0">Vegetarian
				<input type="radio" name="category" value="1">Non-Vegetarian
				
				<br><br><input type="submit" name="Submit" value="Submit">
			</fieldset>
		</form><br><br>
		<center><button id="view" onclick="window.location.href = 'view.php'">View Data</button></center>

	</div>
</body>
</html>