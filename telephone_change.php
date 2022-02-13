<?php

$conn = mysqli_connect('localhost', 'chunghyun', 'ch656895!','novamarket');

if($conn){
  $sql = "UPDATE USER SET telephone = '$_POST[telephone]' WHERE email = '$_POST[email]'";
  $result = mysqli_query($conn,$sql);

  if($result){
    //전화번호 update 성공!
    echo 1;
  }else{//전화번호 update 실패
    
  }
}else{
  echo "실패";
}
?>