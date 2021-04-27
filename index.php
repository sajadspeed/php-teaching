<?php

    function title($title)
    {
        echo "<title>$title | Bestmag.com</title>";
    }

    function _header(){
        return "
            <header>
                <h1>Hello world</h1>
            </header>
        ";
    }

    function echo_array($array){
        echo "THIS IS YOUR ARRAY: ";
        echo "<ul>";
        foreach ($array as $value) {

            if(odd($value) == false)
                echo "<li>_$value</li>";
            else
                echo "<li>$value</li>";
                
        }
        echo "</ul>";
    }

    function odd($number){
        if($number % 2 == 0)
            return true;
        else
            return false;
    }

?>
<html>
    <head>
        <?php 
            title(555);
        ?>
    </head>
    <body>
        <?php
            echo _header();
            $numbers = [1,2,3,4,5];
            echo_array($numbers);
        ?>
    </body>
</html>