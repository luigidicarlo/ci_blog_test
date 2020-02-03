DROP DATABASE IF EXISTS `ci_blog_test`;

CREATE DATABASE `ci_blog_test`;

USE `ci_blog_test`;

CREATE TABLE `categories`(
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(64) NOT NULL,
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY(`id`)
);

CREATE TABLE `posts`(
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255) NOT NULL,
  `slug` VARCHAR(255) NOT NULL,
  `body` TEXT NOT NULL,
  `image` VARCHAR(255) DEFAULT 'noimage.jpg',
  `category_id` INT NOT NULL DEFAULT 1,
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY(`category_id`) REFERENCES `categories`(`id`),
  PRIMARY KEY(`id`)
);

INSERT INTO `categories`(`name`) VALUES('Uncategorized');