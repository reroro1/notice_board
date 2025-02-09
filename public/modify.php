<?php
$conn = mysqli_connect("localhost", "root", "", "a1") or die("DB CONNECTION ERROR");

$id = $_REQUEST['id'];

$sql = "
SELECT *
FROM article
WHERE id = '{$id}'
";
$rs = mysqli_query($conn, $sql);
$article = mysqli_fetch_assoc($rs);
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>게시물 수정</title>
</head>
<body>
    <h1>게시물 수정</h1>

    <form action="doModify.php">
        <input type="hidden" name="id" value="<?=$article['id']?>">
        <div><input value="<?=$article['title']?>" type="text" name="title" placeholder="제목"></div>
        <div><textarea name="body" placeholder="내용"><?=$article['body']?></textarea></div>
        <div>
            <input type="submit" value="수정">
            <input type="button" value="취소" onclick="location.href = './list.php';">
        </div>
    </form>
</body>
</html>