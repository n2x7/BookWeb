<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>this webpage show insert data</title>
    <link rel="stylesheet" href="1login.css">
</head>
<body>
<?php
    require 'conn.php';
    $sql_update="INSERT INTO users(uid,fName,lName,username,password,email) VALUES ('$_POST[uid]','$_POST[fName]','$_POST[lName]' ,'$_POST[username]' ,'$_POST[password]','$_POST[email]')";

    $result= $conn->query($sql_update);

    if(!$result) {
        die("Error God Damn it : ". $conn->error);
    } else {

    echo "<h2>Insert Success</h2> <br>";
    header("refresh: 1; url=user.php");
    }

?> 

</body>
</html>