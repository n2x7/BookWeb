<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>this is webpage for edit data</title>
    <link rel="stylesheet" href="addb.css">
</head>
<body>
<?php
        if(!isset($_GET['uid'])){
            header("refresh: 0; url=user.php");
        }
        require 'conn.php';
        $sql = "SELECT * FROM users WHERE uid='$_GET[uid]'";
        $result = $conn->query($sql);
        $row = mysqli_fetch_array($result);
    ?>
    <nav class="bar">
        <section class="logo">
            NamYoKo
        </section>
    </nav>

    <h2>Edit User</h2>
    <form class="editu" method="post" action="editsuccessu.php">
        <p>

            <label>รหัสผู้ใช้</label>
            <input type="text" name="uid" id="uid" value="<?=$row['uid'];?>" hidden>
            <input type="text" name="uid" id="uid" value="<?=$row['uid'];?>" />

        </p>
        <p>

            <label>ชื่อ</label>
            <input type="text" name="uid" id="uid" value="<?=$row['uid'];?>" hidden>
            <input type="text" name="fName" id="fName" value="<?=$row['fName'];?>" />

        </p>

        <p>

            <label>นามสกุล</label>

            <input type="text" name="lName" id="lName" value="<?=$row['lName'];?>" />

        </p>

        <p>

            <label>ชื่อผู้ใช้</label>

            <input type="text" name="username" id="username" value="<?=$row['username'];?>" />

        </p>

        <p>

            <label>รหัสผ่าน</label>

            <input type="password" name="password" id="password" value="<?=$row['password'];?>" />

        </p>
        <p>

            <label>E-mail</label>

            <input type="email" name="email" id="email" value="<?=$row['email'];?>" />

        </p>
        <button type="submit">บันทึก</button>
        <hr>
        
    </form>

    <a href='user.php'><button class="main"> Main user menu</button></a>

    <div class="footer">
        <p>
            © 2024 NamYoKo. All rights reserved.
        </p>
    </div>

</body>
</html>