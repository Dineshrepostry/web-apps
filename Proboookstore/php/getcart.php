<?php
    session_start();
    $arr=[1,2,3,4,5,6,7,8];
    if(array_key_exists("cart",$_SESSION) && count($_SESSION["cart"])!=0  ){
        $cart=$_SESSION["cart"];
        foreach ($cart as $key => $val){
            echo "<span class='item'>"."<span class='prdnm' >".$key."</span>"."<span>x".$val["quantity"]."</span>"."<span class='price'>Rs.".$val["price"]."</span>"."<button class=\"removebtn\" onclick=\"removeItem('$key')\">remove</button></span>";
            }
            echo "<button class='buy' onclick='buy()'>Checkout</button>";
        }
    else{
        echo "<img src='images/cart/".$arr[rand(0,7)].".jpg' width='250' />";
        echo "<span class='item'><span><b>Your cart is empty</b></span></span>";
    }
?>
        