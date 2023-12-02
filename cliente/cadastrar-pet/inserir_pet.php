<?php
include("conexao.php");
session_start();

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (
            isset($_POST['pet_nome'], $_POST['tipo_pet'], $_POST['raca'], $_POST['genero'], $_POST['comportamento'], $_POST['obs'], $_POST['id_cliente'])
        ) {
            $pet_nome = $_POST['pet_nome'];
            $tipo_pet = $_POST['tipo_pet'];
            $raca = $_POST['raca'];
            $genero = $_POST['genero'];
            $comportamento = $_POST['comportamento'];
            $obs = $_POST['obs'];
            $id_cliente = $_POST['id_cliente'];
            
            $foto_pet = $_FILES['photo'];


            if (!empty($_FILES["photo"]["name"])) {
                $foto_nome = $_FILES["photo"]["name"];
                $foto_temp = $_FILES["photo"]["tmp_name"];
                $foto_destino = "Imagens/imagens_pet/" . $foto_nome;
      
                // Move a imagem para a pasta fotos_upload
                if (move_uploaded_file($foto_temp, $foto_destino)) {
                    // Prepara a inserção no banco de dados apenas com o caminho da foto
                    // ...

                    // Verificar se o id_cliente existe na tabela clientes
                    $sql = "SELECT id_cliente FROM clientes WHERE id_cliente = '" . $id_cliente . "'";
                    $result = $conn->query($sql);

                    if ($result->rowCount() > 0) {
                        $stmt = $conn->prepare("INSERT INTO pets (id_cliente, nome, tipo_pet, raca, genero, comportamento, obs, foto_pet) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
                        $stmt->execute([$id_cliente, $pet_nome, $tipo_pet, $raca, $genero, $comportamento, $obs, $foto_destino]);

                        $pet_id = $conn->lastInsertId();
                        echo "Dados do pet inseridos com sucesso. ID: " . $pet_id . "<br>";
                    } else {
                        echo "ID de cliente inválido. Certifique-se de que o cliente exista na tabela clientes.";
                    }
                } else {
                    echo "Erro ao mover o arquivo para o destino.";
                }
            } else {
                echo "O arquivo não foi enviado.";
            }
        } else {
            echo "Variáveis do formulário não estão definidas corretamente.";
        }
    }

    // Fechar a conexão com o banco de dados
    $conn = null;
} catch(PDOException $e) {
    die("Erro na conexão com o banco de dados: " . $e->getMessage());
}
?>
