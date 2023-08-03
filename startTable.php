<?php

require_once('connect.php');

try {
    $sql = "INSERT INTO university(id, parentID, typeID, name, isArchive) VALUES
                                                                  ('1','0','1','РГУ НГ','0'),
                                                                  ('2','1','2','ТЭК','0'),
                                                                  ('3','1','2','Разработка','0'),
                                                                  ('4','2','3','Безопасности информационных технологий','0'),
                                                                  ('5','2','3','Специальных программ','0'),
                                                                  ('6','3','3','Бурения нефтяных и газовых скважин','0'),
                                                                  ('7','4','4','КИ-21-01','0'),
                                                                  ('8','5','4','КИ-21-02','0'),
                                                                  ('9','7','5','Романов','0'),
                                                                  ('10','7','5','Иванов','0')";
    $pdo->exec($sql);
} catch (PDOException $exeption) {
    echo "Записи уже добавлены в таблицу university {$exeption->getMessage()}";
}
try {
    $sql = "INSERT INTO typename(id, name) VALUES 
                                   ('1','Университет'),
                                   ('2', 'Факультет'),
                                   ('3', 'Кафедра'),
                                   ('4', 'Группа'),
                                   ('5', 'Студент')";
    $pdo->exec($sql);
} catch (PDOException $exeption) {
    echo "Записи уже добавлены в таблицу typename {$exeption->getMessage()}";
}