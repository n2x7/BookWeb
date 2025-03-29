
<?php
require 'conn.php';

// ตรวจสอบว่ามีการส่งค่ามาและรับค่าจาก GET parameter
if (isset($_GET['bid'])) {
    $bid = $_GET['bid'];
    
    // ดึงข้อมูลหนังสือจากฐานข้อมูล
    $sql = "SELECT * FROM book WHERE bid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $bid);
    $stmt->execute();
    $result = $stmt->get_result();
    
    // ตรวจสอบว่ามีข้อมูลหรือไม่
    if ($result->num_rows > 0) {
        $book = $result->fetch_assoc();
    } else {
        echo "No book found!";
        exit;
    }
    
    $stmt->close();
} else {
    echo "No book ID provided!";
    exit;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>
    <link rel="stylesheet" href="addb.css">
</head>
<body>
<nav class="bar">
        <section class="logo">
            NamYoKo
        </section>
    </nav>
    <h2>Edit Book</h2>
    <form action="updateb.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="bid" value="<?php echo $book['bid']; ?>">
        <div>
            <label for="bName">Book Title:</label>
            <input type="text" name="bName" id="bName" value="<?php echo $book['bName']; ?>" required>
        </div>
        <div>
            <label for="bAuthor">Author:</label>
            <input type="text" name="bAuthor" id="bAuthor" value="<?php echo $book['bAuthor']; ?>" required>
        </div>
        <div>
            <label for="bCover">Cover Image (leave blank to keep current image):</label>
            <input type="file" name="bCover" id="bCover">
        </div>
        <div>
            <label for="bPrice">Price:</label>
            <input type="number" step="0.01" name="bPrice" id="bPrice" value="<?php echo $book['bPrice']; ?>" required>
        </div>
        <button type="submit">Update Book</button>
    </form>
    <div class="footer">
        <p>
            © 2024 NamYoKo. All rights reserved.
        </p>
    </div>

</body>
</html>
</body>
</html>