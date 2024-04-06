CREATE DATABASE bawadi_db;

USE bawadi_db;

CREATE TABLE `water_installation` (
  `id` int NOT NULL,
  `tracking_number` int NOT NULL,
  `first_name` varchar(128) NOT NULL,
  `last_name` varchar(64) NOT NULL,
  `middle_name` varchar(64) NOT NULL,
  `home_address_street` varchar(128) NOT NULL,
  `home_address_city` varchar(32) NOT NULL,
  `email_address` varchar(128) NOT NULL,
  `step` varchar(32) NOT NULL,
  `time_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

ALTER TABLE `water_installation`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `water_installation`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;
