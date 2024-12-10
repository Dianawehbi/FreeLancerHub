CREATE DATABASE IF NOT EXISTS `freelancers_skills`;
USE `freelancers_skills`;

CREATE TABLE IF NOT EXISTS 'users'  (
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `name` VARCHAR(100) NOT NULL,
    `email` VARCHAR(150) UNIQUE NOT NULL,
    `passwordhash` VARCHAR(255) NOT NULL,
    `role` ENUM('Freelancer', 'Company', 'Admin') DEFAULT 'Freelancer',
    `profilepic` VARCHAR(255),
    `createdat` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `websiteLink` VARCHAR(255),
    `description` TEXT,
);

CREATE TABLE IF NOT EXISTS `job_categories`(
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `name` VARCHAR(100) NOT NULL,
);

CREATE TABLE IF NOT EXISTS `skills`(
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `name` VARCHAR(100) NOT NULL,
);

CREATE TABLE IF NOT EXISTS 'freelancerskills' (
    `id` INT PRIMARY KEY,
    `skills` TEXT NOT NULL,
    FOREIGN KEY (`id`) REFERENCES users(`id`) ON DELETE CASCADE
    FOREIGN KEY (`skills`) REFERENCES skills(`id`) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS 'jobskills' (
    `id` INT PRIMARY KEY,
    `skills` TEXT NOT NULL,
    FOREIGN KEY (`id`) REFERENCES jobPostings(`id`) ON DELETE CASCADE
    FOREIGN KEY (`skills`) REFERENCES skills(`id`) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS 'jobPostings' (
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `company_id` INT NOT NULL,
    `title` VARCHAR(150) NOT NULL,
    `description` TEXT NOT NULL,
    `budget` DECIMAL(10, 2),
    `deadline` DATE,
    `createdat` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (`company_id`) REFERENCES users(`id`) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS 'applications' (
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `job_id` INT NOT NULL,
    `freelancer_id` INT NOT NULL,
    `coverLetter` TEXT,
    `submittedAt` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `status` ENUM('Pending', 'Accepted', 'Rejected') DEFAULT 'Pending',
    FOREIGN KEY (`job_id` ) REFERENCES `jobPostings`(`id`) ON DELETE CASCADE,
    FOREIGN KEY (`freelancer_id`) REFERENCES users(`id`) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS 'messages' (
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `sender_id` INT NOT NULL,
    `receiver_id` INT NOT NULL,
    `message_text` TEXT NOT NULL,
    `sentAt` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (`sender_id`) REFERENCES 'users'(`id`),
    FOREIGN KEY (`receiver_id`) REFERENCES 'users'(`id`)
);
