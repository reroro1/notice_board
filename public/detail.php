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

$sql = "
SELECT *
FROM articleReply
WHERE articleId = '{$id}'
ORDER BY id DESC

";
$rs = mysqli_query($conn, $sql);
$articleReplies = [];
while ( $row = mysqli_fetch_assoc($rs) ) {
    $articleReplies[] = $row;
}
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

<style>
.article-replies-list tr .edit-mode-visible {
    display:none;
}

.article-replies-list tr.edit-mode .edit-mode-visible {
    display:block;
}

.article-replies-list tr.edit-mode .read-mode-visible {
    display:none;
}
</style>

<h1>글 상세페이지</h1>

<script>
function deleteArticle(id) {
    if ( confirm(id + '번 게시물을 삭제합니다.') == false ) {
        return;
    }

    location.href = './doDelete.php?id=' + id;
}

function deleteArticleReply(id) {
    if ( confirm(id + '번 댓글을 삭제합니다.') == false ) {
        return;
    }

    location.href = './doDeleteReply.php?id=' + id;
}

function enableEditMode(el) {
    var $el = $(el);
    var $tr = $el.closest('tr');
    $tr.addClass('edit-mode');
}

function disableEditMode(el) {
    var $el = $(el);
    var $tr = $el.closest('tr');
    $tr.removeClass('edit-mode');
}
</script>

<div>
    <a href="./list.php">글 리스트</a>
    <a href="./add.php">글 작성하기</a>
    <a href="./modify.php?id=<?=$article['id']?>">글 수정하기</a>
    <a href="javascript:deleteArticle(<?=$article['id']?>);">글 삭제하기</a>
</div>

<h2>글 본문</h2>

<table border="1">
<tr>
    <th>번호</th>
    <td><?=$article['id']?></td>
</tr>
<tr>
    <th>날짜</th>
    <td><?=$article['regDate']?></td>
</tr>
<tr>
    <th>제목</th>
    <td><?=$article['title']?></td>
</tr>
<tr>
    <th>내용</th>
    <td><?=nl2br($article['body'])?></td>
</tr>
</table>

<h2>댓글 작성</h2>
<form action="doAddReply.php">
    <input type="hidden" name="articleId" value="<?=$id?>">
    <div><textarea name="body" placeholder="내용"></textarea></div>
    <div>
        <input type="submit" value="댓글작성">
        <input type="reset" value="취소">
    </div>
</form>

<h2>댓글 리스트</h2>

<?php if ( count($articleReplies) > 0 ) { ?>
<table border="1" class="article-replies-list">
<thead>
<tr>
    <th>번호</th>
    <th>날짜</th>
    <th>내용</th>
    <th>비고</th>
</tr>
</thead>
<tbody>
<?php foreach ( $articleReplies as $articleReply ) { ?>
<tr>
    <td><?=$articleReply['id']?></td>
    <td><?=$articleReply['regDate']?></td>
    <td>
        <div class="read-mode-visible">
            <?=nl2br($articleReply['body'])?>
        </div>
        <div class="edit-mode-visible">
            <form action="./doModifyReply.php">
                <input type="hidden" name="id" value="<?=$articleReply['id']?>">
                <div>
                    <textarea name="body" placeholder="댓글내용"><?=$articleReply['body']?></textarea>
                </div>
                <div>
                    <input type="submit" value="댓글수정">
                    <input onclick="disableEditMode(this);" type="reset" value="수정취소">
                </div>
            </form>
        </div>
    </td>
    <td>
        <a href="javascript:deleteArticleReply(<?=$articleReply['id']?>);">삭제</a>
        <a class="read-mode-visible" href="javascript:;" onclick="enableEditMode(this);">수정</a>
    </td>
</tr>
<?php } ?>
</tbody>
</table>
<?php } else { ?>
<div>댓글이 없습니다.</div>
<?php } ?>

<div>
    <a href="./list.php">글 리스트</a>
    <a href="./add.php">글 작성하기</a>
    <a href="./modify.php?id=<?=$article['id']?>">글 수정하기</a>
    <a href="javascript:deleteArticle(<?=$article['id']?>);">글 삭제하기</a>
</div>
