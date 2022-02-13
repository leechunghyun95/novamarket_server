<?php 
$conn = mysqli_connect('localhost', 'chunghyun', 'ch656895!','novamarket');


$postNumber = $_POST[postNumber];
$chatRoom = $_POST[chatRoom];


$result_array = array();

// 게시글 제목, 이미지, 가격 가져오기
// 게시글 제목, 가격 가져오기
$sql_post = "SELECT title, price,seller FROM market_post WHERE idx = '$postNumber'";
$result_post = mysqli_query($conn,$sql_post);
$row_post = mysqli_fetch_assoc($result_post);
$seller = $row_post[seller];//게시글 판매자 누구인지

$result_array[] = $row_post;

//게시글 이미지 가져오기
$sql_post_img = "SELECT fileName FROM market_img WHERE postNumber = '$postNumber'";
$result_post_img = mysqli_query($conn,$sql_post_img);
$row_post_img = mysqli_fetch_assoc($result_post_img);

$result_array[] = $row_post_img;

// 채팅방 판매자, 구매자의 번호, 닉네임, 이미지 가져오기


//판매자의 닉네임, 이미지 가져오기
$sql_seller = "SELECT nickname, profile_image FROM USER WHERE idx = '$seller'";
$result_seller = mysqli_query($conn,$sql_seller);
$row_seller = mysqli_fetch_assoc($result_seller);

$result_array[] = $row_seller;


//구매자의 번호,닉네임,이미지 가져오기
//구매자의 번호가져오기
$sql_buyer_idx = "SELECT buyer FROM chat_room WHERE roomName = '$chatRoom'";
$result_buyer_idx = mysqli_query($conn,$sql_buyer_idx);
$row_buyer_idx = mysqli_fetch_assoc($result_buyer_idx);

$result_array[] = $row_buyer_idx;

$buyer = $row_buyer_idx[buyer];

//구매자의 닉네임, 이미지 가져오기
$sql_buyer = "SELECT nickname, profile_image FROM USER WHERE idx = '$buyer'";
$result_buyer = mysqli_query($conn,$sql_buyer);
$row_buyer = mysqli_fetch_assoc($result_buyer);

$result_array[] = $row_buyer;

// //저장된 메세지 개수 가져오기
// $sql_num = "SELECT COUNT * FROM chat_msg WHERE roomName = '$chatRoom'";
// $result_num = mysqli_query($conn,$sql_num);
// $row_num = mysqli_fetch_assoc($result_num);
// $chat_count = $row_num[COUNT];
// echo $chat_count;
//저장된 메세지 가져오기
$sql_chat = "SELECT * FROM chat_msg WHERE roomName = '$chatRoom'";
$result_chat = mysqli_query($conn,$sql_chat);

while($row_chat = mysqli_fetch_assoc($result_chat)){
    $result_array[] = $row_chat;
}

$result_array = json_encode($result_array,JSON_UNESCAPED_UNICODE); 

print($result_array); //JSONArray 출력

?>