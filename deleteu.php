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
$uid = $_GET['uid'];

    // Delete the book from the database
    $sql = "DELETE FROM users WHERE uid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $uid);

    if ($stmt->execute()) {
        echo "<h2>User deleted successfully!</h2>";
        header("refresh: 3; url=user.php");
    } else {
        echo "<h2>Error: </h2>" . $stmt->error;
        header("refresh: 3; url=user.php");
    }
    $stmt->close();

?> 


</body>
</html>