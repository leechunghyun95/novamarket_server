<?php 
$conn = mysqli_connect('localhost', 'chunghyun', 'ch656895!','novamarket');

echo "게시글 번호: ".$_GET[postNumber]."\n";
echo "사용자 번호: ".$_POST[userNumber]."\n";
echo "좋아요: ".$_POST[like]."\n";

if($_POST[like] == 1){//좋아요 추가
    echo "좋아요.\n";
    $sql = "INSERT INTO market_like (postNumber, userNumber) VALUE ('$_GET[postNumber]','$_POST[userNumber]')";
    $result = mysqli_query($conn,$sql);
}else{
    echo "좋아요 취소\n";
    $sql_delete = "DELETE FROM market_like WHERE postNumber = '$_GET[postNumber]' AND userNumber = '$_POST[userNumber]'";
    $result = mysqli_query($conn,$sql_delete);
}
?>