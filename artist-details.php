<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Artist Details</title>
</head>
<body>

<h1>Artist Details</h1>

<?php
// store the artist name selection in variable
$name = $_POST['name'];

// connect
$db = new PDO('mysql:host=172.31.22.43;dbname=Rich100', 'Rich100', 'Vda787-KJ_');

// set up a query to fetch the selected artist
$sql = "SELECT * FROM artists WHERE name = :name";
$cmd = $db->prepare($sql);
$cmd->bindParam(':name', $name, PDO::PARAM_STR, 50);
$cmd->execute();
$artist = $cmd->fetch();  // use fetch for a single record instead of fetchAll for a list of records

// output the other column values for the selected artist
echo 'Year Founded: ' . $artist['yearFounded'] . '<br />';
echo 'Web Site: <a href="' . $artist['website'] . '" target="_new">' . $artist['website'] . '</a><br />';

// disconnect
$db = null;
?>

</body>
</html>
