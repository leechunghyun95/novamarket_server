<?php
    $conn = mysqli_connect('localhost', 'chunghyun', 'ch656895!','novamarket');

    $postNumber = $_POST[postNumber];
    $buyer = null;
    if($_POST[buyer]){//구매자 선택했을 때

        $buyer = $_POST[buyer];
        $sql = "UPDATE market_post SET isSale = '0', buyer = '$buyer' WHERE idx = '$postNumber'";
        mysqli_query($conn,$sql);
        echo "거래완료,구매자 DB에 저장";


    }else{//구매자 선택 안했을때
        $sql = "UPDATE market_post SET isSale = '0' WHERE idx = '$postNumber'";
        mysqli_query($conn,$sql);
        echo "거래완료DB에 저장";
    }
?>