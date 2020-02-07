<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Saving Artist Details...</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>
<body>

<h1>Attempting to Save Artist</h1>

<?php
// save the form inputs to variables (optional but recommended)
$name = htmlspecialchars($_POST['name']);
$yearFounded = $_POST['yearFounded'];
$website = htmlspecialchars($_POST['website']);

echo $name;

// validate inputs
$ok = true;

if (empty($name)) {
    echo 'Name is required<br />';
    $ok = false;
}

if (!empty($yearFounded)) {
    if ($yearFounded < 1000 || $yearFounded > date("Y")) {
        echo 'Year must be between 1000 and ' . date("Y") . '<br />';
        $ok = false;
    }
}

if (!empty($website)) {
    if (substr($website, 0, 4) != 'http') {
        echo 'Web Site is invalid<br />';
        $ok = false;
    }
}

if ($ok) {
    // connect to db
    $db = new PDO('mysql:host=172.31.22.43;dbname=Rich100', 'Rich100', 'V');
//$db = new PDO('mysql:host=mysql7.loosefoot.com;dbname=musicdb', 'comp1006g', 'x');

// set up the SQL INSERT command - use 3 paramter placeholders for the values (prefixed with :)
    $sql = "INSERT INTO artists (name, yearFounded, website) VALUES (:name, :yearFounded, :website)";

// create a PDO command object and fill the parameters 1 at a time for type & safety checking
    $cmd = $db->prepare($sql);
    $cmd->bindParam(':name', $name, PDO::PARAM_STR, 50);
    $cmd->bindParam(':yearFounded', $yearFounded, PDO::PARAM_INT);
    $cmd->bindParam(':website', $website, PDO::PARAM_STR, 100);

// try to send / save the data
    $cmd->execute();

// disconnect
    $db = null;

// show message to user
    echo '<h2 class="alert alert-success">Artist Saved</h2>';
}

?>

</body>
</html>
