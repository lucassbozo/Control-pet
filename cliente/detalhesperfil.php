<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}

// Obtém o ID do usuário da sessão
$usuario_id = $_SESSION['usuario_id'];

// Estabeleça a conexão com o banco de dados (altere as configurações conforme necessário)
include("../conexao.php");

// Query para obter a foto do usuário com base no ID armazenado na sessão
$usuarioId = $_SESSION['usuario_id'];
$queryFoto = $conn->prepare("SELECT foto_cliente FROM clientes WHERE id_cliente = :usuario_id");

$queryFoto->bindParam(":usuario_id", $usuarioId);

$queryFoto->execute();

$fotoUsuario = ""; // Variável para armazenar a foto do usuário
if ($queryFoto->rowCount() > 0) {
    // Se o usuário for encontrado, obtenha o caminho da foto
    $rowFoto = $queryFoto->fetch(PDO::FETCH_ASSOC);
    $fotoUsuario = $rowFoto['foto_cliente'];
}

// Consulta para obter os dados do cliente
$sql = "SELECT * FROM clientes WHERE id_cliente = :usuario_id"; // Usando parâmetros nomeados para evitar SQL injection
$stmt = $conn->prepare($sql);
$stmt->bindParam(':usuario_id', $usuario_id);
$stmt->execute();

// Verifica se há resultados
if ($stmt->rowCount() > 0) {
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $nome = $row['nome'];
    $cpf = $row['cpf'];
    $nascimento = $row['data_nascimento'];
    $email = $row['email'];
    $tel1 = $row['telefone1'];
    $tel2 = $row['telefone2'];
    $rua = $row['rua'];
    $numero = $row['numero'];
    $comp = $row['complemento'];
    $estado = $row['estado'];
    $cidade = $row['cidade'];
    $senha = $row['senha'];
    $confirmacao_senha = $row['confirmacao_senha'];
    
   
} else {
    echo "Nenhum resultado encontrado";
}

// Fecha a conexão (atribuindo null à conexão)
$conn = null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/detalhesperfil.css">

    <title>ControlPet - cliente</title>
</head>
<body>
    <div class="fundo">
        <div class="perfil">
            
         <div class="ajustarfotonaesquerda">
            <img src="<?php echo $fotoUsuario; ?>" alt="foto de perfil" class="fotodeperfil">
            
            
                
                    
            <form action="indexcliente.php" method="get">
                        <div class="ajustebotoes">
                    <a href="logout.php">
                    <button class="sair" type="submit">voltar</button></a>
                        </div>
                </form>
            </div>

            

            <div class="formulario">
                    <h1>Suas informações</h1>
                <hr>
                <form action="" method="post">
                <label class="inputnome" for=""><text>Nome </text></label><br>
                <input class="inputnome" type="text" name="novo_nome" value="<?php echo $nome; ?>"><br><br>

                <label class="input" for=""><text>Cpf </text></label>
                <input class="input" type="text" value="<?php echo $cpf; ?>" disabled>

                <label for=""><text class="text1">Nascimento </text></label>
                <input class="inputcenter" type="date" name="novo_date" value="<?php echo $nascimento; ?>" ><br><br>

                <label class="inputnome" for=""><text>Email </text></label><br>
                <input class="inputnome" type="text" name="novo_email" value="<?php echo $email; ?>"><br><br>

                
                <label class="input" for=""><text>Tel 1 </text></label>
                <input class="telefone1" type="text" name="novo_tel1" value="<?php echo $tel1; ?>">

                <label for=""><text>Tel 2 </text></label>
                <input class="telefone2" type="text" name="novo_tel2" value="<?php echo $tel2; ?>"><br><br>

                <label class="inputnome" for=""><text>Senha </text></label><br>
                <input class="inputnome" type="password" name="novo_password" value="<?php echo $senha; ?>" ><br><br><br>

                <label class="inputnome" for=""><text>Confirmação de senha </text></label><br>
                <input class="inputnome" type="password" name="confirmacao_senha" placeholder="Confirmação de senha">


                    <h1>Endereço</h1>
                <hr>
                <label class="input" for=""><text>Rua </text></label>
                <input class="input" type="text" name = "novo_rua" value="<?php echo $rua; ?>" >

                <label for=""><text class="text1">Numero </text></label>
                <input class="inputcenter" type="text" name="novo_numero" value="<?php echo $numero; ?>"><br><br>

                <div class="alinhar">

                <div class="left">
                    <label for=""><text>Comp </text></label>
                    <input class="tamanho" type="text" name="novo_comp" value="<?php echo $comp; ?>">
                 </div>


                 <div class="center">
                    <label for=""><text>Estado </text></label>
                    <input class="tamanho" type="text" name="novo_estado" value="<?php echo $estado; ?>">
                </div>


                <div class="right">
                    <label for=""><text>Cidade </text></label>
                        <input class="tamanho" type="text" name="novo_cidade" value="<?php echo $cidade; ?>">
                </div>   

            </div>
                <br>
                <button class="mais" type="submit">Salvar Alterações</button>

                <div class="alert-message" style="display: none;">
                    echo"Alterações salvas com sucesso!""
                </div>
               
            </form>

                 

            

        </div>

        
    </div>
</body>
</html>
<?php


if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}

// Estabeleça a conexão com o banco de dados (altere as configurações conforme necessário)
include("../conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recebe os dados do formulário
    $novo_nome = $_POST['novo_nome'];
    $novo_tel1 = $_POST['novo_tel1'];
    $novo_tel2 = $_POST['novo_tel2'];
    $novo_email = $_POST['novo_email']; 
    $nascimento = $_POST['novo_date'];
    $senha = $_POST['novo_password'];
    $confirmacao_senha = $_POST['confirmacao_senha'];
    $rua = $_POST['novo_rua'];
    $numero = $_POST['novo_numero'];
    $comp = $_POST['novo_comp'];
    $estado = $_POST['novo_estado'];
    $cidade = $_POST['novo_cidade'];
    $usuario_id = $_SESSION['usuario_id'];

    // Verifica se as senhas coincidem antes de continuar
    if ($senha === $confirmacao_senha) {
        // Atualiza os dados no banco de dados, incluindo a senha
        $sql = "UPDATE clientes SET 
                    nome = :novo_nome, 
                    telefone1 = :novo_tel1, 
                    telefone2 = :novo_tel2,
                    email = :novo_email, 
                    data_nascimento = :novo_date, 
                    senha = :nova_senha, 
                    complemento = :novo_comp,
                    numero = :novo_numero, 
                    estado = :novo_estado, 
                    cidade = :novo_cidade
                    WHERE id_cliente = :usuario_id";

        $stmt = $conn->prepare($sql);

        // Binde os valores dos campos do formulário, incluindo a nova senha
        $stmt->bindParam(':novo_nome', $novo_nome);
        $stmt->bindParam(':novo_tel1', $novo_tel1);
        $stmt->bindParam(':novo_tel2', $novo_tel2);
        $stmt->bindParam(':novo_email', $novo_email); 
        $stmt->bindParam(':novo_date', $nascimento);
        $stmt->bindParam(':nova_senha', $senha);
        $stmt->bindParam(':novo_comp', $comp); 
        $stmt->bindParam(':novo_numero', $numero); 
        $stmt->bindParam(':novo_estado', $estado); 
        $stmt->bindParam(':novo_cidade', $cidade); 
        $stmt->bindParam(':usuario_id', $usuario_id);

        if ($stmt->execute()) {
            // Redirecionamento para uma página de sucesso após a atualização
            header("Location: indexcliente.php");
            
            exit();
        } else {
            // Redirecionamento para uma página de erro em caso de falha na atualização
            header("Location: erro.php");
            exit();
        }
    } else {
        echo "As senhas não coincidem. Tente novamente.";
    }
}

// Consulta para obter os dados do cliente

$sql = "SELECT * FROM clientes WHERE id_cliente = :usuario_id"; // Usando parâmetros nomeados para evitar SQL injection
$stmt = $conn->prepare($sql);
$stmt->bindParam(':usuario_id', $_SESSION['usuario_id']);

$stmt->execute();

// Verifica se há resultados
if ($stmt->rowCount() > 0) {
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $nome = $row['nome'];
    $cpf = $row['cpf'];
    $nascimento = $row['data_nascimento'];
    $email = $row['email'];
    $tel1 = $row['telefone1'];
    $tel2 = $row['telefone2'];
    $rua = $row['rua'];
    $numero = $row['numero'];
    $comp = $row['complemento'];
    $estado = $row['estado'];
    $cidade = $row['cidade'];
    $senha = $row['senha'];
    $confirmacao_senha = $row['confirmacao_senha'];
} else {
    echo "Nenhum resultado encontrado";
}

// Fecha a conexão
$conn = null;
?>


