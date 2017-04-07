CREATE TABLE IF NOT EXISTS users (
  id int(11) NOT NULL AUTO_INCREMENT,
  created_at datetime NOT NULL,
  username varchar(20) NOT NULL,
  password varchar(20) NOT NULL,
  PRIMARY KEY (id)
);

INSERT INTO users (id, created_at, username, password) VALUES
(2, NOW(), "joe", "password");