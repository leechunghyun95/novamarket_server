<?php

$conn = mysqli_connect('localhost', 'chunghyun', 'ch656895!','novamarket');

if($conn){
  $sql = "DELETE FROM USER WHERE telephone = '$_POST[telephone]'";
  $result = mysqli_query($conn,$sql);

  if($result){
    //회원탈퇴 성공
    echo 1;
  }else{//회원탈퇴 실패
    
  }
}else{
  echo "실패";
}
?>