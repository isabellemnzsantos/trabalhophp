<?php
include "bd.php"; 


function validarNome($nome) {
    $nomes = explode(' ', trim($nome));
    return count($nomes) >= 2;
}

$dadosCadastrados = null; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['deletar'])) {

        $emailParaDeletar = trim($_POST['email']);
        
        $stmt = $conn->prepare("DELETE FROM Formulario WHERE email = ?");
        $stmt->bind_param("s", $emailParaDeletar); 

        if ($stmt->execute()) {
            echo "<script>alert('Dados deletados com sucesso.');</script>";
            $dadosCadastrados = null; 
        } else {
            echo "<script>alert('Erro ao deletar os dados.');</script>";
        }


        $stmt->close();
    } else {

        $nome = trim($_POST['nome'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $data_nascimento = trim($_POST['data_nascimento'] ?? '');
        $genero = trim($_POST['genero'] ?? '');
        $biografia = trim($_POST['biografia'] ?? '');


        $erros = [];


        if (empty($nome) || !validarNome($nome)) {
            $erros[] = "O nome deve conter pelo menos dois nomes.";
        }
        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $erros[] = "E-mail inválido."; 
        }
        if (empty($data_nascimento)) {
            $erros[] = "O campo 'Data de Nascimento' é obrigatório.";
        }
        if (empty($genero)) {
            $erros[] = "O campo 'Gênero' é obrigatório.";
        }
        if (empty($biografia)) {
            $erros[] = "O campo 'Biografia' é obrigatório.";
        }

        if (count($erros) > 0) {
            foreach ($erros as $erro) {
                echo "<script>alert('$erro');</script>";
            }
        } else {

            $stmt = $conn->prepare("INSERT INTO Formulario (nome, email, data_nascimento, genero, biografia) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $nome, $email, $data_nascimento, $genero, $biografia);

            if ($stmt->execute()) {
                $dadosCadastrados = [
                    'nome' => $nome,
                    'email' => $email,
                    'data_nascimento' => $data_nascimento,
                    'genero' => $genero,
                    'biografia' => $biografia
                ];
            } else {
                echo "<script>alert('Erro ao salvar os dados.');</script>";
            }

            $stmt->close();
        }
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado do Cadastro</title>
    <link rel="stylesheet" href="forms.css">
</head>
<body>
    <div class="container">
        <h2>Dados do Cadastro</h2>
        <?php if ($dadosCadastrados): ?>
            <p><strong>Nome completo:</strong> <?php echo htmlspecialchars($dadosCadastrados['nome']); ?></p>
            <p><strong>E-mail:</strong> <?php echo htmlspecialchars($dadosCadastrados['email']); ?></p>
            <p><strong>Data de Nascimento:</strong> <?php echo htmlspecialchars($dadosCadastrados['data_nascimento']); ?></p>
            <p><strong>Gênero:</strong> <?php echo htmlspecialchars($dadosCadastrados['genero']); ?></p>
            <p><strong>Biografia:</strong> <?php echo nl2br(htmlspecialchars($dadosCadastrados['biografia'])); ?></p>
            <form method="post">
                <input type="hidden" name="email" value="<?php echo htmlspecialchars($dadosCadastrados['email']); ?>">
                <button type="submit" name="deletar">Deletar Dados</button>
            </form>
        <?php else: ?>
            <p>Nenhum dado foi cadastrado.</p>
        <?php endif; ?>
        <a href="forms.php">Voltar ao formulário</a>
        <a href="usuarios.php">Ver usuários</a>
    </div>
</body>
</html>
