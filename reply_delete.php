<?php 
$conn = mysqli_connect('localhost', 'chunghyun', 'ch656895!','novamarket');

$sql = "DELETE FROM reply WHERE reply = '$_GET[reply]'";
// echo $sql;

$result = mysqli_query($conn,$sql);


?>