<?php

$conn = mysqli_connect('localhost', 'chunghyun', 'ch656895!','novamarket');

if($conn){
  $sql = "SELECT * FROM USER WHERE telephone = '$_POST[telephone]'";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_array($result);

  if($row == 0){
    //회원DB에 일치하는 전화번호가 없으면
    echo 1;
  }else{//회원DB에서 전화번호로 검색 결과

    

    $myObj->idx = $row['idx'];
    $myObj->telephone = $row['telephone'];
    $myObj->nickname = $row[nickname];
    $myObj->email = $row['email'];
    $myObj->profile_image = $row['profile_image'];

    $myJSON = json_encode($myObj, JSON_UNESCAPED_UNICODE);

    echo $myJSON;
  }
}else{
  echo "실패";
}
?>