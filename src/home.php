<?php

$db = new PDO('mysql:host=db; dbname=collector_app', 'root', 'password');
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$query = $db->prepare(
    "SELECT `teams`.`name`, `shirts`.`season`, `shirts`.`type`, `brands`.`name` as 'brand_name', `leagues`.`name` as 'league_name', `countries`.`name` as 'country' FROM `shirts`
	INNER JOIN `teams`
	ON `shirts`.`team_id` = `teams`.`id`
	INNER JOIN `brands`
	ON `shirts`.`brand_id` = `brands`.`id`
	INNER JOIN `leagues`
	ON `teams`.`league_id` = `leagues`.`id`
	INNER JOIN `countries`
	ON `leagues`.`country_id` = `countries`.`id`;");

$query->execute();

$shirts = $query->fetchALL();

foreach($shirts as $shirt) {
    echo "<div>";
    echo "<h2>{$shirt['name']}</h2>";
    echo "<p>" . $shirt['season'] . " " . $shirt['type'] . " " . "kit</p>";
    echo "<div>";
    echo "<ul>";
    echo "<li>{$shirt['league_name']}";
    echo "<li>{$shirt['country']}";
    echo "<li>{$shirt['brand_name']}";
    echo "</div>";
    echo "</div>";
}


