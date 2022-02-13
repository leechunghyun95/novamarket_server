<?php
    $conn = mysqli_connect('localhost', 'chunghyun', 'ch656895!','novamarket');
    
    $postNumber = $_POST[postNumber];
    $userNumber = $_POST[userNumber];

    $sql = "DELETE FROM nova_like WHERE postNumber = '$postNumber' AND userNumber = '$userNumber'";
    echo $sql;
    mysqli_query($conn,$sql);
?>