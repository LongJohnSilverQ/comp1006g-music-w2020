<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Artist Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <h1>Artist Details</h1>
    <form action="save-artist.php" method="post">
        <fieldset>
            <label for="name" class="col-sm-2">Name: *</label>
            <input name="name" id="name" required />
        </fieldset>
        <fieldset>
            <label for="yearFounded" class="col-sm-2">Year Founded:</label>
            <input name="yearFounded" id="yearFounded" type="number" min="1000" max="<?php echo date("Y") ?>" />
        </fieldset>
        <fieldset>
            <label for="website" class="col-sm-2">Web Site:</label>
            <input name="website" id="website" type="url" />
        </fieldset>
        <button class="btn btn-primary offset-sm-2">Save</button>
    </form>
</body>
</html>
