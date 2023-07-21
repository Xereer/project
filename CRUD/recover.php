<?php

require_once('../connect.php');

mysqli_query($connect, query: "UPDATE `university` SET `isArchive`='0'");

header('Location: ../index.php');