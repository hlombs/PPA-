<?php
session_start()
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
    <h1>Welcome Back my Fellow Friend LOL</h1>
 <form action="login.php" method="POST">
 
    <label for="">Email</label>
    <input type="text" name="email">
  <br>
<label for="">Password</label><br>
    <input type="password" name="password"><br>
<input type="submit" name="login" >
 </form>  
 <p>Have No Account ? <a href="register.php">Register</a> </p> 
    
</body>
<?php
require_once('config.php');
    
// Create connection
$connection = mysqli_connect(SERVERNAME, USERNAME, PASSWORD,DATABASE) or die("Could not connect to the database");

if(isset($_REQUEST['login'])){
    $name = $_REQUEST['firstname'];
    $surname = $_REQUEST['surname'];
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
   
    //entry in the subscription table simulteniously by selecting the data that we just sent to the database now, using the email -->Unique 
    $entry2 = "SELECT Id,Email,Password from members where Email = '$email' and Password='$password' ";
    $results2 = mysqli_query($connection,$entry2) or die("Could not obtain the ID !");
    $mail = "";$pass="";
    $id = 0;
    while($row=mysqli_fetch_array($results2)){
        $mail = $row['Email'];
        $pass = $row['Password'];
        $id= $row['Id'];

    }
   
    if(($email==$mail && $password==$pass) && ($email =="admin@system.com" && $password=="Admin") ){
        $_SESSION['Id'] = $id;
        
        header("Location: AdminIndex.php");
    }
    else if (($email==$mail && $password==$pass)){
        $_SESSION['Id'] = $id;
        
        header("Location: home.php");
    }
    else{
        header("Location:login.php");
    }
    
   
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
    margin: 80px 190px;
}
</style>
</html>