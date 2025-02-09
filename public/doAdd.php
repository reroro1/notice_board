<?php
$conn = mysqli_connect("localhost", "root", "", "a1") or die("DB CONNECTION ERROR");

$title = $_REQUEST['title'];
$body = $_REQUEST['body'];

$sql = "
INSERT INTO article
SET regDate = NOW(),
title = '{$title}',
body = '{$body}'
";

mysqli_query($conn, $sql);
$newId = mysqli_insert_id($conn);
?>
<script>
alert('게시물이 작성되었습니다.');
location.replace('./detail.php?id=<?=$newId?>');
</script>