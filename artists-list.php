<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Artist List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<h1>Artist List</h1>
<a href="artist.php">Add a New Artist</a>

<?php
// 1. Connect to the db.  Host: 172.31.22.43, DB: dbNameHere, Username: usernameHere, PW: passwordHere
$db = new PDO('mysql:host=172.31.22.43;dbname=Rich100', 'Rich100', 'V');

//  2. Write the SQL Query to read all the records from the artists table and store in a variable ; is optional at the end
$query = "SELECT * FROM artists;";

// 3. Create a Command variable $cmd then use it to run the SQL Query
$cmd = $db->prepare($query);
$cmd->execute();

// 4. Use the fetchAll() method of the PDO Command variable to store the data into a variable called $persons.  See  for details.
$artists = $cmd->fetchAll();

// 4a. Create a grid with a header row
echo '<table class="table table-striped table-hover"><thead><th>Name</th><th>Year Founded</th><th>Website</th></thead>';

// 5. Use a foreach loop to iterate (cycle) through all the values in the $artists variable.  Inside this loop, use an echo command to display the name of each person.  See https://www.php.net/manual/en/control-structures.foreach.php for details.
foreach ($artists as $value) {
    // could use this but it's unclear and error prone: echo $value[1];
    echo '<tr><td><a href="artist.php?artistId=' . $value['artistId'] . '">' . $value['name'] . '</a></td>
        <td>' . $value['yearFounded'] . '</td>
        <td>' . '<a href="' . $value['website'] . '" target="_new">' . $value['website'] . '</a></td>
        <td><a href="delete-artist.php?artistId=' . $value['artistId'] . '" class="btn btn-danger"
            onclick="return confirmDelete();">Delete</a></td>
        </tr>';
}

// 5a. End the HTML table
echo '</table>';

// 6. Disconnect from the database
$db = null;
?>

<!-- js -->
<script src="js/scripts.js" type="text/javascript"></script>

</body>
</html>

