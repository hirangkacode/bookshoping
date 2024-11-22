<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bookshoping";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get selected book id from the form submission
if (isset($_POST['bookinfo'])) {
    $selectedFacultyID = $_POST['bookinfo'];

    // Query to retrieve book information based on the selected ID
    $query = "SELECT 
            bookinfo.Book_Id,
            bookinfo.Book_Name,
            bookinfo.Author_Name,
            bookinfo.Publisher_Name,
            bookinfo.ISBN,
            bookinfo.Price,
            bookinfo.Available_Quantity
           FROM
           bookinfo
           WHERE 
           bookinfo.book_id=$selectedFacultyID;
           ";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {

        // Display book information
        while ($row = $result->fetch_assoc()) {
            
           // echo "<h2>" . $row["Name"] . "</h2>";
            echo "<p><strong>Book Details:</strong></p>";
            echo "<p>Book_Id: " . $row["Book_Id"] . "</p>";
            echo "<p>Book Name: " . $row["Book_Name"] . "</p>";
            echo "<p>Author Name: " . $row["Author_Name"] . "</p>";
            echo "<p>Publisher Name: " . $row["Publisher_Name"] . "</p>";
            echo "<p>ISBN: " . $row["ISBN"] . "</p>";
            echo "<p>Price: " . $row["Price"] . "</p>";
            echo "<p>Quantity: " . $row["Available_Quantity"] . "</p>";

        }
    } else {
        echo "<p>No information available for the selected faculty.</p>";
    }
} else {
    // Redirect to the main page if no book is selected
    header("Location: index1.php");
}

$conn->close();
?>