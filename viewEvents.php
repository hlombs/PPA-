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
  
    $query1 = "SELECT * from events";
    $result1 = mysqli_query($connection,$query1) or die("Could not perform join query");

   
   echo" <h2>Upcoming Events</h2>";
    while($row=mysqli_fetch_array($result1)){
        $name=$row['Name'];
        $date=$row['Date'];
        $start=$row['StartVenue'];
        $route=$row['RouteDescription'];
        $distance=$row['Distance'];
        $format=$row['Format'];
        $winning=$row['WinningTime'];
        $adjusted=$row['AdjustedWinningTime'];
        $iteration =$row['Iteration'];
        if($iteration == 1){
    echo"<div>
    <form action \"viewEvents.php\" method=\"POST\">
    <h3>$name</h3>
    <h4>$date</h4>
    <p>Start Venue :$start</p>
    <p>Route : $route</p>
    <p>Distance :$distance</p>
    <p>Format: $format</p>
    <p>Winning Time : $winning</p>
    <p>Adjusted Winning Time : $adjusted
    </p>
    
    <input type=\"submit\" name=\"book\" value=\"Interested\">
    </form>
</div>";
        }
        else{
            echo"<div>
    <form action \"viewEvents.php\" method=\"POST\">
    <h3>$name</h3>
    <h4>$date</h4>
    <p>Start Venue :$start</p>
    <p>Route : $route</p>
    <p>Distance :$distance</p>
    <p>Format: $format</p>
    <p>Winning Time : $winning</p>
    <p>Adjusted Winning Time : $adjusted
    </p>

    </form>
</div>"; 
        }
    }
    
    if(isset($_REQUEST['book'])){
        $memberId=$user;
    
        $query3 = "INSERT into raceentry (MemberId,Event) VALUES($memberId,'$name')";
        $result3 = mysqli_query($connection,$query3) or die("Could not perform join query");
    }
    ?>
</body>
</html>