<?php
	// This is the index page.
$dbhost = 'localhost';
$dbname = 'yelp';

$con = new MongoClient();
//echo "You connected to Mongo Database <br>";
$db = $con -> $dbname;

//echo "Database $dbname selected. <br>";
?>
<!DOCTYPE html>
<html id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">
	<head>
		<meta charset="UTF-8">
		<!-- Bootstrap MaxCDN -->
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css"> <!-- css for star rating on form -->
		<link rel="stylesheet" type="text/css" href="/bark/css/style.css"><!-- css file for everything except form and sidenav -->
		<link rel="stylesheet" type="text/css" href="/bark/css/form.css"><!-- css file for sidenav and form -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> <!-- bootstrap related javascript -->
		<script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyD9DEz4zv2NRZjDOkLACx0LK4uhiIeq_8k"></script>
		<script type="text/javascript" src="/bark/scripts/gmaps.js"></script>
	</head>
	<body>
		<?php include 'includes/navbar.php' ?>
		<?php include 'includes/form.php'; ?>
		<!-- Use any element to open the sidenav -->
		<script type="text/javascript"> //map specific javascript
		      $(document).ready(function(){
		        map = new GMaps({
		          div: '#map',
		          lat: 34.3,
		          lng: -94.14,
		          zoom: 4,
		        });
					});
		</script>

		<div id="main">
			<!-- All Homepage specific html should go here -->
			<div id="second" class="container text-center">
				<table class="table table-striped" >
				 <thead style="text-align:center;">
					 <tr>
						 <th>Firstname</th>
						 <th>Lastname</th>
						 <th>Email</th>
					 </tr>
				 </thead>
				 <tbody>
					 <tr>
						 <td>John</td>
						 <td>Doe</td>
						 <td>john@example.com</td>
					 </tr>
					 <tr>
						 <td>Mary</td>
						 <td>Moe</td>
						 <td>mary@example.com</td>
					 </tr>
					 <tr>
						 <td>July</td>
						 <td>Dooley</td>
						 <td>july@example.com</td>
					 </tr>
				 </tbody>
			 </table>
			</div>
			<div id="third" class="container text-center">
				<div id="map"></div>
			</div>
		</div>
		<!-- Footer -->
		<footer class="text-center" style="padding: 40px;">
		  <a class="up-arrow" href="#myPage" data-toggle="tooltip" title="TO TOP">
		    <span class="glyphicon glyphicon-chevron-up"></span>
		  </a><br><br>
		  <p>Copyright <a href="" data-toggle="tooltip" title="Visit Arplux">Arplux</a></p>
		</footer>

		<script type="text/javascript" src="/bark/scripts/scripts.js"></script>
	<!-- Scripts that shouldn't effect page load go right before the closing body tag -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</body>
</html>
