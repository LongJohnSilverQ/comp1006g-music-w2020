<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Artist Dropdown List</title>
</head>
<body>

<form method="post" action="artist-details.php">
    <fieldset>
        <label for="name">Select an Artist</label>
        <select name="name" id="name">
            <?php
            // connect
            $db = new PDO('mysql:host=172.31.22.43;dbname=Rich100', 'Rich100', 'x');

            // write & run the query to get the artist names
            $sql = "SELECT name FROM artists";
            $cmd = $db->prepare($sql);
            $cmd->execute();
            $artists = $cmd->fetchAll();

            // loop through each record, and add each name to the dropdown using HTML <option></option> tags
            foreach ($artists as $value) {
                echo '<option>' . $value['name'] . '</option>';
            }

            // disconnect
            $db = null;
            ?>
        </select>
    </fieldset>
    <button>View Details</button>
</form>

</body>
</html>
