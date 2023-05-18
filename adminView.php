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
    <?php
require_once('config.php');
    
// Create connection
$connection = mysqli_connect(SERVERNAME, USERNAME, PASSWORD,DATABASE) or die("Could not connect to the database");

    $query1 = "SELECT * from members ";
    $result1 = mysqli_query($connection,$query1) or die("Could not perform join query");
    
    $name="";$surname="";$id=0;$event="";
  
    while($row=mysqli_fetch_array($result1)){

        $id = $row['Id'];
        $name=$row['FirstName'];
        $surname=$row['Surname'];
       

        echo"<div>
        <form action=\"adminView.php\" method=\"POST\">
        <h3>$name $surname</h3>
        <input type=\"hidden\" name=\"hidden\" value=$id>
        <select name=\"category\" >
        <option value=\"elites\">Elites</option>
        <option value=\"veterans\">Veterans</option>
        <option value=\"subveterans\">Sub Veterans</option>
        <option value=\"junior\">Junior Scholars</option>
        <option value=\"senior\">Senior Scholars</option>
        <option value=\"master\">Master</option><br>
    </select> 
    
        <input type=\"submit\" name=\"update\" value=\"Update Payment Status\">
        </form>
    </div>";

    }

    if(isset($_REQUEST['update'])){
        $memberId = $_REQUEST['hidden'];
        $event= $_REQUEST['category'];

        $query2= "UPDATE subscription set Status='Paid' where MemberId=$memberId";
        $result2 = mysqli_query($connection,$query2) or die("Could not perform join query");

        $query3 = "INSERT into raceentry (MemberId,Event) VALUES($memberId,'$event')";
        $result3 = mysqli_query($connection,$query3) or die("Could not perform join query");
        echo "<script>window.location.href=\"AdminIndex.php\"</script>";
    }

    ?>



</body>
</html>