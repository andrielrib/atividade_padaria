<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "atividade_padaria";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexao falhou: " . $conn->connect_error);
}