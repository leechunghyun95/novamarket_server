<?php
    $conn = mysqli_connect('localhost', 'chunghyun', 'ch656895!','novamarket');
    
    $postNumber = $_POST[postNumber];
    $userNumber = $_POST[userNumber];

    $sql = "DELETE FROM market_like WHERE postNumber = '$postNumber' AND userNumber = '$userNumber'";
    mysqli_query($conn,$sql);
?>