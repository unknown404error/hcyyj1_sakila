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
	echo "Welcome,"."  ".$_SESSION["email"]."\n";
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
<td>First_name</td>
<td>Last_name</td>
<td>Email</td>
<td>Staff_id</td>
<td>Store_id</td>
<td>Address_id</td>
<td>Username</td>
</tr>


<?php
        $sql = "SELECT * FROM `STAFF` WHERE staff.email='" .$_SESSION["email"]. "';";
        $results = mysqli_query($db, $sql);
?>

<?php
        while ($row = mysqli_fetch_assoc($results)) {
?>
                    <tr>
                        
                        <td><?php echo $row['first_name'] ?></td>
						<td><?php echo $row['last_name'] ?></td>
						<td><?php echo $row['email'] ?></td>
						<td><?php echo $row['staff_id'] ?></td>
						<td><?php echo $row['store_id'] ?></td>
						<td><?php echo $row['address_id'] ?></td>
						<td><?php echo $row['username'] ?></td>
                    </tr>
<?php   }

?>
<body>
<h5>To view or modify database, click here : </h5> 
              
         
<button onclick="redirect()">Click me </button>

<script>
function redirect() {
  location.replace("staffsearch-display.php")
}
</script>
</body>