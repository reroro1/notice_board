<?php
$conn = mysqli_connect("localhost", "root", "", "a1") or die("DB CONNECTION ERROR");

$articleId = $_REQUEST['articleId'];
$body = $_REQUEST['body'];

$sql = "
INSERT INTO articleReply
SET regDate = NOW(),
articleId = '{$articleId}',
body = '{$body}'
";
mysqli_query($conn, $sql);
$newId = mysqli_insert_id($conn);
?>
<script>
alert('댓글이 작성되었습니다.');
location.replace('<?=$_SERVER['HTTP_REFERER']?>');
</script>