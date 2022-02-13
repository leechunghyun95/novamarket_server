<?php 
    $conn = mysqli_connect('localhost', 'chunghyun', 'ch656895!','novamarket');

    $userIdx = $_POST[userIdx];//사용자 번호

    $sql = "SELECT postNumber FROM market_like  WHERE userNumber = '$userIdx'";
    $result = mysqli_query($conn,$sql);
    
    $result_array = array();//JSONArray로 만들 변수선언

    while($row = mysqli_fetch_assoc($result)){
        $postNumber = $row[postNumber];//사용자가 누른 게시글 번호
        //1.번호와 일치하는 게시글 데이터가져오기
        //2.게시글 이미지 가져오기

        $sql2 = "SELECT * FROM market_post WHERE idx = '$postNumber'";
        $result2 = mysqli_query($conn,$sql2);
        $row2 = mysqli_fetch_assoc($result2);

        //게시글 데이터 담기
        $result_array[] = $row2;

        $sql3 = "SELECT fileName FROM market_img WHERE postNumber = '$postNumber' LIMIT 1";
        $result3 = mysqli_query($conn,$sql3);
        $row3 = mysqli_fetch_assoc($result3);

        $result_array[] = $row3;
    }
    
    $result_array = json_encode($result_array,JSON_UNESCAPED_UNICODE); 
    print($result_array); //JSONArray 출력

?>