<?php 
$conn = mysqli_connect('localhost', 'chunghyun', 'ch656895!','novamarket');

$novaUpdateObject = json_decode($_POST['novaUpdateObject']);

$contents = $novaUpdateObject -> contents;

$sql = "UPDATE nova_post SET contents = '$contents' WHERE idx = '$_GET[postNumber]'";

$result = mysqli_query($conn,$sql);

// if($result){
//     echo "데이터 update 성공"
// }else{

//     echo "데이터 update 실패"
// }

//클라이언트에서 배열을 문자열로 형변환한 이미지 파일명을 다시 배열로 만듬.
$imgList_client = $_POST['imgList'];



if($imgList_client == "[]"){
    echo "새로 보낸 이미지 없다";
}else{
    echo "새로 보낸 이미지 있다.";

    //받은 문자열에서 공백, []제거
    $substr_imgList = substr($imgList_client,1,-1);

    $imgList = explode(", ",$substr_imgList);

    //이미지 테이블 insert
     for($i = 0; $i < count($imgList); $i++){
        echo $imgList[i];
        $sql_img = "INSERT INTO nova_img (postNumber,fileName) VALUES ('$_GET[postNumber]','$imgList[$i]')";
        echo $sql_img;
        $result_img = mysqli_query($conn,$sql_img);
        
        if($result_img){
            echo $i."번 이미지 테이블에 저장 성공";
        }else{
            echo $i."번 이미지 테이블에 저장 실패";
        }
    }

}



   



    // //삭제한 이미지 지우기
    $removeImgList_clinet = $_POST['removeList'];

    echo $removeImgList_clinet;
    if($removeImgList_clinet == "[]"){
        echo "삭제한 이미지 없음";
    }else{
        echo "삭제한 이미지 있음.";
        $substr_removeImgList = substr($removeImgList_clinet,1,-1);

    $removeList = explode(", ",$substr_removeImgList);

    //이미지 테이블 delete
    for($i = 0; $i < count($removeList); $i++){
        echo $removeList[$i];
        $sql_removeImg = "DELETE FROM nova_img WHERE fileName = '$removeList[$i]'";
        echo $sql_removeImg;
        $result_removeImg = mysqli_query($conn,$sql_removeImg);
        
        if($result_removeImg){
            echo $i."번 이미지 테이블에서 삭제 성공";
        }else{
            echo $i."번 이미지 테이블에 삭제 실패";
        }
    }
    }
    


// mysqli_close($conn);


?>