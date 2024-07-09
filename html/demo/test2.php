<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- <a href="/">Home</a>
    <span>|</span>
    <a href="/Products">Product</a>
    <span>|</span>
    <a href="/about">About Us</a>
    <span>|</span>
    <a href="/login">Login</a> -->

    <?php
    echo("you are in" . $_GET["city"] . ", " . $_GET["country"]);
    ?>
</body>
</html>