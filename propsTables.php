<?php

require_once('connect.php');

try {
    $sql = "INSERT INTO typesallow (id_prop, typeId) VALUES 
                                         (1, 4),
                                         (2, 4),
                                         (3, 5),
                                         (4, 5),
                                         (5, 5)";
    $pdo->exec($sql);
} catch (PDOException $exception) {
    echo "Записи уже добавлены в таблицу university {$exception->getMessage()}";
}
try {
    $sql = "INSERT INTO properties (id, alias, name) VALUES 
                                   (1, 'studentsNum', 'количество студентов'),
                                   (2, 'avarageGrade','средний балл'),
                                   (3, 'name', 'имя'),
                                   (4, 'patronymic', 'отчество'),
                                   (5, 'phone', 'номер телефона')";
    $pdo->exec($sql);
} catch (PDOException $exception) {
    echo "Записи уже добавлены в таблицу typename {$exception->getMessage()}";
}
try {
    $sql = "INSERT INTO proptoelem (id_univ, propId, value,typeId) VALUES 
                                   (7, 1, 22,4),
                                   (7, 2, 4.12,4),
                                   (8, 1, 20,4),
                                   (8, 2, 4,4),
                                   (9, 3, 'Глеб'.5),
                                   (9,4,'Сергеевич',5),
                                   (9,5,89125327654,5),
                                   (10,3,'Павел',5),
                                   (10,4,'Алексеевич',5),
                                   (10,5,8994312324,5)";
    $pdo->exec($sql);
} catch (PDOException $exception) {
    echo "Записи уже добавлены в таблицу typename {$exception->getMessage()}";
}