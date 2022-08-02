-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Авг 02 2022 г., 17:26
-- Версия сервера: 10.4.24-MariaDB
-- Версия PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shop1`
--
CREATE DATABASE IF NOT EXISTS `shop1` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `shop1`;

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`category_id`, `name`, `description`) VALUES
(1, 'Блузы и рубашки', 'Блузы и рубашки...'),
(2, 'Брюки', 'Брюки...'),
(3, 'Платья и сарафаны', 'Платья и сарафаны...'),
(4, 'Юбки', 'Юбки...'),
(5, 'Главная', 'Главная...'),
(6, 'Нижнее белье', 'Нижнее белье...');

-- --------------------------------------------------------

--
-- Структура таблицы `picture`
--

CREATE TABLE `picture` (
  `picture_id` int(11) NOT NULL,
  `path` text NOT NULL,
  `alt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `picture`
--

INSERT INTO `picture` (`picture_id`, `path`, `alt`) VALUES
(1, 'assets/img/1/1.webp', 'Блуза'),
(2, 'assets/img/1/2.webp', 'Блуза'),
(3, 'assets/img/2/1.webp', 'Рубашка'),
(4, 'assets/img/3/1.webp', 'Кимоно'),
(5, 'assets/img/3/2.webp', 'Кимоно'),
(6, 'assets/img/3/3.webp', 'Кимоно'),
(7, 'assets/img/4/1.webp', 'Кюлоты'),
(8, 'assets/img/5/1.webp', 'Карго'),
(9, 'assets/img/6/1.webp', 'Корги'),
(10, 'assets/img/6/2.webp', 'Корги'),
(11, 'assets/img/6/3.webp', 'Корги'),
(12, 'assets/img/6/4.webp', 'Корги'),
(13, 'assets/img/7/1.webp', 'Кожаные брюки'),
(14, 'assets/img/7/2.webp', 'Кожаные брюки'),
(15, 'assets/img/8/1.webp', 'Тайтсы'),
(16, 'assets/img/9/1.webp', 'Шорты'),
(17, 'assets/img/10/1.webp', 'Джоггеры'),
(18, 'assets/img/11/1.webp', 'Джокеры'),
(19, 'assets/img/12/1.webp', 'Леггинсы'),
(20, 'assets/img/13/1.webp', 'Спортивные брюки'),
(21, 'assets/img/14/1.webp', 'Сарафан'),
(22, 'assets/img/14/2.webp', 'Сарафан'),
(23, 'assets/img/15/2.webp', 'Платье-майка'),
(24, 'assets/img/16/1.webp', 'Трусы');

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `price_promo` decimal(10,2) DEFAULT NULL,
  `price_discount` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`product_id`, `name`, `description`, `is_active`, `price`, `price_promo`, `price_discount`) VALUES
(1, 'Блуза', 'Блуза...', 1, '1000.00', '900.00', NULL),
(2, 'Рубашка', 'Рубашка...', 1, '2000.00', '1900.00', '1500.00'),
(3, 'Кимоно', 'Кимоно...', 1, '5000.00', NULL, NULL),
(4, 'Кюлоты', 'Кюлоты...', 1, '500.00', NULL, NULL),
(5, 'Карго', 'Карго...', 1, '2000.00', '1500.00', NULL),
(6, 'Корги', 'Корги...', 0, '100000.00', NULL, NULL),
(7, 'Кожаные брюки', 'Кожаные брюки...', 1, '900.00', '599.00', '499.00'),
(8, 'Тайтсы', 'Тайтсы...', 1, '340.00', NULL, NULL),
(9, 'Шорты', 'Шорты...', 1, '7430.00', '6999.00', '4999.00'),
(10, 'Джоггеры', 'Джоггеры...', 1, '4450.00', '3999.99', NULL),
(11, 'Джокеры', 'Джокеры...', 0, '30.00', '19.99', NULL),
(12, 'Леггинсы', 'Леггинсы...', 1, '532220.00', '10000.00', '6999.99'),
(13, 'Спортивные брюки', 'Спортивные брюки...', 1, '900.00', NULL, NULL),
(14, 'Сарафан', 'Сарафан...', 1, '5000.00', NULL, NULL),
(15, 'Платье-майка', 'Платье-майка...', 1, '450.00', '300.00', NULL),
(16, 'Трусы', 'Трусы...', 1, '300.00', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `product_and_category`
--

CREATE TABLE `product_and_category` (
  `category_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `is_main` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `product_and_category`
--

INSERT INTO `product_and_category` (`category_id`, `product_id`, `is_main`) VALUES
(1, 1, 1),
(1, 2, 1),
(1, 3, 1),
(2, 4, 1),
(2, 5, 1),
(2, 6, 1),
(2, 7, 1),
(2, 8, 1),
(2, 9, 1),
(2, 10, 1),
(2, 11, 1),
(2, 12, 1),
(2, 13, 1),
(3, 3, 0),
(3, 14, 1),
(3, 15, 1),
(5, 1, 0),
(5, 2, 0),
(5, 3, 0),
(5, 4, 0),
(5, 5, 0),
(5, 6, 0),
(5, 7, 0),
(5, 8, 0),
(5, 9, 0),
(5, 10, 0),
(5, 11, 0),
(5, 12, 0),
(5, 13, 0),
(5, 14, 0),
(5, 15, 0),
(5, 16, 0),
(6, 16, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `product_and_picture`
--

CREATE TABLE `product_and_picture` (
  `product_id` int(11) NOT NULL,
  `picture_id` int(11) NOT NULL,
  `is_main` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `product_and_picture`
--

INSERT INTO `product_and_picture` (`product_id`, `picture_id`, `is_main`) VALUES
(1, 1, 1),
(1, 2, 0),
(2, 3, 1),
(3, 4, 1),
(3, 5, 0),
(3, 6, 0),
(4, 7, 1),
(5, 8, 1),
(5, 9, 0),
(6, 9, 1),
(6, 10, 0),
(6, 11, 0),
(6, 12, 0),
(7, 13, 1),
(7, 14, 0),
(8, 15, 1),
(9, 16, 1),
(10, 17, 1),
(11, 18, 1),
(12, 19, 1),
(13, 20, 1),
(14, 21, 1),
(14, 22, 0),
(15, 23, 1),
(16, 24, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `question`
--

CREATE TABLE `question` (
  `id_question` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `birthday` year(4) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `topic` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `question`
--

INSERT INTO `question` (`id_question`, `name`, `email`, `birthday`, `gender`, `topic`, `description`) VALUES
(1, 'Песель', 'pesel@email.com', 2020, 'М', 'Где купить кость?', 'Захожу в магазин, а еды нет. Плохой магазин, одна звезда вам...');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Индексы таблицы `picture`
--
ALTER TABLE `picture`
  ADD PRIMARY KEY (`picture_id`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Индексы таблицы `product_and_category`
--
ALTER TABLE `product_and_category`
  ADD PRIMARY KEY (`category_id`,`product_id`);

--
-- Индексы таблицы `product_and_picture`
--
ALTER TABLE `product_and_picture`
  ADD PRIMARY KEY (`product_id`,`picture_id`);

--
-- Индексы таблицы `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id_question`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `picture`
--
ALTER TABLE `picture`
  MODIFY `picture_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `question`
--
ALTER TABLE `question`
  MODIFY `id_question` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
