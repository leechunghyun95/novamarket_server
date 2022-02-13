<?php 
$conn = mysqli_connect('localhost', 'chunghyun', 'ch656895!','novamarket');

$sql = "SELECT * FROM market_post JOIN (SELECT DISTINCT postNumber FROM market_img)mi ON market_post.idx = mi.postNumber ORDER BY idx DESC";
$result = mysqli_query($conn,$sql);



if($result){

    //게시글 보기 화면에선 이렇게 전체 데이터 다보내기
    //JSONArray로 만들 변수선언
    $result_array = array();
    if($result->num_rows==0){       

        // $result->num_rows 는 $result 변수에 몇개의 데이터가 있는지를 알수 있습니다. 연관배열 이라는 키워드로 검색해보세요~
        
    
          die("데이터가 하나도 없네요.");
        
        }
        
        else{  //데이터가 존재할경우 JSONArray생성
        
          while($row = mysqli_fetch_assoc($result)){  

            $sql_img = "SELECT * FROM market_img WHERE postNumber = '$row[idx]' LIMIT 1";
            $result_img = mysqli_query($conn,$sql_img);
            $row_img = mysqli_fetch_assoc($result_img);
        
            $result_array[] = $row;  //배열에 모든데이터를 담습니다.

            $result_array[] = $row_img;

          }
        }

          $result_array = json_encode($result_array,JSON_UNESCAPED_UNICODE); 

          print($result_array); //JSONArray 출력



   

       

        
}else{
    echo "없음";
}

mysqli_close($conn);


?>