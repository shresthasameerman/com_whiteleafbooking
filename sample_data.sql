-- Sample data for dwiwb_whiteleaf_bookings
INSERT INTO `dwiwb_whiteleaf_bookings` (`id`, `booking_number`, `guest_name`, `check_in`, `check_out`, `params`, `created`, `modified`) VALUES
(1, 'BKG001', 'John Doe', '2025-03-01 14:00:00', '2025-03-05 11:00:00', '{}', '2025-02-18 06:08:45', '2025-02-18 06:08:45'),
(2, 'BKG002', 'Jane Smith', '2025-03-10 14:00:00', '2025-03-15 11:00:00', '{}', '2025-02-18 06:08:45', '2025-02-18 06:08:45');

-- Sample data for dwiwb_whiteleaf_rooms
INSERT INTO `dwiwb_whiteleaf_rooms` (`id`, `title`, `room_type`, `capacity`, `price`, `params`, `created`, `modified`) VALUES
(1, 'Deluxe Room', 'Deluxe', 2, 100.00, '{}', '2025-02-18 06:08:45', '2025-02-18 06:08:45'),
(2, 'Standard Room', 'Standard', 2, 80.00, '{}', '2025-02-18 06:08:45', '2025-02-18 06:08:45');