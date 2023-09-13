<?php

class ShirtsModel
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getAllShirts()
    {
        $query = $this->db->prepare(
            "SELECT `teams`.`name`, `shirts`.`season`, `shirts`.`type`, `brands`.`name` as 'brand_name', `leagues`.`name` as 'league_name', `countries`.`name` as 'country', `shirts`.`img_url` FROM `shirts`
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
            echo "<div class='item-container'>";
            echo "<h2>{$shirt['name']}</h2>";
            echo "<p>" . $shirt['season'] . " " . $shirt['type'] . " " . "kit</p>";
            echo "<div>";
            echo "<ul>";
            echo "<li>{$shirt['league_name']}";
            echo "<li>{$shirt['country']}";
            echo "<li>Made by {$shirt['brand_name']}";
            echo "</div>";
            echo "<img class='image' src='{$shirt['img_url']}'>";
            echo "</div>";
        }


    }
}