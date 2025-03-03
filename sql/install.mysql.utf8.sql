-- Create a new file: sql/install.mysql.utf8.sql
CREATE TABLE IF NOT EXISTS `#__whiteleaf_room_availability` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `room_number` varchar(255) NOT NULL,
  `room_type` varchar(255) NOT NULL,
  `from_date` datetime NOT NULL,
  `to_date` datetime NOT NULL,
  `availability` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` datetime NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `params` text NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 DEFAULT COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `#__whiteleafbooking_bookings` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `customer_name` varchar(255) NOT NULL,
    `customer_email` varchar(255) NOT NULL,
    `customer_phone` varchar(50) NOT NULL,
    `room_id` int(11) NOT NULL,
    `check_in_date` date NOT NULL,
    `check_out_date` date NOT NULL,
    `total_amount` decimal(10,2) NOT NULL,
    `payment_status` enum('pending','paid','cancelled') NOT NULL DEFAULT 'pending',
    `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `modified_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    `created_by` int(11) NOT NULL,
    `state` tinyint(1) NOT NULL DEFAULT '1',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 DEFAULT COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `#__whiteleafbooking_rooms` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `title` varchar(255) NOT NULL,
    `description` text,
    `price_per_night` decimal(10,2) NOT NULL,
    `capacity` int(11) NOT NULL,
    `room_number` varchar(50) NOT NULL,
    `room_type` varchar(100) NOT NULL,
    `state` tinyint(1) NOT NULL DEFAULT '1',
    `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `modified_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    `created_by` int(11) NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `room_number` (`room_number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 DEFAULT COLLATE=utf8mb4_unicode_ci;

