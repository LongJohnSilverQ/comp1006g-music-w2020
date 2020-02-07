<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>NHL Teams</title>
</head>
<body>
<?php
$db = new PDO('mysql:host=172.31.22.43;dbname=Awais1110642', 'Awais1110642', 'flA8Dz-xDy');
$query = "select * from teams;";
$cmd = $db->prepare($query);
$cmd->execute();
$teams = $cmd->fetchAll();
echo "<table border='1'><thead><th>City</th><th>Nickname</th><th>Division</th></thead>";
foreach ($teams as $data) {
    echo "<tr><td>" . $data['city'] . "</td><td>" . $data['nickname'] . "</td><td>" . $data['division'] . "</td></tr>";
}
echo "</table>";
$db = null;
?>
</body>
</html>