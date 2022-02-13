<?php 
$conn = mysqli_connect('localhost', 'chunghyun', 'ch656895!','novamarket');

$sql = "DELETE FROM market_post WHERE idx = '$_GET[postNumber]'";
$result = mysqli_query($conn,$sql);



if($result){
    echo 1;
}else{
    echo 0;
}

mysqli_close($conn);


?>