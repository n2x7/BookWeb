<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="1login.css">
</head>
<body>
    <?php
    require  'conn.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Login สำเร็จ
        echo "<h2> Login successful! </h2>";
        header("refresh: 2; url=mainmenu.html");
    } else {
        // Login ล้มเหลว
        echo "<h2>Invalid username or password</h2>";
        header("refresh: 2; url=login.html");
    }
?>
</body>
</html>
