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
$sql_update="UPDATE users SET fName='$_POST[fName]',lName='$_POST[lName]' ,username='$_POST[username]' ,password='$_POST[password]',email='$_POST[email]' WHERE uid='$_POST[uid]' ";

            $result= $conn->query($sql_update);

            if(!$result) {
                die("Error God Damn it : ". $conn->error);
            } else {

            echo "<h2>Edit Success </h2><br>";
            header("refresh: 3; url=user.php");
            }

        ?>

</body>
</html>