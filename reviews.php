<?php
$dbhost = 'localhost';
$dbname = 'yelp';

$con = new MongoClient();
//echo "You connected to Mongo Database <br>";
$db = $con -> $dbname;

$businessid = $_GET['reviewid'];
$query = array("business_id"=> new MongoRegex("/$businessid/i"));

$reviews = $db->review->find($query);
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
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <a href="index.php"><img id="logo" src="/bark/images/logo.png" /></a>
        </div>

        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#reviews">reviews</a></li>
          </ul>
        </div>
      </div>
    </nav>

  <script>
    $(document).ready(function(){
      var streetview = GMaps.createPanorama({
        el: '#streetview',
        lat: '<?php echo $_GET['latitude']?>',
        lng: '<?php echo $_GET['longitude']?>',
        scrollwheel: false,
      });
    });
  </script>
	<div class="streetview" style="height: 92vh;">
  	<div id="streetview" style="width:100%; height: 100%; "></div>
	</div>
  <div id="reviews" class="container">
	<style>
		#reviews{
			height: 100vh;
			border-bottom: 1px solid black;
			padding-top: 150px;

		}
		.reviewholder{
			background-color: white;
			margin: 5px 30px 10px 30px;
			padding: 10px 40px 10px 40px;
			border-radius: 0px 0px 2px 2px;
			box-shadow: 2px 2px 5px black;
		}

		.scrollbox{
			height: 90%;
			overflow-y: scroll;
		}
	</style>
		<div class="scrollbox">
    <?php
    foreach($reviews as $review)
    {
      ?><div class="reviewholder"><?php
      echo "Star rating: ".$review['stars']."<br>";
      echo "Date: ".$review['date']."<br>";
      echo "Review: ".$review['text']."<br>";

      ?></div><?php
    }

    ?>
		</div>
  </div>

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
