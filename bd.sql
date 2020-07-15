-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 15 2020 г., 14:43
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `bd`
--

-- --------------------------------------------------------

--
-- Структура таблицы `auth`
--

CREATE TABLE `auth` (
  `AId` int(11) NOT NULL,
  `ALogin` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `APassword` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `classes`
--

CREATE TABLE `classes` (
  `CId` int(11) NOT NULL,
  `CLevel` int(2) NOT NULL,
  `Cletter` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `classes`
--

INSERT INTO `classes` (`CId`, `CLevel`, `Cletter`) VALUES
(1, 1, 'А'),
(2, 1, 'Б'),
(3, 1, 'В'),
(4, 1, 'Г'),
(5, 2, 'А'),
(6, 2, 'Б'),
(7, 2, 'В'),
(8, 2, 'Г'),
(9, 3, 'А'),
(10, 3, 'Б'),
(11, 3, 'В'),
(12, 3, 'Г');

-- --------------------------------------------------------

--
-- Структура таблицы `students`
--

CREATE TABLE `students` (
  `SId` int(11) NOT NULL,
  `SLastName` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SFirstName` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SMidName` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SBirthDate` date NOT NULL,
  `CId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `students`
--

INSERT INTO `students` (`SId`, `SLastName`, `SFirstName`, `SMidName`, `SBirthDate`, `CId`) VALUES
(23, 'Ярославцев', 'Владимир', 'Игоревич', '2000-09-23', 5),
(24, 'Ярославцев', 'Владимир', 'Игоревич', '2000-09-04', 10),
(25, 'Ярославцев', 'Владимир', 'Игоревич', '2000-09-01', 6),
(26, 'Ярославцев', 'Владимир', 'Игоревич', '2000-09-06', 11),
(27, 'Ярославцев', 'Владимир', 'Игоревич', '2000-09-08', 4),
(28, 'Ярославцев', 'Владимир', 'Игоревич', '2000-07-22', 1),
(29, 'Ярославцев', 'Владимир', 'Игоревич', '2000-07-01', 1),
(30, 'Ярославцев', 'Владимир', 'Игоревич', '2000-07-23', 7);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`AId`);

--
-- Индексы таблицы `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`CId`);

--
-- Индексы таблицы `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`SId`),
  ADD KEY `CId` (`CId`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `auth`
--
ALTER TABLE `auth`
  MODIFY `AId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `classes`
--
ALTER TABLE `classes`
  MODIFY `CId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT для таблицы `students`
--
ALTER TABLE `students`
  MODIFY `SId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`CId`) REFERENCES `classes` (`CId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
