<html>
<?php
$con1 = mysqli_connect("localhost", "root", "");
if (!$con1) {
    echo "Connection failed: " . mysqli_connect_error();
}

mysqli_select_db($con1, "bookshoping");


$a = $_POST['id'];
$b = $_POST['newname'];
$sql = "UPDATE bookinfo SET Book_name='$b' WHERE Book_Id='$a'";

if ($con1->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $con1->error;
}
?>
</html>