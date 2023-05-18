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

    $query1 = "SELECT Chip,RaceTime,raceentry.Event from history INNER JOIN raceentry on raceentry.MemberId=$user ";
    $result1 = mysqli_query($connection,$query1) or die("Could not perform join query");
    
    $chip="";$event="";$rt=0;
  
    while($row=mysqli_fetch_array($result1)){

        $chip = $row['Chip'];
        $event=$row['Event'];
        $rt=$row['RaceTime'];
       

        echo"<div>
     
        <h4>Event Name</h4>
        <h2> $event </h2>
        <h4>Chip Number </h4>
        <h5>$chip</h5>
        <h5>Race Time : $rt Minutes</h5>
        
     
    </div>";

    }



    ?>

</body>
</html>