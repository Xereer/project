<?php

$connect = mysqli_connect(hostname: 'localhost', username: 'root', database: 'project');

if (!$connect){
    echo "Error";
}