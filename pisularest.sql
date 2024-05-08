-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 22 Lis 2021, 15:01
-- Wersja serwera: 10.4.20-MariaDB
-- Wersja PHP: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `pisularest`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `jpg` text NOT NULL,
  `title` varchar(20) NOT NULL,
  `description` varchar(50) NOT NULL,
  `upload_date` date NOT NULL,
  `upload_time` time NOT NULL,
  `author` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `article`
--

INSERT INTO `article` (`id`, `jpg`, `title`, `description`, `upload_date`, `upload_time`, `author`) VALUES
(3, 'https://zwierzaki.pl/wp-content/uploads/2021/09/czarny-kot-1200x900.jpeg', 'testowy', 'testowy1', '2020-11-11', '00:00:00', 'user'),
(4, 'https://d-gr.cdngr.pl/kadry/k/r/gr-ogl/df/5c/23690677_699006691_maltanczyki-piesek-mini_xlarge.jpg', 'tytul testowy', 'opis pieska', '2018-11-11', '00:00:00', 'hlipp3'),
(5, 'https://static5.redcart.pl/templates/images/thumb/3151/800/9999/pl/0/templates/images/products/3151/c515dd36df2e725f00d9428583edfaa6.jpg', 'pies', 'psisko', '2021-09-11', '00:00:00', ''),
(6, 'https://ocdn.eu/images/pulscms/MWY7MDA_/1093f6ecf614401836a1f962217d5b44.jpeg', 'piesio2', 'moj piesek jest ladnymoj piesek jest ladnymoj pies', '2021-10-11', '00:00:00', ''),
(7, 'https://patronite.pl/upload/user/257393/ckfinder/images/hoshi-12.JPG', 'piesek ladny', 'pies usmiechniety', '2021-11-03', '00:00:00', 'hlipp3'),
(8, 'https://lelum.pl/wp-content/uploads/2019/09/s%C5%82odki-kotek-2.png', 'slodki kotek', 'opisu nie bedzie', '2021-11-11', '17:00:00', ''),
(10, 'https://www.tapeciarnia.pl/tapety/normalne/tapeta-panda-mala-na-galezi.jpg', 'Najsłodsze zwierzę', ':)))', '2021-11-12', '15:00:00', ''),
(12, 'https://ocdn.eu/pulscms-transforms/1/dUok9kpTURBXy8xYWM4ZWY4MTc0ZDYyZDMzMjJkY2Q2NWY3ZGQ0MmJjZi5qcGeSlQLNA8AAwsOVAgDNA8DCw4GhMAU', 'ruda', 'panda', '2021-11-12', '22:20:00', 'Anula'),
(16, 'https://i.pinimg.com/236x/c7/d6/91/c7d691da9ad19c97964f51066d7f2919.jpg', 'subaru', '', '2021-11-18', '18:52:20', 'hlipp3'),
(17, 'https://i.pinimg.com/236x/db/4f/17/db4f17da59e0197fde4e3dd439ea3d29.jpg', 'auto', '', '2021-11-18', '18:52:44', 'hlipp3'),
(18, 'https://i.pinimg.com/236x/50/f2/4a/50f24a8d94da35892cf8b02e5ed33189.jpg', 'wziuuuum', 'wrum', '2021-11-18', '18:53:07', 'hlipp3'),
(19, 'https://i.pinimg.com/236x/63/10/94/6310946aee25a2d6bc565434813076b9.jpg', 'moje na sterydach', '', '2021-11-18', '18:53:53', 'hlipp3'),
(20, 'https://i.pinimg.com/236x/37/2e/1c/372e1cdaf6d1ec2374fa10711a3ceaa2.jpg', 'forester', '', '2021-11-18', '18:54:40', 'hlipp3'),
(21, 'https://i.pinimg.com/236x/c3/b5/48/c3b548485a3534131b56d4c7e4fce865.jpg', 'off-road', '', '2021-11-18', '18:55:06', 'hlipp3'),
(22, 'https://i.pinimg.com/236x/f6/78/cd/f678cd88456604f8055c2c6910246451.jpg', 'v jak volkswagen', '', '2021-11-18', '18:55:43', 'hlipp3'),
(23, 'https://i.pinimg.com/236x/b1/cd/55/b1cd55300570e1460d36a9a0764c4687.jpg', 'wagon', '', '2021-11-18', '18:56:04', 'hlipp3'),
(24, 'https://i.pinimg.com/236x/65/38/41/6538410d90a8ae33ef072a293d3f02c1.jpg', 'pali gume', '', '2021-11-18', '18:56:31', 'hlipp3'),
(25, 'https://i.pinimg.com/236x/b1/68/95/b1689573553398c95d06a99002487191.jpg', 'r34', '', '2021-11-18', '18:57:04', 'hlipp3'),
(26, 'https://i.pinimg.com/236x/51/61/6f/51616fada0ec76fbe5e53fffdbb7784a.jpg', 'marchewy', '', '2021-11-18', '18:57:16', 'hlipp3'),
(27, 'https://i.pinimg.com/236x/ff/92/9d/ff929d3a431ab3380a53d06e3592ff13.jpg', 'nocna bestia', '', '2021-11-18', '18:57:30', 'hlipp3'),
(28, 'https://i.pinimg.com/236x/07/12/f1/0712f13dd1645cefca98341a29c285f3.jpg', 'f&amp;f', '', '2021-11-18', '18:58:05', 'hlipp3'),
(29, 'https://i.pinimg.com/236x/7d/d9/02/7dd9024d5a6a79b7a253270d3d8be4e5.jpg', 'przystojniak', '', '2021-11-18', '18:58:27', 'hlipp3'),
(30, 'https://i.pinimg.com/236x/65/79/60/657960aabcd6985722b03f21df797f7f.jpg', 'paul', '', '2021-11-18', '18:58:46', 'hlipp3'),
(31, 'https://i.pinimg.com/236x/ce/00/b0/ce00b073e98a60886e18d41f3251db6c.jpg', 'rodzina', '', '2021-11-18', '18:59:00', 'hlipp3'),
(32, 'https://i.pinimg.com/236x/e0/5b/a5/e05ba5370d641b1f3d7d2db42760d00e.jpg', '*turbo noises*', '', '2021-11-18', '18:59:29', 'hlipp3'),
(33, 'https://i.pinimg.com/236x/4e/79/30/4e7930c060c56a644e4f7d85116be441.jpg', 'XD', '', '2021-11-18', '18:59:42', 'hlipp3'),
(34, 'https://i.pinimg.com/236x/66/57/2f/66572f744b10fa3ffb9ea44ee2edec78.jpg', 'suki', '', '2021-11-18', '18:59:55', 'hlipp3'),
(36, 'https://i.pinimg.com/236x/56/df/fc/56dffc019c5697b7793cd696e7996aba.jpg', 'gorsza', '', '2021-11-18', '19:00:34', 'hlipp3'),
(37, 'https://i.pinimg.com/236x/89/a8/53/89a85380cfaf69505d82a4856d0a4a39.jpg', 'suki', '', '2021-11-18', '19:01:41', 'hlipp3'),
(38, 'https://i.pinimg.com/236x/3c/05/f6/3c05f6aff64ebc705efe99608a6c3c6f.jpg', 'łyse banie', '', '2021-11-18', '19:02:07', 'hlipp3');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(20) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `login` varchar(20) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `rank` int(1) NOT NULL,
  `user_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`user_id`, `name`, `login`, `password`, `rank`, `user_img`) VALUES
(4, 'Kacper', 'hlipp3', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 5, 'https://scontent.fktw1-1.fna.fbcdn.net/v/t1.15752-9/254437258_581684846449534_7832954881906558669_n.jpg?_nc_cat=105&ccb=1-5&_nc_sid=ae9488&_nc_ohc=grY1ntAcVi4AX-nU3Um&_nc_ht=scontent.fktw1-1.fna&oh=e86d36ca5e581eeca08a4452e84a4299&oe=61B9E9DD'),
(7, 'miaciek', 'maciek', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 1, ''),
(8, 'mateusz', 'wneku', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 1, ''),
(9, 'username', 'user', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 1, ''),
(10, 'administrator', 'admin', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 5, '');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
