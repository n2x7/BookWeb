<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book List</title>
    <link rel="stylesheet" href="book1.css">
</head>
<body>
    <?php
    require 'conn.php';
    $sql = "SELECT * FROM book";
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

    <div class="exit">
        <a href="mainmenu.html"><img style="width:50px ;,height:50px ;" src="reject.png" alt="exit icon"></a>
    </div>
    
    <h1>Book List</h1>

    <div class="plus">
            <a href="addb.html"><img style="width:50px ;,height:50px ;" src="plus.png" alt="Insert button"></a>
    </div>

    <div class="search" style="margin-left:40%;">
        <h2 style="color:white;">Search Books</h2>
        <form action="searchb.php" method="GET">
            <input type="text" name="query" placeholder="Enter book title or author" required>
            <button type="submit">Search</button>
        </form>
    </div>
    
    <div class="container">
        <?php if ($result->num_rows > 0): ?>
            <?php while($row = $result->fetch_assoc()): ?>
                <div class="book-card">
                    <img src="<?php echo $row['bCover']; ?>" alt="Book Cover">
                    <h2><?php echo $row['bName']; ?></h2>
                    <p class="author">by <?php echo $row['bAuthor']; ?></p>
                    <p class="price">Price: ฿<?php echo $row['bPrice']; ?></p>
                    <a href="editb.php?bid=<?php echo $row['bid']; ?>"><button class="edit" type="button">Edit</button></a>
                    <form action="deleteb.php" method="post">
                        <input type="hidden" name="bid" value="<?php echo $row['bid']; ?>">
                        <button class="del" type="submit">Delete</button>
                    </form>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No books found.</p>
        <?php endif; ?>
    </div>

    <?php $conn->close(); ?>
    
    <div class="footer">
        <p>
            © 2024 NamYoKo. All rights reserved.
        </p>
    </div>
</body>
</html>