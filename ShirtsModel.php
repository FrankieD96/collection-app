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
        
        $data = $query->fetchAll();

        $shirts = [];

        foreach($data as $shirt) {
            $shirts[] = new Shirt(
                    $shirt['name'],
                    $shirt['season'],
                    $shirt['type'],
                    $shirt['brand_name'],
                    $shirt['league_name'],
                    $shirt['country'],
                    $shirt['img_url']    
            );
        }

        return $shirts;


    }
}