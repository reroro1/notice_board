DROP DATABASE IF EXISTS a1;
CREATE DATABASE a1;
USE a1;

CREATE TABLE article (
  id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  regDate DATETIME NOT NULL,
  title VARCHAR(100) NOT NULL,
  BODY TEXT NOT NULL,
  PRIMARY KEY(id)
);

INSERT INTO article
SET regDate = NOW(),
title = '제목1',
BODY = '내용1';

INSERT INTO article
SET regDate = NOW(),
title = '제목2',
BODY = '내용2';

INSERT INTO article
SET regDate = NOW(),
title = '제목3',
BODY = '내용3';

CREATE TABLE articleReply (
    id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    regDate DATETIME NOT NULL,
    articleId INT(10) UNSIGNED NOT NULL,
    BODY TEXT NOT NULL,
    PRIMARY KEY(id)
);

INSERT INTO articleReply
SET regDate = NOW(),
BODY = '3번글의 댓글내용 1',
articleId = 3;

INSERT INTO articleReply
SET regDate = NOW(),
BODY = '3번글의 댓글내용 2',
articleId = 3;

INSERT INTO articleReply
SET regDate = NOW(),
BODY = '3번글의 댓글내용 3',
articleId = 3;