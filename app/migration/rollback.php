<?php

include 'connection.php';

$rollback = "DROP DATABASE {$dbname}";
$create = "CREATE DATABASE {$dbname}";

$connection->query($rollback);
$connection->query($create);

echo 'Berhasil rollback';