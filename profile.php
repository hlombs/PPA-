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
    
   
  
    while($row=mysqli_fetch_array($result1)){

        $id = $row['Id'];
        $name=$row['FirstName'];
        $surname=$row['Surname'];
        $email=$row['Email'];
        $password=$row['Password'];
    echo"<form action=\"profile.php\" method=\"POST\">
        <h2>User Profile</h2>
        <label>First Name</label>
            <input type=\"text\" name=\"firstname\" value='$name'><br>
            <label>Lastname</label>
            <input type=\"text\" name=\"surname\"  value='$surname'><br>
            <label >Email</label>
            <input type=\"text\" name=\"email\"  value='$email'><br>
        <br>
        <label >Subscription</label><br>
        <select name=\"type\">
            <option value=\"individual\">Individual</option>
            <option value=\"family\">Family</option>
        </select>
        <label >Password</label><br>
            <input type=\"password\" name=\"password\" value='$password'>
        <input type=\"submit\" name=\"update\" Value=\"Update Profile\" >
    </form>" ;

    

    }

    if(isset($_REQUEST['update'])){
        $name = $_REQUEST['firstname'];
        $surname = $_REQUEST['surname'];
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];

        $query2= "UPDATE members set Firstname='$name',Surname='$surname',Email='$email',Password='$password' where Id=$user";
        $result2 = mysqli_query($connection,$query2) or die("Could not perform join query");

        header("Location:profile.php");
    }

    ?>



</body>
</html>