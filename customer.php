<!DOCType HTML>
<html>
<head>
<title>Testing JavaScript</title>
</head>
<?php
session_start();
$email = $_SESSION["email"];
if ($_SESSION["email"] == true)
{
	echo "Welcome"." ".$_SESSION["email"];
}
else
{
	header('location:index.php');
}
include 'connection.php';

?>
<a href = "logout.php">Logout</a>

<table border = '1'>
<tr>
<td>Customer_id</td>
<td>Store_id</td>
<td>First_name</td>
<td>Last_name</td>
<td>Email</td>
<td>Address_id</td>
</tr>


<?php
        $sql = "SELECT * FROM `customer` WHERE customer.email='" .$_SESSION["email"]. "';";
        $results = mysqli_query($db, $sql);
?>

<?php
        while ($row = mysqli_fetch_assoc($results)) {
?>
                    <tr>
                        
                        <td><?php echo $row['customer_id'] ?></td>
						<td><?php echo $row['store_id'] ?></td>
						<td><?php echo $row['first_name'] ?></td>
						<td><?php echo $row['last_name'] ?></td>
						<td><?php echo $row['email'] ?></td>
						<td><?php echo $row['address_id'] ?></td>
                    </tr>
<?php   }

?>

?>
<body>
<h5>To view our video catalague, click here:</h5> 
              
         
<button onclick="redirect()">Click me</button>

<script>
function redirect() {
  location.replace("search-display.php")
}
</script>
</body>