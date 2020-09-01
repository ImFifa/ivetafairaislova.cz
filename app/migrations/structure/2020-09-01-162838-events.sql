CREATE TABLE IF NOT EXISTS `events` (
                          `id` int NOT NULL,
                          `date` varchar(100) NOT NULL,
                          `name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
                          `link` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
                          `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `events` (`id`, `date`, `name`, `link`, `created`) VALUES
(1, '02/01/2020 - 02/15/2020', 'REPRE soustředění Kanárské ostrovy', '', '2020-08-31 13:32:36'),
(2, '03/06/2020 - 03/21/2020', 'REPRE soustředění Mallorca', '', '2020-08-31 14:06:08'),
(3, '09/12/2020', 'EP Tábor', '', '2020-08-31 14:14:49');