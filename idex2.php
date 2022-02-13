<?php 
$conn = mysqli_connect('localhost', 'chunghyun', 'ch656895!','novamarket');

$postNumber = $_POST[postNumber];// 중고거래 게시글 번호
$buyer = $_POST[buyer];// 구매 희망자 
$sender = $_POST[sender];//메세지 전송한 사람 
$message = $_POST[message];// 메세지 내용

//채팅방 테이블에서 중고거래게시글번호와 구매자 일치하는 결과 있는지 검사
//없으면 방만들기
//있으면 메세지만 update
$sql = "SELECT * FROM chat_room WHERE postNumber = '$postNumber' AND buyer = '$buyer'";
echo $sql;
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);

if($row == 0){
}else{
    $chatRoomNumber = $row[idx]
    $sql = "INSERT INTO chat_msg (chatRoomNumber,sender,msg) VALUES ('$chatRoomNumber','$userIdx','$message')"
    mysqli_query($conn,$sql)
}
?>