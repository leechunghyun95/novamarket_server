<?php

$conn = mysqli_connect('localhost', 'chunghyun', 'ch656895!','novamarket');

if($conn){
  $sql = "INSERT INTO USER(telephone,email,nickname,profile_image) VALUES('$_POST[telephone]','$_POST[email]','$_POST[nickname]','$_POST[profile_image]')";
  $result = mysqli_query($conn,$sql);
  
  if($result){//회원가입 성공했을때
      echo 1;
  }else{

  }
}else{
  echo "실패";
}
?>