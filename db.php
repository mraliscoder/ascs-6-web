<?php

$hostname = "127.0.0.1";
$username = "root";
$password = "IKnowThisIsVeryInsecurePasswordButWhatYouWillDoWithThat";
$name = "ascs";

// $link = mysqli_connect($hostname, $username, $password);
// if (!$link) {
//     die("Database connection failure: " . mysqli_connect_error());
// }

// $sql = "CREATE DATABASE IF NOT EXISTS $name"; // в документации забыта буква S в слове EXISTS, аккуратнее :3
// if (!mysqli_query($link, $sql)) {
//     echo "Failed to create database";
// }
// mysqli_close($link);

$link = mysqli_connect($hostname, $username, $password, $name);
if (!$link) {
    die("Database connection failure: " . mysqli_connect_error());
}

// $sql = "CREATE TABLE IF NOT EXISTS users(
//     id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
//     username VARCHAR(50) NOT NULL,
//     email VARCHAR(50) NOT NULL,
//     pass VARCHAR(50) NOT NULL
// )";

// if (!mysqli_query($link, $sql)) {
//     echo "Failed to create table users";
// }

// $sql = "CREATE TABLE IF NOT EXISTS posts(
//     id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
//     title VARCHAR(20) NOT NULL,
//     main_text VARCHAR(400) NOT NULL
// )";

// if (!mysqli_query($link, $sql)) {
//     echo "Failed to create table posts";
// }
// mysqli_close($link);