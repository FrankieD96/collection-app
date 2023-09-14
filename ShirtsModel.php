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

    public function addNewShirt($inputtedName, $inputtedSeason, $inputtedType, $inputtedBrand_name, $inputted_img_url)
    {
        $query = $this->db->prepare(
            "INSERT INTO `shirts` (`team_id`,`season`, `type`, `brand_id`, `img_url`)
             VALUES (:name, :season, :type, :brand_name, :img_url);");

        $query->bindParam('name', $inputtedName);
        $query->bindParam('season', $inputtedSeason);
        $query->bindParam('type', $inputtedType);
        $query->bindParam('brand_name', $inputtedBrand_name);
        $query->bindParam('img_url', $inputted_img_url);

        $query->execute();
    }

    public function getTeams()
    {
        $query = $this->db->prepare("SELECT `teams`.`name`, `teams`.`id` FROM `teams`;");
        $query->execute();
        $teams = $query->fetchAll();
        return $teams;   
    }

    public function getLeagues()
    {
        $query = $this->db->prepare("SELECT `leagues`.`name`, `leagues`.`id` FROM `leagues`;");
        $query->execute();
        $leagues = $query->fetchAll();
        return $leagues;  
    }

    public function getCountries()
    {
        $query = $this->db->prepare("SELECT `countries`.`name`, `countries`.`id` FROM `countries`;");
        $query->execute();
        $countries = $query->fetchAll();
        return $countries;  
    }

    public function getBrands()
    {
        $query = $this->db->prepare("SELECT `brands`.`name`, `brands`.`id` FROM `brands`;");
        $query->execute();
        $brands = $query->fetchAll();
        return $brands;  
    }
}