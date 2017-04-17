# noinspection SqlResolveForFile

USE webdev;
DELETE FROM pagecontent;
ALTER TABLE pagecontent AUTO_INCREMENT = 0;
INSERT INTO pagecontent
VALUES(DEFAULT ,"about", "About", "Test Content"),
  (DEFAULT , "contact", "Contact Us", "Test Content"),
  (DEFAULT , "home", "Home", "Test Content");