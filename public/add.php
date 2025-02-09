<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>게시물 작성</title>
</head>
<body>
    <h1>게시물 작성</h1>

    <form action="doAdd.php">
        <div><input type="text" name="title" placeholder="제목"></div>
        <div><textarea name="body" placeholder="내용"></textarea></div>
        <div>
            <input type="submit" value="작성">
            <input type="button" value="취소" onclick="location.href = './list.php';">
        </div>
    </form>
</body>
</html>