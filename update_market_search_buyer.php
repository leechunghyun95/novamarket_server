<?php
    $conn = mysqli_connect('localhost', 'chunghyun', 'ch656895!','novamarket');
    $postNumber = $_POST[postNumber];
    //채팅방 DB 접근해서 게시글 번호 일치하는 row가져오기
    $sql_chat = "SELECT buyer FROM chat_room WHERE post_number = '$postNumber'";
    $result_chat = mysqli_query($conn,$sql_chat);

    $result_array = array();//JSONArray로 만들 변수선언

    while($row = mysqli_fetch_assoc($result_chat)){
        $buyer = $row[buyer];
        
        $sql_buyer = "SELECT idx,nickname,profile_image FROM USER WHERE idx = '$buyer'";
        $result_buyer = mysqli_query($conn,$sql_buyer);
        $row_buyer = mysqli_fetch_assoc($result_buyer);

        $result_array[] = $row_buyer;
    }
    $result_array = json_encode($result_array,JSON_UNESCAPED_UNICODE); 
    print($result_array); //JSONArray 출력

?>