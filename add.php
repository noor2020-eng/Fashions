 <?php
include('db_connect.php');

 $name = $name = $shopeType = '';
  $errors = array('name' => '', 'address'=>'', 'shopeType'=>''  );
  if(isset($_POST['submit'])){
    if(empty($_POST['name'])){
      $errors['name'] = "An EMAil is required! <br/>";
    }else {
      $name = $_POST['name'];  
    }
    if(empty($_POST['address'])){
      $errors['address'] = "An address is required! <br/>";
    }else {
      $address = $_POST['address'];
    }
    if(empty($_POST['shopeType'])){
      $errors['shopeType'] = "An shopeType is required! <br/>";
    }else {
      $shopeType = $_POST['shopeType'];
    }
      
    
    if(array_filter($errors)){
    }else {
      $name = mysqli_real_escape_string($conn, $_POST['name']);
      $address = mysqli_real_escape_string($conn, $_POST['address']);
      $shopeType = mysqli_real_escape_string($conn, $_POST['shopeType']);

      $sql = "INSERT INTO fations(name,address,shopeType) VALUES('$name', '$address', '$shopeType' ) ";

      if(mysqli_query($conn, $sql)){
         header('location: index.php');
      }else{
        echo 'query error:' . mysqli_error($conn);
      }
    }

  } 

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

  <?php include('template/header.php'); ?>
  <section class="container gray-text">
    <h4 class="center">Add A Shope</h4>
    <form class="white" action="add.php" method="POST">
      <label for="">name:</label>
      <input type="text" name="name" >
      <div class="red-text">
        <?php echo $errors['name']; ?>
      </div>
      <label for="">address:</label>
      <input type="text" name="address" >
      <div class="red-text">
        <?php echo $errors['address']; ?>>
      </div>
      <label for="">Type Shope:</label>    
      <input type="text" name="shopeType" >
      <div class="red-text">
        <?php echo $errors['shopeType']; ?>
      </div>
      <div class="center">
        <input type="submit" name="submit" value="submit" class="btn brand z-depth-0 ">
      </div>
    </form>
  </section
  <?php include('template/footer.php'); ?>
</html>
