<?php
$conn = mysqli_connect("localhost", "root", "", "a1") or die("DB CONNECTION ERROR");

$id = $_REQUEST['id'];

$sql = "
DELETE FROM articleReply
WHERE id = '{$id}'
";
mysqli_query($conn, $sql);
?>
<script>
alert('댓글이 삭제되었습니다.');
location.replace('<?=$_SERVER['HTTP_REFERER']?>');
</script>