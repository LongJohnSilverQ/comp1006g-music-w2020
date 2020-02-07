<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<?php
// parse the artistId from the url parameter
$artistId = $_GET['artistId'];

// connect
$db = new PDO('mysql:host=172.31.22.43;dbname=Rich100', 'Rich100', 'V');

// create the SQL DELETE command
$sql = "DELETE FROM artists WHERE artistId = :artistId";

// pass the artistId parameter to the command
$cmd = $db->prepare($sql);
$cmd->bindParam(':artistId', $artistId, PDO::PARAM_INT);

// execute the deletion
$cmd->execute();

// disconnect
$db = null;

// redirect back to updated artists-list page
header('location:artists-list.php');
?>

</body>
</html>
