<?php
include "db.php";
$query = $db->prepare("DELETE FROM books WHERE id = :id");
$delete = $query->execute(array(
    'id' => $_GET['id']
));
header('Location: ' . $_SERVER['HTTP_REFERER']);
