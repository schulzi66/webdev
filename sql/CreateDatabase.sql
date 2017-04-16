CREATE DATABASE IF NOT EXISTS webdev;

USE webdev;

CREATE TABLE IF NOT EXISTS books (
  ID       INTEGER AUTO_INCREMENT NOT NULL PRIMARY KEY,
  Title    VARCHAR(255)            NOT NULL,
  Author   VARCHAR(255)            NOT NULL,
  ISBN     VARCHAR(10)            NOT NULL,
  Category VARCHAR(50),
  LoanID   INTEGER
);

CREATE TABLE IF NOT EXISTS member (
  MemberID  INTEGER AUTO_INCREMENT NOT NULL PRIMARY KEY,
  Firstname VARCHAR(50)            NOT NULL,
  Surname   VARCHAR(50)            NOT NULL,
  Address   VARCHAR(50)            NOT NULL,
  Phone     VARCHAR(50),
  Birth     DATE,
  Gender    VARCHAR(5),
  Email     VARCHAR(50)
);

CREATE TABLE IF NOT EXISTS loans (
  BookID   INTEGER AUTO_INCREMENT NOT NULL PRIMARY KEY,
  MemberID INTEGER                NOT NULL,
  Taken    DATE                   NOT NULL,
  Returned DATE -- nullable
);

CREATE TABLE IF NOT EXISTS users (
  UserID   INTEGER AUTO_INCREMENT NOT NULL PRIMARY KEY,
  UserName VARCHAR(50)            NOT NULL,
  Password VARCHAR(250)           NOT NULL
);

CREATE TABLE IF NOT EXISTS images (
  ImageID    INTEGER AUTO_INCREMENT NOT NULL PRIMARY KEY,
  Type       VARCHAR(25)            NOT NULL,
  PictureRef VARCHAR(50)            NOT NULL,
  Name       VARCHAR(50)            NOT NULL,
  Caption    VARCHAR(255)
);

-- TODO PHKO Foreign Key for bookloan and images
CREATE TABLE IF NOT EXISTS galleryimages (
  GalleryID INTEGER AUTO_INCREMENT NOT NULL PRIMARY KEY,
  ImageID  INTEGER                NOT NULL
);

CREATE TABLE IF NOT EXISTS gallery (
  GalleryID INTEGER AUTO_INCREMENT NOT NULL PRIMARY KEY,
  Name     VARCHAR(50)            NOT NULL
);

CREATE TABLE IF NOT EXISTS messages (
  MessageID INTEGER AUTO_INCREMENT NOT NULL PRIMARY KEY,
  Firstname VARCHAR(50)                 NOT NULL,
  Surname   VARCHAR(50)                 NOT NULL,
  Email     VARCHAR(50)                 NOT NULL,
  Message   LONGTEXT                    NOT NULL,
  Replied   BOOL
);