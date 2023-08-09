<?php

function checkVariables(...$variables) {
    foreach ($variables as $variable) {
        if (empty($variable)) {
            throw new Exception("Ошибка: Поле не должно быть пустым.");
        }
    }
}