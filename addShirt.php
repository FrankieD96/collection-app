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
        <form action = "addShirtAction.php">
            <label for = "tname">Team name</label>
            <input type = "text" id = "tname" name = "tname"><br>
            <label for = "season">Season</label>
            <input type = "text" id = "season" name = "season" placeholder = "yyyy/yy"><br>
            <label for = "type">Type</label>
            <select id = "type" name = "type">
                <option value = "home">home</option>
                <option value = "away">away</option>
                <option value = "third">third</option>
            </select><br>
            <label for = "league">League</label>
            <input type = "text" id = "league" name = "league"><br>
            <label for = "country">Country</label>
            <input type = "text" id = "country" name = "country"><br>
            <label for = "brand">Brand</label>
            <input type = "text" id = "brand" name = "brand"><br>
            <label for = "imgUrl">Image URL</label>
            <input type = "text" id = "imgUrl" name = "imgUrl">
        </form>
    </section>

</body>
</html>