<?php

$db = new PDO('mysql:host=db; dbname=collector_app', 'root', 'password');
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$query = $db->prepare(
    "SELECT `teams`.`name`, `shirts`.`season`, `shirts`.`type` FROM `shirts`
    INNER JOIN `teams`
    ON `shirts`.`team_id` = `teams`.`id`;");

$query->execute();

$shirts = $query->fetchALL();

foreach($shirts as $shirt) {
    echo "<div>";
    echo "<h2>{$shirt['name']}</h2>";
    echo "<p>" . $shirt['season'] . " " . $shirt['type'] . " " . "kit</p>";
    echo "</div>";
}


