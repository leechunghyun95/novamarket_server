<?php
     $host = 'localhost';
     $user = 'chunghyun';
     $pw = 'ch656895!';
     $dbName = 'novamarket';
     // $mysqli = new mysqli($host, $user, $pw, $dbName);
 
     $conn = mysqli_connect('localhost','chunghyun','ch656895!','novamarket');
 
     if($conn){
         echo "성공";
         $id = $_POST['id'];
         $pw = $_POST['pw'];

         $sql = "SELECT * FROM userExample WHERE username = '$id' AND password = '$pw'";
         $result = mysqli_query($conn,$sql);
         $row = mysqli_fetch_array($result);
         print_r($row);


         if($row == 0){
            //아이디와 비밀번호가 일치하지 않으면 실패
             echo 1;
         }else {
             //일치하면 성공
             echo $row['nickname'];
             exit();
         }
     }else{
         echo "실패";
     }
     

    // //넘어온 폼 데이터 id, pw
    // $id = $_POST['id'];
    // $pw = $_POST['pw'];

    // $sql = "SELECT * FROM userExample WHERE id='$id' AND (pw='$pw')";
    // // echo  $sql;
    // $result = mysqli_query($conn, $sql);
    // $member = mysqli_fetch_array($result);
    // print_r($member);
    // // 아이디와 비밀번호가 일치하지 않으면 실패
	// if($member==0){
    //     echo 1;
    // // 일치하면 성공
    // }else{
    //     echo $member['nickname'];
    //     exit();
    // }

    
?>