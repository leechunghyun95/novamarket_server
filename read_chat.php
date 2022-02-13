<?php 
$conn = mysqli_connect('localhost', 'chunghyun', 'ch656895!','novamarket');
$chatRoom = $_POST[chatRoom];
$page = (int)$_POST[page];
$start = (int)$page*10-9;
$end = (int)$page*10;


$result_array = array();

//저장된 메세지 가져오기
$sql_chat = "SELECT * FROM chat_msg WHERE roomName = '$chatRoom' LIMIT $start, $end";
$result_chat = mysqli_query($conn,$sql_chat);

while($row_chat = mysqli_fetch_assoc($result_chat)){
    $result_array[] = $row_chat;
}
$result_array = json_encode($result_array,JSON_UNESCAPED_UNICODE); 

print($result_array); //JSONArray 출력

?>