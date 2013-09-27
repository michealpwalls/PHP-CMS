 -- Replace this USE statement with your own..
 -- USE db200250645;

DROP TABLE IF EXISTS assignment2_logos;

CREATE TABLE assignment2_logos (
	id              INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	image_name      VARCHAR(100) NOT NULL,
	alttext         VARCHAR(100),
    default_state   CHAR(1) NOT NULL DEFAULT 0
);
