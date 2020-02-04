DROP DATABASE IF EXISTS `ci_blog_test`;

CREATE DATABASE `ci_blog_test`;

USE `ci_blog_test`;

CREATE TABLE `users`(
  `id` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(64) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY(`id`)
);

CREATE TABLE `categories`(
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(64) NOT NULL,
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY(`id`)
);

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned DEFAULT 0 NOT NULL,
  `data` blob NOT NULL,
  PRIMARY KEY (id),
  KEY `ci_sessions_timestamp` (`timestamp`)
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

CREATE TABLE `comments`(
  `id` INT NOT NULL AUTO_INCREMENT,
  `user` VARCHAR(64) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `content` TEXT NOT NULL,
  `post_id` INT NOT NULL,
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY(`post_id`) REFERENCES `posts`(`post_id`),
  PRIMARY KEY(`id`)
);

INSERT INTO `categories`(`name`) VALUES('Uncategorized');