<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Book</title>
    <link rel="stylesheet" href="1login.css">
</head>
<body>
<?php
require 'conn.php';

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $bName = $_POST['bName'];
    $bAuthor = $_POST['bAuthor'];
    $bPrice = $_POST['bPrice'];

    // Handle file upload
    $target_dir = "uploads/";
    $bCover = $target_dir . basename($_FILES["bCover"]["name"]);
    move_uploaded_file($_FILES["bCover"]["tmp_name"], $bCover);

    // Insert data into database
    $sql = "INSERT INTO book (bName, bAuthor, bCover, bPrice) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssd", $bName, $bAuthor, $bCover, $bPrice);

    if ($stmt->execute()) {
        echo "<h2>New book added successfully!</h2>";
        header("refresh: 3; url=book.php");
    } else {
        echo "<h2>Error: </h2>" . $stmt->error;
        header("refresh: 3; url=addn.html");
    }

    $stmt->close();
    $conn->close();
}
?>
</body>
</html>