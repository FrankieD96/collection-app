<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Template</title>

    <meta name="description" content="Template HTML file">
    <meta name="author" content="iO Academy">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="css/styles.css">

    <link rel="icon" href="images/favicon.png" sizes="192x192">
    <link rel="shortcut icon" href="images/favicon.png">
    <link rel="apple-touch-icon" href="images/favicon.png">

    <script defer src="js/index.js"></script>
</head>
<?php

$db = new PDO('mysql:host=db; dbname=collector_app', 'root', 'password');
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
?>

<body>
    <nav class = 'navbar'>
        <h2>Footie Shirts: My Collection</h2>
        <div class = 'nav-links'>
            <a href="index.php">Home</a>
            <a href="#">Add</a>
            <a href="#">Edit</a>
        </div>  
        <form>
            <input type="text" placeholder="search" name="search">
            <button type=submit>Search</button>  
        </form>    
    </nav>
    <section class = main-section>
    <?php
    require_once 'ShirtsModel.php';
     $shirtsModel = new ShirtsModel($db);
     $allShirts = $shirtsModel->getAllShirts();
    ?>
    </section>
</body>
</html>


