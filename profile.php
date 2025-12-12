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
    <nav class="navbar navbar-dark bg-dark p-3">
        <div class="container-fluid">
            <a href="#" class="navbar-brand d-flex align-items-center">
                <img src="logohack.webp" alt="Site logo" class="me-2">
                <span class="text-light">History</span>
            </a>
            <?php if (isset($_COOKIE['User'])): ?>
                <form action="/logout.php" method="POST" class="d-flex">
                    <button class="btn btn-outline-danger" type="submit">Logout</button>
                </form>
            <?php endif; ?>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="story-container">
            <div class="story-text">
                <p>Когда мы с мишей учились в шестом классе, к нам привели Стаса. Человеком он был неадекватным, но вроде как не по своей вине. Страдал он от какого-то там отклонения типа нарколепсии (когда люди засыпают неожиданно), только он не засыпал, а залипал. Наглухо причём. То-есть сначала он во что-то втыкал, а потом ни стого, ни с сего стопорился и пускал слюну. Приходил в себя только после того, как весь класс с криками «зырьте, ребза, у придурка опять батарейки сели!» начинал отвешивать ему подзатыльники под затылок и подсрачники под сраку. За глаза его называли дурачком, но говорить такое в лицо было как-то оскорбительно, поэтому обозвали Стасика нейтрально — Писюном.</p>
            </div>
            <img src="hack1.webp" alt="Hacker's photo" class="hacker-img">
        </div>
        <div class="text-center mt-4">
            <button id="toggleButton" class="btn btn-primary">Open</button>
        </div>
        <div class="mt-3 text-center" id="extraImage" style="display: none;">
            <img src="hack2.webp" alt="Hidden picture" class="hacker-img">
        </div>
        <div class="mt-5">
            <h2 class="text-center mb-4">Add New Post <?php $username1 = $_COOKIE['User']; echo "$username1"; /* а зачем кавычки? */ ?></h2>
            <form action="profile.php" id="postForm" class="d-flex flex-column gap-3" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="postTitle" class="form-label">Post Title</label>
                    <input type="text" name="postTitle" placeholder="Enter post title" class="form-control hacker-input" id="postTitle" required>
                </div>
                <div class="form-group">
                    <label for="postContent" class="form-label">Post Content</label>
                    <textarea name="postContent" placeholder="Enter post title" class="form-control hacker-input" id="postContent" rows="5" required></textarea>
                </div>
                <div class="form-group">
                    <label for="postTitle" class="file">Upload file</label>
                    <input type="file" name="file" class="form-control hacker-input" id="file">
                </div>
                <button class="btn btn-primary" type="submit" name="submit">Save Post</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
</body>
</html>

<?php
if (!isset($_COOKIE['User'])) {
    header('Location: /login.php');
    exit;
}

require_once "db.php";

if (isset($_POST['submit'])) {
    $title = $_POST['postTitle'];
    $main_text = $_POST['postContent'];

    if (!$title || !$main_text) die("No post data");

    $pictureData = "";

    if (!empty($_FILES['file'])) {
        $allowedMimeTypes = ["image/gif", "image/jpeg", "image/jpg", "image/pjpeg", "image/x-png", "image/png"];
        if (@in_array($_FILES['file']['type'], $allowedMimeTypes) && (@$_FILES['file']['size'] < 102400)) {
            move_uploaded_file($_FILES['file']['tmp_name'], "upload/" . $_FILES['file']['name']);
            echo "Picture uploaded<br>";
            $pictureData = "<img src='/upload/" . $_FILES['file']['name'] . "' alt='Article img'><br>";
        } else {
            echo "Upload failed";
        }
    }

    $main_text = htmlentities($pictureData) . $main_text;

    $sql = "INSERT INTO posts(title, main_text) VALUES('$title', '$main_text')";
    if (!mysqli_query($link, $sql)) {
        die("Failed to insert post data: " . mysqli_error($link));
    }
    echo "Post saved!";
}

?>