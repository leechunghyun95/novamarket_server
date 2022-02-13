<?php 
$conn = mysqli_connect('localhost', 'chunghyun', 'ch656895!','novamarket');
echo $_POST['postNumber'];
echo $_POST['userNumber'];
echo $_POST['reply'];
$sql = "INSERT INTO reply (postNumber,userNumber,reply) VALUES ('$_POST[postNumber]','$_POST[userNumber]','$_POST[reply]')";

echo $sql;
$result = mysqli_query($conn,$sql);

?>