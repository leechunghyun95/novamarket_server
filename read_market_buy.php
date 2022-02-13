<?php 
    $conn = mysqli_connect('localhost', 'chunghyun', 'ch656895!','novamarket');

    $userIdx = $_POST[userIdx];//사용자 번호

    $result_array = array();//JSONArray로 만들 변수선언

    $sql = "SELECT * FROM market_post WHERE buyer = '$userIdx' ORDER BY `market_post`.`time` DESC";
    $result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_assoc($result)){
        $result_array[] = $row;
        
        //게시판 번호로 게시판 이미지테이블에서 이미지 하나 가져오기
        $postNumber = $row[idx];
        $sql2 = "SELECT fileName FROM market_img WHERE postNumber = '$postNumber' LIMIT 1";
        $result2 = mysqli_query($conn,$sql2);
        $row2 = mysqli_fetch_assoc($result2);

        $result_array[] = $row2;
    }

    $result_array = json_encode($result_array,JSON_UNESCAPED_UNICODE); 
    print($result_array); //JSONArray 출력
?>