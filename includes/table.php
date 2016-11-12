<?php
if (isset($_POST['name']) && isset($_POST['keyword'])) {
  if (isset($_POST['star'])) {
    $stars = (double)$_POST['star'];

  }else {
    $stars = 1.0;
  }
  $name = $_POST['name'];
  $keyword = $_POST['keyword'];

  $query = array("city"=> new MongoRegex("/$name/i"),
              "categories" =>new MongoRegex("/$keyword/i"),
              "stars"=> array('$gte'=>$stars));

  $businesses = $db->business->find($query)->sort(array("stars"=> 1));
  ?><div class="table_holder"><?php
  foreach($businesses as $business)
  {
    echo "<pre>";
    $url = "reviews.php?reviewid=".urlencode($business['business_id'])."&latitude=".urlencode($business['latitude'])."&longitude=".urlencode($business['longitude']);
    ?><a href="<?php echo $url; ?>">link</a><?php
    echo $business['name'];
    echo "</pre>";
  }
  ?></div><?php
}
?>
