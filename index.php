<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDO - Read Records - PHP CRUD Tutorial</title>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!--custom css-->
	<style>
		.m-r-1em {margin-right: 1em;}
		.m-b-1em {margin-bottom: 1em;}
		.m-l-1em {margin-left: 1em;}
		.mt0 {margin-top:0;}
	</style>

</head>
<body>

	<!--container-->
	<div class="container">
		<div class="page-header">
			<h1>Read Products</h1>
		</div>

		<!-- code for reading records -->
		<?php
			include 'config/database.php';

			// delete msg prompt will be here

			// select all data
			$query = "SELECT id, name, description, price FROM products ORDER BY id DESC";
			$stmt = $con->prepare($query);
			$stmt->execute();

			// getting the number of rows returned
			$num = $stmt->rowCount();

			// link to create record form
			echo "<a href='create.php' class='btn btn-primary m-b-1em'>Create New Product</a>";

			//check if more than 0 records were found
			if ($num > 0) {
				// data from the db comes here
			} else {
				echo "<div class='alert alert-danger'>No records found.</div>";
			}

		?>

	</div> <!-- end .container -->

	<!-- jQuery (necessary for bootstrap's js plugins) -->
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<!--	confirm delete record will be here-->
</body>
</html>