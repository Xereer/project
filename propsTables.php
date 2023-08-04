<?php

require_once('connect.php');

try {
    $sql = "INSERT INTO typesallow (id, typeId) VALUES 
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
    $sql = "INSERT INTO proptoelem (id, propId, value) VALUES 
                                   (7, 1, 22),
                                   (7, 2, 4.12),
                                   (8, 1, 20),
                                   (8, 2, 4),
                                   (9, 3, 'Глеб'),
                                   (9,4,'Сергеевич'),
                                   (9,5,89125327654),
                                   (10,3,'Павел'),
                                   (10,4,'Алексеевич'),
                                   (10,5,8994312324)";
    $pdo->exec($sql);
} catch (PDOException $exception) {
    echo "Записи уже добавлены в таблицу typename {$exception->getMessage()}";
}