<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update book</title>
    <link rel="stylesheet" href="1login.css">
</head>
<body>
<?php
// Database connection
require 'conn.php';
// ตรวจสอบว่ามีการส่งค่ามาจากฟอร์มหรือไม่
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $bid = $_POST['bid'];
    $bName = $_POST['bName'];
    $bAuthor = $_POST['bAuthor'];
    $bPrice = $_POST['bPrice'];
    
    // ตรวจสอบว่ามีการอัปโหลดรูปใหม่หรือไม่
    if (!empty($_FILES['bCover']['name'])) {
        // Handle file upload
        $target_dir = "uploads/";
        $bCover = $target_dir . basename($_FILES["bCover"]["name"]);
        move_uploaded_file($_FILES["bCover"]["tmp_name"], $bCover);
        
        // Update book with new image
        $sql = "UPDATE book SET bName = ?, bAuthor = ?, bCover = ?, bPrice = ? WHERE bid = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssdi", $bName, $bAuthor, $bCover, $bPrice, $bid);
    } else {
        // Update book without changing the image
        $sql = "UPDATE book SET bName = ?, bAuthor = ?, bPrice = ? WHERE bid = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssdi", $bName, $bAuthor, $bPrice, $bid);
    }

    if ($stmt->execute()) {
        echo "<h2>Book updated successfully!</h2>";
        header("refresh: 3; url=book.php");
    } else {
        echo "<h2>Error: </h2>" . $stmt->error;
        header("refresh: 3; url=book.php");
    }

    $stmt->close();
    $conn->close();
}
?>
</body>
</html>