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
    echo "\n<h3>".$business['name']."</h3>";
    echo printStars($business['stars']);
    echo "\n Address: ".$business['full_address']."<br>";
    ?><a href="<?php echo $url; ?>">Reviews (<?php echo $business['review_count']?>)</a><?php
    echo "<br></pre>";
  }
  ?></div><?php
}

function printStars($rating)
  {
    if($rating < 6 && $rating > 4.9)
    {
      echo "★★★★★";
    }
    else if($rating <5 && $rating > 3.9)
    {
      echo "★★★★";
    }
    else if($rating <4 && $rating > 2.9)
    {
      echo "★★★";
    }
    else if($rating <3 && $rating > 1.9)
    {
      echo "★★";
    }
    else
    {
      echo "★";
    }
  }
?>
