<?php 
$conn = mysqli_connect('localhost', 'chunghyun', 'ch656895!','novamarket');

$sql = "SELECT * FROM nova_post JOIN USER ON nova_post.writer = USER.idx WHERE nova_post.idx = '$_GET[postNumber]'";
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

            //배열에 게시글 JOIN 유저 테이블 데이터 담는다.
            $row = mysqli_fetch_assoc($result);
            $result_array[] = $row;

            //좋아요 
            $sql_like = "SELECT * FROM nova_like WHERE userNumber = '$_POST[userNumber]' AND postNumber = '$_GET[postNumber]'";
            $result_like = mysqli_query($conn,$sql_like);
            if($result_like->num_rows == 0){
               $row_like->check = "0";
            }
            else{
                $row_like->check = "1";
            }

            //좋아요 숫자
            $sql_count_like = "SELECT * FROM nova_like WHERE postNumber = '$_GET[postNumber]'";
            $result_count_like = mysqli_query($conn,$sql_count_like);
            $count = mysqli_num_rows($result_count_like);

            $row_like->count = $count;

            
            $result_array[] = $row_like;

           
            $sql_img = "SELECT * FROM nova_img WHERE postNumber = '$_GET[postNumber]'";
            $result_img = mysqli_query($conn,$sql_img);
            
            if($result_img -> num_rows==0){

            }else{
                while($row_img = mysqli_fetch_assoc($result_img)){
                    $result_array[] = $row_img;
                }
            }
        
        //   while($row = mysqli_fetch_assoc($result)){  

        //     $sql_img = "SELECT * FROM market_img WHERE postNumber = '$_GET[postNumber]'";
        //     $result_img = mysqli_query($conn,$sql_img);
        //     $row_img = mysqli_fetch_assoc($result_img);
        
        //     $result_array[] = $row;  //배열에 모든데이터를 담습니다.

        //     $result_array[] = $row_img;

        //   }
        }

          $result_array = json_encode($result_array,JSON_UNESCAPED_UNICODE); 

          print($result_array); //JSONArray 출력



   

       

        
}else{
    echo "없음";
}

mysqli_close($conn);


?>