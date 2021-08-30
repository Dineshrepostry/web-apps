<?php
    session_start();
    if (array_key_exists("cart",$_SESSION)){
        $cart=$_SESSION["cart"];
        if (array_key_exists($_POST["item"],$cart)) {
            echo "<script>alert(\"item exist\")</script>";
            $cart[$_POST["item"]]["quantity"]+=1;
            $_SESSION["cart"]=$cart;
            foreach ($_SESSION["cart"] as $key => $val){
                echo "<span class='item'>"."<span class='prdnm' >".$key."</span>"."<span>x".$val["quantity"]."</span>"."<span class='price'>Rs.".$val["price"]."</span>"."<button class=\"removebtn\" onclick=\"removeItem('$key')\">remove</button></span>";
                }
        }
        else{
        $cart[$_POST["item"]]=array("quantity"=>1,"price"=>$_POST["price"]);
        $_SESSION["cart"]=$cart;
        foreach ($_SESSION["cart"] as $key => $val){
            echo "<span class='item'>"."<span class='prdnm' >".$key."</span>"."<span>x".$val["quantity"]."</span>"."<span class='price'>Rs.".$val["price"]."</span>"."<button class=\"removebtn\" onclick=\"removeItem('$key')\">remove</button></span>";
            }
        }
    }
    else{
       
            $_SESSION["cart"]=array();
            $cart[$_POST["item"]]=array("quantity"=>1,"price"=>$_POST["price"]);
            $_SESSION["cart"]=$cart;
            foreach ($_SESSION["cart"] as $key => $val){
                echo "<span class='item'>"."<span class='prdnm' >".$key."</span>"."<span>x".$val["quantity"]."</span>"."<span class='price'>Rs.".$val["price"]."</span>"."<button class=\"removebtn\" onclick=\"removeItem('$key')\">remove</button></span>";
                }
        
       
    }

?>