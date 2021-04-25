<?php

    $arr = [8,2,9,4,9,6,7,5,2,8,8,8,8,9,9,2,4];

    $length = count($arr);
    for ($i=0; $i < $length; $i++){ 
        $repeat = false;
        for ($j=$i+1; $j < $length; $j++) { 
            if($arr[$i] == $arr[$j]){
                $repeat = true;
            }
        }
        if(!$repeat)
            echo $arr[$i];
        echo "<br>";
    }
    /*
    if(isset($_POST['submit']))
    {
        if($_POST['username'] == "admin" && $_POST['password'] == "admin"){
            echo "Access";
        }
        else{
            echo "Access denied";
        }
    }*/
?>
<!--
<form action="" method="POST">
    <input type="text" name="username" placeholder="Username:" required>
    <input type="text" name="password" placeholder="Password:" required>

    <button name="submit">Login</button>
</form> -->