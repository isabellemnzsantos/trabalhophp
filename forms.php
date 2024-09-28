<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Cadastro</title>
    <link rel="stylesheet" href="forms.css">
</head>
<body>
    <div class="form-container">
        <h1>Formulário de Cadastro</h1>
        <form action="alerta.php" method="post">
            <input type="hidden" id="id" name="id">
            
            <label for="nome">Nome completo:</label>
            <input type="text" id="nome" name="nome" placeholder="Digite seu nome completo" required>

            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" placeholder="Digite seu e-mail" required>

            <label for="data_nascimento">Data de Nascimento:</label>
            <input type="date" id="data_nascimento" name="data_nascimento" required>

            <label for="genero">Gênero:</label>
            <select id="genero" name="genero" required>
                <option value="">Selecione</option>
                <option value="masculino">Masculino</option>
                <option value="feminino">Feminino</option>
                <option value="outros">Outros</option>
            </select>

            <label for="biografia">Biografia:</label>
            <textarea id="biografia" name="biografia" placeholder="Escreva uma breve biografia" required></textarea>

            <button type="submit">Cadastrar</button>
        </form>

        <p><a href="usuarios.php">Acessar usuarios</a></p>
    </div>   
</body>
</html>
