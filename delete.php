<?php
$mysqli = new mysqli("localhost", "root", "", "garciacrud");

$id = $_GET['id'];
$mysqli->query("DELETE FROM products WHERE Id = $id");