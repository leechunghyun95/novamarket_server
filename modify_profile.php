<?php

$conn = mysqli_connect('localhost', 'chunghyun', 'ch656895!','novamarket');

if($conn){
  $sql = "UPDATE USER SET nickname = '$_POST[nickname]', email = '$_POST[email]', profile_image = '$_POST[profile_image]' WHERE telephone = '$_POST[telephone]'";
  $result = mysqli_query($conn,$sql);
  

  if($result){
    //회원 프로필 수정 성공하면
    echo 1;
  }else{//회원 프로필 수정 실패하면

  }
}else{
  echo "실패";
}
?>