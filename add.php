<?php
  require_once ('config/db.php');


  // CREATE DATA
  if(isset($_POST['submit']) && isset($_POST['submit']) != ''){


    $id = (!empty($_GET['id']))? $_GET['id'] : '';


    // VALIDATION
    // CHECKING FOR EMPTY.... IF INPUT IS EMPTY IT WILL NOT SAVE TO DATABASE
    $name = (!empty($_POST['name'])) ? $_POST['name'] : '';
    $marketVlu = (!empty($_POST['marketVlu'])) ? $_POST['marketVlu'] : '';
    $club = (!empty($_POST['club'])) ? $_POST['club'] : '';
    $position = (!empty($_POST['position'])) ? $_POST['position'] : '';



    if($id){
      // IF URL HAS ID IT WILL UPDATE
      // $query = "UPDATE players SET name='$name', market_value='$marketVlu', club='$club', position= '$position' WHERE id='$id'";
      $query = "UPDATE players SET name='$name', market_value='$marketVlu', club='$club', position= '$position' WHERE id='$id'";
      $msg = "updated";
    }else{
      // IF URL DON'T HAVE ID IT WILL ADD RECORD
      // echo "<h2>name is $name market value $marketVlu club $club position is $position </h2>";
      $query = "INSERT INTO players(name, market_value, club, position) VALUES ('$name', '$marketVlu', '$club', '$position')";
      $msg = 'inserted';
    }





    if(mysqli_query($conn, $query)){
      header('Location: index.php?data_'.$msg);
      echo "successfull " . $msg;
    }

  }





  if(isset($_GET['id']) && $_GET['id'] != ''){
    $player_id = $_GET['id'];
    $query = "SELECT * FROM `players` WHERE id=$player_id";
    $result = mysqli_query($conn, $query);
    $records = mysqli_fetch_row($result);


    $name = $records[1];
    $marketVlu = $records[2];
    $club = $records[3];
    $position = $records[4];
  }
?>



<?php require_once("partials/head.php"); ?>
<?php require_once("partials/nav.php"); ?>

<div class="container mt-5 shadow p-5">
      <h2 class="text-center">Enter Players Information</h2>
      <br>
      <form action="" method="post">
          <div class="form-row">
              <div class="col">
                  <div class="form-group">
                      <label for="name">Player Name</label>
                      <input type="text" class="form-control" name="name" value="<?php echo $name; ?>" placeholder="Enter player name !">
                  </div>
              </div>
              <div class="col">
                  <div class="form-group">
                      <label for="marketVlu">Market Value</label>
                      <input type="text" class="form-control" name="marketVlu" value="<?php echo $marketVlu; ?>" placeholder="Enter Market Value !">
                  </div>
              </div>
          </div>
          <div class="form-row">
              <div class="col">
                  <div class="form-group">
                      <label for="position">Position</label>
                      <input type="text" class="form-control" name="position" value="<?php echo $position; ?>" placeholder="Enter player position !">
                  </div>
              </div>
              <div class="col">
                  <div class="form-group">
                      <label for="club">Club</label>
                      <input type="text" class="form-control" name="club" value="<?php echo $club; ?>" placeholder="Enter Club Name !">
                  </div>
              </div>
          </div>
          <div class="form-group">
              <input type="submit" class="btn btn-primary form-control" name="submit" >
          </div>
      </form>

      <br><br>

  </div>
  <?php require_once("partials/footer.php"); ?>
