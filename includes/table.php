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
    echo $business['name'];
    echo "</pre>";
  }
  ?></div><?php
}
?>
