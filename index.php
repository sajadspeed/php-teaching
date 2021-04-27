<?php
    $users = [
        ["name"=>"user_1", "age"=>20],
        ["name"=>"user_2", "age"=>20],
        ["name"=>"user_3", "age"=>20],
        ["name"=>"user_4", "age"=>20],
        ["name"=>"user_5", "age"=>20],
        ["name"=>"user_6", "age"=>20],
        ["name"=>"user_7", "age"=>20],
        ["name"=>"user_8", "age"=>20],
        ["name"=>"user_9", "age"=>20],
    ]
?>

<html>
<head>
    <title>Section 3</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <table>
        <caption>Statement Summary</caption>
        <thead>
            <tr>
                <th>Name</th>
                <th>Age</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $count = count($users);
            $limit = 3;
            $page = 1;
            if(isset($_GET['page']))
                $page = $_GET['page'];

            $offset = ($page-1) * $limit;

            $reminder = $offset + $limit;

            if($count >= $reminder){
                for ($i=$offset; $i <= $reminder-1; $i++) { 
                    $user = $users[$i];
                    echo "
                        <tr>
                            <td>{$user['name']}</td>
                            <td>{$user['age']}</td>
                        </tr>
                    ";
                }
            }
        ?>
        </tbody>
    </table>
    <ul>
        <?php
            for ($i=1; $i <= ($count/$limit); $i++) { 
                $class="";
                if($page == $i)
                    $class = "class='active'";

                echo "
                    <li $class><a href='?page=$i'>$i</a></li>
                ";
            }
        ?>
    </ul>
</body>
</html>