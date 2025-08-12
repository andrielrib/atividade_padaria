<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "atividade_padaria";

$conn = new mysqli($produto, $usuarios, $pedidos, $clientes);

if ($conn->connect_error) {
    die("Conexao falhou: " . $conn->connect_error);
}