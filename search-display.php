<?php

include 'connection.php';

?>

<!DOCTYPE html>

<html>

    <title>Search</title>
    <a href = "logout.php">Logout</a>
    <body>

        <form action="search.php" method="GET">
            <fieldset>
                <legend>Search:</legend>
                <input type="radio" id="title" name="option" value="title">
                <label for="title">Title</label><br>
                <input type="radio" id="genre" name="option" value="genre">
                <label for="genre">Genre</label><br>
                <input type="radio" id="year" name="option" value="year">
                <label for="year">Year</label><br>
                <input type="text" id="input" name="input" onkeyup="Search()" placeholder="Type here..."><br>
                <input type="reset">
                <input type="submit" value="Submit">
            </fieldset>
        </form>
            <p> Return to profile page by clicking <a href="customer.php">here</a>.</p>
    </body>
        
</html>