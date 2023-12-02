<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}

// Obtém o nome do usuário da sessão
$userName = isset($_SESSION['usuario_nome']) ? $_SESSION['usuario_nome'] : "Nome do Usuário Desconhecido";

// Estabeleça a conexão com o banco de dados (altere as configurações conforme necessário)
include("../conexao.php");

// Query para obter a foto do usuário com base no ID armazenado na sessão
$usuarioId = $_SESSION['usuario_id'];
$queryFoto = $conn->prepare("SELECT foto_cliente FROM clientes WHERE id_cliente = :id");
$queryFoto->bindValue(":id", $usuarioId);
$queryFoto->execute();

$fotoUsuario = ""; // Variável para armazenar a foto do usuário
if ($queryFoto->rowCount() > 0) {
    // Se o usuário for encontrado, obtenha o caminho da foto
    $rowFoto = $queryFoto->fetch(PDO::FETCH_ASSOC);
    $fotoUsuario = $rowFoto['foto_cliente'];
    
} else {
    // Usuário não encontrado, faça algo (por exemplo, carregar uma foto padrão)
    // ...
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/indexcliente.css">
    <title>ControlPet - cliente</title>
</head>
<body>
    <div class="fundo">
        <div class="perfil">
            
            <div class="ajustarfotonaesquerda">
            <img src="<?php echo $fotoUsuario; ?>" alt="foto de perfil" class="fotodeperfil">
                    
                    <div class="ajustebotoes">
                <a href="detalhesperfil.php">
                <button class="mais">Detalhes</button></a>
                <a href="logout.php">
                <button class="sair">Sair</button></a>
                    </div>
            </div>

            <h1>bem vindo <?php echo $userName; ?></h1>

            <div class="botoesdomenu">

                <div class="ajustarbotoesdadireita">
                    <a href="./cadastrar-pet/cadastropet.php">
                    <button class="mais">Cadastrar pet</button></a>

                    <button class="sair">Excluir pet</button>
                    <button class="mais">Agendar serviço</button>
                </div>
            </div>

        </div>

        <div class="servicos">
               
            <h2>ainda não possui serviços agendados</h2>
        </div>

        <div class="meuspets">

        <?php 
                

    // Query para obter os pets do banco de dados
    $query = $conn->query("SELECT nome, foto_pet FROM pets");


    // Verificar se há algum resultado
    if ($query->rowCount() > 0) {
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            
            echo "<div class='pet'>";
            echo "<h3>{$row['nome']}</h3>";
            
            echo "<img src='/cliente/cadastrar-pet/Imagens/imagens_pet/{$row['foto_pet']}' alt='Foto do Pet'>";

            echo "</div>";
            echo "<hr>";
            echo "<br>";
        }
    } else {
        echo "<p>Ainda não possui pets cadastrados.</p>";
    }
    ?>
        </div>
    </div>
</body>
</html>