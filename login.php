<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ильин Эдуард</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="mb-4">Login</h1>
                <form action="/login.php" method="POST" class="d-flex flex-column gap-3">
                    <input type="text" name="login" placeholder="Login" class="form-control-hacker-input">
                    <input type="password" name="password" placeholder="Password" class="form-control-hacker-input">
                    <button class="btn btn-primary" type="submit" name="submit">Login</button>
                    <p class="mt-3">Don't have an account? <a href="/registration.php">Register</a></p>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>

<?php

require_once('db.php');
if (isset($_COOKIE['User'])) {
    header('Location: /profile.php');
    exit();
}

if (isset($_POST['submit'])) {
    $login = $_POST['login'];
    $pass = $_POST['password'];

    if (!$login || !$pass) {
        die("Input all parameters");
    }

    $sql = "SELECT * FROM users WHERE username='$login' AND pass='$pass'";
    $result = mysqli_query($link, $sql);
    if (mysqli_num_rows($result) == 1) {
        setcookie("User", $login, time()+7200);
        header("Location: /profile.php");
    } else {
        echo "Incorrect login or password";
    }
}

?>