<form method="GET" action="processa.php">
    Nome: <input type="text" name="nome"><br>
    Idade: <input type="text" name="idade"><br>
    <input type="submit" value="Enviar">
</form>

<?php
$nome = $_GET['nome'];
$idade = $_GET['idade'];

echo "Nome: " . htmlspecialchars($nome) . "<br>";
echo "Idade: " . htmlspecialchars($idade) . "<br>";
?>

// URL: https://www.exemplo.com/processa.php?nome=Joao&idade=30