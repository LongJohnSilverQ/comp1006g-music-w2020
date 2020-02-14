<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css" />
</head>
<body>

<main class="container">
    <h1>Login</h1>
    <form method="post" action="validate.php">
        <fieldset class="form-group">
            <label for="username" class="col-md-2">Username:</label>
            <input name="username" id="username" required type="email" placeholder="email@email.com" />
        </fieldset>
        <fieldset class="form-group">
            <label for="password" class="col-md-2">Password:</label>
            <input type="password" name="password" id="password" required />
        </fieldset>
        <div class="offset-md-2">
            <input type="submit" value="Login" class="btn btn-info" />
        </div>
    </form>
</main>

<script src="js/scripts.js"></script>

</body>
</html>