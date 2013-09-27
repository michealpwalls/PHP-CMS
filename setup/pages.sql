 -- Replace this USE statement with your own..
 -- USE db200250645;
 
DROP TABLE IF EXISTS assignment2_pages;

CREATE TABLE assignment2_pages (
	id          INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name        VARCHAR(15) NOT NULL,
	title       VARCHAR(50) NOT NULL,
    content     LONGTEXT NOT NULL
);
