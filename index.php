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
<?php
// $query = $db->prepare(
//     "SELECT `teams`.`name`, `shirts`.`season`, `shirts`.`type`, `brands`.`name` as 'brand_name', `leagues`.`name` as 'league_name', `countries`.`name` as 'country' FROM `shirts`
// 	INNER JOIN `teams`
// 	ON `shirts`.`team_id` = `teams`.`id`
// 	INNER JOIN `brands`
// 	ON `shirts`.`brand_id` = `brands`.`id`
// 	INNER JOIN `leagues`
// 	ON `teams`.`league_id` = `leagues`.`id`
// 	INNER JOIN `countries`
// 	ON `leagues`.`country_id` = `countries`.`id`;");

// $query->execute();

// $shirts = $query->fetchALL();

// foreach($shirts as $shirt) {
//     echo "<div class='item-container'>";
//     echo "<h2>{$shirt['name']}</h2>";
//     echo "<p>" . $shirt['season'] . " " . $shirt['type'] . " " . "kit</p>";
//     echo "<div>";
//     echo "<ul>";
//     echo "<li>{$shirt['league_name']}";
//     echo "<li>{$shirt['country']}";
//     echo "<li>Made by {$shirt['brand_name']}";
//     echo "</div>";
//     echo "</div>";
// }


