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
//require 'conn.php';
include 'conn.php'; // Include your database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password']; // Encrypt the password
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];

// Check if email already exists
$check_email_sql = "SELECT * FROM users WHERE email = ?";
$stmt = $conn->prepare($check_email_sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Email already exists
    echo "<h2>Email already exists. Please use a different email.</h2>";
    header("refresh: 3; url=signup.html"); // Redirect back to the signup page
} else {
    // Insert new user
    $sql = "INSERT INTO users (username, email, password, fName, lName) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $username, $email, $password, $first_name, $last_name);
    
    if ($stmt->execute()) {
        echo "<h2>User registered successfully!</h2>";
        header("refresh: 3; url=login.html"); // Redirect to login page
    } else {
        echo "Error: " . $stmt->error;
        header('Location: signup.html');
    }
}

$stmt->close();
}
?>
</body>
</html>
