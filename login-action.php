<?php
include'connection.php'; 
 
session_start();
$_SESSION['email'] = $_POST['email'];

?>
<?php {

$db2 = $db;

 $x = "SELECT * FROM `staff` WHERE staff.email ='" .$_POST['email'] . "';";
 $y = "SELECT * FROM `customer` WHERE customer.email='" .$_POST['email'] . "';";



$query1=mysqli_query($db,$x);
$result1=mysqli_fetch_assoc($query1);
$query2=mysqli_query($db,$y);
$result2=mysqli_fetch_assoc($query2);

if($_POST["email"] == $result1['email']){
    if($_POST["password"] == $result1['password']){
        header("Location: staff.php");
    }
    
    else{
        echo "<script type='text/javascript'>alert('Incorrect password');
        window.location='indexlogin.php';
        </script>";
    }
}



elseif($_POST["email"] == $result2['email']){
    if($_POST["password"] == $result2['password']){
        header("Location: customer.php");
    }
    
    else{
        echo "<script type='text/javascript'>alert('Incorrect password');
        window.location='indexlogin.php';
        </script>";
    }
}



else{ 
    echo "<script type='text/javascript'>alert('Account not found -  Please register at any Sakila store. ');
        window.location='indexlogin.php';
        </script>";
}




}
?>
}#} ?>