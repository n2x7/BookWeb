<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mainmenu for Users</title>
    <link rel="stylesheet" href="users.css">
</head>
<body>
<?php
    require 'conn.php';
    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);
    if(!$result){
        die("Error : ". $conn->$conn_error);
    }
?>
    <nav class="bar">
        <section class="logo">
            NamYoKo
        </section>
    </nav>
<h1>Users Information</h1><br>
        <table>
            <thead>
                <tr>
                    <th>รหัสผู้ใช้</th>
                    <th>ชื่อ-นามสกุล</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>แก้ไข</th>
                    <th>ลบ</th>
                </tr>
            </thead>
            <tbody>
                <?php // show data by fetch from database
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo"<tr><td>".$row["uid"]."</td>"."<td>".$row["fName"]." ".$row["lName"]."</td>"."<td>".$row["username"]."</td>"."<td>".$row["email"]."</td>"."<td>".$row["password"]."</td>"."<td>"."<a href='editu.php?uid=".$row["uid"]."'><button> Edit </button></a>"."</td>"."<td>"."<a href='deleteu.php?uid=".$row["uid"]."'><button> Delete </button></a>"."</td>";
                            echo "</tr>";
                        }
                    }else {
                        echo "0 results";
                    }
                    $conn->close();
                ?>
            </tbody>
        </table> 
        <br>
        <a href='insertuser.php'><button> Insert New User</button></a>
        <a href='mainmenu.html'><button>Main Menu</button></a>
    <div class="footer">
        <p>
            © 2024 NamYoKo. All rights reserved.
        </p>
    </div>
</html>