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
  echo $count;
}

?>
<script type="text/javascript"> //map specific javascript
      $(document).ready(function(){
        map = new GMaps({
          div: '#map',
          lat: 34.3,
          lng: -94.14,
          zoom: 4,
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
           echo "content: '<p class=\"marker\">"."name: ".$placename.
           "<br/>"."address: ".$address.
           "<br/>"."star rating: ".$bu['stars'].
           "<br/>"."twitter: <a  target=\"_blank\" href=\"https://twitter.com/search?q=$placename\"><img alt=\"Twitter\"  class=\"twitterIcon\" src=\"images/twitter-16.png\"></a>".
           "<br/>"."panoramio: ".
           "</p>' }\n";
            echo "});\n";
         ?>
         <?php endforeach;
         ?>
      });
</script>
