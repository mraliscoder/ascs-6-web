<?php

$link = mysqli_connect("localhost", "root", "IKnowThisIsVeryInsecurePasswordButWhatYouWillDoWithThat");
if (!$link) {
    // Вы тут немного забыли $link передать
    die("Error: " . mysqli_error($link));
}

echo 'Good!';
mysqli_close($link);