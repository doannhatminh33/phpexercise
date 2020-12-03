<!DOCTYPE html>
<html lang ="en">
<head>
    <meta charset="UTF-8">
    <link rel = "stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
</body>
</html>
<?php
    include "Model/DBConfig.php";
    $db = new Database;
    $db->connect();

    if(isset($_GET['controller'])){
        $controller = $_GET['controller'];
    }
    else{
        $controller ='';
    }
    switch($controller){
        case 'thanh-vien':{
            require_once('Controller/thanhvien/index.php');
        }
    }
?>