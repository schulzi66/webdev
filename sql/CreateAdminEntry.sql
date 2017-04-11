# noinspection SqlResolveForFile

USE webdev;
DELETE FROM users;

INSERT INTO users
    VALUES(0, "admin", "password");