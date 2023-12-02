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

// Obtém o ID do usuário da sessão
$usuarioId = $_SESSION['usuario_id'];

// Query para obter a foto do usuário com base no ID armazenado na sessão
$queryFoto = $conn->prepare("SELECT foto_petshop FROM petshops WHERE id_petshop = :id");
$queryFoto->bindValue(":id", $usuarioId);
$queryFoto->execute();

$fotopetshop = ""; // Variável para armazenar a foto do petshop

if ($queryFoto->rowCount() > 0) {
    $rowFoto = $queryFoto->fetch(PDO::FETCH_ASSOC);
    $fotopetshop = $rowFoto['foto_petshop'];
} else {
    // Se a foto do petshop não foi encontrada, pode-se atribuir uma foto padrão ou fazer outra ação adequada
    // Por exemplo, pode-se definir uma foto padrão para o petshop
    $fotopetshop = "caminho/para/foto_padrao_petshop.jpg";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/indexpetshop.css">
    <title>ControlPet - petshop</title>
</head>
<body>
    <div class="fundo">
        <div class="perfil">
            <div class="ajustarfotonaesquerda">
                <img src="<?php echo $fotopetshop; ?>" alt="foto de perfil" class="fotodeperfil">
                <div class="ajustebotoes">
                    <a href="detalhesperfil_petshop.php">
                        <button class="mais">Detalhes</button>
                    </a>
                    <a href="logout.php">
                        <button class="sair">Sair</button>
                    </a>
                </div>
            </div>
            <h1>Bem-vindo <?php echo $userName; ?></h1>
            <div class="botoesdomenu">
                <div class="ajustarbotoesdadireita">
                    <a href="./cadastrar-pet/cadastropet.php">
                        <button class="mais">Cadastrar funcionário</button>
                    </a>
                    <button class="sair">Excluir funcionário</button>
                    <button class="mais">Ver serviços</button>
                </div>
            </div>
        </div>
        <div class="servicos">
            <h2>Ainda não possui serviços agendados</h2>
        </div>
        <div class="meuspets">
            <h2>Ainda não possui funcionários cadastrados</h2>
        </div>
    </div>
</body>
</html>
