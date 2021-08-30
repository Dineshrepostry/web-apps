<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>ProBookStore</title>
        <meta name="author" content="Dinesh">
        <meta charset="utf-8">
        <link rel="stylesheet" href="../css/home1.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <link rel="icon" type="image/png" href="../images/favicon.png"/>
    </head>
    <body>
        <header>
        <img src="../images/logo.png" alt="logo" width="200"/>
           
        </header>
        <div class="container">
            <div class="bill">
                <h1><u>Bill</u></h1>
                <?php

                    $total=0;
                    echo "<table>";
                    foreach ($_SESSION["cart"] as $key => $val){
                       
                        echo "<tr>"."<td><b>".$key ."</b></td><td>Quantity:".$val["quantity"]."</td><td>Rs.". $val["quantity"]*$val["price"]."</td></tr>";
                        $total+=$val["quantity"]*$val["price"];
                        
                    }
                    
                    echo "<tr><td colspan='2'><b>Grand total: </b></td><td><span class='price'>Rs.".$total."</td></tr></table>";
                ?>
            </div>
            <div class="buyfinal">
                <form method="get" class="details" autocomplete="off" onsubmit="redirect()">
                    <input type="text" class="cli-info" placeholder="Name" required/><br>
                    <input type="text" class="cli-info" placeholder="City" required/><br> 
                    <input type="text" class="cli-info" placeholder="Area" required/><br> 
                    <input type="text" class="cli-info" placeholder="Street name" required/><br> 
                    <input type="text" class="cli-info" placeholder="Mobile number" pattern="[0-9]{10}" required/><br> 
                    <input  type="tel"  class="cli-info" pattern="[0-9\s]{13,19}" maxlength="16" required id = 'credit' name = 'credit' placeholder="Credit card number: xxxxxxxxxxxxxxxx"><br> 
                    <input type="submit" value="Place Order" class="add" name="buy"/>
                </form>
            </div>
        </div>
        <?php
            if( array_key_exists("buy",$_GET)){
                session_destroy();
                header("location:../index.php");
            }
        ?>
        <script>
            function redirect(){
                alert("Order placed successfully!");
                window.location="../index.php";
            }
        </script>
    </body>
</html>