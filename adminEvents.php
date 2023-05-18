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
    include('Admin.php');
    ?>
<form action="adminEvents.php" method="POST">
<label for="">Iteration</label><br>
   <select name="iteration" id="">
    <option value="1">Open Entries</option>
    <option value="0">Close Entries</option>
   </select>
   <input type="submit" name="Update" value="Update Iterations">
</form>
<form action="adminEvents.php" method="POST">
<label for="">Name</label><br>
    <input type="text" name="name"><br>
    <label for="">Date</label><br>
    <input type="date" name="date"><br>
    <label for="">Start Venue</label><br>
    <input type="text" name="svenue"><br>
  <br>
<label for="">Route Description</label><br>
<input type="text" name="routedescription"><br>
<label for="">Distance</label><br>
    <input type="text" name="distance"><br>
    <label for="">Format</label><br>
    <input type="text" name="format"><br>
     <label for="">Winning Time</label><br>
    <input type="text" name="wtime"><br>
    <label for="">Adjusted Winning Time</label><br>
    <input type="text" name="awtime"><br>
<input type="submit" name="add" >
 </form>   
<?php
  require_once('config.php');
    
  // Create connection
  $connection = mysqli_connect(SERVERNAME, USERNAME, PASSWORD,DATABASE) or die("Could not connect to the database");

    if(isset($_REQUEST['add'])){
    $name = $_REQUEST['name'];
    $date=$_REQUEST['date'];
    $svenue=$_REQUEST['svenue'];
    $route=$_REQUEST['routedescription'];
    $distance=$_REQUEST['distance'];
    $format=$_REQUEST['format'];
    $wtime=$_REQUEST['wtime'];
    $awtime=$_REQUEST['awtime'];

    $query = "INSERT into events(Name,Date,StartVenue,RouteDescription,Distance,Format,WinningTime,AdjustedWinningTime)
     VALUES('$name','$date','$svenue','$route','$distance','$format','$wtime','$awtime')";
    $results = mysqli_query($connection,$query) or die("Could not execute a query");
        //SELECT MemberId,Name FROM `raceentry` INNER JOIN events ON Event=events.Name;
    }
    if(isset($_REQUEST['Update'])){
        $update = $_REQUEST['iteration'];
        $query3 = "UPDATE events set Iteration=$update";
        $result3 = mysqli_query($connection,$query3) or die("Could not update Iteration");
        
      if($update==0){
        $query4 = "SELECT FirstName,Surname,MemberId FROM `members` INNER JOIN raceentry ON members.Id=raceentry.MemberId;";
        $result4 = mysqli_query($connection,$query4) or die("Could not peform joins");

        
    while($row=mysqli_fetch_array($result4)){

        $id = $row['MemberId'];
        $name=$row['FirstName'];
        $surname=$row['Surname'];
        $tag='';
        
        
            $x = rand(101,999);
           
            if ($x <257){
            $tag='A'.strval($x);
            
            }
            elseif($x>257 && $x<653){
                $tag='B'.strval($x);
                
            }
            else{
                $tag='C'.strval($x);
               
            }
    
        
        $query5 = "UPDATE members set Chip='$tag' where Id=$id";
        $result5 = mysqli_query($connection,$query5) or die("Could not update Chip");

    
    }
}

    }
  ?>
    
</body>
</html>