-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Хост: localhost:3306
-- Время создания: Апр 08 2015 г., 11:07
-- Версия сервера: 5.5.38
-- Версия PHP: 5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- База данных: `news`
--

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `title`, `description`, `datetime`) VALUES
(1, 'Тест', 'тексттексттексттексттексттексттексттексттексттексттексттексттекс', '2015-04-15 00:00:00'),
(2, 'test', 'test1', '2015-04-07 19:38:13'),
(3, 'Test123', 'sdlgjsdkgabslgkjabslgkajsbdglksjdg', '2015-04-07 19:38:45'),
(4, 'Tsdgdgsdg', 'sdlgjsdkgabslgkjabslgkajsbdglksjdg', '2015-04-07 19:44:28'),
(5, 'Test123', 'sdlgjsdkgabslgkjabslgkajsbdglksjdg', '2015-04-07 19:44:47'),
(6, 'Test123', 'sdasfasf', '2015-04-07 20:00:20'),
(7, 'Test123', 'sdasfasf', '2015-04-07 20:01:17'),
(8, '12312345', 'sdasssdfsdgsdg', '2015-04-07 20:01:23'),
(9, 'Test123', 'sdasfasf', '2015-04-07 20:01:31'),
(10, 'Test123', 'sdasssdfsdgsdg', '2015-04-07 20:02:07'),
(11, 'sdfsdf', 'sdgsdg', '2015-04-07 20:11:11');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;