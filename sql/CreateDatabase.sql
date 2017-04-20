CREATE DATABASE IF NOT EXISTS libraryswd;

USE libraryswd;

-- -- UNCOMMENT THE FOLLOWING AFTER FIRST USE OF THIS SCRIPT
ALTER TABLE books
  DROP FOREIGN KEY FK_books_member,
  DROP FOREIGN KEY FK_books_images;
ALTER TABLE galleryimages
  DROP FOREIGN KEY FK_gallery,
  DROP FOREIGN KEY FK_images;
--

DROP TABLE IF EXISTS books;
CREATE TABLE IF NOT EXISTS books (
  ID       INTEGER AUTO_INCREMENT NOT NULL PRIMARY KEY,
  Title    VARCHAR(255)           NOT NULL,
  Author   VARCHAR(255)           NOT NULL,
  ISBN     VARCHAR(10)            NOT NULL,
  Category VARCHAR(50),
  MemberID INTEGER,
  Taken    DATE,
  Returned DATE,
  ImageID  INTEGER
);

INSERT INTO books
VALUES(1,"Harry Potter and the Chamber of Secrets", "J.K. Rowling", "0439064872", "Children,Fantasy", NULL, NULL, NULL, 1),
  (2,"A Feast of Crows", "George R.R. Martin", "055358202X", "Fantasy", NULL, NULL, NULL, 4),
  (3,"A Dance with Dragons", "George R.R. Martin", "0553841122", "Fantasy", NULL, NULL, NULL, 5),
  (4,"A Game of Thrones", "George R.R. Martin", "0553573403", "Fantasy", NULL, NULL, NULL, 6),
  (5,"Das Kaenguru-Manifest", "Marc-Uwe Kling", "3548373836", "Humour,Political", NULL, NULL, NULL, 7),
  (6,"Relativity: The Special and the General Theory", "Albert Einstein", "1891396307", "Science,Education", NULL, NULL, NULL, 8),
  (7,"Eine Billion Dollar", "Andreas Eschbach", "3404150406", "Thriller,Fantasy", NULL, NULL, NULL, 9),
  (8,"The Call of Cthulhu", "H.P. Lovecraft", "1500584339", "Horror,Fantasy", NULL, NULL, NULL, 10),
  (9,"Paperback Oxford English Dictionary", "Oxford Dictionaries", "0199640947", "Education", NULL, NULL, NULL, 11),
  (10,"Gone Girl: A Novel", "Gillian Flynn", "0385347774", "Mystery,Thriller", NULL, NULL, NULL, 12),
  (11,"How To Win Friends And Influence People", "Dale Carnegie", "1439199191", "Business", NULL, NULL, NULL, 13),
  (12,"The 4-Hour Workweek", "Timothy Ferriss", "0307465357", "Business", NULL, NULL, NULL, 14),
  (13,"Sapiens: A Brief History of Humankind", "Yuval Noah Harari", "0099590085", "History,Education", NULL, NULL, NULL, 15),
  (14, "Java ist auch eine Insel", "Christian Ullenboom", "3836241196", "Education", NULL, NULL, NULL, 16),
  (15, "Harry Potter and the Philosopher's Stone", "J.K. Rowling", "1408855658", "Children,Fantasy", NULL, NULL, NULL, 17),
  (16, "The Lord of the Rings", "J.R.R. Tolkien", "0007525540", "Fantasy", NULL, NULL, NULL, 18),
  (17, "Burnt Paper Sky", "Gilly Macmillan", "0349406391", "Mystery,Thriller", NULL, NULL, NULL, 19),
  (18, "The Da Vinci Code", "Dan Brown", "0307474275", "Mystery,Thriller", NULL, NULL, NULL, 20),
  (19, "The Dictator's Handbook: Why Bad Behavior is Almost Always Good Politics", "Bruce Bueno de Mesquita", "1610391845", "History,Education", NULL, NULL, NULL, 21),
  (20, "The Hitchhiker's Guide to the Galaxy", "Douglas Adams", "0345391802", "Fantasy,Humour", NULL, NULL, NULL, 22);

ALTER TABLE books AUTO_INCREMENT = 21;

DROP TABLE IF EXISTS member;
CREATE TABLE IF NOT EXISTS member (
  MemberID  INTEGER AUTO_INCREMENT NOT NULL PRIMARY KEY,
  Firstname VARCHAR(50)            NOT NULL,
  Surname   VARCHAR(50)            NOT NULL,
  Address   VARCHAR(50)            NOT NULL,
  Phone     VARCHAR(50),
  Birth     DATE,
  Gender    VARCHAR(50),
  Email     VARCHAR(50)
);
INSERT INTO member
VALUES(1,"Philip", "Koep", "School Avenue, Glasheen, Cork", "+4901721234567", "1992-01-23", "Male", "philip.koep@eufh-mail.de"),
  (2,"Marius","Schulze", "School Avenue, Glasheen, Cork", "+4901607654321", "1995-04-01", "Male", "marius.schulze@eufh-mail.de");

ALTER TABLE books
  Add Constraint FK_books_member
FOREIGN KEY(MemberID)
REFERENCES member(MemberID);

UPDATE books
SET MemberID = 1, Taken = "2017-04-17"
WHERE ID = 2;

DROP TABLE IF EXISTS users;
CREATE TABLE IF NOT EXISTS users (
  UserID   INTEGER AUTO_INCREMENT NOT NULL PRIMARY KEY,
  UserName VARCHAR(50)            NOT NULL,
  Password VARCHAR(250)           NOT NULL
);

INSERT INTO users
VALUES(0, "admin", "password");

DROP TABLE IF EXISTS images;
CREATE TABLE IF NOT EXISTS images (
  ImageID    INTEGER AUTO_INCREMENT NOT NULL PRIMARY KEY,
  Type       VARCHAR(25)            NOT NULL,
  PictureRef VARCHAR(50)            NOT NULL,
  Name       VARCHAR(50)            NOT NULL,
  Caption    VARCHAR(255)
);


DROP TABLE IF EXISTS gallery;
CREATE TABLE IF NOT EXISTS gallery (
  GalleryID INTEGER AUTO_INCREMENT NOT NULL PRIMARY KEY,
  Name      VARCHAR(50)            NOT NULL,
  State    BOOLEAN                NOT NULL
);

DROP TABLE IF EXISTS galleryimages;
CREATE TABLE IF NOT EXISTS galleryimages (
  GalleryID INTEGER 			NOT NULL,
  ImageID   INTEGER             NOT NULL
);

INSERT INTO images (ImageID, Type, PictureRef, Name, Caption) VALUES(1, 'jpg', 'harry-potter-and-the-chamber-of-secrets', 'Testimage' ,'');
INSERT INTO galleryimages (GalleryID, ImageID) VALUES(1, 1);

INSERT INTO images (ImageID, Type, PictureRef, Name, Caption) VALUES(2, 'jpg', 'library-5', 'Library' ,'');
INSERT INTO images (ImageID, Type, PictureRef, Name, Caption) VALUES(3, 'jpg', 'class-steel-installation', 'Class Steel Installation' ,'');
INSERT INTO images (ImageID, Type, PictureRef, Name, Caption) VALUES(4, 'jpg', 'AFeastForCrows', 'A Feast For Crows' ,'');
INSERT INTO images (ImageID, Type, PictureRef, Name, Caption) VALUES(5, 'jpg', 'A_Dance_With_Dragons', 'A Dance With Dragons' ,'');
INSERT INTO images (ImageID, Type, PictureRef, Name, Caption) VALUES(6, 'jpg', 'AGameOfThrones', 'A Game of Thrones' ,'');
INSERT INTO images (ImageID, Type, PictureRef, Name, Caption) VALUES(7, 'jpg', 'Das_Kaenguru-Manifest', 'Das Kaenguru-Manifest' ,'');
INSERT INTO images (ImageID, Type, PictureRef, Name, Caption) VALUES(8, 'jpg', 'Relativity', 'Relativity: The Special and General Theory' ,'');
INSERT INTO images (ImageID, Type, PictureRef, Name, Caption) VALUES(9, 'jpg', 'EineBillionDollar', 'Eine Billion Dollar' ,'');
INSERT INTO images (ImageID, Type, PictureRef, Name, Caption) VALUES(10, 'jpg', 'CallOfCthulhu', 'The Call of Cthulhu' ,'');
INSERT INTO images (ImageID, Type, PictureRef, Name, Caption) VALUES(11, 'jpg', 'Oxford', 'Paperback Oxford English Dictionary' ,'');
INSERT INTO images (ImageID, Type, PictureRef, Name, Caption) VALUES(12, 'jpg', 'GoneGirl', 'Gone Girl: A Novel' ,'');
INSERT INTO images (ImageID, Type, PictureRef, Name, Caption) VALUES(13, 'jpg', 'HowToWinFriends', 'How To Win Friends And Influence People' ,'');
INSERT INTO images (ImageID, Type, PictureRef, Name, Caption) VALUES(14, 'jpg', 'FourHourWorkweek', 'The 4-Hour Workweek' ,'');
INSERT INTO images (ImageID, Type, PictureRef, Name, Caption) VALUES(15, 'jpg', 'Sapiens_A_Brief_History_of_Humankind', 'Sapiens: A Brief History of Humankind' ,'');
INSERT INTO images (ImageID, Type, PictureRef, Name, Caption) VALUES(16, 'jpg', 'Java-ist-auch-eine-Insel', 'Java ist auch eine Insel' ,'');
INSERT INTO images (ImageID, Type, PictureRef, Name, Caption) VALUES(17, 'jpg', 'Harry_Potter_and_the_Philosophers_Stone', 'Harry Potter and the Philosophers Stone' ,'');
INSERT INTO images (ImageID, Type, PictureRef, Name, Caption) VALUES(18, 'jpg', 'lotr', 'The Lord of the Rings' ,'');
INSERT INTO images (ImageID, Type, PictureRef, Name, Caption) VALUES(19, 'jpg', 'burntpapersky', 'Burnt Paper Sky' ,'');
INSERT INTO images (ImageID, Type, PictureRef, Name, Caption) VALUES(20, 'jpg', 'DaVinciCode', 'The Da Vinci Code' ,'');
INSERT INTO images (ImageID, Type, PictureRef, Name, Caption) VALUES(21, 'jpg', 'TheDictatorsHandbook', 'The Dictators Handbook: Why Bad Behavior is Almost Always Good Politics' ,'');
INSERT INTO images (ImageID, Type, PictureRef, Name, Caption) VALUES(22, 'jpg', 'The_Hitchhikers_Guide_to_the_Galaxy', 'The Hitchhikers Guide to the Galaxy' ,'');

ALTER TABLE books
  Add Constraint FK_books_images
FOREIGN KEY(ImageID)
REFERENCES images(ImageID);


INSERT INTO gallery (GalleryID, Name, State) VALUES(1, 'First Gallery', 0);
INSERT INTO gallery (GalleryID, Name, State) VALUES(2, 'Second Gallery', 1);
INSERT INTO gallery (GalleryID, Name, State) VALUES(3, 'Third Gallery', 0);
INSERT INTO gallery (GalleryID, Name, State) VALUES(4, 'Fourth Gallery', 1);

ALTER TABLE galleryimages
  Add Constraint PK_galleryimages
PRIMARY KEY(GalleryID, ImageID),
  Add Constraint FK_gallery
FOREIGN KEY (GalleryID)
REFERENCES gallery(GalleryID),
  Add Constraint FK_images
FOREIGN KEY (ImageID)
REFERENCES images(ImageID)
;

DROP TABLE IF EXISTS messages;
CREATE TABLE IF NOT EXISTS messages (
  MessageID INTEGER AUTO_INCREMENT NOT NULL PRIMARY KEY,
  Firstname VARCHAR(50)            NOT NULL,
  Surname   VARCHAR(50)            NOT NULL,
  Email     VARCHAR(50)            NOT NULL,
  Message   LONGTEXT               NOT NULL,
  Replied   BOOLEAN
);

DROP TABLE IF EXISTS pagecontent;
CREATE TABLE IF NOT EXISTS pagecontent (
  PageID    INTEGER AUTO_INCREMENT NOT NULL PRIMARY KEY ,
  PageName  VARCHAR(50)            NOT NULL,
  Headline  VARCHAR(255)           NOT NULL,
  Content   LONGTEXT               NOT NULL
);

ALTER TABLE pagecontent AUTO_INCREMENT = 0;
INSERT INTO pagecontent
VALUES(DEFAULT ,"about", "About", "The SWD Library is a great library with all kinds of books for all ages. - Your library team"),
  (DEFAULT , "contact", "Contact Us", "Please feel free to contact us anytime with regards to any questions"),
  (DEFAULT , "index", "Home", "Welcome to the SWD Library!");