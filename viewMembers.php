<?php
session_start();
$userId = $_SESSION['Id'];
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
    include 'Admin.php';
    ?>
<form action="viewMembers.php" methods="POST">
    <input type="search" name="view" placeholder="Filter Members">
    <input type="submit" value="Search" name="search">
  </form>
    <?php
  require_once('config.php');
    
  // Create connection
  $connection = mysqli_connect(SERVERNAME, USERNAME, PASSWORD,DATABASE) or die("Could not connect to the database");


    if(isset($_REQUEST['search'])){
      $user=$_REQUEST['view']; 
    $query1 = "SELECT * from members where FirstName='$user' ";
    $result1 = mysqli_query($connection,$query1) or die("Could not perform join query");
    
    $name="";$surname="";$id=0;$event="";
    
    while($row=mysqli_fetch_array($result1)){

        $id = $row['Id'];
        $name=$row['FirstName'];
        $surname=$row['Surname'];
       

        echo"<div>
        <h3>$name $surname</h3>

    </div>";

    }
    }
    else{
      $query1 = "SELECT * from members ";
      $result1 = mysqli_query($connection,$query1) or die("Could not perform join query");
      
      $name="";$surname="";$id=0;$event="";
      
      while($row=mysqli_fetch_array($result1)){
  
          $id = $row['Id'];
          $name=$row['FirstName'];
          $surname=$row['Surname'];
         
  
          echo"<div>
          <h3>$name $surname</h3>
  
      </div>";
  
      }
    }

    ?>



</body>
</html>