<?php
$conn = mysqli_connect("localhost", "root", "", "a1") or die("DB CONNECTION ERROR");

$id = $_REQUEST['id'];

$sql = "
DELETE FROM article
WHERE id = '{$id}'
";
mysqli_query($conn, $sql);
?>
<script>
alert('게시물이 삭제되었습니다.');
location.replace('./list.php');
</script>