<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Books</title>
    <link rel="stylesheet" href="addb.css">
</head>
<body>
    <nav class="bar">
        <section class="logo">
            NamYoKo
        </section>
    </nav>
    <h2>Search Books</h2>
    <form action="searchb.php" method="GET">
        <input type="text" name="query" placeholder="Enter book title or author" required>
        <button type="submit">Search</button>
    </form>
    <div class="footer">
        <p>
            © 2024 NamYoKo. All rights reserved.
        </p>
    </div>
</body>
</html>