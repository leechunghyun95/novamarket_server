<?php 
$conn = mysqli_connect('localhost', 'chunghyun', 'ch656895!','novamarket');

$sql = "SELECT * FROM reply JOIN USER ON reply.userNumber = USER.idx WHERE postNumber = '$_GET[postNumber]'";

$result = mysqli_query($conn,$sql);


if($result){

    //JSONArray로 만들 변수선언
    $result_array = array();
    if($result->num_rows==0){       

        // $result->num_rows 는 $result 변수에 몇개의 데이터가 있는지를 알수 있습니다. 연관배열 이라는 키워드로 검색해보세요~
        
    
          die("0");
        
        }
        
        else{  //데이터가 존재할경우 JSONArray생성
        
          while($row = mysqli_fetch_assoc($result)){  
        
            $result_array[] = $row;  //배열에 모든데이터를 담습니다.
          }
        }

          $result_array = json_encode($result_array,JSON_UNESCAPED_UNICODE); 

          print($result_array); //JSONArray 출력



   

       

        
}else{
    echo "없음";
}

?>