<?php
    session_start();
    $cart=$_SESSION["cart"];
    if (array_key_exists($_POST["item"], $cart)) {
        $cart[$_POST["item"]]["quantity"]-=1;
        if($cart[$_POST["item"]]["quantity"] == 0){
            unset($cart[$_POST["item"]]);
        }
    }
    
    $_SESSION["cart"]=$cart;
    foreach ($_SESSION["cart"] as $key => $val){
        echo "<span class='item'>"."<span class='prdnm' >".$key."</span>"."<span>x".$val["quantity"]."</span>"."<span class='price'>Rs.".$val["price"]."</span>"."<button class=\"removebtn\" onclick=\"removeItem('$key')\">remove</button></span>";
    }
?>