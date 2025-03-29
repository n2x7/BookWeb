<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Result</title>
    <link rel="stylesheet" href="searchb.css">
</head>
<body>
    <nav class="bar">
        <section class="logo">
            NamYoKo
        </section>
    </nav>
<?php
    include 'conn.php'; 

    // ตรวจสอบว่ามีคำค้นหามาจากฟอร์มหรือไม่
    if (isset($_GET['query'])) {
        $search_query = $_GET['query'];

        // คำสั่ง SQL เพื่อค้นหาหนังสือที่มีชื่อหนังสือหรือชื่อผู้แต่งที่ตรงกับคำค้นหา
        $sql = "SELECT * FROM book WHERE bName LIKE ? OR bAuthor LIKE ?";
        $stmt = $conn->prepare($sql);
        $search_term = "%" . $search_query . "%";
        $stmt->bind_param("ss", $search_term, $search_term);
        $stmt->execute();
        $result = $stmt->get_result();

        // แสดงผลการค้นหา
        if ($result->num_rows > 0) {
            echo "<h2>Search Results:</h2>";
            echo "<table border='1'>
                    <tr>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Price</th>
                    </tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row['bName'] . "</td>
                        <td>" . $row['bAuthor'] . "</td>
                        <td>฿" . $row['bPrice'] . "</td>
                        </tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No results found for '<strong>$search_query</strong>'.</p>";
        }

        $stmt->close();
    }

    $conn->close();
    ?>
    <div class="footer">
        <p>
            © 2024 NamYoKo. All rights reserved.
        </p>
    </div>
</body>
</html>