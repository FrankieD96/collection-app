<?php

require_once 'ShirtsModel.php';

$db = new PDO('mysql:host=db; dbname=collector_app', 'root', 'password');
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$inputtedName = $_POST['name'] ?? false;
$inputtedSeason = $_POST['season'] ?? false;
$inputtedType = $_POST['type'] ?? false;
$inputtedBrand_name = $_POST['brand_name'] ?? false;
$inputted_img_url = $_POST['img_url'] ?? false;

$shirtsModel = new shirtsModel($db);
$shirtsModel->addNewShirt($inputtedName, $inputtedSeason, $inputtedType, $inputtedBrand_name, $inputted_img_url);

header('Location: addShirt.php?shirtadded=true');
?>
<p>Shirt added!</p>

