<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    // Database connection details
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
    
    // Query to retrieve book names
    $facultyQuery = "SELECT Book_Id, Book_Name FROM bookinfo";
    $facultyResult = $conn->query($facultyQuery);
    ?>
        <form action="php1.php" method="post">
            <label for="Book_Id">Select Book:</label>
            <select name="bookinfo" id="bookinfo" required>
                <?php
                if ($facultyResult->num_rows > 0) {
                    while ($row = $facultyResult->fetch_assoc()) {
                        echo "<option value='" . $row["Book_Id"] . "'>" . $row["Book_Name"] . "</option>";
                    }
                } else {
                    echo "<option value='' disabled>No faculty available</option>";
                }
                ?>
            </select>
            <p><button type="submit">search</button></p>
        </form>
        
    
    <?php
    $conn->close();
    ?>
</html>