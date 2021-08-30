<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Palindrome</title>
        <meta name="author" content="Dinesh">
        <meta charset="utf-8">
        <link rel="stylesheet" href="../css/styles.css"/>
    </head>
    <body>
        <?php
            if(array_key_exists("submit",$_GET)){
            $str=strtolower($_GET["str"]);
            $str=preg_replace('/[^A-Za-z0-9\' \']/', '', $str);
            echo "<div style='color:white;'>";
            if ($str == strrev($str) && $str==str_replace(" ","",$str)){
                echo "one-word palindrome";
            }
            else if($str == strrev($str) && $str != str_replace(" ","",$str) ){
                echo "phrase palindrome taking spaces into account.";
            }
            else if(str_replace(" ","",$str) == strrev(str_replace(" ","",$str)) ){
                echo "palindrome when spaces are ignored";
            }
            else {
                echo "not a palindrome";
            }
            echo "</div>";
            echo "<br/>><a href='../html/palindrome.html'>Go back</a>";
        }
        else{
            header("location: ../html/palindrome.html");
        }

        ?>
    </body>
</html>
