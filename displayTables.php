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

    <body>
    <?php
            //$email;
            //$identity = $mysqli->query("SELECT email FROM staff WHERE staff.email LIKE '$email';");

            //if ($identity == 0) {
    ?>
        <a href = "logout.php">Logout</a>
        <form method="post">
        <fieldset>

            <legend>Choose a table to modify:</legend>
            <input type="submit" name="actor" class="button" value="actor" />
            <input type="submit" name="address" class="button" value="address" />
            <input type="submit" name="category" class="button" value="category" />
            <input type="submit" name="city" class="button" value="city" />
            <input type="submit" name="country" class="button" value="country" />
            <input type="submit" name="customer" class="button" value="customer" />
            <input type="submit" name="film" class="button" value="film" />
            <input type="submit" name="film_actor" class="button" value="film_actor" />
            <input type="submit" name="film_category" class="button" value="film_category" />
            <!--<input type="submit" name="film_text" class="button" value="film_text" /> -->
            <input type="submit" name="inventory" class="button" value="inventory" />
            <input type="submit" name="language" class="button" value="language" />
            <input type="submit" name="payment" class="button" value="payment" />
            <input type="submit" name="rental" class="button" value="rental" />
            <input type="submit" name="staff" class="button" value="staff" />
            <input type="submit" name="store" class="button" value="store" />
            <p>Go back to Search(View only) page <a href="staffsearch-display.php">here</a>.</p>
            <p> Return to profile page by clicking <a href="staff.php">here</a>.</p>

  </fieldset>
      </form>

        

        <?php

                if(array_key_exists("actor", $_POST)) {
                    $sql = "SELECT * FROM actor;";
                    $results = mysqli_query($conn, $sql);
        ?>
                    <form action="updateTable.php" method="post">
                        <input type="submit" name="delete1" class="extras" value="delete" style="float: right;"/>
                        <input type="submit" name="edit1" class="extras" value="update" style="float: right;"/>
                        <input type="submit" name="insert1" class="extras" value="insert" style="float: right;"/>
                    </form>

                    <table style="width:100%">
                        <caption>Actor</caption>
                        <tr>
                            <th>Actor ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Last Update</th>
                        </tr>
    </body>
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

                if(array_key_exists("address", $_POST)) {
                    $sql = "SELECT * FROM address;";
                    $results = mysqli_query($conn, $sql);
        ?>
                    <form action="updateTable.php" method="post">                        
                        <input type="submit" name="delete2" class="extras" value="delete" style="float: right;"/>
                        <input type="submit" name="edit2" class="extras" value="update" style="float: right;"/>
                        <input type="submit" name="insert2" class="extras" value="insert" style="float: right;"/>
                    </form>

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
    </body>
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
                
                if(array_key_exists("category", $_POST)) {
                    $sql = "SELECT * FROM category;";
                    $results = mysqli_query($conn, $sql);
    ?>
                    <form action="updateTable.php" method="post">
                        <input type="submit" name="delete3" class="extras" value="delete" style="float: right;"/>
                        <input type="submit" name="edit3" class="extras" value="update" style="float: right;"/>
                        <input type="submit" name="insert3" class="extras" value="insert" style="float: right;"/>
                    </form>

                    <table style="width:100%">
                        <caption>Category</caption>
                        <tr>
                            <th>Category ID</th>
                            <th>Name</th>
                            <th>Last Update</th>
                        </tr>
    </body>
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
                    
                if(array_key_exists("city", $_POST)) {
                    $sql = "SELECT * FROM city;";
                    $results = mysqli_query($conn, $sql);
    ?>
                    <form action="updateTable.php" method="post">
                        <input type="submit" name="delete4" class="extras" value="delete" style="float: right;"/>
                        <input type="submit" name="edit4" class="extras" value="update" style="float: right;"/>
                        <input type="submit" name="insert4" class="extras" value="insert" style="float: right;"/>
                    </form>

                    <table style="width:100%">
                        <caption>City</caption>
                            <tr>
                                <th>City ID</th>
                                <th>City</th>
                                <th>Country ID</th>
                                <th>Last Update</th>
                            </tr>
    </body>
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
                        
                if(array_key_exists("country", $_POST)) {
                    $sql = "SELECT * FROM country;";
                    $results = mysqli_query($conn, $sql);
    ?>
                    <form action="updateTable.php" method="post">
                        <input type="submit" name="delete5" class="extras" value="delete" style="float: right;"/>
                        <input type="submit" name="edit5" class="extras" value="update" style="float: right;"/>
                        <input type="submit" name="insert5" class="extras" value="insert" style="float: right;"/>
                    </form>

                    <table style="width:100%">
                        <caption>Country</caption>
                            <tr>
                                <th>Country ID</th>
                                <th>Country</th>
                                <th>Last Update</th>
                            </tr>
    </body>
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

                if(array_key_exists("customer", $_POST)) {
                    $sql = "SELECT * FROM customer;";
                    $results = mysqli_query($conn, $sql);
        ?>
                    <form action="updateTable.php" method="post">                       
                        <input type="submit" name="delete6" class="extras" value="delete" style="float: right;"/>
                        <input type="submit" name="edit6" class="extras" value="update" style="float: right;"/>
                        <input type="submit" name="insert6" class="extras" value="insert" style="float: right;"/>
                    </form>

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
    </body>
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

                if(array_key_exists("film", $_POST)) {
                    $sql = "SELECT * FROM film;";
                    $results = mysqli_query($conn, $sql);
        ?>
                    <form action="updateTable.php" method="post">                       
                        <input type="submit" name="delete7" class="extras" value="delete" style="float: right;"/>
                        <input type="submit" name="edit7" class="extras" value="update" style="float: right;"/>
                        <input type="submit" name="insert7" class="extras" value="insert" style="float: right;"/>
                    </form>

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
    </body>
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

                if(array_key_exists("film_actor", $_POST)) {
                    $sql = "SELECT * FROM film_actor;";
                    $results = mysqli_query($conn, $sql);
        ?>
                    <form action="updateTable.php" method="post">
                        <input type="submit" name="delete8" class="extras" value="delete" style="float: right;"/>
                        <input type="submit" name="edit8" class="extras" value="update" style="float: right;"/>
                        <input type="submit" name="insert8" class="extras" value="insert" style="float: right;"/>
                    </form>

                    <table style="width:100%">
                        <caption>Film Actor</caption>
                        <tr>
                            <th>Actor ID</th>
                            <th>Film ID</th>
                            <th>Last Update</th>
                        </tr>
    </body>
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

                if(array_key_exists("film_category", $_POST)) {
                    $sql = "SELECT * FROM film_category;";
                    $results = mysqli_query($conn, $sql);
        ?>
                    <form action="updateTable.php" method="post">                      
                        <input type="submit" name="delete9" class="extras" value="delete" style="float: right;"/>
                        <input type="submit" name="edit9" class="extras" value="update" style="float: right;"/>
                        <input type="submit" name="insert9" class="extras" value="insert" style="float: right;"/>
                    </form>

                    <table style="width:100%">
                        <caption>Film Category</caption>
                        <tr>
                            <th>Film ID</th>
                            <th>Category ID</th>
                            <th>Last Update</th>
                        </tr>
    </body>
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

                if(array_key_exists("inventory", $_POST)) {
                    $sql = "SELECT * FROM inventory;";
                    $results = mysqli_query($conn, $sql);
        ?>
                    <form action="updateTable.php" method="post">                      
                        <input type="submit" name="delete11" class="extras" value="delete" style="float: right;"/>
                        <input type="submit" name="edit11" class="extras" value="update" style="float: right;"/>
                        <input type="submit" name="insert11" class="extras" value="insert" style="float: right;"/>
                    </form>

                    <table style="width:100%">
                        <caption>Inventory</caption>
                        <tr>
                            <th>Inventory ID</th>
                            <th>Film ID</th>
                            <th>Store ID</th>
                            <th>Last Update</th>
                        </tr>
    </body>
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

                if(array_key_exists("language", $_POST)) {
                    $sql = "SELECT * FROM language;";
                    $results = mysqli_query($conn, $sql);
        ?>
                    <form action="updateTable.php" method="post">
                        <input type="submit" name="delete12" class="extras" value="delete" style="float: right;"/>
                        <input type="submit" name="edit12" class="extras" value="update" style="float: right;"/>
                        <input type="submit" name="insert12" class="extras" value="insert" style="float: right;"/>
                    </form>

                    <table style="width:100%">
                        <caption>Language</caption>
                        <tr>
                            <th>Language ID</th>
                            <th>Name</th>
                            <th>Last Update</th>
                        </tr>
    </body>
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

                if(array_key_exists("payment", $_POST)) {
                    $sql = "SELECT * FROM payment;";
                    $results = mysqli_query($conn, $sql);
        ?>
                    <form action="updateTable.php" method="post">                       
                        <input type="submit" name="delete13" class="extras" value="delete" style="float: right;"/>
                        <input type="submit" name="edit13" class="extras" value="update" style="float: right;"/>
                        <input type="submit" name="insert13" class="extras" value="insert" style="float: right;"/>
                    </form>

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
    </body>
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

                if(array_key_exists("rental", $_POST)) {
                    $sql = "SELECT * FROM rental;";
                    $results = mysqli_query($conn, $sql);
        ?>
                    <form action="updateTable.php" method="post">
                        <input type="submit" name="delete14" class="extras" value="delete" style="float: right;"/>
                        <input type="submit" name="edit14" class="extras" value="update" style="float: right;"/>
                        <input type="submit" name="insert14" class="extras" value="insert" style="float: right;"/>
                    </form>

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
    </body>
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

                if(array_key_exists("staff", $_POST)) {
                    $sql = "SELECT * FROM staff;";
                    $results = mysqli_query($conn, $sql);
        ?>
                    <form action="updateTable.php" method="post">
                        <input type="submit" name="delete15" class="extras" value="delete" style="float: right;"/>
                        <input type="submit" name="edit15" class="extras" value="update" style="float: right;"/>
                        <input type="submit" name="insert15" class="extras" value="insert" style="float: right;"/>
                    </form>

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
    </body>
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

                if(array_key_exists("store", $_POST)) {
                    $sql = "SELECT * FROM store;";
                    $results = mysqli_query($conn, $sql);
        ?>
                    <form action="updateTable.php" method="post">
                        <input type="submit" name="delete16" class="extras" value="delete" style="float: right;"/>
                        <input type="submit" name="edit16" class="extras" value="update" style="float: right;"/>
                        <input type="submit" name="insert16" class="extras" value="insert" style="float: right;"/>
                    </form>

                    <table style="width:100%">
                        <caption>Store</caption>
                        <tr>
                            <th>Store ID</th>
                            <th>Manager Staff ID</th>
                            <th>Address ID</th>
                            <th>Last Update</th>
                        </tr>
    </body>
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

            //}

    ?> 
    </table>

</html>