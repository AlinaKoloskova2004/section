-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 14 2023 г., 18:42
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Дети младшего возраста'),
(2, 'Дети среднего возраста'),
(3, 'Дети старшего возраста');

-- --------------------------------------------------------

--
-- Структура таблицы `comment`
--

CREATE TABLE `comment` (
  `id` int NOT NULL,
  `text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '0',
  `user_id` int NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `comment`
--

INSERT INTO `comment` (`id`, `text`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'gfdgfdg', 1, 7, '2023-10-31 07:50:42', '2023-10-31 07:50:42'),
(2, 'Кружки хорошие!', 1, 7, '2023-10-31 08:11:11', '2023-10-31 08:11:11');

-- --------------------------------------------------------

--
-- Структура таблицы `date`
--

CREATE TABLE `date` (
  `id` int NOT NULL,
  `date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `date`
--

INSERT INTO `date` (`id`, `date`) VALUES
(1, 'Понедельник'),
(2, 'Вторник'),
(3, 'Среда'),
(4, 'Четверг'),
(5, 'Пятница'),
(6, 'Суббота');

-- --------------------------------------------------------

--
-- Структура таблицы `record`
--

CREATE TABLE `record` (
  `id` int NOT NULL,
  `surname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `patronymic` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname_child` varchar(35) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_child` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `patronymic_child` varchar(35) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `age_child` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int NOT NULL,
  `section_id` int NOT NULL,
  `status` int NOT NULL DEFAULT '0',
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `record`
--

INSERT INTO `record` (`id`, `surname`, `name`, `patronymic`, `telephone`, `surname_child`, `name_child`, `patronymic_child`, `age_child`, `category_id`, `section_id`, `status`, `user_id`) VALUES
(9, 'Иванов', 'Иван', 'Иванович', '+7(655)511-54-48', 'Иванов', 'Василий', 'Иванович', '7', 2, 11, 1, 7),
(10, 'Иванов', 'Иван', 'Иванович', '+7(816)-511-55-13', 'Иванова', 'Мария', 'Ивановна', '10', 2, 10, 2, 7);

-- --------------------------------------------------------

--
-- Структура таблицы `schedule`
--

CREATE TABLE `schedule` (
  `id` int NOT NULL,
  `section_id` int NOT NULL,
  `teacher_id` int NOT NULL,
  `time_id` int NOT NULL,
  `date_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `schedule`
--

INSERT INTO `schedule` (`id`, `section_id`, `teacher_id`, `time_id`, `date_id`) VALUES
(14, 8, 12, 1, 1),
(15, 9, 9, 4, 5),
(16, 7, 7, 10, 2),
(17, 12, 11, 6, 4),
(18, 11, 8, 2, 3),
(19, 10, 10, 7, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `section`
--

CREATE TABLE `section` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `price` decimal(10,0) DEFAULT NULL,
  `img` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `category_id` int DEFAULT NULL,
  `teacher_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `section`
--

INSERT INTO `section` (`id`, `name`, `description`, `price`, `img`, `category_id`, `teacher_id`) VALUES
(7, '\"Читай-ка\"', 'Отправив своих деток к нам, вы явно не пожалеете! Ваш ребёнок научится правильно и быстро читать!', '250', 'i1.jpg', 1, 7),
(8, '\"Математика\"', 'Содержание занятий кружка представляет собой введение в мир элементарной математики, а также расширенный углубленный вариант наиболее актуальных вопросов базового предмета – математика.', '300', 'i2.png', 1, 12),
(9, '\"Живопись\"', 'Кружок по живописи может стать любимым времяпровождением вашего ребенка. Рисование – одно из самых любимых детских занятий, начиная с ранних лет. Кружок живописи приносит очень много пользы для развития: дети раскрывают свое воображение, изучают окружающий мир и учатся оформлять свои образы на бумаге.', '200', 'i3.png', 2, 9),
(10, '\"Хореография\"', 'Хореография - одна из распространённых организационных форм эстетич. воспитания детей средствами иск-ва танца. Занятия хореографией развивают у детей творческие способности, чувство красоты, музыкальность, содействуют физич. развитию. ', '250', 'i4.png', 2, 10),
(11, '\"Театральный\"', 'Работа кружка предполагает знакомство с основами актерского мастерства, просмотр телеспектаклей, выезд в театр, постановки мини-спектаклей.\r\n\r\nСтруктуру программы составляют введение и три основных раздела, включающих вопросы технологии организации и постановки мини-спектаклей.', '250', 'i5.png', 3, 8),
(12, '\"Шахматы\"', 'В кружке дети ознакомятся с геометрией шахматной доски, названиями шахматных фигур и их игровыми возможностями. А также пополнят словарный запас специальными шахматными терминами и применят их на практике, научатся играть в шахматы и шашки, соблюдая правила игры и используя разнообразные тактические приёмы.', '100', 'i6.png', 3, 11);

-- --------------------------------------------------------

--
-- Структура таблицы `teacher`
--

CREATE TABLE `teacher` (
  `id` int NOT NULL,
  `surname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `patronymic` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `teacher`
--

INSERT INTO `teacher` (`id`, `surname`, `name`, `patronymic`, `img`, `description`) VALUES
(7, 'Пономарёва', 'Екатерина', 'Захаровна', 'p2.jpg', '\"Читай-ка\"'),
(8, 'Русанов', 'Фёдор', 'Павлович', 'p4.jpg', '\"Театральный\"'),
(9, 'Соловьёва', 'Маргарита', 'Матвеевна', 'p3.jpg', '\"Живопись\"'),
(10, 'Федотова', 'Элина', 'Андреевна', 'p1.png', '\"Хореография\"'),
(11, 'Ковалёв', 'Максим', 'Тимурович', 'p5.jpg', '\"Шахматы\"'),
(12, 'Никонова', 'Василиса', 'Степановна', 'p6.jpg', '\"Математика\"');

-- --------------------------------------------------------

--
-- Структура таблицы `time`
--

CREATE TABLE `time` (
  `id` int NOT NULL,
  `time` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `time`
--

INSERT INTO `time` (`id`, `time`) VALUES
(1, '10:00-12:00'),
(2, '10:00-13:30'),
(3, '12:30-14:30'),
(4, '12:00-15:00'),
(5, '13:00-14:30'),
(6, '14:00-16:00'),
(7, '16:00-18:00'),
(8, '17:00-19:30'),
(9, '09:20-11:20'),
(10, '11:30-12:30');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `patronymic` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `name`, `surname`, `patronymic`, `email`, `password`, `role`) VALUES
(6, 'admin', 'Admin', 'Admin', 'Admin', 'admin@mail.ru', '$2y$13$Q5.b/eJNGShodclY.uRth.t4PjRAAVb4OxQHUptr/wuSArXSEIOE6', 1),
(7, 'alina', 'Алина', 'Колоскова', 'Денисовна', 'alina@mail.ru', '$2y$13$BiejEwM12Z5BAFpGNFONjuVnNDTRNWLeIG2L1LoA070FnR1hZ5xV.', 0),
(8, 'Bob', 'Bob', 'Bob', 'Bob', 'bob@mail.ru', '$2y$13$2NuEs2hZ/71EHvdtWoU6L.Wkq.S18UrJV9b0N.IRXR/WpEkPd7lwa', 0),
(9, 'Rob', 'Rob', 'Rob', 'Rob', 'rob@mail.ru', '$2y$13$UunuXG4HI2QxnvY9koIqCOgscwoZCfRuxA.Hg2wIz.nHUkQDkRNW6', 0),
(10, 'Nikita', 'Никита', 'Аликин', 'Евгеньевич', 'nikita@mail.ru', '$2y$13$41uq3SCJ6sQhJZfZMa6OAu1saSIkCEozF.xS4e//hKoUS228jzuji', 0),
(11, 'Marina', 'Марина', 'Марина', 'Марина', 'marina@mail.ru', '$2y$13$IztAPiGelNTIi/oRiNtJxOM33zbXwWUF9oDl2t6xo9KdiPuTSurwu', 0),
(12, 'ivan', 'Иван', 'Иванов', 'Иванович', 'ivan@mail.ru', '$2y$13$rmy214qv4upCf5IBq4Qpi.MS72iM/DFZ4WyxVRYEWwekd2IwhEvVS', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `date`
--
ALTER TABLE `date`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `record`
--
ALTER TABLE `record`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`,`section_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`),
  ADD KEY `schedule_id` (`section_id`),
  ADD KEY `section_id` (`section_id`),
  ADD KEY `teacher_id` (`teacher_id`,`time_id`,`date_id`),
  ADD KEY `time_id` (`time_id`),
  ADD KEY `date_id` (`date_id`);

--
-- Индексы таблицы `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `teacher_id` (`teacher_id`);

--
-- Индексы таблицы `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `time`
--
ALTER TABLE `time`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `date`
--
ALTER TABLE `date`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `record`
--
ALTER TABLE `record`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `section`
--
ALTER TABLE `section`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `time`
--
ALTER TABLE `time`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `record`
--
ALTER TABLE `record`
  ADD CONSTRAINT `record_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`section_id`) REFERENCES `section` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `schedule_ibfk_2` FOREIGN KEY (`time_id`) REFERENCES `time` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `schedule_ibfk_3` FOREIGN KEY (`date_id`) REFERENCES `date` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `schedule_ibfk_4` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `section`
--
ALTER TABLE `section`
  ADD CONSTRAINT `section_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `section_ibfk_2` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
