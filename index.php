<?php
	// This is the index page.
$dbhost = 'localhost';
$dbname = 'yelp';

$con = new MongoClient();
echo "You connected to Mongo Database <br>";
$db = $con -> $dbname;

echo "Database $dbname selected. <br>";
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<!-- Bootstrap MaxCDN -->
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css"> <!-- css for star rating on form -->
		<link rel="stylesheet" type="text/css" href="/bark/css/style.css"><!-- css file for everything except form and sidenav -->
		<link rel="stylesheet" type="text/css" href="/bark/css/form.css"><!-- css file for sidenav and form -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> <!-- bootstrap related javascript -->
	</head>
	<body>
		<?php include 'form.php'; ?>
		<!-- Use any element to open the sidenav -->
		<span onclick="openNav()"><img id="logo" src="/bark/images/logo.png" /></span>

		<div id="main">
			<!-- All Homepage specific html should go here -->
		</div>

	<!-- Scripts that shouldn't effect page load go right before the closing body tag -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</body>
</html>
