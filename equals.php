<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>


<?php

$password = 'abc';
$confirm = 'def';

if ($password = $confirm) {
    echo 'values are the same<br />';
    echo 'password: ' . $password . '<br />';
    echo 'confirm: ' . $confirm . '<br />';
}
else {
    echo 'values are different';
}

?>
</body>
</html>
