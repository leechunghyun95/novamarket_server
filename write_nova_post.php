<?php
$conn = mysqli_connect('localhost', 'chunghyun', 'ch656895!','novamarket');



$novaObject = json_decode($_POST['novaObject']);

$contents = $novaObject -> contetns;
echo $contents;


$chat = 0;//채팅방 생성 여부

$contents = $novaObject -> contents;
$subject = $novaObject -> subject;
$isChat = $novaObject -> isChat;
if($isChat){
    $chat = 1;
}else{
    $chat = 0;
}
$writer = $novaObject -> writer;





//클라이언트에서 배열을 문자열로 형변환한 이미지 파일명을 다시 배열로 만듬.
$imgList_client = $_POST['imgList'];

// $str_replace(" ","",$imgList_client)
//받은 문자열에서 공백, []제거
$substr_imgList = substr($imgList_client,1,-1);

$imgList = explode(", ",$substr_imgList);









if($conn){
  //게시글 테이블 insert  
  $sql = "INSERT INTO nova_post (contents,subject,isChat,writer) VALUES('$contents', '$subject', '$chat', '$writer')";
  
  $result = mysqli_query($conn,$sql);

//   //게시글 번호 가져오기
  $post_no = mysqli_insert_id($conn);
//   echo "게시글 번호: ".$post_no;

//   echo "New record has id: " . mysqli_insert_id($conn);


    //이미지 테이블 insert
    for($i = 0; $i < count($imgList); $i++){
        // echo $imgList[i];
        $sql_img = "INSERT INTO nova_img (postNumber,fileName) VALUES ('$post_no','$imgList[$i]')";
        $result_img = mysqli_query($conn,$sql_img);
        
        if($result_img){
            echo $i."번 이미지 테이블에 저장 성공";
        }else{
            echo $i."번 이미지 테이블에 저장 성공";
        }
    }



  if($result){//중고거래 게시글 등록 성공
    
    //   echo "성공";
      
      

}else{
    //   echo "실패";
      
  }
}else{
//   echo "접속실패";
}
?>