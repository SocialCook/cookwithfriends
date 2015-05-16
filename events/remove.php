<?php
session_start();
include '../connect.php';

$stmt = $mysqli->prepare("DELETE from attending where e_id = ? and user_id = ?");
$stmt->bind_param('ii', $_GET['id'], $_SESSION['id']);
$stmt->execute();
$stmt->close();

echo "<script>window.location.replace('index.php')</script>";



?>