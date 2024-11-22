<html>
<?php
$con1 = mysqli_connect("localhost", "root", "");
if (!$con1) {
    echo "Connection failed: " . mysqli_connect_error();
}

mysqli_select_db($con1, "bookshoping");


$a = $_POST['Bookid'];
$sql = "DELETE FROM bookinfo WHERE Book_Id=$a";

if ($con1->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $con1->error;
}
?>
</html>