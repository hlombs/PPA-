<?php
session_start();
$user = $_SESSION['Id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <nav>
    <a href="home.php"> Home</a>
    <a href="profile.php">Profile</a>
    <a href="card.php">View Card </a>
    <a href="results.php">Results</a>
    <a href="viewEvents.php">Events</a>
    </nav>
</body>
<h1> Hello There , Welcome to Power Pedal Association</h1>
<style>
        nav{
        display: flex;
        width: 100%;
        justify-content: space-around;
        list-style-type: none;
        background-color: lightseagreen;
       
        height: 30px;
        align-items: center;
        margin-bottom: 30px;
    }
    a{
        text-decoration: none;
        color: white;
        
        
    }
</style>

</html>