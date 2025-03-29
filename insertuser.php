<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>this page show inserting</title>
    <link rel="stylesheet" href="addb.css">
</head>
<body>
    <nav class="bar">
        <section class="logo">
            NamYoKo
        </section>
    </nav>
    <h2>Insert New User</h2>
<form class="insertu" method="post" action="insertbiosuccessu.php">
        <p>

            <label>รหัสผู้ใช้</label>
            <input type="text" name="uid" id="uid">

        </p>
        <p>

            <label>ชื่อ</label>
            <input type="text" name="fName" id="fName">

        </p>

        <p>

            <label>นามสกุล</label>

            <input type="text" name="lName" id="lName">

        </p>

        <p>

            <label>ชื่อผู้ใช้</label>

            <input type="text" name="username" id="username">

        </p>

        <p>

            <label>รหัสผ่าน</label>
        
            <input type="password" name="password" id="password">


        </p>
        <p>

            <label>E-mail</label>
        
            <input type="email" name="email" id="email">


        </p>
        <button type="submit"> บันทึก</button>
        <hr>
        
    </form>
    <a href='user.php'><button class="main"> Main User menu</button></a>

    <div class="footer">
        <p>
            © 2024 NamYoKo. All rights reserved.
        </p>
    </div>

</body>
</html>