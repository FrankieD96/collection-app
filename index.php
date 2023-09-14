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
            <a href="addShirt.php">Add</a>
            <a href="#">Edit</a>
        </div>  
        <p>Search Bar goes here</p>
    </nav>
    <section class = main-section>
    <?php
    require_once 'ShirtsModel.php';
    require_once 'ShirtClass.php';
     $shirtsModel = new ShirtsModel($db);
     $shirtsData = $shirtsModel->getAllShirts();

     foreach($shirtsData as $shirt) {
        echo "<div class ='item-container'>";
        echo "<p class ='titles'>{$shirt->name}</p>";
        echo "<p>" . $shirt->season . " " . $shirt->type . " " . "kit</p>";
        echo "<div>";
        echo "<ul>";
        echo "<li>{$shirt->league_name}";
        echo "<li>{$shirt->country}";
        echo "<li>Made by {$shirt->brand_name}";
        echo "</div>";
        echo "<img class='image' src='{$shirt->img_url}'>";
        echo "</div>";
    }
    ?>
    </section>
</body>
</html>


