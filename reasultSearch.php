
<?php 
include('template/header.php'); 

$shopes = $_GET['search'];

 include('db_connect.php');

$sql = "SELECT * FROM fations  WHERE  name  LIKE '%$shopes%' ";
 
$result = mysqli_query($conn, $sql);

$shopes = mysqli_fetch_all($result, MYSQLI_ASSOC);
  echo "<table ><tr class='brand-text'><th>ID</th><th> Name</th><th>Address</th><th>ShopeType</th></tr>";
foreach ($shopes as $shope){

    echo "<tr class='white'><td>".htmlspecialchars($shope['id'])."</td><td>".htmlspecialchars($shope['name'])."</td><td>". htmlspecialchars($shope['address'])."</td><td>". htmlspecialchars($shope['shopeType'])."</td></tr>";
  }
  echo "</table>";
 
mysqli_free_result($result);
mysqli_close($conn);

?>

 

<?php include('template/footer.php'); ?>
</html>
    
 
