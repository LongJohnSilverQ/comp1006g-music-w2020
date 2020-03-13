<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<?php
// auth check
session_start();

// make this page private
require_once 'auth.php';
//if (empty($_SESSION['userId'])) {
//    header('location:login.php');
//    exit();
//}

// parse the artistId from the url parameter
$artistId = $_GET['artistId'];

try {
    // connect
    require_once 'db.php';

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
}
catch (Exception $e) {
    header('location:error.php');
    exit();
}

?>

</body>
</html>
