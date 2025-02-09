<?php
$conn = mysqli_connect("localhost", "root", "", "a1") or die("DB CONNECTION ERROR");

$sql = "
SELECT A.id,
A.regDate,
A.title,
AR.body,
SUM(IF(AR.id IS NULL, 0, 1)) AS repliesCount

FROM article AS A
LEFT OUTER JOIN articleReply AS AR
ON A.id = AR.articleId
GROUP BY A.id
ORDER BY id DESC
";
$rs = mysqli_query($conn, $sql);

$rows = [];

while ( $row = mysqli_fetch_assoc($rs) ) {
    $rows[] = $row;
}
?>

<script>
function deleteArticle(id) {
    if ( confirm(id + '번 게시물을 삭제합니다.') == false ) {
        return;
    }

    location.href = './doDelete.php?id=' + id;
}
</script>

<h1>글 리스트</h1>

<div>
    <a href="./add.php">글 작성하기</a>
</div>

<table border="1">
<thead>
<tr>
    <th>번호</th>
    <th>날짜</th>
    <th>제목</th>
    <th>댓글개수</th>
    <th>비고</th>
</tr>
</thead>
<tbody>
<?php foreach ( $rows as $row ) { ?>
<tr>
    <td><?=$row['id']?></td>
    <td><?=$row['regDate']?></td>
    <td><a href="./detail.php?id=<?=$row['id']?>"><?=$row['title']?></a></td>
    <td><?=number_format($row['repliesCount'])?></td>
    <td><a href="javascript:deleteArticle(<?=$row['id']?>);">삭제</a></td>
</tr>
<?php } ?>
</tbody>
</table>


