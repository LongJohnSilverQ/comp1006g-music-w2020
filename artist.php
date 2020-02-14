<?php
// auth check
session_start();

// make this page private
if (empty($_SESSION['userId'])) {
    header('location:login.php');
    exit();
}

// are we adding or editing?  if editing, get the selected artist to populate the form
// initialize variables for each field
$artistId = null;
$name = null;
$yearFounded = null;
$website = null;

// if an id parameter is passed in the url, we are editing
if (!empty($_GET['artistId'])) {
    $artistId = $_GET['artistId'];

    // connect
    $db = new PDO('mysql:host=172.31.22.43;dbname=Rich100', 'Rich100', 'V');

    // fetch the selected artist
    $sql = "SELECT * FROM artists WHERE artistId = :artistId";
    $cmd = $db->prepare($sql);
    $cmd->bindParam(':artistId', $artistId, PDO::PARAM_INT);
    $cmd->execute();

    // use fetch without a loop instead of fetchAll with a loop as we're only selecting a single record
    $artist = $cmd->fetch();
    $name = $artist['name'];
    $yearFounded = $artist['yearFounded'];
    $website = $artist['website'];

    // disconnect
    $db = null;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Artist Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css" />
</head>
<body>
    <h1>Artist Details</h1>
    <form action="save-artist.php" method="post">
        <fieldset>
            <label for="name" class="col-sm-2">Name: *</label>
            <input name="name" id="name" required value="<?php echo $name; ?>" />
        </fieldset>
        <fieldset>
            <label for="yearFounded" class="col-sm-2">Year Founded:</label>
            <input name="yearFounded" id="yearFounded" type="number" min="1000"
                   value="<?php echo $yearFounded; ?>"
                   max="<?php echo date("Y") ?>" />
        </fieldset>
        <fieldset>
            <label for="website" class="col-sm-2">Web Site:</label>
            <input name="website" id="website" type="url" value="<?php echo $website; ?>" />
        </fieldset>
        <input name="artistId" id="artistId" value="<?php echo $artistId; ?>" type="hidden" />
        <button class="btn btn-primary offset-sm-2">Save</button>
    </form>
</body>
</html>
