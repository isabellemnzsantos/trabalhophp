<?php
// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "cimatec";
$dbname = "Forms";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>