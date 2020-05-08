<?php

// $db = "localhost";
// $dbuser = "root";
// $dbpw = "";
// $dbname = "sakila";

// $conn = mysqli_connect($db, $dbuser, $dbpw, $dbname);

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
<body>
    <table style="width:100%">
        <tr>
            <th>Film ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Release Year</th>
        </tr>
</body>

<?php
    $search = mysqli_real_escape_string($conn, $_GET["input"]);
    $x = $_GET["option"];
    //$email;
    //$identity = $mysqli->query("SELECT email FROM staff WHERE staff.email LIKE '$email';");
       // $identity = "SELECT email FROM staff WHERE staff.email LIKE '$email';";

    if ($identity == 0) {
    if ($x == "title") {
        $sql = "SELECT * FROM film WHERE film.title LIKE '%$search%';";
    }
    else if ($x == "genre") {
        $sql = "SELECT * FROM film INNER JOIN film_category ON film.film_id = film_category.film_id INNER JOIN category ON film_category.category_id = category.category_id WHERE category.name LIKE '%$search%';";
    }
    else if ($x == "year") {
        $sql = "SELECT * FROM film WHERE film.release_year LIKE '%$search%';";
    }
           
    $results = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($results);

    echo "There are ".$resultCheck." results!<br>";
            
    if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($results)) {
?>
            <tr>
            <td><?php echo $row['film_id'] ?></td>
            <td><?php echo $row['title'] ?></td>
            <td><?php echo $row['description'] ?></td>
            <td><?php echo $row['release_year'] ?></td>
            </tr>
        <?php
        }
        
    }
    else {
        echo "No item found!";
    }
}
else {
    ?>
    <button type="button">Edit</button>
    <button type="button">Delete</button>
    <?php
    $sql = "SHOW TABLES from sakila;";
    $tables_result = mysql_query($sql);

    if (!$tables_result) {
        echo "Database error, could not list tables\nMySQL error: " . mysql_error();
        exit;
    }

    while ($table = mysql_fetch_row($tables_result)) {
        echo "Table: {$table[0]}\n";
        $fields_result = mysql_query("SHOW COLUMNS FROM ".$table[0]);
        if (!$fields_result) {
            echo 'Could not run query: ' . mysql_error();
            exit;
          }
        if (mysql_num_rows($fields_result) > 0) {

        if ($x == "title") {
            $sql = "SELECT * FROM film WHERE film.title LIKE '%$search%';";
        }
        else if ($x == "genre") {
            $sql = "SELECT * FROM film INNER JOIN film_category ON film.film_id = film_category.film_id INNER JOIN category ON film_category.category_id = category.category_id WHERE category.name LIKE '%$search%';";
        }
        else if ($x == "year") {
            $sql = "SELECT * FROM film WHERE film.release_year LIKE '%$search%';";
        }
        }

    $results = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($results);

    echo "There are ".$resultCheck." results!<br>";
            
    if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($results)) {
?>
            <tr>
            <td><?php echo $row['film_id'] ?></td>
            <td><?php echo $row['title'] ?></td>
            <td><?php echo $row['description'] ?>;</td>
            <td><?php echo $row['release_year'] ?></td>
            </tr>
        <?php
        }
        
    }
    else {
        echo "No item found!";
    }
    }
}
    ?>

    </table>
</html>