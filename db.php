<?php
try {
    $db = new PDO("mysql:host=localhost;dbname=library", "root", "");
} catch ( PDOException $e ){
    print $e->getMessage();
}
?>