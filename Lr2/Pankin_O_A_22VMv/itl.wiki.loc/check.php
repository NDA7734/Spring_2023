<?php
$login = filter_var(trim($_POST['login']),
FILTER_SANITIZE_STRING);

$name = filter_var(trim($_POST['name']),
FILTER_SANITIZE_STRING);

$pass = filter_var(trim($_POST['pass']),
FILTER_SANITIZE_STRING);


if(mb_strlen($login)<3 || mb_strlen($login)>25){
    echo "Недопустимая длина логина";
    exit();
    } else if (mb_strlen($name)<3 || mb_strlen($name)>15){
        echo "Недопустимая длина имени";
        exit();
    }else if (mb_strlen($pass)<5 || mb_strlen($pass)>15){
        echo "Недопустимая длина пароля";
        exit();
    }

    $pass = md5($pass."porkonfk.!4179");

    $mysql=new mysqli('localhost','root','','itl.wiki');
    $mysql -> query ("INSERT INTO `users`(`login`,`pass`,`name`)

    VALUES ('$login','$pass','$name')"); 

    $mysql-> close();

    header ('Location: http://itl.wiki.loc/whod.php');
?>
