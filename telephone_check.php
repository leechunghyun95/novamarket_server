<?php

$conn = mysqli_connect('localhost', 'chunghyun', 'ch656895!','novamarket');

if($conn){
  $sql = "SELECT * FROM USER WHERE telephone = '$_POST[telephone]'";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_array($result);

  if($row == 0){
    //회원DB에 일치하는 전화번호가 없으면
    echo 1;
  }else{//전화번호 이미 가입되어있으면
    echo row['telephone'];
    echo row['nickname'];
    echo row['email'];
    echo row['profile_image'];
  }
}else{
  echo "실패";
}
?>