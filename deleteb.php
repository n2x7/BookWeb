<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>this webpage show editing data</title>
    <link rel="stylesheet" href="1login.css">
</head>
<body>
<?php
require 'conn.php';

// รับค่า ID ของนักศึกษาที่ต้องการลบจาก URL
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $bid = $_POST['bid'];

    // Delete the book from the database
    $sql = "DELETE FROM book WHERE bid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $bid);

    if ($stmt->execute()) {
        echo "<h2>Book deleted successfully!</h2>";
        header("refresh: 3; url=book.php");
    } else {
        echo "<h2>Error: </h2>" . $stmt->error;
        header("refresh: 3; url=book.php");
    }
    $stmt->close();
}
?> 


</body>
</html>