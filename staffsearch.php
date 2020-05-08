<?php

//$db = "localhost";
// $dbuser = "root";
// $dbpw = "";
// $dbname = "sakila";



   include 'connection.php';
    $conn = $db;
?>

<!DOCTYPE html>
<html>
<style>
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
        /* text-align: center; */
        }
</style>

<?php
    $search = mysqli_real_escape_string($conn, $_GET["input"]);
    $x = $_GET["option"];
    //$email;
    //$identity = $mysqli->query("SELECT email FROM staff WHERE staff.email LIKE '$email';");

    //if ($identity == 0) {
    if ($x == "actor") {
        $sql = "SELECT * FROM actor WHERE actor_id LIKE '%$search' OR first_name LIKE '%$search%' OR last_name LIKE '%$search%' OR last_update LIKE '%$search%';";

        $results = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($results);

        echo "There are ".$resultCheck." results!<br>";
                
        if ($resultCheck > 0) {
?>
            <table style="width:100%">
                <caption>Actor</caption>
                    <tr>
                        <th>Actor ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Last Update</th>
                    </tr>
<?php
            while ($row = mysqli_fetch_assoc($results)) {
?>
                    <tr>
                        <td><?php echo $row['actor_id'] ?></td>
                        <td><?php echo $row['first_name'] ?></td>
                        <td><?php echo $row['last_name'] ?></td>
                        <td><?php echo $row['last_update'] ?></td>
                    </tr>
<?php
            }
            
        }
        else {
            echo "No item found!";
        }
    }
    else if ($x == "address") {
        $sql = "SELECT * FROM address WHERE address_id LIKE '%$search%' OR address LIKE '%$search%' OR address2 LIKE '%$search%' OR district LIKE '%$search%' OR city_id LIKE '%$search%' OR postal_code LIKE '%$search%' OR phone LIKE '%$search%' OR last_update LIKE '%$search%';";

        $results = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($results);

        echo "There are ".$resultCheck." results!<br>";
                
        if ($resultCheck > 0) {
?>
            <table style="width:100%">
                <caption>Address</caption>
                    <tr>
                        <th>Address ID</th>
                        <th>Address</th>
                        <th>Address 2</th>
                        <th>District</th>
                        <th>City ID</th>
                        <th>Postal Code</th>
                        <th>Phone</th>
                        <th>Last Update</th>
                    </tr>
<?php
            while ($row = mysqli_fetch_assoc($results)) {
?>
                    <tr>
                        <td><?php echo $row['address_id'] ?></td>
                        <td><?php echo $row['address'] ?></td>
                        <td><?php echo $row['address2'] ?></td>
                        <td><?php echo $row['district'] ?></td>
                        <td><?php echo $row['city_id'] ?></td>
                        <td><?php echo $row['postal_code'] ?></td>
                        <td><?php echo $row['phone'] ?></td>
                        <td><?php echo $row['last_update'] ?></td>
                    </tr>
<?php
            }
        }
        else {
            echo "No item found!";
        }
    }
    else if ($x == "category") {
        $sql = "SELECT * FROM category WHERE category_id LIKE '%$search%' OR name LIKE '%$search%' OR last_update LIKE '%$search%';";

        $results = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($results);

        echo "There are ".$resultCheck." results!<br>";
                
        if ($resultCheck > 0) {
?>
            <table style="width:100%">
                        <caption>Category</caption>
                        <tr>
                            <th>Category ID</th>
                            <th>Name</th>
                            <th>Last Update</th>
                        </tr>
    <?php
                    while ($row = mysqli_fetch_assoc($results)) {
    ?>
                        <tr>
                            <td><?php echo $row['category_id'] ?></td>
                            <td><?php echo $row['name'] ?></td>
                            <td><?php echo $row['last_update'] ?></td>
                        </tr>
    <?php
                    }
            
                }
        else {
            echo "No item found!";
        }
    }
    else if ($x == "city") {
        $sql = "SELECT * FROM city WHERE city_id LIKE '%$search%' OR city LIKE '%$search%' OR country_id LIKE '%$search%' OR last_update LIKE '%$search%';";

        $results = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($results);

        echo "There are ".$resultCheck." results!<br>";
                
        if ($resultCheck > 0) {
?>
            <table style="width:100%">
                <caption>City</caption>
                    <tr>
                        <th>City ID</th>
                        <th>City</th>
                        <th>Country ID</th>
                        <th>Last Update</th>
                    </tr>

<?php
            while ($row = mysqli_fetch_assoc($results)) {
?>
                <tr>
                    <td><?php echo $row['city_id'] ?></td>
                    <td><?php echo $row['city'] ?></td>
                    <td><?php echo $row['country_id'] ?></td>
                    <td><?php echo $row['last_update'] ?></td>
                </tr>
<?php
            }
        
        }
        else {
            echo "No item found!";
        }
    }
    else if ($x == "country") {
        $sql = "SELECT * FROM country WHERE country_id LIKE '%$search%' OR country LIKE '%$search%' OR last_update LIKE '%$search%';";

        $results = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($results);

        echo "There are ".$resultCheck." results!<br>";
                
        if ($resultCheck > 0) {
?>
            <table style="width:100%">
                <caption>Country</caption>
                    <tr>
                        <th>Country ID</th>
                        <th>Country</th>
                        <th>Last Update</th>
                    </tr>

<?php
            while ($row = mysqli_fetch_assoc($results)) {
?>
                    <tr>
                        <td><?php echo $row['country_id'] ?></td>
                        <td><?php echo $row['country'] ?></td>
                        <td><?php echo $row['last_update'] ?></td>
                    </tr>
<?php
            }
            
        }
        else {
            echo "No item found!";
        }
    }
    else if ($x == "customer") {
        $sql = "SELECT * FROM customer WHERE customer_id LIKE '%$search%' OR store_id LIKE '%$search%' OR first_name LIKE '%$search%' OR last_name LIKE '%$search%' OR email LIKE '%$search%' OR address_id LIKE '%$search%' OR active LIKE '%$search%' OR create_date LIKE '%$search%' OR last_update LIKE '%$search%';";

        $results = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($results);

        echo "There are ".$resultCheck." results!<br>";
                
        if ($resultCheck > 0) {
?>
            <table style="width:100%">
                <caption>Customer</caption>
                    <tr>
                        <th>Customer ID</th>
                        <th>Store ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Address ID</th>
                        <th>Active</th>
                        <th>Create Date</th>
                        <th>Last Update</th>
                    </tr>

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
                        <td><?php echo $row['active'] ?></td>
                        <td><?php echo $row['create_date'] ?></td>
                        <td><?php echo $row['last_update'] ?></td>
                    </tr>
<?php
                }

        }
        else {
            echo "No item found!";
        }
    }
    else if ($x == "film") {
        $sql = "SELECT * FROM film WHERE film_id LIKE '%$search%' OR title LIKE '%$search%' OR description LIKE '%$search%' OR release_year LIKE '%$search%' OR language_id LIKE '%$search%' OR original_language_id LIKE '%$search%' OR rental_duration LIKE '%$search%' OR rental_rate LIKE '%$search%' OR length LIKE '%$search%' OR replacement_cost LIKE '%$search%' OR rating LIKE '%$search%' OR special_features LIKE '%$search%' OR last_update LIKE '%$search%';";

        $results = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($results);

        echo "There are ".$resultCheck." results!<br>";
                
        if ($resultCheck > 0) {
?>
            <table style="width:100%">
                <caption>Film</caption>
                    <tr>
                        <th>Film ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Release Year</th>
                        <th>Language ID</th>
                        <th>Original Language ID</th>
                        <th>Rental Duration</th>
                        <th>Rental Rate</th>
                        <th>Length</th>
                        <th>Replacement Cost</th>
                        <th>Rating</th>
                        <th>Special Features</th>
                        <th>Last Update</th>
                    </tr>
<?php
            while ($row = mysqli_fetch_assoc($results)) {
?>
                    <tr>
                        <td><?php echo $row['film_id'] ?></td>
                        <td><?php echo $row['title'] ?></td>
                        <td><?php echo $row['description'] ?></td>
                        <td><?php echo $row['release_year'] ?></td>
                        <td><?php echo $row['language_id'] ?></td>
                        <td><?php echo $row['original_language_id'] ?></td>
                        <td><?php echo $row['rental_duration'] ?></td>
                        <td><?php echo $row['rental_rate'] ?></td>
                        <td><?php echo $row['length'] ?></td>
                        <td><?php echo $row['replacement_cost'] ?></td>
                        <td><?php echo $row['rating'] ?></td>
                        <td><?php echo $row['special_features'] ?></td>
                        <td><?php echo $row['last_update'] ?></td>
                    </tr>
<?php
            }
        }
        else {
            echo "No item found!";
        }
    }
    else if ($x == "film_actor") {
        $sql = "SELECT * FROM film_actor WHERE actor_id LIKE '%$search%' OR film_id LIKE '%$search%' OR last_update LIKE '%$search%';";

        $results = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($results);

        echo "There are ".$resultCheck." results!<br>";
                
        if ($resultCheck > 0) {
?>
            <table style="width:100%">
                <caption>Film Actor</caption>
                    <tr>
                        <th>Actor ID</th>
                        <th>Film ID</th>
                        <th>Last Update</th>
                    </tr>
<?php
            while ($row = mysqli_fetch_assoc($results)) {
?>
                    <tr>
                        <td><?php echo $row['actor_id'] ?></td>
                        <td><?php echo $row['film_id'] ?></td>
                        <td><?php echo $row['last_update'] ?></td>
                    </tr>
<?php
            }
    
        }
        else {
            echo "No item found!";
        }
    }
    else if ($x == "film_category") {
        $sql = "SELECT * FROM film_category WHERE film_id LIKE '%$search%' OR category_id LIKE '%$search%' OR last_update LIKE '%$search%';";

        $results = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($results);

        echo "There are ".$resultCheck." results!<br>";
                
        if ($resultCheck > 0) {
?>
            <table style="width:100%">
                <caption>Film Category</caption>
                    <tr>
                        <th>Film ID</th>
                        <th>Category ID</th>
                        <th>Last Update</th>
                    </tr>

<?php
            while ($row = mysqli_fetch_assoc($results)) {
?>
                    <tr>                            
                        <td><?php echo $row['film_id'] ?></td>
                        <td><?php echo $row['category_id'] ?></td>
                        <td><?php echo $row['last_update'] ?></td>
                    </tr>
<?php
            }
    
        }
        else {
            echo "No item found!";
        }
    }
    else if ($x == "inventory") {
        $sql = "SELECT * FROM inventory WHERE inventory_id LIKE '%$search%' OR film_id LIKE '%$search%' OR store_id LIKE '%$search%' OR last_update LIKE '%$search%';";

        $results = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($results);

        echo "There are ".$resultCheck." results!<br>";
                
        if ($resultCheck > 0) {
?>
            <table style="width:100%">
                <caption>Inventory</caption>
                    <tr>
                        <th>Inventory ID</th>
                        <th>Film ID</th>
                        <th>Store ID</th>
                        <th>Last Update</th>
                    </tr>
<?php
            while ($row = mysqli_fetch_assoc($results)) {
?>
                    <tr>                            
                        <td><?php echo $row['inventory_id'] ?></td>
                        <td><?php echo $row['film_id'] ?></td>
                        <td><?php echo $row['store_id'] ?></td>
                        <td><?php echo $row['last_update'] ?></td>
                    </tr>
<?php
            }
    
        }
        else {
            echo "No item found!";
        }
    }
    else if ($x == "language") {
        $sql = "SELECT * FROM language WHERE language_id LIKE '%$search%' OR name LIKE '%$search%' OR last_update LIKE '%$search%';";

        $results = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($results);

        echo "There are ".$resultCheck." results!<br>";
                
        if ($resultCheck > 0) {
?>
            <table style="width:100%">
                <caption>Language</caption>
                    <tr>
                        <th>Language ID</th>
                        <th>Name</th>
                        <th>Last Update</th>
                    </tr>

<?php
            while ($row = mysqli_fetch_assoc($results)) {
?>
                    <tr>                            
                        <td><?php echo $row['language_id'] ?></td>
                        <td><?php echo $row['name'] ?></td>
                        <td><?php echo $row['last_update'] ?></td>
                    </tr>
<?php
                    }
    
            }
        else {
            echo "No item found!";
        }
    }
    else if ($x == "payment") {
        $sql = "SELECT * FROM payment WHERE payment_id LIKE '%$search%' OR customer_id LIKE '%$search%' OR staff_id LIKE '%$search%' OR rental_id LIKE '%$search%' OR amount LIKE '%$search%' OR payment_date LIKE '%$search%' OR last_update LIKE '%$search%';";

        $results = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($results);

        echo "There are ".$resultCheck." results!<br>";
                
        if ($resultCheck > 0) {
?>
            <table style="width:100%">
                <caption>Payment</caption>
                    <tr>
                        <th>Payment ID</th>
                        <th>Customer ID</th>
                        <th>Staff ID</th>
                        <th>Rental ID</th>
                        <th>Amount</th>
                        <th>Payment Date</th>
                        <th>Last Update</th>
                    </tr>

<?php
            while ($row = mysqli_fetch_assoc($results)) {
?>
                    <tr>                            
                        <td><?php echo $row['payment_id'] ?></td>
                        <td><?php echo $row['customer_id'] ?></td>
                        <td><?php echo $row['staff_id'] ?></td>
                        <td><?php echo $row['rental_id'] ?></td>
                        <td><?php echo $row['amount'] ?></td>
                        <td><?php echo $row['payment_date'] ?></td>
                        <td><?php echo $row['last_update'] ?></td>
                    </tr>
<?php
            }

        }
        else {
            echo "No item found!";
        }
    }
    else if ($x == "rental") {
        $sql = "SELECT * FROM rental WHERE rental_id LIKE '%$search%' OR rental_date LIKE '%$search%' OR inventory_id LIKE '%$search%' OR customer_id LIKE '%$search%' OR return_date LIKE '%$search%' OR staff_id LIKE '%$search%' OR last_update LIKE '%$search%';";

        $results = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($results);

        echo "There are ".$resultCheck." results!<br>";
                
        if ($resultCheck > 0) {
?>
            <table style="width:100%">
                <caption>Rental</caption>
                    <tr>
                        <th>Rental ID</th>
                        <th>Rental Date</th>
                        <th>Inventory ID</th>
                        <th>Customer ID</th>
                        <th>Return Date</th>
                        <th>Staff ID</th>
                        <th>Last Update</th>
                    </tr>

<?php
            while ($row = mysqli_fetch_assoc($results)) {
?>
                    <tr>                            
                        <td><?php echo $row['rental_id'] ?></td>
                        <td><?php echo $row['rental_date'] ?></td>
                        <td><?php echo $row['inventory_id'] ?></td>
                        <td><?php echo $row['customer_id'] ?></td>
                        <td><?php echo $row['return_date'] ?></td>
                        <td><?php echo $row['staff_id'] ?></td>
                        <td><?php echo $row['last_update'] ?></td>
                    </tr>
<?php
            }
    
        }
        else {
            echo "No item found!";
        }
    }
    else if ($x == "staff") {
        $sql = "SELECT * FROM staff WHERE staff_id LIKE '%$search%' OR first_name LIKE '%$search%' OR last_name LIKE '%$search%' OR email LIKE '%$search%' OR store_id LIKE '%$search%' OR active LIKE '%$search%' OR username LIKE '%$search%' OR password LIKE '%$search%' OR last_update LIKE '%$search%';";

        $results = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($results);

        echo "There are ".$resultCheck." results!<br>";
                
        if ($resultCheck > 0) {
?>
            <table style="width:100%">
                <caption>Staff</caption>
                    <tr>
                        <th>Staff ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <!-- <th>Address ID</th> -->
                        <th>Email</th>
                        <th>Store ID</th>
                        <th>Active</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Last Update</th>
                    </tr>

<?php
            while ($row = mysqli_fetch_assoc($results)) {
?>
                    <tr>                            
                        <td><?php echo $row['staff_id'] ?></td>
                        <td><?php echo $row['first_name'] ?></td>
                        <td><?php echo $row['last_name'] ?></td>
                        <!-- <td><?php echo $row['address_id'] ?></td> -->
                        <td><?php echo $row['email'] ?></td>
                        <td><?php echo $row['store_id'] ?></td>
                        <td><?php echo $row['active'] ?></td>
                        <td><?php echo $row['username'] ?></td>
                        <td><?php echo $row['password'] ?></td>
                        <td><?php echo $row['last_update'] ?></td>
                    </tr>
<?php
            }

        }
        else {
            echo "No item found!";
        }
    }
    else if ($x == "store") {
        $sql = "SELECT * FROM store WHERE store_id LIKE '%$search%' OR manager_staff_id LIKE '%$search%' OR address_id LIKE '%$search%' OR last_update LIKE '%$search%';";

        $results = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($results);

        echo "There are ".$resultCheck." results!<br>";
                
        if ($resultCheck > 0) {
?>
            <table style="width:100%">
                <caption>Store</caption>
                    <tr>
                        <th>Store ID</th>
                        <th>Manager Staff ID</th>
                        <th>Address ID</th>
                        <th>Last Update</th>
                    </tr>

<?php
            while ($row = mysqli_fetch_assoc($results)) {
?>
                    <tr>                            
                        <td><?php echo $row['store_id'] ?></td>
                        <td><?php echo $row['manager_staff_id'] ?></td>
                        <td><?php echo $row['address_id'] ?></td>
                        <td><?php echo $row['last_update'] ?></td>
                    </tr>
<?php
                    }
    
            }

        else {
            echo "No item found!";
        }
    }
           
?>

    </table>
</html>