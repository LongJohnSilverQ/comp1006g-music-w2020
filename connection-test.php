<!DOCTYPE html>
<html>
<head>
    <title>Database Connection</title>
</head>
<body>
<?php
// aws
//$db = new PDO('mysql:host=aws.computerstudi.es;dbname=gcc200409537', 'gcc200409537', 'x');

// loosefoot
$db = new PDO('mysql:host=mysql7.loosefoot.com;dbname=musicdb', 'comp1006g', 'x');
if (!$db)  {
    echo 'could not connect';
}
else {
    echo 'connected to the database';
}
$db = null;
?>
</body>
</html>

