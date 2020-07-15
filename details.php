<?php
include('db_connect.php');

if(isset($_POST['delete'])){

  $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);
  $sql = "DELETE FROM fations WHERE id = $id_to_delete";

  if(mysqli_query($conn, $sql)){
    header('location: index.php');
  }else {
    echo "query error" . mysql_error($conn);
  }
}



if(isset($_GET['id'])){

  $id = mysqli_real_escape_string($conn, $_GET['id']);

  $sql = "SELECT * FROM fations WHERE id=$id";

  $result = mysqli_query($conn, $sql);

  $shope = mysqli_fetch_assoc($result);

  mysqli_free_result($result);
  mysqli_close($conn);

  print_r($shope);

}
 ?>


 <!DOCTYPE html>
 <html lang="en" dir="ltr">

 <?php include('template/header.php'); ?>
 <h2>Details</h2>
 <div class="center container grey-text">
   <?php if($shope):?>
     <h3 class="input-text"><?php echo htmlspecialchars($shope['name']);  ?></h3>
     <h6>Place in:</h6>
     <p class="input-text"><?php echo htmlspecialchars($shope['address']); ?></p>
     <h6>ShopeType:</h6>
     <p class="brand-text"><?php echo htmlspecialchars($shope['shopeType']); ?></p>

     <!-- DELETE FORM -->
     <form class="" action="details.php" method="POST">
       <input type="hidden" name="id_to_delete" value="<?php echo $shope['id']; ?>">
       <input type="submit" name="delete" value="Delete" class="btn brand z-depth-0 ">
     </form>

   <?php else: ?>
     <h5 class="input-text">No Such shope exists!</h5>
   <?php endif; ?>
 </div>
 <?php include('template/footer.php'); ?>

 </html>
