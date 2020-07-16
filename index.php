<?php

include('db_connect.php');
 
//write query for all pizzas
$sql = 'SELECT * FROM fations ';

// make query & get result
$result = mysqli_query($conn, $sql);

//fetch the result row as an array
$shopes = mysqli_fetch_all($result, MYSQLI_ASSOC);

//free result from memory
mysqli_free_result($result);

//close connections
mysqli_close($conn);

//print_r($pizzas);
 ?>

<!DOCTYPE html>

<html>

  <?php include('template/header.php'); ?>
     <div class="hero mb-5">
     
      <form action="reasultSearch.php" method="get">
        <input class="brand-text" type="text" name="search"  placeholder="Search ...">
      </form>
      </div>
  <h4 class="center grey-text"> Fashions Shope </h4>
  <div class="container">
    <div class="row">

      <?php foreach ($shopes as $shope){ ?>
        <div class="col s4 md3">
          <div class="center card z-depth-0">
            <img src="img/fations.png" alt="shope img" class="shope">
            <div class="center card-content center">
              <h4 class="brand-text"><?php echo htmlspecialchars($shope['name']); ?></h4>
              <h6 ><?php echo htmlspecialchars($shope['address']); ?></h6>
              <h6 ><?php echo htmlspecialchars($shope['shopeType']); ?></h6>
            </div>
            <div class="card-action right-align">
              <a class="brand-text" href="details.php?id=<?php echo $shope['id']?>">more info!</a>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
  
  <?php include('template/footer.php'); ?>

</html>
