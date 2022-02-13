<?php

$conn = mysqli_connect('localhost', 'chunghyun', 'ch656895!','novamarket');

if($conn){
  $sql = "SELECT * FROM USER WHERE email = '$_POST[email]'";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_array($result);

  if($row == 0){
    //회원DB에 일치하는 이메일이 없으면
    echo 1;
  }else{//회원DB에 일치하는 이메일이 있으면
    echo $row['email'];
  }
}else{
  echo "실패";
}
?>