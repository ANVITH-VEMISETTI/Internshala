<?php
header('Content-Type: application/json');

require_once 'config.php';

$query = sprintf("SELECT * FROM patient");

$result = $link->query($query);

$data = array();
foreach ($result as $row) {
    $data[] = $row;
}

$result->close();
$link->close();

print json_encode($data);
?>