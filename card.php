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
<?php
    include 'member.php';
    ?>
    <?php
require_once('config.php');
    
// Create connection
$connection = mysqli_connect(SERVERNAME, USERNAME, PASSWORD,DATABASE) or die("Could not connect to the database");

    $query1 = "SELECT * from members where Id=$user ";
    $result1 = mysqli_query($connection,$query1) or die("Could not perform join query");
    
    $name="";$surname="";$id=0;$event="";
  
    while($row=mysqli_fetch_array($result1)){

        $id = $row['Id'];
        $name=$row['FirstName'];
        $surname=$row['Surname'];
       

        echo"<div>
        <h1>Membership Card</h1>
        <h3>$name $surname</h3>
        <h4>Emergency Personnel : Stanley Butler</h4>
        <h5>018 275 8247</h5>
     
    </div>";

    }



    ?>



</body>
</html>