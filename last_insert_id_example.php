<?php 
$conn = mysqli_connect('localhost', 'chunghyun', 'ch656895!','novamarket');

$sql = "SELECT * FROM market_post ORDER BY idx DESC";
$result = mysqli_query($conn,$sql);

$row = mysqli_fetch_assoc($result);


if($result){

    

    

    // while($row = mysqli_fetch_array($result)){
    //     $postNumber = $row['idx'];//게시글 번호

    //     echo "게시글 번호: ".$postNumber;
    //     $sql_img = "SELECT * FROM market_img WHERE postNumber = '$postNumber'";//게시물 번호에 맞는 이미지
    //     $result_img = mysqli_query($conn,$sql_img)
    //     if($result_img->num_rows==0){
            
    //         echo "이미지 없다";
    //         }else{

    //         echo $row_img['fileName'];
        
    //     }


        $marketObj -> idx = $row['idx'];
        $marketObj -> title = $row['title'];
        $marketObj -> price = $row['price'];
        $marketObj -> time = $row['time'];

        $marketJSON = json_encode($marketObj);

        $result_array[] = $marketJSON;
    }

    $result_array = json_encode($result_array,JSON_UNESCAPED_UNICODE); 
    print($result_array); //JSONArray 출력


     for($i = 0; $i < 5; $i++){
     
        $marketObj -> idx = $row['idx'];
        $marketObj -> title = $row['title'];
        $marketObj -> price = $row['price'];
        $marketObj -> time = $row['time'];

        $marketJSON = json_encode($marketObj);

         = $marketJSON;

    }

    echo $maket_post;
    


    게시글 보기 화면에선 이렇게 전체 데이터 다보내기
    JSONArray로 만들 변수선언
    $result_array = array();
    if($result->num_rows==0){       

        // $result->num_rows 는 $result 변수에 몇개의 데이터가 있는지를 알수 있습니다. 연관배열 이라는 키워드로 검색해보세요~
        
    
          die("데이터가 하나도 없네요.");
        
        }
        
        // else{  //데이터가 존재할경우 JSONArray생성
        
          while($row = mysqli_fetch_assoc($result)){  
        
        
        
            $result_array[] = $row;  //배열에 모든데이터를 담습니다.


          }

          $result_array = json_encode($result_array,JSON_UNESCAPED_UNICODE); 

          print($result_array); //JSONArray 출력



   

       

        
}else{
    echo "없음";
}

mysqli_close($conn);


?>