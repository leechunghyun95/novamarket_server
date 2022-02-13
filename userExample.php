<?php
    $host = 'localhost';
    $user = 'chunghyun';
    $pw = 'ch656895!';
    $dbName = 'novamarket';
    // $mysqli = new mysqli($host, $user, $pw, $dbName);

    $conn = mysqli_connect('localhost','chunghyun','ch656895!','novamarket');

    if($conn){

        $result = mysqli_query($conn,"INSERT INTO userExample(username, password, nickname) VALUES ('$_POST[id]','$_POST[pw]','$_POST[nickname]')");
    
        if($result){
            echo 1;
        }else{
            echo 0;
        }
    }else{
        echo "MySQL 접속 실패했음";
    }
 
?>