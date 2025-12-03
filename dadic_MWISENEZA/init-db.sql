CREATE DATABASE IF NOT EXISTS `25rp19025_shareride_db` 
DEFAULT CHARACTER SET utf8mb4 
COLLATE utf8mb4_general_ci;

USE `25rp19025_shareride_db`;

CREATE TABLE IF NOT EXISTS `tbl_users` (
  `user_id` INT NOT NULL AUTO_INCREMENT,
  `user_firstname` VARCHAR(100) NOT NULL,
  `user_lastname` VARCHAR(100) NOT NULL,
  `user_gender` VARCHAR(20) NOT NULL,
  `user_email` VARCHAR(255) NOT NULL UNIQUE,
  `user_password` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
