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
  $count = var_dump($businesses->count());

  foreach($businesses as $business){
     $latitude = $business['latitude'];
     $longitude = $business['longitude'];
  }

  $longitude = $longitude + .14;
}

?>
<script type="text/javascript"> //map specific javascript
      $(document).ready(function(){
        map = new GMaps({
          div: '#map',
          lat: '<?php echo $latitude; ?>',
          lng: '<?php echo $longitude; ?>',
          zoom: 11,
          scrollwheel: false,
        });
        <?php
        foreach ($businesses as $bu): ?>
          <?php
          //echo "<pre>";
          //print_r($bu);
          //echo "</pre>";
          $add = $bu['full_address'];
          $address = addslashes(str_replace("\n"," ",$add));
          $placename = addslashes($bu['name']);
           echo "map.addMarker({\n";
           echo "lat:".$bu['latitude'].",\n";
           echo "lng:".$bu['longitude'].",\n";
           echo "title: '".$placename."',\n";
           echo "infoWindow: {\n";
           echo "content: '<p class=\"marker\">"."Name: ".$placename.
           "<br/>"."Address: ".$address.
           "<br/>"."Rating: ".$bu['stars'].
           "<br/>"."Twitter: <a  target=\"_blank\" href=\"https://twitter.com/search?q=$placename\"><img alt=\"Twitter\"  class=\"twitterIcon\" src=\"images/twitter-16.png\"></a>".
               "</p>' }\n";
            echo "});\n";
         ?>
         <?php endforeach;
         ?>
      });
</script>
