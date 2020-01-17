<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<?php
// save the form inputs to variables (optional but recommended)
$name = $_POST['name'];
$yearFounded = $_POST['yearFounded'];
$website = $_POST['website'];

echo $name;

// connect to db
//$db = new PDO('mysql:host=aws.computerstudi.es;dbname=gcxxxxxx', 'gcxxxx', 'your-passsword');
$db = new PDO('mysql:host=mysql7.loosefoot.com;dbname=musicdb', 'comp1006g', 'Lakehead2019');

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
echo "Artist Saved";
?>

</body>
</html>
