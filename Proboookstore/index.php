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
    <body>
        <header>
            <img src="images/logo.png" alt="logo" width="180"/>
            <form method="post" class="search" autocomplete="off">
                <input type="text" class="searchkey" name="search" placeholder="search by Tilte/author" required/>
                <input type="submit" name="searchsub" class="searchbtn" value="search"/>
            </form>
          
            <div onclick="cart()" class="dropdown">
                My cart
            </div>
        </header>
        <div class="outer">
            <nav>
                <h2 id="head">Shop by category</h2>
                <form method="get" class="category-search"> 
                    <input type="submit" class="category" value="CGI" name="category"/>
                    <input type="submit" class="category" value="Java" name="category"/>
                    <input type="submit" class="category" value="Linux" name="category"/>
                    <input type="submit" class="category" value="Perl" name="category"/>
                    <input type="submit" class="category" value="PHP" name="category"/>
                    <input type="submit" class="category" value="Python" name="category"/>
                    <input type="submit" class="category" value="Shell" name="category"/>
                    <input type="submit" class="category" value="all"/>
                </form>
              
            </nav>
            <div class="productcards">
                <?php
                    include_once "php/config.php";
                    if(!$conn){
                        die("connesction not established");
                    }
                    else{
                        if(array_key_exists("category",$_GET)){
                            $category=$_GET["category"];
                            $sql=" SELECT * FROM `books` WHERE category='$category';";
                        }
                        else if(array_key_exists("searchsub",$_POST)){
                            $search=mysqli_real_escape_string($conn,$_POST["search"]);
                            $sql=" SELECT * FROM `books` WHERE `title` LIKE '%$search%' OR `author` LIKE '%$search%' ;";
                        }
                        else{
                            $sql=" SELECT * FROM books ";
                        }
                        $result= mysqli_query($conn,$sql);
                        while ($row = mysqli_fetch_assoc($result)){
                      
                        echo "<div class='productcard' onclick=\"display('".$row['title']."','".$row['category']."','".$row['author']."','".$row['price'] ."','".$row["year"]."','".$row["id"]."')\"> <img src='images/".$row["id"].".jpg' class ='thumb' alt='productdescription'/></div>" ;
                        }
                    }
                    mysqli_close($conn);
                ?>
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
            function display(title,category,author,price,year,id){
                    window.location="product.php";
                    localStorage.setItem("id",id);
                    localStorage.setItem("title",title);
                    localStorage.setItem("category",category);
                    localStorage.setItem("author",author);
                    localStorage.setItem("price",price);
                    localStorage.setItem("year",year);
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
                    $("#add").click(function(){
                        alert("clicked");
                        $.post("php/addtocart.php",{item:localStorage.getItem("title")},function(d){
                           
                            $(".items").load("php/getcart.php");
                        });

                    });
              
                });
        </script>
    </body>
</html>