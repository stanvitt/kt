-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Май 27 2020 г., 09:17
-- Версия сервера: 10.4.11-MariaDB
-- Версия PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `служба доставки грузов 2`
--

-- --------------------------------------------------------

--
-- Дублирующая структура для представления `marka`
-- (См. Ниже фактическое представление)
--
CREATE TABLE `marka` (
`ID машины` int(5)
,`Марка` varchar(25)
,`Цвет` varchar(25)
,`Номер машины` varchar(6)
);

-- --------------------------------------------------------

--
-- Дублирующая структура для представления `poluchperm`
-- (См. Ниже фактическое представление)
--
CREATE TABLE `poluchperm` (
`ID получателя` int(5)
,`Фамилия` varchar(25)
,`Имя` varchar(25)
,`Отчество` varchar(25)
,`Телефон` varchar(16)
,`Индекс` int(6)
,`Город` varchar(25)
,`Улица` varchar(25)
,`Дом` varchar(7)
,`Квартира` int(5)
);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `login` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `family` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) UNSIGNED DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `email`, `name`, `family`, `status`, `password`) VALUES
(1, 'Admin', 'danpas@mail.ru', 'Даниил', 'Пасторов', 1, '$2y$10$bYCKxHS97ngZkaiw7KbOr.olgxmtEs.uZ/gapRygfBAOJSigiWPh2'),
(2, 'user1', 'am@mail.ru', 'testus', 'testus', 2, '$2y$10$HEYZW3u/cAQnY//H6v9kYecHuHfQXeUcFsZYW4DUnd.OF47g5vxgC');

-- --------------------------------------------------------

--
-- Дублирующая структура для представления `v`
-- (См. Ниже фактическое представление)
--
CREATE TABLE `v` (
`Код заказа` int(5)
,`Отправитель` int(5)
,`Получатель` int(5)
,`Дата заказа` date
,`Дата доставки` date
,`Цена доставки` int(10)
,`Транспорт` varchar(6)
,`ID доставки` int(5)
);

-- --------------------------------------------------------

--
-- Структура таблицы `получатель`
--

CREATE TABLE `получатель` (
  `ID получателя` int(5) NOT NULL,
  `Фамилия` varchar(25) NOT NULL,
  `Имя` varchar(25) NOT NULL,
  `Отчество` varchar(25) NOT NULL,
  `Телефон` varchar(16) NOT NULL,
  `Индекс` int(6) NOT NULL,
  `Город` varchar(25) NOT NULL,
  `Улица` varchar(25) NOT NULL,
  `Дом` varchar(7) NOT NULL,
  `Квартира` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `получатель`
--

INSERT INTO `получатель` (`ID получателя`, `Фамилия`, `Имя`, `Отчество`, `Телефон`, `Индекс`, `Город`, `Улица`, `Дом`, `Квартира`) VALUES
(0, 'Пасторов', 'Даниил', 'Павлович', '8-922-333-41-41', 614000, 'Пермь', 'Гашкова', '25', 13),
(1, 'Пасторов', 'Даниил', 'Павлович', '+79226459356', 0, 'Пермь', '', '', 0),
(2, 'Анищенко', 'Светлана', 'Михайловна', '8-922-343-12-34', 617012, 'Челябинск', 'Бажова', '25', 9),
(3, 'Дорошенко', 'Кирилл', 'Васильевич', '8-802-915-50-50', 618021, 'Архангельск', 'Ленина', '15', 12),
(4, 'Сазонова', 'Ольга', 'Андреевна', '8-908-923-45-54', 617402, 'Екатеринбург', 'Флотская', '97', 18),
(5, 'Кайсаров', 'Андрей', 'Олегович', '8-222-343-11-09', 610012, 'Магнитогорск', 'Тюрина', '10', 25),
(6, 'Иванов', 'Петр', 'Даниилович', '8-320-254-23-32', 614283, 'Пермь', 'Мира', '25', 13);

-- --------------------------------------------------------

--
-- Структура таблицы `вид доставки`
--

CREATE TABLE `вид доставки` (
  `ID доставки` int(5) NOT NULL,
  `Тип доставки` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `вид доставки`
--

INSERT INTO `вид доставки` (`ID доставки`, `Тип доставки`) VALUES
(1, 'Обычная'),
(2, 'В защищенном кейсе');

-- --------------------------------------------------------

--
-- Структура таблицы `заказ`
--

CREATE TABLE `заказ` (
  `Код заказа` int(5) NOT NULL,
  `Отправитель` int(5) NOT NULL,
  `Получатель` int(5) NOT NULL,
  `Дата заказа` date NOT NULL,
  `Дата доставки` date NOT NULL,
  `Цена доставки` int(10) NOT NULL,
  `Транспорт` varchar(6) NOT NULL,
  `ID доставки` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `заказ`
--

INSERT INTO `заказ` (`Код заказа`, `Отправитель`, `Получатель`, `Дата заказа`, `Дата доставки`, `Цена доставки`, `Транспорт`, `ID доставки`) VALUES
(1, 1, 1, '2020-03-03', '2020-03-05', 500, 'с120сс', 2),
(2, 2, 6, '2020-05-02', '2020-05-04', 1000, 'в322ва', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `отправитель`
--

CREATE TABLE `отправитель` (
  `id отправителя` int(5) NOT NULL,
  `Фамилия` varchar(25) NOT NULL,
  `Имя` varchar(25) NOT NULL,
  `Отчество` varchar(25) NOT NULL,
  `Индекс` int(6) NOT NULL,
  `Город` varchar(25) NOT NULL,
  `Улица` varchar(25) NOT NULL,
  `Дом` varchar(7) NOT NULL,
  `Квартира` int(5) NOT NULL,
  `Телефон` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `отправитель`
--

INSERT INTO `отправитель` (`id отправителя`, `Фамилия`, `Имя`, `Отчество`, `Индекс`, `Город`, `Улица`, `Дом`, `Квартира`, `Телефон`) VALUES
(1, 'Петров', 'Александр', 'Данилович', 614000, 'Пермь', 'Гашкова', '25', 12, '8-222-333-44-55'),
(2, 'Пасторов', 'Данил', 'Алексеевич', 614203, 'Пермь', 'Ленина', '25', 12, '8-923-453-45-22');

-- --------------------------------------------------------

--
-- Структура таблицы `транспорт`
--

CREATE TABLE `транспорт` (
  `ID машины` int(5) NOT NULL,
  `Марка` varchar(25) NOT NULL,
  `Цвет` varchar(25) NOT NULL,
  `Номер машины` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `транспорт`
--

INSERT INTO `транспорт` (`ID машины`, `Марка`, `Цвет`, `Номер машины`) VALUES
(1, 'Toyota', 'Желтый', 'с120сс'),
(2, 'Audi', 'Черный', 'с122са'),
(3, 'Mercedec', 'Белый', 'в322ва'),
(4, 'Mercedec', 'Белый', 'б323бк'),
(5, 'Mercedec', 'Оранжевый', 'а333аа'),
(6, 'Toyota', 'Черный', 'ф202аф');

-- --------------------------------------------------------

--
-- Структура для представления `marka`
--
DROP TABLE IF EXISTS `marka`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `marka`  AS  select `транспорт`.`ID машины` AS `ID машины`,`транспорт`.`Марка` AS `Марка`,`транспорт`.`Цвет` AS `Цвет`,`транспорт`.`Номер машины` AS `Номер машины` from `транспорт` where `транспорт`.`Марка` = 'Mercedec' ;

-- --------------------------------------------------------

--
-- Структура для представления `poluchperm`
--
DROP TABLE IF EXISTS `poluchperm`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `poluchperm`  AS  select `получатель`.`ID получателя` AS `ID получателя`,`получатель`.`Фамилия` AS `Фамилия`,`получатель`.`Имя` AS `Имя`,`получатель`.`Отчество` AS `Отчество`,`получатель`.`Телефон` AS `Телефон`,`получатель`.`Индекс` AS `Индекс`,`получатель`.`Город` AS `Город`,`получатель`.`Улица` AS `Улица`,`получатель`.`Дом` AS `Дом`,`получатель`.`Квартира` AS `Квартира` from `получатель` where `получатель`.`Город` = 'Пермь' ;

-- --------------------------------------------------------

--
-- Структура для представления `v`
--
DROP TABLE IF EXISTS `v`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v`  AS  select `заказ`.`Код заказа` AS `Код заказа`,`заказ`.`Отправитель` AS `Отправитель`,`заказ`.`Получатель` AS `Получатель`,`заказ`.`Дата заказа` AS `Дата заказа`,`заказ`.`Дата доставки` AS `Дата доставки`,`заказ`.`Цена доставки` AS `Цена доставки`,`заказ`.`Транспорт` AS `Транспорт`,`заказ`.`ID доставки` AS `ID доставки` from `заказ` where `заказ`.`Отправитель` = 1 ;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `получатель`
--
ALTER TABLE `получатель`
  ADD PRIMARY KEY (`ID получателя`);

--
-- Индексы таблицы `вид доставки`
--
ALTER TABLE `вид доставки`
  ADD PRIMARY KEY (`ID доставки`);

--
-- Индексы таблицы `заказ`
--
ALTER TABLE `заказ`
  ADD PRIMARY KEY (`Код заказа`),
  ADD KEY `Отправитель` (`Отправитель`),
  ADD KEY `Получатель` (`Получатель`),
  ADD KEY `Транспорт` (`Транспорт`),
  ADD KEY `ID доставки` (`ID доставки`);

--
-- Индексы таблицы `отправитель`
--
ALTER TABLE `отправитель`
  ADD PRIMARY KEY (`id отправителя`);

--
-- Индексы таблицы `транспорт`
--
ALTER TABLE `транспорт`
  ADD PRIMARY KEY (`ID машины`),
  ADD KEY `Номер машины` (`Номер машины`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `заказ`
--
ALTER TABLE `заказ`
  ADD CONSTRAINT `заказ_вид` FOREIGN KEY (`ID доставки`) REFERENCES `вид доставки` (`ID доставки`),
  ADD CONSTRAINT `заказ_отправитель` FOREIGN KEY (`Отправитель`) REFERENCES `отправитель` (`id отправителя`),
  ADD CONSTRAINT `заказ_получатель` FOREIGN KEY (`Получатель`) REFERENCES `получатель` (`ID получателя`),
  ADD CONSTRAINT `заказ_транспорт` FOREIGN KEY (`Транспорт`) REFERENCES `транспорт` (`Номер машины`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
