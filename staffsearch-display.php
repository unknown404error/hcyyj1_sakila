<?php

include 'connection.php';
?>

<!DOCTYPE html>

<html>

    <title>Search</title>
    <a href = "logout.php">Logout</a>
    <body>

        <form action="staffsearch.php" method="GET">
            <fieldset>
                <legend>Search(View Only):</legend>
                <!-- <input type="radio" id="all" name="option" value="all">
                <label for="all">All Tables</label><br> -->

                <input type="radio" id="actor" name="option" value="actor">
                <label for="actor">Actor</label>

                <input type="radio" id="address" name="option" value="address">
                <label for="address">Address</label>

                <input type="radio" id="category" name="option" value="category">
                <label for="category">Category</label>
                
                <input type="radio" id="city" name="option" value="city">
                <label for="city">City</label>
                
                <input type="radio" id="country" name="option" value="country">
                <label for="country">Country</label>
                
                <input type="radio" id="customer" name="option" value="customer">
                <label for="customer">Customer</label>
                
                <input type="radio" id="film" name="option" value="film">
                <label for="film">Film</label>
                
                <input type="radio" id="film_actor" name="option" value="film_actor">
                <label for="film_actor">Film Actor</label>
                
                <input type="radio" id="film_category" name="option" value="film_category">
                <label for="film_category">Film Category</label>
                
                <input type="radio" id="inventory" name="option" value="inventory">
                <label for="inventory">Inventory</label>
                
                <input type="radio" id="language" name="option" value="language">
                <label for="language">Language</label>
                
                <input type="radio" id="payment" name="option" value="payment">
                <label for="payment">Payment</label>
                
                <input type="radio" id="rental" name="option" value="rental">
                <label for="rental">Rental</label>
                
                <input type="radio" id="staff" name="option" value="staff">
                <label for="staff">Staff</label>

                <input type="radio" id="store" name="option" value="store">
                <label for="store">Store</label><br><br>
                
                <input type="text" id="input" name="input" placeholder="Type here..."><br>
                <input type="reset">
                <input type="submit" value="Submit">
            </fieldset>
        </form>

        <p>To modify database, (DELETE/UPDATE/INSERT) click <a href="displayTables.php">here</a>.</p>
        <p> Return to profile page by clicking <a href="staff.php">here</a>.</p>
    </body>
        
</html>