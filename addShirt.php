<?php 
$db = new PDO('mysql:host=db; dbname=collector_app', 'root', 'password');
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
?>

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
<body>
    <nav class = 'navbar'>
        <h2>Footie Shirts: My Collection</h2>
        <div class = 'nav-links'>
            <a href="index.php">Home</a>
            <a href="addShirt.php">Add</a>
            <a href="#">Edit</a>
        </div>  
        <form>
            <input type="text" placeholder="search" name="search">
            <button type=submit>Search</button>  
        </form>    
    </nav>
    <section>
        <?php
        if(isset($_GET['shirtadded'])) {
            echo 'Shirt added to collection, add another below';
        }
        ?>
        <form action = "addShirtAction.php" method = "POST">
            <label for = "name">Team name</label>
            <select id = "name" name = "name">
                <?php
                    require_once 'ShirtsModel.php';
                    $shirtsModel = new ShirtsModel($db);
                    $teams = $shirtsModel->getTeams();
                    foreach ($teams as $team) {?>
                    <option value = "<?php  echo $team['id']; ?>"><?php echo $team['name']; ?></option>
                <?php } ?>
            </select><br>
            <label for = "season">Season</label>
            <input type = "text" id = "season" name = "season" placeholder = "yyyy/yy"><br>
            <label for = "type">Type</label>
            <select id = "type" name = "type">
                <option value = "home">home</option>
                <option value = "away">away</option>
                <option value = "third">third</option>
            </select><br>
            <label for = "brand_name">Brand</label>
            <select id = "brand_name" name = "brand_name">
                <?php
                    require_once 'ShirtsModel.php';
                    $shirtsModel = new ShirtsModel($db);
                    $brands = $shirtsModel->getBrands();
                    foreach ($brands as $brand) {?>
                    <option value = "<?php echo $brand['id']; ?>"><?php echo $brand['name']; ?></option>
                <?php } ?>
            </select><br>
            <label for = "img_url">Image URL</label>
            <input type = "text" id = "img_url" name = "img_url">
            <input type = "submit" value = "add shirt"/>
        </form>
    </section>
</body>
</html>