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
		<link rel="stylesheet" type="text/css" href="/bark/css/style.css">
	</head>
	<body>

	<!-- Scripts that shouldn't effect page load go right before the closing body tag -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</body>
</html>
