<?php

require_once 'connect.php';

mysqli_query($connect, query:"INSERT INTO `typename`(`id`, `name`) VALUES 
('1','Университет'),
('2', 'Факультет'),
('3', 'Кафедра'),
('4', 'Группа'),
('5', 'Студент')");