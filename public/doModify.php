<?php
$conn = mysqli_connect("localhost", "root", "", "a1") or die("DB CONNECTION ERROR");

$id = $_REQUEST['id'];
$body = $_REQUEST['body'];

$sql = "
UPDATE articleReply
SET body = '{$body}'
WHERE id = '{$id}'
";

mysqli_query($conn, $sql);

?>
<script>
alert('댓글이 수정되었습니다.');
location.replace('<?=$_SERVER['HTTP_REFERER']?>');
</script>