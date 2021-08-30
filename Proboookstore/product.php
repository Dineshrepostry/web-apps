<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>ProBookStore</title>
        <meta name="author" content="Dinesh">
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/home1.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <link rel="icon" type="image/png" href="images/favicon.png"/>
    </head>
    <body onload="product()">
       
        <header>
        <img src="images/logo.png" alt="logo" width="200"/>
           
            <div onclick="cart()" class="dropdown">
                My cart
            </div>
        </header>
        <div class="outer">
       
            <div class="des">
                <img src="" class="productimg" alt="productimg" />

                <div class="cont">
                    <div class="product">
                        <span><span class="title"></span></span>
                        <span><b>Category:</b> <span class="catego"></span></span>
                        <span><b> Author:</b> <span class="author"></span></span>
                        <span><b>Year of publishment:</b><span class="year"></span></span>
                        <span><b>Price: <span class="price"></b></span></span>
                    </div>
                    <button class="add">Add to cart</button>
                </div>
            </div>
        </div>
        <div class="cart">
            <div class="items">

            </div>
           
        </div>
            <script>
                var click=1;
                function cart(){
                    if(click==1){
                    document.querySelector(".cart").style.display="block";
                        click*=-1;
                        $(".items").load("php/getcart.php");
                    }
                    else{
                        document.querySelector(".cart").style.display="none";
                        click*=-1; 
                    }
                }   
                function product(){
                    document.querySelector(".productimg").src="images/"+ localStorage.getItem("id") + ".jpg";
                    document.querySelector(".title").innerHTML=localStorage.getItem("title");
                    document.querySelector(".catego").innerHTML=localStorage.getItem("category");
                    document.querySelector(".author").innerHTML=localStorage.getItem("author");
                    document.querySelector(".year").innerHTML=localStorage.getItem("year");
                    document.querySelector(".price").innerHTML="Rs."+localStorage.getItem("price");
                }
                
                function buy(){
                    window.location = "php/buy.php";
                }

                function removeItem(title){
                    $.post("php/removeitem.php",{item:title},function(data){
                       
                        $(".items").load("php/getcart.php");
                    });

                }

                $(document).ready(function(){
                   
                    $(".add").click(function(){
                       
                        $.post("php/addtocart.php",{item:localStorage.getItem("title"),price:localStorage.getItem("price")},function(d){
                            $(".items").load("php/getcart.php");
                        });

                    });
                
                });

                
            </script>
    </body>
</html>