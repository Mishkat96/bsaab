<?php
require_once 'Auth/assets/php/commonClass.php';
session_start();
$obj = new DatabaseQuery();
$ip_address = $_SERVER['REMOTE_ADDR'];
$user_agent = $_SERVER['HTTP_USER_AGENT'];
$visit_date = date('Y-m-d');

if (!isset($_COOKIE['has_visited'])) {
    setcookie('has_visited', 'true', time() + (86400 * 30), "/"); // 86400 = 1 day
    // checking unique visitor
    $check = $obj->getData('site_visitors', '*', array('ip_address' => $ip_address, 'visit_date' => $visit_date));
    if (!$check) {
        $obj->insertData('site_visitors', array('ip_address' => $ip_address, 'visit_date' => $visit_date, 'user_agent' => $user_agent));
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bangladesh Student Association in Belgium</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <style>

    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary container" >
        <div class="container-fluid" style="background:#fff">
            <a class="navbar-brand" href="home.php"><img
                    src="assets/img/final logo with correction without background-01.png" width="100px" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="home.php#members">Members</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="home.php#carouselExampleControlsNoTouching">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="notic.php">Notice</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="home.php#about">About</a>
                    </li>
                    <li class="nav-item" id="contactBtn">
                        <a class="nav-link " href="contact-us.php">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>