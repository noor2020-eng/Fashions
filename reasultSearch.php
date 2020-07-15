



<?php

 

include('db_connect.php');
$name =$_POST['searchShope'];

    $sql="SELECT * FROM fations
    WHERE name LIKE '%{$name}%' ";

  
$result = mysqli_query($con,$sql );
$shopes = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);

    mysqli_close($con);
  

?>
<!DOCTYPE html>

<html lang="en" dir="ltr">

  <?php include('template/header.php'); ?>
  <section class="container gray-text">

    <div class="container">
    <div class="row">

      <?php foreach ($shopes as $shope){ ?>
        <div class="col s4 md3">
          <div class="center card z-depth-0">
            <img src="img/fations.png" alt="shope img" class="pizza">
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