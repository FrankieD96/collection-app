<?php

class Shirt 
{
    public string $name;
    public string $season;
    public string $type;
    public string $brand_name;
    public string $league_name;
    public string $country;
    public string $img_url;

    public function __construct(
        string $name,
        string $season,
        string $type,
        string $brand_name,
        string $league_name,
        string $country,
        string $img_url
        )
    {
        $this->name = $name;
        $this->season = $season;
        $this->type = $type;
        $this->brand_name = $brand_name;
        $this->league_name = $league_name;
        $this->country = $country;
        $this->img_url = $img_url;
    }

}