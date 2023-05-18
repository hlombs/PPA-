<?php
session_start()
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Become A Part of Power Pedal Association </h1>
 <form action="register.php" method="POST">
 <label for="">First Name</label>
    <input type="text" name="firstname"><br>
    <label for="">Lastname</label>
    <input type="text" name="surname"><br>
    <label for="">Email</label>
    <input type="text" name="email"><br>
  <br>
<label for="">Subscription</label><br>
<select name="type" id="">
    <option value="individual">Individual</option>
    <option value="family">Family</option>
</select>
<label for="">Password</label><br>
    <input type="password" name="password">
<input type="submit" name="register" >
 </form>   
    
</body>
<?php
require_once('config.php');
    
// Create connection
$connection = mysqli_connect(SERVERNAME, USERNAME, PASSWORD,DATABASE) or die("Could not connect to the database");

if(isset($_REQUEST['register'])){
    $name = $_REQUEST['firstname'];
    $surname = $_REQUEST['surname'];
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    $type = $_REQUEST['type'];

    //entry in the members table
    $query = "INSERT into members(Firstname,Surname,Email,Chip,RaceTime,Password) VALUES ('$name','$surname','$email',NULL,NULL,'$password')";
    $results = mysqli_query($connection,$query) or die("Could not add the member !");


    //entry in the subscription table simulteniously by selecting the data that we just sent to the database now, using the email -->Unique 
    $entry2 = "SELECT Id from members where Email = '$email' ";
    $results2 = mysqli_query($connection,$entry2) or die("Could not obtain the ID !");
    $id = 0;
    while($row=mysqli_fetch_array($results2)){
        $id = $row['Id'];
        $_SESSION['Id'] = $id;
    }
    //now we got the Id , lets send it to the subscription table
    $entry3 = "INSERT into subscription(MemberId,Type,Status,DateJoined) VALUES($id,'$type','None-paid',NOW())";
    $result3 =mysqli_query($connection,$entry3) or die("Could not add to subscription !");
    echo "<script>window.location.href=\"home.php\"</script>";
    mysqli_close($connection);
}


?>

<style>
    .form{
    margin: 120px 220px;
    display: flex;
    flex-direction: column;
    justify-content: space-around;
    align-content: space-around;
}
input[type=submit] {
width: 100%;
background-color: rgb(33, 113, 160);
color: white;
padding: 14px 20px;
margin: 8px 0;
border: none;
border-radius: 4px;
cursor: pointer;
}
input[type=text],input[type=email],input[type=password],textarea,select {
width: 100%;
padding: 12px 20px;
margin: 8px 0;
display: inline-block;
border: 1px solid #ccc;
border-radius: 4px;
box-sizing: border-box;
}
label{
font-weight: 500;
}

.body{
    margin: 50px 260px;

}
body{
    margin: 80px 300px;
}
</style>
</html>