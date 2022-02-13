<?php 
$conn = mysqli_connect('localhost', 'chunghyun', 'ch656895!','novamarket');
//사용자 번호 가져오기
$userIdx = $_POST[userIdx];
$sql = "SELECT * FROM market_post WHERE seller = '$userIdx' AND isSale = '0'";
$result = mysqli_query($conn,$sql);

$result_array = array();//JSONArray로 만들 변수선언

while($row = mysqli_fetch_assoc($result)){
    $result_array[] = $row;
    
    $postNumber = $row[idx];//게시글 번호
    //게시글 번호로 게시글 이미지 테이블 접근
    $sql_img = "SELECT fileName FROM market_img WHERE postNumber = '$postNumber' LIMIT 1";
    $result_img = mysqli_query($conn,$sql_img);
    $row_img = mysqli_fetch_assoc($result_img);

    $result_array[] = $row_img;
}

$result_array = json_encode($result_array,JSON_UNESCAPED_UNICODE); 
print($result_array); //JSONArray 출력
?>