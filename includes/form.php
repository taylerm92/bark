<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a> <!-- This is close button for sideNav -->
  <div class="container formContainer">
    <form class="form-horizontal" action="index.php" method="post">

      <div class="form-group">
        <div class="col-sm-12">
          <input type="text" class="form-control" style="text-align: center;" id="name" name="name" placeholder="Name of City" required>
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-12">
          <input type="text" class="form-control" style="text-align: center;" id="keyword" name="keyword" placeholder="Keyword" required>
        </div>
      </div>

      <div class="stars">
        <input class="star star-5" id="star-5" type="radio" name="star" value="5"/>
        <label class="star star-5" for="star-5"></label>
        <input class="star star-4" id="star-4" type="radio" name="star" value="4"/>
        <label class="star star-4" for="star-4"></label>
        <input class="star star-3" id="star-3" type="radio" name="star" value="3"/>
        <label class="star star-3" for="star-3"></label>
        <input class="star star-2" id="star-2" type="radio" name="star" value="2"/>
        <label class="star star-2" for="star-2"></label>
        <input class="star star-1" id="star-1" type="radio" name="star" value="1"/>
        <label class="star star-1" for="star-1"></label>
      </div>

      <div class="col-sm-12">
        <button id="search" type="submit" class="btn btn-default">Search</button> <!-- button to submit form -->
      </div>

    </form>
  </div>
</div>


<script>
  /* Open the sidenav */
  function openNav() {
      document.getElementById("mySidenav").style.width = "100%";
  }

  /* Close/hide the sidenav */
  function closeNav() {
      document.getElementById("mySidenav").style.width = "0";
  }
</script>
