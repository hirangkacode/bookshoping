<html>
<?php
$con1 = mysqli_connect("localhost", "root", "");
if (!$con1) {
    echo "Connection failed: " . mysqli_connect_error();
}

mysqli_select_db($con1, "bookshoping");

$a = $_POST['Book_Id'];
$b = $_POST['Book_Name'];
$c = $_POST['Author_Name'];
$d = $_POST['Publisher_Name'];
$e = $_POST['ISBN'];
$f = $_POST['Price'];
$g = $_POST['Available_Quantity'];

        $in = "INSERT INTO bookinfo VALUES ('$a','$b','$c','$d','$e','$f','$g')";
        $res1 = mysqli_query($con1, $in);
        if ($in) {
            echo '<script type="text/javascript">';
            echo 'alert("Review your entries");';
            echo '</script>';
        } else {
            echo "Enter Valid Details";
            header("Location:index.html");
        }
?>
</html>