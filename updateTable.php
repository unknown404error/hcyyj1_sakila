<?php

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

        caption {
            font-size: 150%;
        }
    </style>




<!-- UPDATING starts here -->




<?php
    if(array_key_exists("edit1", $_POST)) {
?>  
        <form>
            <fieldset>
                <legend>Update:</legend>

                <label for="actor_name">Actor ID</label>
                <input type="text" id="actor_id" name="actor_id" required>
                *take note that this field is used to point to the row to be selected and the ID itself will <b>not</b> be changed!<br>
                
                <label for="first_name">First Name</label>
                <input type="text" id="first_name" name="first_name"><br>
                
                <label for="last_name">Last Name</label>
                <input type="text" id="last_name" name="last_name"><br>

                <input type="reset" value="reset">
                <input type="submit" name="submit1A" value="submit">
            </fieldset>
        </form>

<?php
        $sql = "SELECT * FROM actor;";
        $results = mysqli_query($conn, $sql);
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
<?php   }
    }
        //getting data from user input/text box
        if(array_key_exists("submit1A", $_GET)) {
            $x = $_GET["actor_id"];
            // echo $x;
            // echo $_GET["first_name"];
            // echo $_GET["last_name"];
        
            $sql = "UPDATE actor SET first_name='" . $_GET["first_name"] ."' , last_name='" . $_GET["last_name"] . "' , last_update=CURRENT_TIMESTAMP WHERE actor_id='" .$x . "';";
            $results = mysqli_query($conn, $sql);

            $result = mysqli_query($conn,"SELECT * FROM actor WHERE actor_id='" .$x . "'");
            $row= mysqli_fetch_assoc($result);
?>

            <table style="width:100%">
                        <caption>Reflected Changes</caption>
                        <tr>
                            <th>Actor ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Last Update</th>
                        </tr>

                        <tr>
                            <td><?php echo $row['actor_id'] ?></td>
                            <td><?php echo $row['first_name'] ?></td>
                            <td><?php echo $row['last_name'] ?></td>
                            <td><?php echo $row['last_update'] ?></td>
                        </tr>

<?php
        }


    if(array_key_exists("edit2", $_POST)) {
?>  
        <form>
            <fieldset>
                <legend>Update:</legend>
        
                <label for="address_id">Address ID</label>
                <?php
                    $commandtext = "SELECT address_id FROM address;";
                    $cmd = mysqli_query($conn, "$commandtext");
                    echo "<select name='address_id'>";
                    while ($row = mysqli_fetch_assoc($cmd)) {
                        echo "<option value='" . $row['address_id'] . "'>" . $row['address_id'] . "</option>";
                    }
                    echo "</select>";
                ?>
                *take note that this field is used to point to the row to be updated<br>
                        
                <label for="address">Address</label>
                <input type="text" id="address" name="address"><br>
                        
                <label for="address2">Address 2</label>
                <input type="text" id="address2" name="address2"><br>
                    
                <label for="district">District</label>
                <input type="text" id="district" name="district"><br>

                <label for="city_id">City ID</label>
                <input type="text" id="city_id" name="city_id"><br>

                <label for="postal_code">Postal Code</label>
                <input type="text" id="postal_code" name="postal_code"><br>

                <label for="phone">Phone</label>
                <input type="text" id="phone" name="phone"><br>
        
                <input type="reset" value="reset">
                <input type="submit" name="submit1B" value="submit">
            </fieldset>
        </form>
        
<?php
        $sql = "SELECT * FROM address;";
        $results = mysqli_query($conn, $sql);
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
        <?php   }
        }
        //getting data from user input/text box
        if(array_key_exists("submit1B", $_GET)) {
            $x = $_GET["address_id"];
                    // echo $x;
                    // echo $_GET["first_name"];
                    // echo $_GET["last_name"];
                
            $sql = "UPDATE address SET address='" . $_GET["address"] ."' , address2='" . $_GET["address2"] . "' , district='" . $_GET["district"] . "' , city_id='" . $_GET["city_id"] . "' , postal_code='" . $_GET["postal_code"] . "' , phone='" . $_GET["phone"] . "' , last_update=CURRENT_TIMESTAMP WHERE address_id='" .$x . "';";
            $results = mysqli_query($conn, $sql);
        
            $result = mysqli_query($conn,"SELECT * FROM address WHERE address_id='" .$x . "'");
            $row= mysqli_fetch_assoc($result);
        ?>
        
                <table style="width:100%">
                    <caption>Reflected Changes</caption>
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

    if(array_key_exists("edit3", $_POST)) {
?>  
        <form>
            <fieldset>
                <legend>Update:</legend>
                    
                <label for="category_id">Category ID</label>
                <input type="text" id="category_id" name="category_id" required>
                *take note that this field is used to point to the row to be selected and the ID itself will <b>not</b> be changed!<br>
                                    
                <label for="name">Name</label>
                <input type="text" id="name" name="name"><br>
                
                <input type="reset" value="reset">
                <input type="submit" name="submit1C" value="submit">
            </fieldset>
        </form>
                    
<?php
        $sql = "SELECT * FROM category;";
        $results = mysqli_query($conn, $sql);
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
<?php   }
    }
    //getting data from user input/text box
    if(array_key_exists("submit1C", $_GET)) {
        $x = $_GET["category_id"];
        // echo $x;
                            
        $sql = "UPDATE category SET name='" . $_GET["name"] ."' , last_update=CURRENT_TIMESTAMP WHERE category_id='" .$x . "';";
        $results = mysqli_query($conn, $sql);
                    
        $result = mysqli_query($conn,"SELECT * FROM category WHERE category_id='" .$x . "'");
        $row= mysqli_fetch_assoc($result);
?>
                    
            <table style="width:100%">
                <caption>Reflected Changes</caption>
                <tr>
                    <th>Category ID</th>
                    <th>Name</th>
                    <th>Last Update</th>
                </tr>
                    
                <tr>
                    <td><?php echo $row['category_id'] ?></td>
                    <td><?php echo $row['name'] ?></td>
                    <td><?php echo $row['last_update'] ?></td>
                </tr>
<?php
    }

    if(array_key_exists("edit4", $_POST)) {
?>  
        <form>
            <fieldset>
                <legend>Update:</legend>
                            
                <label for="city_id">City ID</label>
                <?php
                    $commandtext = "SELECT city_id FROM city;";
                    $cmd = mysqli_query($conn, "$commandtext");
                    echo "<select name='city_id'>";
                    while ($row = mysqli_fetch_assoc($cmd)) {
                        echo "<option value='" . $row['city_id'] . "'>" . $row['city_id'] . "</option>";
                    }
                    echo "</select>";
                ?>
                *take note that this field is used to point to the row to be selected and the ID itself will <b>not</b> be changed!<br>
                                            
                <label for="city">City</label>
                <input type="text" id="city" name="city"><br>

                <label for="country_id">Country ID</label>
                <input type="text" id="country_id" name="country_id"><br>
                        
                <input type="reset" value="reset">
                <input type="submit" name="submit1D" value="submit">
            </fieldset>
        </form>
                            
        <?php
                $sql = "SELECT * FROM city;";
                $results = mysqli_query($conn, $sql);
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
<?php   }
    }
    //getting data from user input/text box
    if(array_key_exists("submit1D", $_GET)) {
        $x = $_GET["city_id"];
        // echo $x;
                                    
        $sql = "UPDATE city SET city='" . $_GET["city"] ."', country_id='" . $_GET["country_id"] . "' , last_update=CURRENT_TIMESTAMP WHERE city_id='" .$x . "';";
        $results = mysqli_query($conn, $sql);
                            
        $result = mysqli_query($conn,"SELECT * FROM city WHERE city_id='" .$x . "'");
        $row= mysqli_fetch_assoc($result);
?>
                            
            <table style="width:100%">
                <caption>Reflected Changes</caption>
                    <tr>
                        <th>City ID</th>
                        <th>City</th>
                        <th>Country ID</th>
                        <th>Last Update</th>
                    </tr>
                            
                    <tr>
                        <td><?php echo $row['city_id'] ?></td>
                        <td><?php echo $row['city'] ?></td>
                        <td><?php echo $row['country_id'] ?></td>
                        <td><?php echo $row['last_update'] ?></td>
                    </tr>
<?php
    }

    if(array_key_exists("edit5", $_POST)) {
?>  
        <form>
            <fieldset>
                <legend>Update:</legend>
                                    
                <label for="country_id">Country ID</label>
                <input type="text" id="country_id" name="country_id" required>
                *take note that this field is used to point to the row to be selected and the ID itself will <b>not</b> be changed!<br>
                                                    
                <label for="country">Country</label>
                <input type="text" id="country" name="country"><br>
        
                <input type="reset" value="reset">
                <input type="submit" name="submit1E" value="submit">
            </fieldset>
        </form>
                                    
<?php
        $sql = "SELECT * FROM country;";
        $results = mysqli_query($conn, $sql);
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
<?php   }
            }
            //getting data from user input/text box
            if(array_key_exists("submit1E", $_GET)) {
                $x = $_GET["country_id"];
                // echo $x;
                                            
                $sql = "UPDATE country SET country='" . $_GET["country"] . "' , last_update=CURRENT_TIMESTAMP WHERE country_id='" .$x . "';";
                $results = mysqli_query($conn, $sql);
                                    
                $result = mysqli_query($conn,"SELECT * FROM country WHERE country_id='" .$x . "'");
                $row= mysqli_fetch_assoc($result);
?>
                                    
                    <table style="width:100%">
                        <caption>Reflected Changes</caption>
                            <tr>
                                <th>Country ID</th>
                                <th>Country</th>
                                <th>Last Update</th>
                            </tr>
                                    
                            <tr>
                                <td><?php echo $row['country_id'] ?></td>
                                <td><?php echo $row['country'] ?></td>
                                <td><?php echo $row['last_update'] ?></td>
                            </tr>
<?php
    }

    if(array_key_exists("edit6", $_POST)) {
?>  
        <form>
            <fieldset>
                <legend>Update:</legend>
                                            
                <label for="customer_id">Customer ID</label>
                <input type="text" id="customer_id" name="customer_id" required>
                *take note that this field is used to point to the row to be selected and the ID itself will <b>not</b> be changed!<br>
                                                            
                <label for="store_id">Store ID</label>
                <?php
                    $commandtext = "SELECT store_id FROM store;";
                    $cmd = mysqli_query($conn, "$commandtext");
                    echo "<select name='store_id'>";
                    while ($row = mysqli_fetch_assoc($cmd)) {
                        echo "<option value='" . $row['store_id'] . "'>" . $row['store_id'] . "</option>";
                    }
                    echo "</select>";
                ?><br>

                <label for="first_name">First Name</label>
                <input type="text" id="first_name" name="first_name"><br>
                
                <label for="last_name">Last Name</label>
                <input type="text" id="last_name" name="last_name"><br>

                <label for="email">Email</label>
                <input type="email" id="email" name="email"><br>

                <label for="address_id">Address ID</label>
                <?php
                    $commandtext = "SELECT address_id FROM address;";
                    $cmd = mysqli_query($conn, "$commandtext");
                    echo "<select name='address_id'>";
                    while ($row = mysqli_fetch_assoc($cmd)) {
                        echo "<option value='" . $row['address_id'] . "'>" . $row['address_id'] . "</option>";
                    }
                    echo "</select>";
                ?><br>

                <label for="active">Active</label>
                <input type="text" id="active" name="active"><br>

                <label for="create_date">Create Date</label>
                <input type="text" id="create_date" name="create_date"><br>
                
                <input type="reset" value="reset">
                <input type="submit" name="submit1F" value="submit">
            </fieldset>
        </form>
                                            
<?php
        $sql = "SELECT * FROM customer;";
        $results = mysqli_query($conn, $sql);
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
<?php   }
    }
    //getting data from user input/text box
    if(array_key_exists("submit1F", $_GET)) {
        $x = $_GET["customer_id"];
        // echo $x;
                                    
        $sql = "UPDATE customer SET store_id='" . $_GET["store_id"] . "', first_name='" . $_GET["first_name"] . "', last_name='" . $_GET["last_name"] . "', email='" . $_GET["email"] . "', address_id='" . $_GET["address_id"] . "', active='" . $_GET["active"] . "', create_date='" . $_GET["create_date"] . "' , last_update=CURRENT_TIMESTAMP WHERE customer_id='" .$x . "';";
        $results = mysqli_query($conn, $sql);
                            
        $result = mysqli_query($conn,"SELECT * FROM customer WHERE customer_id='" .$x . "'");
        $row= mysqli_fetch_assoc($result);
?>
                                    
            <table style="width:100%">
                <caption>Reflected Changes</caption>
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

    if(array_key_exists("edit7", $_POST)) {
?>  
        <form>
            <fieldset>
                <legend>Update:</legend>
                                            
                <label for="film_id">Film ID</label>
                <input type="text" id="film_id" name="film_id" required>
                *take note that this field is used to point to the row to be selected and the ID itself will <b>not</b> be changed!<br>
                                                            
                <label for="title">Title</label>
                <input type="text" id="title" name="title"><br>

                <label for="description">Description</label>
                <input type="text" id="description" name="description"><br>
                
                <label for="release_year">Release Year</label>
                <input type="text" id="release-year" name="release_year"><br>

                <label for="language_id">Language ID</label>
                <?php
                    $commandtext = "SELECT language_id FROM language;";
                    $cmd = mysqli_query($conn, "$commandtext");
                    echo "<select name='language_id'>";
                    while ($row = mysqli_fetch_assoc($cmd)) {
                        echo "<option value='" . $row['language_id'] . "'>" . $row['language_id'] . "</option>";
                    }
                    echo "</select>";
                ?><br>

                <label for="original_language_id">Original Language ID</label>
                <?php
                    $commandtext = "SELECT language_id FROM language;";
                    $cmd = mysqli_query($conn, "$commandtext");
                    echo "<select name='language_id'>";
                    while ($row = mysqli_fetch_assoc($cmd)) {
                        echo "<option value='" . $row['language_id'] . "'>" . $row['language_id'] . "</option>";
                    }
                    echo "</select>";
                ?><br>

                <label for="rental_duration">Rental Duration</label>
                <input type="text" id="rental_duration" name="rental_duration"><br>

                <label for="rental_rate">Rental Rate</label>
                <input type="text" id="rental_rate" name="rental_rate"><br>

                <label for="length">Length</label>
                <input type="text" id="length" name="length"><br>

                <label for="replacement_cost">Replacement Cost</label>
                <input type="text" id="replacement_cost" name="replacement_cost"><br>

                <label for="rating">Rating</label>
                <input type="text" id="rating" name="rating"><br>

                <label for="special_features">Special Features</label>
                <input type="text" id="special_features" name="special_features"><br>
                
                <input type="reset" value="reset">
                <input type="submit" name="submit1G" value="submit">
            </fieldset>
        </form>
                                            
<?php
        $sql = "SELECT * FROM film;";
        $results = mysqli_query($conn, $sql);
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
<?php   }
    }
    //getting data from user input/text box
    if(array_key_exists("submit1G", $_GET)) {
        $x = $_GET["film_id"];
        // echo $x;
                                    
        $sql = "UPDATE film SET title='" . $_GET["title"] . "', description='" . $_GET["description"] . "', release_year='" . $_GET["release_year"] . "', language_id='" . $_GET["language_id"] . "', original_language_id='" . $_GET["original_language_id"] . "', rental_duration='" . $_GET["rental_duration"] . "', rental_rate='" . $_GET["rental_rate"] . "', length='" . $_GET["length"] . "', replacement_cost='" . $_GET["replacement_cost"] . "', rating='" . $_GET["rating"] . "', special_features='" . $_GET["special_features"] . "' , last_update=CURRENT_TIMESTAMP WHERE film_id='" .$x . "';";
        $results = mysqli_query($conn, $sql);
                            
        $result = mysqli_query($conn,"SELECT * FROM film WHERE film_id='" .$x . "'");
        $row= mysqli_fetch_assoc($result);
?>
                                    
            <table style="width:100%">
                <caption>Reflected Changes</caption>
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

    if(array_key_exists("edit8", $_POST)) {
?>  
        <form>
            <fieldset>
                <legend>Update:</legend>
                                            
                <label for="actor_id">Actor ID</label>
                <?php
                    $commandtext = "SELECT actor_id FROM actor;";
                    $cmd = mysqli_query($conn, "$commandtext");
                    echo "<select name='actor_id'>";
                    while ($row = mysqli_fetch_assoc($cmd)) {
                        echo "<option value='" . $row['actor_id'] . "'>" . $row['actor_id'] . "</option>";
                    }
                    echo "</select>";
                ?>
                <br>
                
                <label for="film_id">Film ID</label>
                <?php
                    $commandtext = "SELECT film_id FROM film;";
                    $cmd = mysqli_query($conn, "$commandtext");
                    echo "<select name='film_id'>";
                    while ($row = mysqli_fetch_assoc($cmd)) {
                        echo "<option value='" . $row['film_id'] . "'>" . $row['film_id'] . "</option>";
                    }
                    echo "</select>";
                ?><br>

                <input type="reset" value="reset">
                <input type="submit" name="submit1H" value="submit">
            </fieldset>
        </form>
                                            
<?php
        $sql = "SELECT * FROM film_actor;";
        $results = mysqli_query($conn, $sql);
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
<?php   }
    }
    //getting data from user input/text box
    if(array_key_exists("submit1H", $_GET)) {
        $x = $_GET["actor_id"];
        // echo $x;
                                    
        $sql = "UPDATE film_actor SET film_id='" . $_GET["film_id"] . "' , last_update=CURRENT_TIMESTAMP WHERE actor_id='" .$x . "';";
        $results = mysqli_query($conn, $sql);
                            
        $result = mysqli_query($conn,"SELECT * FROM film_actor WHERE actor_id='" .$x . "'");
        $row= mysqli_fetch_assoc($result);
?>
                                    
            <table style="width:100%">
                <caption>Reflected Changes</caption>
                    <tr>
                        <th>Actor ID</th>
                        <th>Film ID</th>
                        <th>Last Update</th>
                    </tr>
                            
                    <tr>
                        <td><?php echo $row['actor_id'] ?></td>
                        <td><?php echo $row['film_id'] ?></td>
                        <td><?php echo $row['last_update'] ?></td>
                    </tr>
<?php
    }

    if(array_key_exists("edit9", $_POST)) {
?>  
        <form>
            <fieldset>
                <legend>Update:</legend>
                                            
                <label for="film_id">Film ID</label>
                <?php
                    $commandtext = "SELECT film_id FROM film;";
                    $cmd = mysqli_query($conn, "$commandtext");
                    echo "<select name='film_id'>";
                    while ($row = mysqli_fetch_assoc($cmd)) {
                        echo "<option value='" . $row['film_id'] . "'>" . $row['film_id'] . "</option>";
                    }
                    echo "</select>";
                ?>
                *take note that this field is used to point to the row to be selected and the ID itself is <b>not</b> be changed!<br>
                
                <label for="category_id">Category ID</label>
                <?php
                    $commandtext = "SELECT category_id FROM category;";
                    $cmd = mysqli_query($conn, "$commandtext");
                    echo "<select name='category_id'>";
                    while ($row = mysqli_fetch_assoc($cmd)) {
                        echo "<option value='" . $row['category_id'] . "'>" . $row['category_id'] . "</option>";
                    }
                    echo "</select>";
                ?><br>

                <input type="reset" value="reset">
                <input type="submit" name="submit1I" value="submit">
            </fieldset>
        </form>
                                            
<?php
        $sql = "SELECT * FROM film_category;";
        $results = mysqli_query($conn, $sql);
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
<?php   }
    }
    //getting data from user input/text box
    if(array_key_exists("submit1I", $_GET)) {
        $x = $_GET["film_id"];
        // echo $x;
                                    
        $sql = "UPDATE film_category SET category_id='" . $_GET["category_id"] . "' , last_update=CURRENT_TIMESTAMP WHERE film_id='" .$x . "';";
        $results = mysqli_query($conn, $sql);
                            
        $result = mysqli_query($conn,"SELECT * FROM film_category WHERE film_id='" .$x . "'");
        $row= mysqli_fetch_assoc($result);
?>
                                    
            <table style="width:100%">
                <caption>Reflected Changes</caption>
                    <tr>
                        <th>Film ID</th>
                        <th>Category ID</th>
                        <th>Last Update</th>
                    </tr>
                            
                    <tr>
                        <td><?php echo $row['film_id'] ?></td>
                        <td><?php echo $row['category_id'] ?></td>
                        <td><?php echo $row['last_update'] ?></td>
                    </tr>
<?php
    }

    if(array_key_exists("edit11", $_POST)) {
?>  
        <form>
            <fieldset>
                <legend>Update:</legend>
                                            
                <label for="inventory_id">Inventory ID</label>
                <input type="text" id="inventory_id" name="inventory_id" required>
                *take note that this field is used to point to the row to be selected and the ID itself is <b>not</b> be changed!<br>
                
                <label for="film_id">Film ID</label>
                <?php
                    $commandtext = "SELECT film_id FROM film;";
                    $cmd = mysqli_query($conn, "$commandtext");
                    echo "<select name='film_id'>";
                    while ($row = mysqli_fetch_assoc($cmd)) {
                        echo "<option value='" . $row['film_id'] . "'>" . $row['film_id'] . "</option>";
                    }
                    echo "</select>";
                ?><br>

                <label for="store_id">Store ID</label>
                <?php
                    $commandtext = "SELECT store_id FROM store;";
                    $cmd = mysqli_query($conn, "$commandtext");
                    echo "<select name='store_id'>";
                    while ($row = mysqli_fetch_assoc($cmd)) {
                        echo "<option value='" . $row['store_id'] . "'>" . $row['store_id'] . "</option>";
                    }
                    echo "</select>";
                ?><br>

                <input type="reset" value="reset">
                <input type="submit" name="submit1K" value="submit">
            </fieldset>
        </form>
                                            
<?php
        $sql = "SELECT * FROM inventory;";
        $results = mysqli_query($conn, $sql);
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
<?php   }
    }
    //getting data from user input/text box
    if(array_key_exists("submit1K", $_GET)) {
        $x = $_GET["inventory_id"];
        // echo $x;
                                    
        $sql = "UPDATE inventory SET film_id='" . $_GET["film_id"] . "' , store_id='" . $_GET["store_id"] . "' , last_update=CURRENT_TIMESTAMP WHERE inventory_id='" .$x . "';";
        $results = mysqli_query($conn, $sql);
                            
        $result = mysqli_query($conn,"SELECT * FROM inventory WHERE inventory_id='" .$x . "'");
        $row= mysqli_fetch_assoc($result);
?>
                                    
            <table style="width:100%">
                <caption>Reflected Changes</caption>
                    <tr>
                        <th>Inventory ID</th>
                        <th>Film ID</th>
                        <th>Store ID</th>
                        <th>Last Update</th>
                    </tr>
                            
                    <tr>
                        <td><?php echo $row['inventory_id'] ?></td>
                        <td><?php echo $row['film_id'] ?></td>
                        <td><?php echo $row['store_id'] ?></td>
                        <td><?php echo $row['last_update'] ?></td>
                    </tr>
<?php
    }

    if(array_key_exists("edit12", $_POST)) {
?>  
        <form>
            <fieldset>
                <legend>Update:</legend>
                                            
                <label for="language_id">Language ID</label>
                <input type="text" id="language_id" name="language_id" required>
                *take note that this field is used to point to the row to be selected and the ID itself is <b>not</b> be changed!<br>

                <label for="name">Name</label>
                <input type="text" id="name" name="name"><br>

                <input type="reset" value="reset">
                <input type="submit" name="submit1L" value="submit"><br>
            </fieldset>
        </form>
                                            
<?php
        $sql = "SELECT * FROM language;";
        $results = mysqli_query($conn, $sql);
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
<?php   }
    }
    //getting data from user input/text box
    if(array_key_exists("submit1L", $_GET)) {
        $x = $_GET["language_id"];
        // echo $x;
                                    
        $sql = "UPDATE language SET name='" . $_GET["name"] . "' , last_update=CURRENT_TIMESTAMP WHERE language_id='" .$x . "';";
        $results = mysqli_query($conn, $sql);
                            
        $result = mysqli_query($conn,"SELECT * FROM language WHERE language_id='" .$x . "'");
        $row= mysqli_fetch_assoc($result);
?>
                                    
            <table style="width:100%">
                <caption>Reflected Changes</caption>
                    <tr>
                        <th>Language ID</th>
                        <th>Name</th>
                        <th>Last Update</th>
                    </tr>
                            
                    <tr>
                        <td><?php echo $row['language_id'] ?></td>
                        <td><?php echo $row['name'] ?></td>
                        <td><?php echo $row['last_update'] ?></td>
                    </tr>
<?php
    }

    if(array_key_exists("edit13", $_POST)) {
?>  
        <form>
            <fieldset>
                <legend>Update:</legend>
                                            
                <label for="payment_id">Payment ID</label>
                <input type="text" id="payment_id" name="payment_id" required>
                *take note that this field is used to point to the row to be selected and the ID itself is <b>not</b> be changed!<br>

                <label for="customer_id">Customer ID</label>
                <?php
                    $commandtext = "SELECT customer_id FROM customer;";
                    $cmd = mysqli_query($conn, "$commandtext");
                    echo "<select name='customer_id'>";
                    while ($row = mysqli_fetch_assoc($cmd)) {
                        echo "<option value='" . $row['customer_id'] . "'>" . $row['customer_id'] . "</option>";
                    }
                    echo "</select>";
                ?><br>

                <label for="staff_id">Staff ID</label>
                <?php
                    $commandtext = "SELECT staff_id FROM staff;";
                    $cmd = mysqli_query($conn, "$commandtext");
                    echo "<select name='staff_id'>";
                    while ($row = mysqli_fetch_assoc($cmd)) {
                        echo "<option value='" . $row['staff_id'] . "'>" . $row['staff_id'] . "</option>";
                    }
                    echo "</select>";
                ?><br>

                <label for="rental_id">Rental ID</label>
                <?php
                    $commandtext = "SELECT rental_id FROM rental;";
                    $cmd = mysqli_query($conn, "$commandtext");
                    echo "<select name='rental_id'>";
                    while ($row = mysqli_fetch_assoc($cmd)) {
                        echo "<option value='" . $row['rental_id'] . "'>" . $row['rental_id'] . "</option>";
                    }
                    echo "</select>";
                ?><br>

                <label for="amount">Amount</label>
                <input type="text" id="amount" name="amount"><br>

                <label for="payment_date">Payment Date</label>
                <input type="text" id="payment_date" name="payment_date"><br>

                <input type="reset" value="reset">
                <input type="submit" name="submit1M" value="submit">
            </fieldset>
        </form>
                                            
<?php
        $sql = "SELECT * FROM payment;";
        $results = mysqli_query($conn, $sql);
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
<?php   }
    }
    //getting data from user input/text box
    if(array_key_exists("submit1M", $_GET)) {
        $x = $_GET["payment_id"];
        // echo $x;
                                    
        $sql = "UPDATE payment SET customer_id='" . $_GET["customer_id"] . "' , staff_id='" . $_GET["staff_id"] . "' , rental_id='" . $_GET["rental_id"] . "', amount='" . $_GET["amount"] . "', payment_date='" . $_GET["payment_date"] . "' , last_update=CURRENT_TIMESTAMP WHERE payment_id='" .$x . "';";
        $results = mysqli_query($conn, $sql);
                            
        $result = mysqli_query($conn,"SELECT * FROM payment WHERE payment_id='" .$x . "'");
        $row= mysqli_fetch_assoc($result);
?>
                                    
            <table style="width:100%">
                <caption>Reflected Changes</caption>
                    <tr>
                        <th>Payment ID</th>
                        <th>Customer ID</th>
                        <th>Staff ID</th>
                        <th>Rental ID</th>
                        <th>Amount</th>
                        <th>Payment Date</th>
                        <th>Last Update</th>
                    </tr>
                            
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

    if(array_key_exists("edit14", $_POST)) {
?>  
        <form>
            <fieldset>
                <legend>Update:</legend>
                                            
                <label for="rental_id">Rental ID</label>
                <input type="text" id="rental_id" name="rental_id" required>
                *take note that this field is used to point to the row to be selected and the ID itself is <b>not</b> be changed!<br>
                
                <label for="rental_date">Rental Date</label>
                <input type="text" id="rental_date" name="rental_date"><br>

                <label for="inventory_id">Inventory ID</label>
                <?php
                    $commandtext = "SELECT inventory_id FROM inventory;";
                    $cmd = mysqli_query($conn, "$commandtext");
                    echo "<select name='inventory_id'>";
                    while ($row = mysqli_fetch_assoc($cmd)) {
                        echo "<option value='" . $row['inventory_id'] . "'>" . $row['inventory_id'] . "</option>";
                    }
                    echo "</select>";
                ?><br>
                
                <label for="customer_id">Customer ID</label>
                <?php
                    $commandtext = "SELECT customer_id FROM customer;";
                    $cmd = mysqli_query($conn, "$commandtext");
                    echo "<select name='customer_id'>";
                    while ($row = mysqli_fetch_assoc($cmd)) {
                        echo "<option value='" . $row['customer_id'] . "'>" . $row['customer_id'] . "</option>";
                    }
                    echo "</select>";
                ?><br>

                <label for="return_date">Return Date</label>
                <input type="text" id="return_date" name="return_date"><br>
                
                <label for="staff_id">Staff ID</label>
                <?php
                    $commandtext = "SELECT staff_id FROM staff;";
                    $cmd = mysqli_query($conn, "$commandtext");
                    echo "<select name='staff_id'>";
                    while ($row = mysqli_fetch_assoc($cmd)) {
                        echo "<option value='" . $row['staff_id'] . "'>" . $row['staff_id'] . "</option>";
                    }
                    echo "</select>";
                ?><br>

                <input type="reset" value="reset">
                <input type="submit" name="submit1N" value="submit">
            </fieldset>
        </form>
                                            
<?php
        $sql = "SELECT * FROM rental;";
        $results = mysqli_query($conn, $sql);
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
<?php   }
    }
    //getting data from user input/text box
    if(array_key_exists("submit1N", $_GET)) {
        $x = $_GET["rental_id"];
        // echo $x;
                                    
        $sql = "UPDATE rental SET rental_date='" . $_GET["rental_date"] . "' , inventory_id='" . $_GET["inventory_id"] . "' , customer_id='" . $_GET["customer_id"] . "', return_date='" . $_GET["return_date"] . "', staff_id='" . $_GET["staff_id"] . "' , last_update=CURRENT_TIMESTAMP WHERE rental_id='" .$x . "';";
        $results = mysqli_query($conn, $sql);
                            
        $result = mysqli_query($conn,"SELECT * FROM rental WHERE rental_id='" .$x . "'");
        $row= mysqli_fetch_assoc($result);
?>
                                    
            <table style="width:100%">
                <caption>Reflected Changes</caption>
                    <tr>
                        <th>Rental ID</th>
                        <th>Rental Date</th>
                        <th>Inventory ID</th>
                        <th>Customer ID</th>
                        <th>Return Date</th>
                        <th>Staff ID</th>
                        <th>Last Update</th>
                    </tr>
                            
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
    
    if(array_key_exists("edit15", $_POST)) {
?>  
        <form>
            <fieldset>
                <legend>Update:</legend>
                                            
                <label for="staff_id">Staff ID</label>
                <input type="text" id="staff_id" name="staff_id" required>
                *take note that this field is used to point to the row to be selected and the ID itself is <b>not</b> be changed!<br>
                
                <label for="first_name">First Name</label>
                <input type="text" id="first_name" name="first_name"><br>

                <label for="last_name">Last Name</label>
                <input type="text" id="last_name" name="last_name"><br>
                
                <label for="email">Email</label>
                <input type="email" id="email" name="email"><br>

                <label for="store_id">Store ID</label>
                <?php
                    $commandtext = "SELECT store_id FROM store;";
                    $cmd = mysqli_query($conn, "$commandtext");
                    echo "<select name='store_id'>";
                    while ($row = mysqli_fetch_assoc($cmd)) {
                        echo "<option value='" . $row['store_id'] . "'>" . $row['store_id'] . "</option>";
                    }
                    echo "</select>";
                ?><br>

                <label for="active">Active</label>
                <input type="text" id="active" name="active"><br>
                
                <label for="username">Username</label>
                <input type="text" id="username" name="username"><br>

                <label for="password">Password</label>
                <input type="text" id="password" name="password"><br>

                <input type="reset" value="reset">
                <input type="submit" name="submit1O" value="submit">
            </fieldset>
        </form>
                                            
<?php
        $sql = "SELECT * FROM staff;";
        $results = mysqli_query($conn, $sql);
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
<?php   }
    }
    //getting data from user input/text box
    if(array_key_exists("submit1O", $_GET)) {
        $x = $_GET["staff_id"];
        // echo $x;
                                    
        $sql = "UPDATE staff SET first_name='" . $_GET["first_name"] . "' , last_name='" . $_GET["last_name"] . "' , email='" . $_GET["email"] . "', store_id='" . $_GET["store_id"] . "', active='" . $_GET["active"] . "' , username='" . $_GET["username"] . "' ,password='" . $_GET["password"] . "' , last_update=CURRENT_TIMESTAMP WHERE staff_id='" .$x . "';";
        $results = mysqli_query($conn, $sql);
                            
        $result = mysqli_query($conn,"SELECT * FROM staff WHERE staff_id='" .$x . "'");
        $row= mysqli_fetch_assoc($result);
?>
                                    
            <table style="width:100%">
                <caption>Reflected Changes</caption>
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

    if(array_key_exists("edit16", $_POST)) {
?>  
        <form>
            <fieldset>
                <legend>Update:</legend>
                                            
                <label for="store_id">Store ID</label>
                <input type="text" id="store_id" name="store_id" required>
                *take note that this field is used to point to the row to be selected and the ID itself is <b>not</b> be changed!<br>
                
                <label for="manager_staff_id">Manager Staff ID</label>
                <?php
                    $commandtext = "SELECT staff_id FROM staff;";
                    $cmd = mysqli_query($conn, "$commandtext");
                    echo "<select name='staff_id'>";
                    while ($row = mysqli_fetch_assoc($cmd)) {
                        echo "<option value='" . $row['staff_id'] . "'>" . $row['staff_id'] . "</option>";
                    }
                    echo "</select>";
                ?><br>
                
                <label for="address_id">Address ID</label>
                <?php
                    $commandtext = "SELECT address_id FROM address;";
                    $cmd = mysqli_query($conn, "$commandtext");
                    echo "<select name='address_id'>";
                    while ($row = mysqli_fetch_assoc($cmd)) {
                        echo "<option value='" . $row['address_id'] . "'>" . $row['address_id'] . "</option>";
                    }
                    echo "</select>";
                ?><br>
                <input type="reset" value="reset">
                <input type="submit" name="submit1P" value="submit">
            </fieldset>
        </form>
                                            
<?php
        $sql = "SELECT * FROM store;";
        $results = mysqli_query($conn, $sql);
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
<?php   }
    }
    //getting data from user input/text box
    if(array_key_exists("submit1P", $_GET)) {
        $x = $_GET["store_id"];
        // echo $x;
                                    
        $sql = "UPDATE store SET manager_staff_id='" . $_GET["manager_staff_id"] . "', address_id='" . $_GET["address_id"] . "' , last_update=CURRENT_TIMESTAMP WHERE store_id='" .$x . "';";
        $results = mysqli_query($conn, $sql);
                            
        $result = mysqli_query($conn,"SELECT * FROM store WHERE store_id='" .$x . "'");
        $row= mysqli_fetch_assoc($result);
?>
                                    
            <table style="width:100%">
                <caption>Reflected Changes</caption>
                    <tr>
                        <th>Store ID</th>
                        <th>Manager Staff ID</th>
                        <th>Address ID</th>
                        <th>Last Update</th>
                    </tr>
                            
                    <tr>
                        <td><?php echo $row['store_id'] ?></td>
                        <td><?php echo $row['manager_staff_id'] ?></td>
                        <td><?php echo $row['address_id'] ?></td>
                        <td><?php echo $row['last_update'] ?></td>
                    </tr>
<?php
    }

        


//DELETING starts here





    if(array_key_exists("delete1", $_POST)) {
?>
        <form>
            <fieldset>
                <legend>Delete:</legend>

                <label for="actor_id">Actor ID</label>
                <?php
                    $commandtext = "SELECT actor_id FROM actor;";
                    $cmd = mysqli_query($conn, "$commandtext");
                    echo "<select name='actor_id'>";
                    while ($row = mysqli_fetch_assoc($cmd)) {
                        echo "<option value='" . $row['actor_id'] . "'>" . $row['actor_id'] . "</option>";
                    }
                    echo "</select>";
                ?>
                *take note that this permanently deletes the entire row!<br>
                
                <input type="reset" value="reset">
                <input type="submit" name="submit2A" value="submit">
            </fieldset>
        </form>
<?php
        $sql = "SELECT * FROM actor;";
        $results = mysqli_query($conn, $sql);
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
<?php   }
    }
    //getting data from user input/text box
    if(array_key_exists("submit2A", $_GET)) {
        $x = $_GET["actor_id"];
        // echo $x;
        // echo $_GET["first_name"];
        // echo $_GET["last_name"];
    
        $sql = "DELETE FROM actor WHERE actor_id='" . $x . "'";
        if (mysqli_query($conn, $sql)) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }
    }



    if(array_key_exists("delete2", $_POST)) {
?>
        <form>
            <fieldset>
                <legend>Delete:</legend>

                <label for="address_id">Address ID</label>
                <?php
                    $commandtext = "SELECT address_id FROM address;";
                    $cmd = mysqli_query($conn, "$commandtext");
                    echo "<select name='address_id'>";
                    while ($row = mysqli_fetch_assoc($cmd)) {
                        echo "<option value='" . $row['address_id'] . "'>" . $row['address_id'] . "</option>";
                    }
                    echo "</select>";
                ?>
                *take note that this permanently deletes the entire row!<br>
                
                <input type="reset" value="reset">
                <input type="submit" name="submit2B" value="submit">
            </fieldset>
        </form>
<?php
        $sql = "SELECT * FROM address;";
        $results = mysqli_query($conn, $sql);
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
<?php   }
    }
    //getting data from user input/text box
    if(array_key_exists("submit2B", $_GET)) {
        $x = $_GET["address_id"];
        // echo $x;
    
        $sql = "DELETE FROM address WHERE address_id='" . $x . "'";
        if (mysqli_query($conn, $sql)) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }
    }

    if(array_key_exists("delete3", $_POST)) {
?>
        <form>
            <fieldset>
                <legend>Delete:</legend>

                <label for="category_id">Category ID</label>
                <?php
                    $commandtext = "SELECT category_id FROM category;";
                    $cmd = mysqli_query($conn, "$commandtext");
                    echo "<select name='category_id'>";
                    while ($row = mysqli_fetch_assoc($cmd)) {
                        echo "<option value='" . $row['category_id'] . "'>" . $row['category_id'] . "</option>";
                    }
                    echo "</select>";
                ?>
                *take note that this permanently deletes the entire row!<br>
                
                <input type="reset" value="reset">
                <input type="submit" name="submit2C" value="submit">
            </fieldset>
        </form>
<?php
        $sql = "SELECT * FROM category;";
        $results = mysqli_query($conn, $sql);
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
<?php   }
    }
    //getting data from user input/text box
    if(array_key_exists("submit2C", $_GET)) {
        $x = $_GET["category_id"];
        // echo $x;
    
        $sql = "DELETE FROM category WHERE category_id='" . $x . "'";
        if (mysqli_query($conn, $sql)) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }
    }

    if(array_key_exists("delete4", $_POST)) {
?>
        <form>
            <fieldset>
                <legend>Delete:</legend>

                <label for="city_id">City ID</label>
                <?php
                    $commandtext = "SELECT city_id FROM city;";
                    $cmd = mysqli_query($conn, "$commandtext");
                    echo "<select name='city_id'>";
                    while ($row = mysqli_fetch_assoc($cmd)) {
                        echo "<option value='" . $row['city_id'] . "'>" . $row['city_id'] . "</option>";
                    }
                    echo "</select>";
                ?>
                *take note that this permanently deletes the entire row!<br>
                
                <input type="reset" value="reset">
                <input type="submit" name="submit2D" value="submit">
            </fieldset>
        </form>
<?php
        $sql = "SELECT * FROM city;";
        $results = mysqli_query($conn, $sql);
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
<?php   }
    }
    //getting data from user input/text box
    if(array_key_exists("submit2D", $_GET)) {
        $x = $_GET["city_id"];
        // echo $x;
    
        $sql = "DELETE FROM city WHERE city_id='" . $x . "'";
        if (mysqli_query($conn, $sql)) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }
    }

    if(array_key_exists("delete5", $_POST)) {
?>
        <form>
            <fieldset>
                <legend>Delete:</legend>

                <label for="country_id">Country ID</label>
                <?php
                    $commandtext = "SELECT country_id FROM country;";
                    $cmd = mysqli_query($conn, "$commandtext");
                    echo "<select name='country_id'>";
                    while ($row = mysqli_fetch_assoc($cmd)) {
                        echo "<option value='" . $row['country_id'] . "'>" . $row['country_id'] . "</option>";
                    }
                    echo "</select>";
                ?>
                *take note that this permanently deletes the entire row!<br>
                
                <input type="reset" value="reset">
                <input type="submit" name="submit2E" value="submit">
            </fieldset>
        </form>
<?php
        $sql = "SELECT * FROM country;";
        $results = mysqli_query($conn, $sql);
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
<?php   }
    }
    //getting data from user input/text box
    if(array_key_exists("submit2E", $_GET)) {
        $x = $_GET["country_id"];
        // echo $x;
    
        $sql = "DELETE FROM country WHERE country_id='" . $x . "'";
        if (mysqli_query($conn, $sql)) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }
    }

    if(array_key_exists("delete6", $_POST)) {
?>
        <form>
            <fieldset>
                <legend>Delete:</legend>

                <label for="customer_id">Customer ID</label>
                <?php
                    $commandtext = "SELECT customer_id FROM customer;";
                    $cmd = mysqli_query($conn, "$commandtext");
                    echo "<select name='customer_id'>";
                    while ($row = mysqli_fetch_assoc($cmd)) {
                        echo "<option value='" . $row['customer_id'] . "'>" . $row['customer_id'] . "</option>";
                    }
                    echo "</select>";
                ?>
                *take note that this permanently deletes the entire row!<br>
                
                <input type="reset" value="reset">
                <input type="submit" name="submit2F" value="submit">
            </fieldset>
        </form>
<?php
        $sql = "SELECT * FROM customer;";
        $results = mysqli_query($conn, $sql);
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
<?php   }
    }
    //getting data from user input/text box
    if(array_key_exists("submit2F", $_GET)) {
        $x = $_GET["customer_id"];
        // echo $x;
    
        $sql = "DELETE FROM customer WHERE customer_id='" . $x . "'";
        if (mysqli_query($conn, $sql)) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }
    }

    if(array_key_exists("delete7", $_POST)) {
?>
        <form>
            <fieldset>
                <legend>Delete:</legend>

                <label for="film_id">Film ID</label>
                <?php
                    $commandtext = "SELECT film_id FROM film;";
                    $cmd = mysqli_query($conn, "$commandtext");
                    echo "<select name='film_id'>";
                    while ($row = mysqli_fetch_assoc($cmd)) {
                        echo "<option value='" . $row['film_id'] . "'>" . $row['film_id'] . "</option>";
                    }
                    echo "</select>";
                ?>
                *take note that this permanently deletes the entire row!<br>
                
                <input type="reset" value="reset">
                <input type="submit" name="submit2G" value="submit">
            </fieldset>
        </form>
<?php
        $sql = "SELECT * FROM film;";
        $results = mysqli_query($conn, $sql);
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
<?php   }
    }
    //getting data from user input/text box
    if(array_key_exists("submit2G", $_GET)) {
        $x = $_GET["film_id"];
        // echo $x;
    
        $sql = "DELETE FROM film WHERE film_id='" . $x . "'";
        if (mysqli_query($conn, $sql)) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }
    }

    if(array_key_exists("delete8", $_POST)) {
?>
        <form>
            <fieldset>
                <legend>Delete:</legend>

                <label for="actor_id">Actor ID</label>
                <?php
                    $commandtext = "SELECT actor_id FROM actor;";
                    $cmd = mysqli_query($conn, "$commandtext");
                    echo "<select name='actor_id'>";
                    while ($row = mysqli_fetch_assoc($cmd)) {
                        echo "<option value='" . $row['actor_id'] . "'>" . $row['actor_id'] . "</option>";
                    }
                    echo "</select>";
                ?>
                *take note that this permanently deletes the entire row!<br>
                
                <input type="reset" value="reset">
                <input type="submit" name="submit2H" value="submit">
            </fieldset>
        </form>
<?php
        $sql = "SELECT * FROM film_actor;";
        $results = mysqli_query($conn, $sql);
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
<?php   }
    }
    //getting data from user input/text box
    if(array_key_exists("submit2H", $_GET)) {
        $x = $_GET["actor_id"];
        // echo $x;
    
        $sql = "DELETE FROM film_actor WHERE actor_id='" . $x . "'";
        if (mysqli_query($conn, $sql)) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }
    }

    if(array_key_exists("delete9", $_POST)) {
?>
        <form>
            <fieldset>
                <legend>Delete:</legend>

                <label for="film_id">Film ID</label>
                <?php
                    $commandtext = "SELECT film_id FROM film;";
                    $cmd = mysqli_query($conn, "$commandtext");
                    echo "<select name='film_id'>";
                    while ($row = mysqli_fetch_assoc($cmd)) {
                        echo "<option value='" . $row['film_id'] . "'>" . $row['film_id'] . "</option>";
                    }
                    echo "</select>";
                ?>
                *take note that this permanently deletes the entire row!<br>
                
                <input type="reset" value="reset">
                <input type="submit" name="submit2I" value="submit">
            </fieldset>
        </form>
<?php
        $sql = "SELECT * FROM film_category;";
        $results = mysqli_query($conn, $sql);
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
<?php   }
    }
    //getting data from user input/text box
    if(array_key_exists("submit2I", $_GET)) {
        $x = $_GET["film_id"];
        // echo $x;
    
        $sql = "DELETE FROM film_category WHERE film_id='" . $x . "'";
        if (mysqli_query($conn, $sql)) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }
    }

    if(array_key_exists("delete11", $_POST)) {
?>
        <form>
            <fieldset>
                <legend>Delete:</legend>

                <label for="inventory_id">Inventory ID</label>
                <?php
                    $commandtext = "SELECT inventory_id FROM inventory;";
                    $cmd = mysqli_query($conn, "$commandtext");
                    echo "<select name='inventory_id'>";
                    while ($row = mysqli_fetch_assoc($cmd)) {
                        echo "<option value='" . $row['inventory_id'] . "'>" . $row['inventory_id'] . "</option>";
                    }
                    echo "</select>";
                ?>
                *take note that this permanently deletes the entire row!<br>
                
                <input type="reset" value="reset">
                <input type="submit" name="submit2K" value="submit">
            </fieldset>
        </form>
<?php
        $sql = "SELECT * FROM inventory;";
        $results = mysqli_query($conn, $sql);
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
<?php   }
    }
    //getting data from user input/text box
    if(array_key_exists("submit2K", $_GET)) {
        $x = $_GET["inventory_id"];
        // echo $x;
    
        $sql = "DELETE FROM inventory WHERE inventory_id='" . $x . "'";
        if (mysqli_query($conn, $sql)) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }
    }

    if(array_key_exists("delete12", $_POST)) {
?>
        <form>
            <fieldset>
                <legend>Delete:</legend>

                <label for="language_id">Language ID</label>
                <?php
                    $commandtext = "SELECT language_id FROM language;";
                    $cmd = mysqli_query($conn, "$commandtext");
                    echo "<select name='language_id'>";
                    while ($row = mysqli_fetch_assoc($cmd)) {
                        echo "<option value='" . $row['language_id'] . "'>" . $row['language_id'] . "</option>";
                    }
                    echo "</select>";
                ?>
                *take note that this permanently deletes the entire row!<br>
                
                <input type="reset" value="reset">
                <input type="submit" name="submit2L" value="submit">
            </fieldset>
        </form>
<?php
        $sql = "SELECT * FROM language;";
        $results = mysqli_query($conn, $sql);
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
<?php   }
    }
    //getting data from user input/text box
    if(array_key_exists("submit2L", $_GET)) {
        $x = $_GET["language_id"];
        // echo $x;
    
        $sql = "DELETE FROM language WHERE language_id='" . $x . "'";
        if (mysqli_query($conn, $sql)) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }
    }

    if(array_key_exists("delete13", $_POST)) {
?>
        <form>
            <fieldset>
                <legend>Delete:</legend>

                <label for="payment_id">Payment ID</label>
                <?php
                    $commandtext = "SELECT payment_id FROM language;";
                    $cmd = mysqli_query($conn, "$commandtext");
                    echo "<select name='payment_id'>";
                    while ($row = mysqli_fetch_assoc($cmd)) {
                        echo "<option value='" . $row['payment_id'] . "'>" . $row['payment_id'] . "</option>";
                    }
                    echo "</select>";
                ?>
                *take note that this permanently deletes the entire row!<br>
                
                <input type="reset" value="reset">
                <input type="submit" name="submit2M" value="submit">
            </fieldset>
        </form>
<?php
        $sql = "SELECT * FROM payment;";
        $results = mysqli_query($conn, $sql);
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
<?php   }
    }
    //getting data from user input/text box
    if(array_key_exists("submit2M", $_GET)) {
        $x = $_GET["payment_id"];
        // echo $x;
    
        $sql = "DELETE FROM payment WHERE payment_id='" . $x . "'";
        if (mysqli_query($conn, $sql)) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }
    }

    if(array_key_exists("delete14", $_POST)) {
?>
        <form>
            <fieldset>
                <legend>Delete:</legend>

                <label for="rental_id">Rental ID</label>
                <?php
                    $commandtext = "SELECT rental_id FROM rental;";
                    $cmd = mysqli_query($conn, "$commandtext");
                    echo "<select name='rental_id'>";
                    while ($row = mysqli_fetch_assoc($cmd)) {
                        echo "<option value='" . $row['rental_id'] . "'>" . $row['rental_id'] . "</option>";
                    }
                    echo "</select>";
                ?>
                *take note that this permanently deletes the entire row!<br>
                
                <input type="reset" value="reset">
                <input type="submit" name="submit2N" value="submit">
            </fieldset>
        </form>
<?php
        $sql = "SELECT * FROM rental;";
        $results = mysqli_query($conn, $sql);
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
<?php   }
    }
    //getting data from user input/text box
    if(array_key_exists("submit2N", $_GET)) {
        $x = $_GET["rental_id"];
        // echo $x;
    
        $sql = "DELETE FROM rental WHERE rental_id='" . $x . "'";
        if (mysqli_query($conn, $sql)) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }
    }

    if(array_key_exists("delete15", $_POST)) {
?>
        <form>
            <fieldset>
                <legend>Delete:</legend>

                <label for="staff_id">Staff ID</label>
                <?php
                    $commandtext = "SELECT staff_id FROM staff;";
                    $cmd = mysqli_query($conn, "$commandtext");
                    echo "<select name='staff_id'>";
                    while ($row = mysqli_fetch_assoc($cmd)) {
                        echo "<option value='" . $row['staff_id'] . "'>" . $row['staff_id'] . "</option>";
                    }
                    echo "</select>";
                ?>
                *take note that this permanently deletes the entire row!<br>
                
                <input type="reset" value="reset">
                <input type="submit" name="submit2N" value="submit">
            </fieldset>
        </form>
<?php
        $sql = "SELECT * FROM staff;";
        $results = mysqli_query($conn, $sql);
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
<?php   }
    }
    //getting data from user input/text box
    if(array_key_exists("submit2N", $_GET)) {
        $x = $_GET["staff_id"];
        // echo $x;
    
        $sql = "DELETE FROM staff WHERE staff_id='" . $x . "'";
        if (mysqli_query($conn, $sql)) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }
    }

    if(array_key_exists("delete16", $_POST)) {
?>
        <form>
            <fieldset>
                <legend>Delete:</legend>

                <label for="store_id">Store ID</label>
                <?php
                    $commandtext = "SELECT store_id FROM staff;";
                    $cmd = mysqli_query($conn, "$commandtext");
                    echo "<select name='store_id'>";
                    while ($row = mysqli_fetch_assoc($cmd)) {
                        echo "<option value='" . $row['store_id'] . "'>" . $row['store_id'] . "</option>";
                    }
                    echo "</select>";
                ?>
                *take note that this permanently deletes the entire row!<br>
                
                <input type="reset" value="reset">
                <input type="submit" name="submit2N" value="submit">
            </fieldset>
        </form>
<?php
        $sql = "SELECT * FROM store;";
        $results = mysqli_query($conn, $sql);
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
<?php   }
    }
    //getting data from user input/text box
    if(array_key_exists("submit2N", $_GET)) {
        $x = $_GET["store_id"];
        // echo $x;
    
        $sql = "DELETE FROM store WHERE store_id='" . $x . "'";
        if (mysqli_query($conn, $sql)) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }
    }
        




//INSERTING begins here




    if(array_key_exists("insert1", $_POST)) {
?>  
        <form>
            <fieldset>
                <legend>Insert:</legend>

                <label for="actor_name">Actor ID</label>
                <input type="text" id="actor_id" name="actor_id" required>
                *please enter a new unique ID<br>
                
                <label for="first_name">First Name</label>
                <input type="text" id="first_name" name="first_name"><br>
                
                <label for="last_name">Last Name</label>
                <input type="text" id="last_name" name="last_name"><br>

                <input type="reset" value="reset">
                <input type="submit" name="submit3A" value="submit">
            </fieldset>
        </form>

<?php
        $sql = "SELECT * FROM actor;";
        $results = mysqli_query($conn, $sql);
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
<?php   }
    }
        //getting data from user input/text box
        if(array_key_exists("submit3A", $_GET)) {
            $x = $_GET["actor_id"];
            // echo $x;
            // echo $_GET["first_name"];
            // echo $_GET["last_name"];
        
            $sql = "INSERT INTO actor (actor_id, first_name, last_name, last_update) VALUES ('".$_GET["actor_id"]."', '".$_GET["first_name"]."', '".$_GET["last_name"]."', CURRENT_TIMESTAMP);";
            $results = mysqli_query($conn, $sql);

            $result = mysqli_query($conn,"SELECT * FROM actor WHERE actor_id='" .$x . "'");
            $row= mysqli_fetch_assoc($result);
?>

            <table style="width:100%">
                        <caption>Reflected Changes</caption>
                        <tr>
                            <th>Actor ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Last Update</th>
                        </tr>

                        <tr>
                            <td><?php echo $row['actor_id'] ?></td>
                            <td><?php echo $row['first_name'] ?></td>
                            <td><?php echo $row['last_name'] ?></td>
                            <td><?php echo $row['last_update'] ?></td>
                        </tr>

<?php
    }

    if(array_key_exists("insert2", $_POST)) {
?>  
        <form>
            <fieldset>
                <legend>Insert:</legend>
        
                <label for="address_id">Address ID</label>
                <input type="text" id="address_id" name="address_id" required>
                *please enter a new unique ID<br>    

                <label for="address">Address</label>
                <input type="text" id="address" name="address"><br>
                        
                <label for="address2">Address 2</label>
                <input type="text" id="address2" name="address2"><br>
                    
                <label for="district">District</label>
                <input type="text" id="district" name="district"><br>

                <label for="city_id">City ID</label>
                <input type="text" id="city_id" name="city_id"><br>

                <label for="postal_code">Postal Code</label>
                <input type="text" id="postal_code" name="postal_code"><br>

                <label for="phone">Phone</label>
                <input type="text" id="phone" name="phone"><br>
        
                <input type="reset" value="reset">
                <input type="submit" name="submit3B" value="submit">
            </fieldset>
        </form>
        
<?php
        $sql = "SELECT * FROM address;";
        $results = mysqli_query($conn, $sql);
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
<?php   }
    }
    //getting data from user input/text box
    if(array_key_exists("submit3B", $_GET)) {
        $x = $_GET["address_id"];
                // echo $x;
                // echo $_GET["first_name"];
                // echo $_GET["last_name"];
            
        $sql = "INSERT INTO address (address_id, address, address2 , district , city_id , postal_code , phone , last_update) VALUES ('".$_GET["address_id"]."', '".$_GET["address"]."', '".$_GET["address2"]."', '".$_GET["district"]."', '".$_GET["city_id"]."', '".$_GET["postal_code"]."', '".$_GET["phone"]."', CURRENT_TIMESTAMP);";
        $results = mysqli_query($conn, $sql);
    
        $result = mysqli_query($conn,"SELECT * FROM address WHERE address_id='" .$x . "'");
        $row= mysqli_fetch_assoc($result);
?>
    
            <table style="width:100%">
                <caption>Reflected Changes</caption>
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

    if(array_key_exists("insert3", $_POST)) {
?>  
        <form>
            <fieldset>
                <legend>Insert:</legend>
                    
                <label for="category_id">Category ID</label>
                <input type="text" id="category_id" name="category_id" required>
                *please enter a new unique ID<br>
                                    
                <label for="name">Name</label>
                <input type="text" id="name" name="name"><br>
                
                <input type="reset" value="reset">
                <input type="submit" name="submit3C" value="submit">
            </fieldset>
        </form>
                    
<?php
        $sql = "SELECT * FROM category;";
        $results = mysqli_query($conn, $sql);
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
<?php   }
    }
    //getting data from user input/text box
    if(array_key_exists("submit3C", $_GET)) {
        $x = $_GET["category_id"];
        // echo $x;
                            
        $sql = "INSERT INTO category (category_id, name, last_update) VALUES ('".$_GET["category_id"]."', '".$_GET["name"]."', CURRENT_TIMESTAMP);";
        $results = mysqli_query($conn, $sql);
                    
        $result = mysqli_query($conn,"SELECT * FROM category WHERE category_id='" .$x . "'");
        $row= mysqli_fetch_assoc($result);
?>
                    
            <table style="width:100%">
                <caption>Reflected Changes</caption>
                    <tr>
                        <th>Category ID</th>
                        <th>Name</th>
                        <th>Last Update</th>
                    </tr>
                        
                    <tr>
                        <td><?php echo $row['category_id'] ?></td>
                        <td><?php echo $row['name'] ?></td>
                        <td><?php echo $row['last_update'] ?></td>
                    </tr>
<?php
    }

    if(array_key_exists("insert4", $_POST)) {
?>  
        <form>
            <fieldset>
                <legend>Insert:</legend>
                            
                <label for="city_id">City ID</label>
                <input type="text" id="city_id" name="city_id" required><br>
                *please enter a new unique ID<br>
                                            
                <label for="city">City</label>
                <input type="text" id="city" name="city"><br>

                <label for="country_id">Country ID</label>
                <input type="text" id="country_id" name="country_id"><br>
                        
                <input type="reset" value="reset">
                <input type="submit" name="submit3D" value="submit">
            </fieldset>
        </form>
                            
<?php
        $sql = "SELECT * FROM city;";
        $results = mysqli_query($conn, $sql);
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
<?php   }
    }
    //getting data from user input/text box
    if(array_key_exists("submit3D", $_GET)) {
        $x = $_GET["city_id"];
        // echo $x;
                                    
        $sql = "INSERT INTO city (city_id, city, country_id , last_update) VALUES ('".$_GET["city_id"]."', '".$_GET["city"]."', '".$_GET["country_id"]."' , CURRENT_TIMESTAMP);";
        $results = mysqli_query($conn, $sql);
                            
        $result = mysqli_query($conn,"SELECT * FROM city WHERE city_id='" .$x . "'");
        $row= mysqli_fetch_assoc($result);
?>
                            
            <table style="width:100%">
                <caption>Reflected Changes</caption>
                    <tr>
                        <th>City ID</th>
                        <th>City</th>
                        <th>Country ID</th>
                        <th>Last Update</th>
                    </tr>
                            
                    <tr>
                        <td><?php echo $row['city_id'] ?></td>
                        <td><?php echo $row['city'] ?></td>
                        <td><?php echo $row['country_id'] ?></td>
                        <td><?php echo $row['last_update'] ?></td>
                    </tr>
<?php
    }

    if(array_key_exists("insert5", $_POST)) {
?>  
        <form>
            <fieldset>
                <legend>Insert:</legend>
                                    
                <label for="country_id">Country ID</label>
                <input type="text" id="country_id" name="country_id" required>
                *please enter a new unique ID<br>
                                                    
                <label for="country">Country</label>
                <input type="text" id="country" name="country"><br>
        
                <input type="reset" value="reset">
                <input type="submit" name="submit3E" value="submit">
            </fieldset>
        </form>
                                    
<?php
        $sql = "SELECT * FROM country;";
        $results = mysqli_query($conn, $sql);
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
<?php   }
            }
            //getting data from user input/text box
    if(array_key_exists("submit3E", $_GET)) {
        $x = $_GET["country_id"];
        // echo $x;
                                    
        $sql = "INSERT INTO country (country_id, country, last_update) VALUES ('".$_GET["country_id"]."', '".$_GET["country"]."', CURRENT_TIMESTAMP);";
        $results = mysqli_query($conn, $sql);
                            
        $result = mysqli_query($conn,"SELECT * FROM country WHERE country_id='" .$x . "'");
        $row= mysqli_fetch_assoc($result);
?>
                                    
            <table style="width:100%">
                <caption>Reflected Changes</caption>
                    <tr>
                        <th>Country ID</th>
                        <th>Country</th>
                        <th>Last Update</th>
                    </tr>
                            
                    <tr>
                        <td><?php echo $row['country_id'] ?></td>
                        <td><?php echo $row['country'] ?></td>
                        <td><?php echo $row['last_update'] ?></td>
                    </tr>
<?php
    }

    if(array_key_exists("insert6", $_POST)) {
?>  
        <form>
            <fieldset>
                <legend>Insert:</legend>
                                            
                <label for="customer_id">Customer ID</label>
                <input type="text" id="customer_id" name="customer_id" required>
                *please enter a new unique ID<br>
                                                            
                <label for="store_id">Store ID</label>
                <?php
                    $commandtext = "SELECT store_id FROM store;";
                    $cmd = mysqli_query($conn, "$commandtext");
                    echo "<select name='store_id'>";
                    while ($row = mysqli_fetch_assoc($cmd)) {
                        echo "<option value='" . $row['store_id'] . "'>" . $row['store_id'] . "</option>";
                    }
                    echo "</select>";
                ?><br>

                <label for="first_name">First Name</label>
                <input type="text" id="first_name" name="first_name"><br>
                
                <label for="last_name">Last Name</label>
                <input type="text" id="last_name" name="last_name"><br>

                <label for="email">Email</label>
                <input type="email" id="email" name="email"><br>

                <label for="address_id">Address ID</label>
                <?php
                    $commandtext = "SELECT address_id FROM address;";
                    $cmd = mysqli_query($conn, "$commandtext");
                    echo "<select name='address_id'>";
                    while ($row = mysqli_fetch_assoc($cmd)) {
                        echo "<option value='" . $row['address_id'] . "'>" . $row['address_id'] . "</option>";
                    }
                    echo "</select>";
                ?><br>

                <label for="active">Active</label>
                <input type="text" id="active" name="active"><br>

                <label for="create_date">Create Date</label>
                <input type="text" id="create_date" name="create_date"><br>
                
                <input type="reset" value="reset">
                <input type="submit" name="submit3F" value="submit">
            </fieldset>
        </form>
                                            
<?php
        $sql = "SELECT * FROM customer;";
        $results = mysqli_query($conn, $sql);
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
<?php   }
    }
    //getting data from user input/text box
    if(array_key_exists("submit3F", $_GET)) {
        $x = $_GET["customer_id"];
        // echo $x;
                                    
        $sql = "INSERT INTO customer (customer_id, store_id, first_name , last_name , email , address_id , active , create_date , last_update) VALUES ('".$_GET["customer_id"]."', '".$_GET["store_id"]."', '".$_GET["first_name"]."', '".$_GET["last_name"]."', '".$_GET["email"]."', '".$_GET["address_id"]."', '".$_GET["active"]."', '".$_GET["create_date"]."', CURRENT_TIMESTAMP);";
        $results = mysqli_query($conn, $sql);
                            
        $result = mysqli_query($conn,"SELECT * FROM customer WHERE customer_id='" .$x . "'");
        $row= mysqli_fetch_assoc($result);
?>
                                    
            <table style="width:100%">
                <caption>Reflected Changes</caption>
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

    if(array_key_exists("insert7", $_POST)) {
?>  
        <form>
            <fieldset>
                <legend>Insert:</legend>
                                            
                <label for="film_id">Film ID</label>
                <input type="text" id="film_id" name="film_id" required>
                *please enter a new unique ID<br>
                                                            
                <label for="title">Title</label>
                <input type="text" id="title" name="title"><br>

                <label for="description">Description</label>
                <input type="text" id="description" name="description"><br>
                
                <label for="release_year">Release Year</label>
                <input type="text" id="release-year" name="release_year"><br>

                <label for="language_id">Language ID</label>
                <?php
                    $commandtext = "SELECT language_id FROM language;";
                    $cmd = mysqli_query($conn, "$commandtext");
                    echo "<select name='language_id'>";
                    while ($row = mysqli_fetch_assoc($cmd)) {
                        echo "<option value='" . $row['language_id'] . "'>" . $row['language_id'] . "</option>";
                    }
                    echo "</select>";
                ?><br>

                <label for="original_language_id">Original Language ID</label>
                <?php
                    $commandtext = "SELECT language_id FROM language;";
                    $cmd = mysqli_query($conn, "$commandtext");
                    echo "<select name='language_id'>";
                    while ($row = mysqli_fetch_assoc($cmd)) {
                        echo "<option value='" . $row['language_id'] . "'>" . $row['language_id'] . "</option>";
                    }
                    echo "</select>";
                ?><br>

                <label for="rental_duration">Rental Duration</label>
                <input type="text" id="rental_duration" name="rental_duration"><br>

                <label for="rental_rate">Rental Rate</label>
                <input type="text" id="rental_rate" name="rental_rate"><br>

                <label for="length">Length</label>
                <input type="text" id="length" name="length"><br>

                <label for="replacement_cost">Replacement Cost</label>
                <input type="text" id="replacement_cost" name="replacement_cost"><br>

                <label for="rating">Rating</label>
                <input type="text" id="rating" name="rating"><br>

                <label for="special_features">Special Features</label>
                <input type="text" id="special_features" name="special_features"><br>
                
                <input type="reset" value="reset">
                <input type="submit" name="submit3G" value="submit">
            </fieldset>
        </form>
                                            
<?php
        $sql = "SELECT * FROM film;";
        $results = mysqli_query($conn, $sql);
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
<?php   }
    }
    //getting data from user input/text box
    if(array_key_exists("submit3G", $_GET)) {
        $x = $_GET["film_id"];
        // echo $x;
                                    
        $sql = "INSERT INTO film (film_id, title, description , release_year , language_id , original_language_id , rental_duration , rental_rate, length , replacement_cost , rating , special_features , last_update) VALUES ('".$_GET["film_id"]."', '".$_GET["title"]."', '".$_GET["description"]."', '".$_GET["release_year"]."', '".$_GET["language_id"]."', '".$_GET["original_language_id"]."', '".$_GET["rental_duration"]."', '".$_GET["rental_rate"]."', '".$_GET["length"]."', '".$_GET["replacement_cost"]."', '".$_GET["rating"]."', '".$_GET["special_features"]."', CURRENT_TIMESTAMP);";
        $results = mysqli_query($conn, $sql);
                            
        $result = mysqli_query($conn,"SELECT * FROM film WHERE film_id='" .$x . "'");
        $row= mysqli_fetch_assoc($result);
?>
                                    
            <table style="width:100%">
                <caption>Reflected Changes</caption>
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
        

    if(array_key_exists("insert8", $_POST)) {
?>  
        <form>
            <fieldset>
                <legend>Insert:</legend>
                                            
                <label for="actor_id">Actor ID</label>
                <input type="text" id="actor_id" name="actor_id" required>
                *please enter a new unique ID<br>
                
                <label for="film_id">Film ID</label>
                <?php
                    $commandtext = "SELECT film_id FROM film;";
                    $cmd = mysqli_query($conn, "$commandtext");
                    echo "<select name='film_id'>";
                    while ($row = mysqli_fetch_assoc($cmd)) {
                        echo "<option value='" . $row['film_id'] . "'>" . $row['film_id'] . "</option>";
                    }
                    echo "</select>";
                ?>

                <input type="reset" value="reset">
                <input type="submit" name="submit3H" value="submit">
            </fieldset>
        </form>
                                            
<?php
        $sql = "SELECT * FROM film_actor;";
        $results = mysqli_query($conn, $sql);
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
<?php   }
    }
    //getting data from user input/text box
    if(array_key_exists("submit3H", $_GET)) {
        $x = $_GET["actor_id"];
        // echo $x;
                                    
        $sql = "INSERT INTO film_actor (actor_id, film_id, last_update) VALUES ('".$_GET["actor_id"]."', '".$_GET["film_id"]."', CURRENT_TIMESTAMP);";
        $results = mysqli_query($conn, $sql);
                            
        $result = mysqli_query($conn,"SELECT * FROM film_actor WHERE actor_id='" .$x . "'");
        $row= mysqli_fetch_assoc($result);
?>
                                    
            <table style="width:100%">
                <caption>Reflected Changes</caption>
                    <tr>
                        <th>Actor ID</th>
                        <th>Film ID</th>
                        <th>Last Update</th>
                    </tr>
                            
                    <tr>
                        <td><?php echo $row['actor_id'] ?></td>
                        <td><?php echo $row['film_id'] ?></td>
                        <td><?php echo $row['last_update'] ?></td>
                    </tr>
<?php
    }

    if(array_key_exists("insert9", $_POST)) {
?>  
        <form>
            <fieldset>
                <legend>Insert:</legend>
                                            
                <label for="film_id">Film ID</label>
                <input type="text" id="film_id" name="film_id" required>
                *please enter a new unique ID<br>
                
                <label for="category_id">Category ID</label>
                <?php
                    $commandtext = "SELECT category_id FROM category;";
                    $cmd = mysqli_query($conn, "$commandtext");
                    echo "<select name='category_id'>";
                    while ($row = mysqli_fetch_assoc($cmd)) {
                        echo "<option value='" . $row['category_id'] . "'>" . $row['category_id'] . "</option>";
                    }
                    echo "</select>";
                ?><br>

                <input type="reset" value="reset">
                <input type="submit" name="submit3I" value="submit">
            </fieldset>
        </form>
                                            
<?php
        $sql = "SELECT * FROM film_category;";
        $results = mysqli_query($conn, $sql);
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
<?php   }
    }
    //getting data from user input/text box
    if(array_key_exists("submit3I", $_GET)) {
        $x = $_GET["film_id"];
        // echo $x;
                                    
        $sql = "INSERT INTO film_category (film_id, category_id, last_update) VALUES ('".$_GET["film_id"]."', '".$_GET["category_id"]."', CURRENT_TIMESTAMP);";
        $results = mysqli_query($conn, $sql);
                            
        $result = mysqli_query($conn,"SELECT * FROM film_category WHERE film_id='" .$x . "'");
        $row= mysqli_fetch_assoc($result);
?>
                                    
            <table style="width:100%">
                <caption>Reflected Changes</caption>
                    <tr>
                        <th>Film ID</th>
                        <th>Category ID</th>
                        <th>Last Update</th>
                    </tr>
                            
                    <tr>
                        <td><?php echo $row['film_id'] ?></td>
                        <td><?php echo $row['category_id'] ?></td>
                        <td><?php echo $row['last_update'] ?></td>
                    </tr>
<?php
    }

    if(array_key_exists("insert11", $_POST)) {
?>  
        <form>
            <fieldset>
                <legend>Insert:</legend>
                                            
                <label for="inventory_id">Inventory ID</label>
                <input type="text" id="inventory_id" name="inventory_id" required>
                *please enter a new unique ID<br>
                
                <label for="film_id">Film ID</label>
                <?php
                    $commandtext = "SELECT film_id FROM film;";
                    $cmd = mysqli_query($conn, "$commandtext");
                    echo "<select name='film_id'>";
                    while ($row = mysqli_fetch_assoc($cmd)) {
                        echo "<option value='" . $row['film_id'] . "'>" . $row['film_id'] . "</option>";
                    }
                    echo "</select>";
                ?><br>

                <label for="store_id">Store ID</label>
                <?php
                    $commandtext = "SELECT store_id FROM store;";
                    $cmd = mysqli_query($conn, "$commandtext");
                    echo "<select name='store_id'>";
                    while ($row = mysqli_fetch_assoc($cmd)) {
                        echo "<option value='" . $row['store_id'] . "'>" . $row['store_id'] . "</option>";
                    }
                    echo "</select>";
                ?><br>

                <input type="reset" value="reset">
                <input type="submit" name="submit3K" value="submit">
            </fieldset>
        </form>
                                            
<?php
        $sql = "SELECT * FROM inventory;";
        $results = mysqli_query($conn, $sql);
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
<?php   }
    }
    //getting data from user input/text box
    if(array_key_exists("submit3K", $_GET)) {
        $x = $_GET["inventory_id"];
        // echo $x;
                                    
        $sql = "INSERT INTO inventory (inventory_id, film_id, store_id , last_update) VALUES ('".$_GET["inventory_id"]."', '".$_GET["film_id"]."', '".$_GET["store_id"]."', CURRENT_TIMESTAMP);";
        $results = mysqli_query($conn, $sql);
                            
        $result = mysqli_query($conn,"SELECT * FROM inventory WHERE inventory_id='" .$x . "'");
        $row= mysqli_fetch_assoc($result);
?>
                                    
            <table style="width:100%">
                <caption>Reflected Changes</caption>
                    <tr>
                        <th>Inventory ID</th>
                        <th>Film ID</th>
                        <th>Store ID</th>
                        <th>Last Update</th>
                    </tr>
                            
                    <tr>
                        <td><?php echo $row['inventory_id'] ?></td>
                        <td><?php echo $row['film_id'] ?></td>
                        <td><?php echo $row['store_id'] ?></td>
                        <td><?php echo $row['last_update'] ?></td>
                    </tr>
<?php
    }

    if(array_key_exists("insert12", $_POST)) {
?>  
        <form>
            <fieldset>
                <legend>Insert:</legend>
                                            
                <label for="language_id">Language ID</label>
                <input type="text" id="language_id" name="language_id" required>
                *please enter a new unique ID<br>

                <label for="name">Name</label>
                <input type="text" id="name" name="name"><br>

                <input type="reset" value="reset">
                <input type="submit" name="submit3L" value="submit"><br>
            </fieldset>
        </form>
                                            
<?php
        $sql = "SELECT * FROM language;";
        $results = mysqli_query($conn, $sql);
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
<?php   }
    }
    //getting data from user input/text box
    if(array_key_exists("submit3L", $_GET)) {
        $x = $_GET["language_id"];
        // echo $x;
                                    
        $sql = "INSERT INTO language (language_id, name, last_update) VALUES ('".$_GET["language_id"]."', '".$_GET["name"]."', CURRENT_TIMESTAMP);";
        $results = mysqli_query($conn, $sql);
                            
        $result = mysqli_query($conn,"SELECT * FROM language WHERE language_id='" .$x . "'");
        $row= mysqli_fetch_assoc($result);
?>
                                    
            <table style="width:100%">
                <caption>Reflected Changes</caption>
                    <tr>
                        <th>Language ID</th>
                        <th>Name</th>
                        <th>Last Update</th>
                    </tr>
                            
                    <tr>
                        <td><?php echo $row['language_id'] ?></td>
                        <td><?php echo $row['name'] ?></td>
                        <td><?php echo $row['last_update'] ?></td>
                    </tr>
<?php
    }

    if(array_key_exists("insert13", $_POST)) {
?>  
        <form>
            <fieldset>
                <legend>Insert:</legend>
                                            
                <label for="payment_id">Payment ID</label>
                <input type="text" id="payment_id" name="payment_id" required>
                *please enter a new unique ID<br>

                <label for="customer_id">Customer ID</label>
                <?php
                    $commandtext = "SELECT customer_id FROM customer;";
                    $cmd = mysqli_query($conn, "$commandtext");
                    echo "<select name='customer_id'>";
                    while ($row = mysqli_fetch_assoc($cmd)) {
                        echo "<option value='" . $row['customer_id'] . "'>" . $row['customer_id'] . "</option>";
                    }
                    echo "</select>";
                ?><br>

                <label for="staff_id">Staff ID</label>
                <?php
                    $commandtext = "SELECT staff_id FROM staff;";
                    $cmd = mysqli_query($conn, "$commandtext");
                    echo "<select name='staff_id'>";
                    while ($row = mysqli_fetch_assoc($cmd)) {
                        echo "<option value='" . $row['staff_id'] . "'>" . $row['staff_id'] . "</option>";
                    }
                    echo "</select>";
                ?><br>

                <label for="rental_id">Rental ID</label>
                <?php
                    $commandtext = "SELECT rental_id FROM rental;";
                    $cmd = mysqli_query($conn, "$commandtext");
                    echo "<select name='rental_id'>";
                    while ($row = mysqli_fetch_assoc($cmd)) {
                        echo "<option value='" . $row['rental_id'] . "'>" . $row['rental_id'] . "</option>";
                    }
                    echo "</select>";
                ?><br>

                <label for="amount">Amount</label>
                <input type="text" id="amount" name="amount"><br>

                <label for="payment_date">Payment Date</label>
                <input type="text" id="payment_date" name="payment_date"><br>

                <input type="reset" value="reset">
                <input type="submit" name="submit3M" value="submit">
            </fieldset>
        </form>
                                            
<?php
        $sql = "SELECT * FROM payment;";
        $results = mysqli_query($conn, $sql);
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
<?php   }
    }
    //getting data from user input/text box
    if(array_key_exists("submit3M", $_GET)) {
        $x = $_GET["payment_id"];
        // echo $x;
                                    
        $sql = "INSERT INTO payment (payment_id, customer_id, staff_id , rental_id , amount , payment_date , last_update) VALUES ('".$_GET["payment_id"]."', '".$_GET["customer_id"]."', '".$_GET["staff_id"]."', '".$_GET["rental_id"]."', '".$_GET["amount"]."', '".$_GET["payment_date"]."', CURRENT_TIMESTAMP);";
        $results = mysqli_query($conn, $sql);
                            
        $result = mysqli_query($conn,"SELECT * FROM payment WHERE payment_id='" .$x . "'");
        $row= mysqli_fetch_assoc($result);
?>
                                    
            <table style="width:100%">
                <caption>Reflected Changes</caption>
                    <tr>
                        <th>Payment ID</th>
                        <th>Customer ID</th>
                        <th>Staff ID</th>
                        <th>Rental ID</th>
                        <th>Amount</th>
                        <th>Payment Date</th>
                        <th>Last Update</th>
                    </tr>
                            
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

    if(array_key_exists("insert14", $_POST)) {
?>  
        <form>
            <fieldset>
                <legend>Insert:</legend>
                                            
                <label for="rental_id">Rental ID</label>
                <input type="text" id="rental_id" name="rental_id" required>
                *please enter a new unique ID<br>
                
                <label for="rental_date">Rental Date</label>
                <input type="text" id="rental_date" name="rental_date"><br>

                <label for="inventory_id">Inventory ID</label>
                <?php
                    $commandtext = "SELECT inventory_id FROM inventory;";
                    $cmd = mysqli_query($conn, "$commandtext");
                    echo "<select name='inventory_id'>";
                    while ($row = mysqli_fetch_assoc($cmd)) {
                        echo "<option value='" . $row['inventory_id'] . "'>" . $row['inventory_id'] . "</option>";
                    }
                    echo "</select>";
                ?><br>
                
                <label for="customer_id">Customer ID</label>
                <?php
                    $commandtext = "SELECT customer_id FROM customer;";
                    $cmd = mysqli_query($conn, "$commandtext");
                    echo "<select name='customer_id'>";
                    while ($row = mysqli_fetch_assoc($cmd)) {
                        echo "<option value='" . $row['customer_id'] . "'>" . $row['customer_id'] . "</option>";
                    }
                    echo "</select>";
                ?><br>

                <label for="return_date">Return Date</label>
                <input type="text" id="return_date" name="return_date"><br>
                
                <label for="staff_id">Staff ID</label>
                <?php
                    $commandtext = "SELECT staff_id FROM staff;";
                    $cmd = mysqli_query($conn, "$commandtext");
                    echo "<select name='staff_id'>";
                    while ($row = mysqli_fetch_assoc($cmd)) {
                        echo "<option value='" . $row['staff_id'] . "'>" . $row['staff_id'] . "</option>";
                    }
                    echo "</select>";
                ?><br>

                <input type="reset" value="reset">
                <input type="submit" name="submit3N" value="submit">
            </fieldset>
        </form>
                                            
<?php
        $sql = "SELECT * FROM rental;";
        $results = mysqli_query($conn, $sql);
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
<?php   }
    }
    //getting data from user input/text box
    if(array_key_exists("submit3N", $_GET)) {
        $x = $_GET["rental_id"];
        // echo $x;
                                    
        $sql = "INSERT INTO rental (rental_id, rental_date, inventory_id , customer_id , return_date , staff_id , last_update) VALUES ('".$_GET["rental_id"]."', '".$_GET["rental_date"]."', '".$_GET["inventory_id"]."', '".$_GET["customer_id"]."', '".$_GET["return_date"]."', '".$_GET["staff_id"]."', CURRENT_TIMESTAMP);";
        $results = mysqli_query($conn, $sql);
                            
        $result = mysqli_query($conn,"SELECT * FROM rental WHERE rental_id='" .$x . "'");
        $row= mysqli_fetch_assoc($result);
?>
                                    
            <table style="width:100%">
                <caption>Reflected Changes</caption>
                    <tr>
                        <th>Rental ID</th>
                        <th>Rental Date</th>
                        <th>Inventory ID</th>
                        <th>Customer ID</th>
                        <th>Return Date</th>
                        <th>Staff ID</th>
                        <th>Last Update</th>
                    </tr>
                            
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

    if(array_key_exists("insert15", $_POST)) {
?>  
        <form>
            <fieldset>
                <legend>Insert:</legend>
                                            
                <label for="staff_id">Staff ID</label>
                <input type="text" id="staff_id" name="staff_id" required>
                *please enter a new unique ID<br>
                
                <label for="first_name">First Name</label>
                <input type="text" id="first_name" name="first_name"><br>

                <label for="last_name">Last Name</label>
                <input type="text" id="last_name" name="last_name"><br>
                
                <label for="email">Email</label>
                <input type="email" id="email" name="email"><br>

                <label for="store_id">Store ID</label>
                <?php
                    $commandtext = "SELECT store_id FROM store;";
                    $cmd = mysqli_query($conn, "$commandtext");
                    echo "<select name='store_id'>";
                    while ($row = mysqli_fetch_assoc($cmd)) {
                        echo "<option value='" . $row['store_id'] . "'>" . $row['store_id'] . "</option>";
                    }
                    echo "</select>";
                ?><br>

                <label for="active">Active</label>
                <input type="text" id="active" name="active"><br>
                
                <label for="username">Username</label>
                <input type="text" id="username" name="username"><br>

                <label for="password">Password</label>
                <input type="text" id="password" name="password"><br>

                <input type="reset" value="reset">
                <input type="submit" name="submit3O" value="submit">
            </fieldset>
        </form>
                                            
<?php
        $sql = "SELECT * FROM staff;";
        $results = mysqli_query($conn, $sql);
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
<?php   }
    }
    //getting data from user input/text box
    if(array_key_exists("submit3O", $_GET)) {
        $x = $_GET["staff_id"];
        // echo $x;
                                    
        $sql = "INSERT INTO staff (staff_id, first_name, last_name , email , store_id , active , username , password , last_update) VALUES ('".$_GET["staff_id"]."', '".$_GET["first_name"]."', '".$_GET["last_name"]."', '".$_GET["email"]."', '".$_GET["store_id"]."', '".$_GET["active"]."', '".$_GET["username"]."', '".$_GET["password"]."', CURRENT_TIMESTAMP);";
        $results = mysqli_query($conn, $sql);
                            
        $result = mysqli_query($conn,"SELECT * FROM staff WHERE staff_id='" .$x . "'");
        $row= mysqli_fetch_assoc($result);
?>
                                    
            <table style="width:100%">
                <caption>Reflected Changes</caption>
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

    if(array_key_exists("insert16", $_POST)) {
?>  
        <form>
            <fieldset>
                <legend>Insert:</legend>
                                            
                <label for="store_id">Store ID</label>
                <input type="text" id="store_id" name="store_id" required>
                *please enter a new unique ID<br>
                
                <label for="manager_staff_id">Manager Staff ID</label>
                <?php
                    $commandtext = "SELECT staff_id FROM staff;";
                    $cmd = mysqli_query($conn, "$commandtext");
                    echo "<select name='staff_id'>";
                    while ($row = mysqli_fetch_assoc($cmd)) {
                        echo "<option value='" . $row['staff_id'] . "'>" . $row['staff_id'] . "</option>";
                    }
                    echo "</select>";
                ?><br>
                
                <label for="address_id">Address ID</label>
                <?php
                    $commandtext = "SELECT address_id FROM address;";
                    $cmd = mysqli_query($conn, "$commandtext");
                    echo "<select name='address_id'>";
                    while ($row = mysqli_fetch_assoc($cmd)) {
                        echo "<option value='" . $row['address_id'] . "'>" . $row['address_id'] . "</option>";
                    }
                    echo "</select>";
                ?><br>
                <input type="reset" value="reset">
                <input type="submit" name="submit3P" value="submit">
            </fieldset>
        </form>
                                            
<?php
        $sql = "SELECT * FROM store;";
        $results = mysqli_query($conn, $sql);
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
<?php   }
    }
    //getting data from user input/text box
    if(array_key_exists("submit3P", $_GET)) {
        $x = $_GET["store_id"];
        // echo $x;
                                    
        $sql = "INSERT INTO store (store_id, manager_staff_id, address_id , last_update) VALUES ('".$_GET["store_id"]."', '".$_GET["manager_staff_id"]."', '".$_GET["address_id"]."', CURRENT_TIMESTAMP);";
        $results = mysqli_query($conn, $sql);
                            
        $result = mysqli_query($conn,"SELECT * FROM store WHERE store_id='" .$x . "'");
        $row= mysqli_fetch_assoc($result);
?>
                                    
            <table style="width:100%">
                <caption>Reflected Changes</caption>
                    <tr>
                        <th>Store ID</th>
                        <th>Manager Staff ID</th>
                        <th>Address ID</th>
                        <th>Last Update</th>
                    </tr>
                            
                    <tr>
                        <td><?php echo $row['store_id'] ?></td>
                        <td><?php echo $row['manager_staff_id'] ?></td>
                        <td><?php echo $row['address_id'] ?></td>
                        <td><?php echo $row['last_update'] ?></td>
                    </tr>
<?php
    }

?>
</table>
</html>