CREATE TABLE `User` (
  `user_id` INT PRIMARY KEY AUTO_INCREMENT,
  `username` VARCHAR(50) UNIQUE NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `name` VARCHAR(100) NOT NULL,
  `email` VARCHAR(100) UNIQUE NOT NULL,
  `phone_number` VARCHAR(15),
  `role` ENUM('user', 'admin', 'technician') DEFAULT 'user',
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE `Admin` (
  `admin_id` INT PRIMARY KEY AUTO_INCREMENT,
  `user_id` INT UNIQUE NOT NULL,
  `assigned_technicians` INT,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (`user_id`) REFERENCES `User` (`user_id`)
);

CREATE TABLE `Technician` (
  `technician_id` INT PRIMARY KEY AUTO_INCREMENT,
  `user_id` INT UNIQUE NOT NULL,
  `expertise` VARCHAR(50),
  `service_queue_count` INT DEFAULT 0,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (`user_id`) REFERENCES `User` (`user_id`)
);

CREATE TABLE `ServiceRequest` (
  `request_id` INT PRIMARY KEY AUTO_INCREMENT,
  `user_id` INT NOT NULL,
  `technician_id` INT,
  `device_type` ENUM('mobile', 'computer', 'tablet') NOT NULL,
  `device_name` VARCHAR(50),
  `issue_description` TEXT NOT NULL,
  `status` ENUM('queued', 'in_progress', 'repaired', 'completed') DEFAULT 'queued',
  `priority` ENUM('low', 'medium', 'high') DEFAULT 'medium',
  `ticket_id` VARCHAR(20) UNIQUE,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (`user_id`) REFERENCES `User` (`user_id`),
  FOREIGN KEY (`technician_id`) REFERENCES `Technician` (`technician_id`)
);

CREATE TABLE `ServiceHistory` (
  `history_id` INT PRIMARY KEY AUTO_INCREMENT,
  `request_id` INT NOT NULL,
  `status` ENUM('queued', 'in_progress', 'repaired', 'completed'),
  `timestamp` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `note` TEXT,
  FOREIGN KEY (`request_id`) REFERENCES `ServiceRequest` (`request_id`)
);

CREATE TABLE `Feedback` (
  `feedback_id` INT PRIMARY KEY AUTO_INCREMENT,
  `request_id` INT NOT NULL,
  `user_id` INT NOT NULL,
  `rating` INT NOT NULL CHECK (`rating` BETWEEN 1 AND 5),
  `review` TEXT,
  `submitted_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (`request_id`) REFERENCES `ServiceRequest` (`request_id`),
  FOREIGN KEY (`user_id`) REFERENCES `User` (`user_id`)
);
