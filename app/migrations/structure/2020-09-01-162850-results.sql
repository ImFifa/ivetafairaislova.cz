
CREATE TABLE IF NOT EXISTS `results` (
                           `id` int NOT NULL,
                           `name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
                           `date` date NOT NULL,
                           `year` int NOT NULL,
                           `rank` int NOT NULL,
                           `link` varchar(200) NOT NULL,
                           `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `results` (`id`, `name`, `date`, `year`, `rank`, `link`, `created`) VALUES
(1, 'World Cup Santo Domingo', '2019-11-10', 2019, 33, 'https://triathlon.org/results/result/2019_santo_domingo_itu_triathlon_world_cup/339014', '2020-08-31 11:48:55'),
(2, 'EP Alanya', '2019-10-05', 2019, 11, '', '2020-08-31 11:49:54'),
(3, 'ME do 23 let Valencia', '2019-09-14', 2019, 21, '', '2020-08-31 11:50:09'),
(4, 'MS do 23 let Lausanne', '2019-09-01', 2019, 22, '', '2020-08-31 11:50:25'),
(5, 'World Cup Karlovy Vary', '2019-08-25', 2019, 31, '', '2020-08-31 11:50:43'),
(6, 'Test', '2020-09-02', 2020, 1, 'https://triathlon.org/results/result/2019_santo_domingo_itu_triathlon_world_cup/339014', '2020-09-01 13:10:13'),
(7, 'Test 4', '2020-07-29', 2020, 20, '', '2020-09-01 13:41:15'),
(8, 'Test 2', '2020-09-19', 2020, 2, '', '2020-09-01 13:42:01'),
(9, 'Test 3', '2020-08-21', 2020, 3, 'http://www.zatec-hotel.cz/cs/uvod', '2020-09-01 13:42:17');
