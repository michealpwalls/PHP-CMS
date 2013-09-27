 -- Replace this USE statement with your own..
 -- USE db200250645;

DROP TABLE IF EXISTS assignment2_users;

CREATE TABLE assignment2_users (
    id  INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username    VARCHAR(16) NOT NULL,
    password    VARCHAR(128) NOT NULL,
    email       VARCHAR(100) NOT NULL,
    admin_id    INT NOT NULL DEFAULT 0
);

INSERT INTO assignment2_users VALUES (1,'admin','password','admin@example.com', 1);

UPDATE assignment2_users
SET password = 'b109f3bbbc244eb82441917ed06d618b9008dd09b3befd1b5e07394c706a8bb980b1d7785e5976ec049b46df5f1326af5a2ea6d103fd07c95385ffab0cacbc86'
WHERE id=1;
