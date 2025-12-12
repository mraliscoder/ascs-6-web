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
                <h1 class="mb-4">Registration</h1>
                <form action="/registration.php" method="POST" class="d-flex flex-column gap-3">
                    <input type="text" name="login" placeholder="Login" class="form-control-hacker-input">
                    <input type="email" name="email" placeholder="Email" class="form-control-hacker-input">
                    <input type="password" name="password" placeholder="Password" class="form-control-hacker-input">
                    <button class="btn btn-primary" type="submit" name="submit">Register</button>
                    <p class="mt-3">Already have an account? <a href="/login.php">Login</a></p>
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
    $email = $_POST['email'];
    $pass = $_POST['password'];

    if (!$login || !$email || !$pass) {
        die("Input all parameters");
    }

    $sql = "INSERT INTO users(username, email, pass) VALUES('$login', '$email', '$pass')"; // ну кто хранит пароли в открытом виде то, а?!
    if (!mysqli_query($link, $sql))
        die("Failed to add user to database");

    header("Location: /login.php");
    exit();
}

?>