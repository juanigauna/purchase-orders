<?php
$userId = isset($_SESSION['id']) ? $_SESSION['id'] : null;
$loggedIn = isset($_SESSION['id']) ? true : false;
$rememberMe = isset($_COOKIE['remember_me']) ? true : false;
if ($loggedIn) {
    $query = mysqli_query($con, "SELECT * FROM users WHERE id = '$userId'");
    $session = $query->num_rows === 1 ? $query->fetch_array() : null;
}