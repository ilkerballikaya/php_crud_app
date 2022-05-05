CREATE USER 'crud'@'localhost' IDENTIFIED BY 'crud';

CREATE DATABASE php_mysql_crud;

GRANT ALL PRIVILEGES ON php_mysql_crud.* TO 'crud'@'localhost' WITH GRANT OPTION;

use php_mysql_crud;

CREATE TABLE task(
  id INT(11) PRIMARY KEY AUTO_INCREMENT,
  title VARCHAR(255) NOT NULL,
  description TEXT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

DESCRIBE task;
