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
<a href="../index.php">go back to index page</a>
<?php
foreach($reviews as $review)
{
  echo "<pre>";
  print_r($review);
  echo "</pre>";
}

?>
