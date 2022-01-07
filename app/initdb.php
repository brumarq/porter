<?php
require __DIR__ . '/config.php';

$sql = file_get_contents(__DIR__ . '/data.sql');

echo $conn->exec($sql);