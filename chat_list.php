<?php 
$conn = mysqli_connect('localhost', 'chunghyun', 'ch656895!','novamarket');

$userIdx = $_POST[userIdx];//사용자 번호

//채팅방 db에서 판매자나 구매자중에 사용자 번호와 일치하는 방있으면 가져오기
$sql = "SELECT * FROM chat_room WHERE buyer = '$userIdx' OR seller = '$userIdx' ORDER BY `chat_room`.`rec_time` DESC";
$result = mysqli_query($conn,$sql);
if($result){
    $result_array = array();//JSONArray로 만들 변수선언
    if($result->num_rows == 0){
        die("채팅방 없음.");
    }else{
        while($row = mysqli_fetch_assoc($result)){
            //채팅 방 정보
            $roomName = $row[roomName];//방이름
            $buyer = $row[buyer];//구매자
            $seller = $row[seller];//판매자
            $chatType = $row[chat_type];//채팅방 타입 마켓인지 팀노바생활 채팅인지
            $postNumber = $row[post_number];//게시글 번호

            $result_array[] = $row;
        
            //판매자 정보
            $sql_seller = "SELECT idx,nickname,profile_image FROM USER WHERE idx = '$seller'";
            $result_seller = mysqli_query($conn,$sql_seller);
            $row_seller = mysqli_fetch_assoc($result_seller);
            $seller_nickname = $row_seller[nickname];
            $seller_img = $row_seller[profile_image];

            $result_array[] = $row_seller;

            
            //구매자 정보
            $sql_buyer = "SELECT idx,nickname,profile_image FROM USER WHERE idx = '$buyer'";
            $result_buyer = mysqli_query($conn,$sql_buyer);
            $row_buyer = mysqli_fetch_assoc($result_buyer);
            $buyer_nickname = $row_buyer[nickname];
            $buyer_img = $row_buyer[profile_image];

            $result_array[] = $row_buyer;

            
            //게시글 정보
            if($chatType == "market"){//마켓 채팅일때(개인톡)
                $sql_post = "SELECT fileName FROM market_img WHERE postNumber = '$postNumber' LIMIT 1";
                $result_post = mysqli_query($conn,$sql_post);
                $row_post = mysqli_fetch_assoc($result_post); 
                
                $result_array[] = $row_post;

            }else{//팀노바 생활 채팅일때(그룹톡)
                $sql_post = "SELECT fileName FROM nova_img WHERE postNumber = '$postNumber' LIMIT 1";
                $result_post = mysqli_query($conn,$sql_post);
                $row_post = mysqli_fetch_assoc($result_post);

                $result_array[] = $row_post;
            }
        }
    }

    $result_array = json_encode($result_array,JSON_UNESCAPED_UNICODE); 
    print($result_array); //JSONArray 출력

    
}else{

}
mysqli_close($conn);
?>