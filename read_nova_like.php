<?php
    $conn = mysqli_connect('localhost', 'chunghyun', 'ch656895!','novamarket');

    $userIdx = $_POST[userIdx];//사용자 번호

    $sql = "SELECT postNumber FROM nova_like  WHERE userNumber = '$userIdx'";

    
    $result = mysqli_query($conn,$sql);
    
    $result_array = array();//JSONArray로 만들 변수선언

    while($row = mysqli_fetch_assoc($result)){
        $postNumber = $row[postNumber];//사용자가 좋아요한 게시글 번호

        $sql_like_nova =   "SELECT nova_post.idx,nova_post.time,nova_post.subject,nova_post.contents,USER.nickname
                            FROM nova_post 
                            JOIN USER 
                            ON nova_post.writer = USER.idx 
                            WHERE nova_post.idx = $postNumber";
        

        $result_like_nova = mysqli_query($conn,$sql_like_nova);
        while($row_like_nova = mysqli_fetch_assoc($result_like_nova)){
            $sql_img = "SELECT * FROM nova_img WHERE postNumber = '$row_like_nova[idx]' LIMIT 1";
            
            $result_img = mysqli_query($conn,$sql_img);
            $row_img = mysqli_fetch_assoc($result_img);
            
            $result_array[] = $row_like_nova;  //배열에 모든데이터를 담습니다.

            
            $result_array[] = $row_img;

        }
    }

    $result_array = json_encode($result_array,JSON_UNESCAPED_UNICODE); 

    print($result_array); //JSONArray 출력


?>