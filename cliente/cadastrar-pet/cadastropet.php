<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../estilos/cadastropet.css">
  <title>Cadastro - ControlPet</title>
  <link rel="shortcut icon" href="/Imagens/Icones/favicon-32x32.png" type="image/x-icon">
</head>
<body>
  
  <div class="content">
    <div class="box-cadastro">
      <div class="cadastro">
        <div class="conteudo">
          <div class="form">
            <div class="infos-pet">
              <h2>Informações sobre seu pet</h2>
              <hr>
              
              <form method="POST" action="inserir_pet.php" enctype="multipart/form-data">
              <input type="hidden" id="id_cliente" name="id_cliente" value="<?php echo $_SESSION['usuario_id']; ?>">

              <div class="nome">
                <label for="nome">Nome</label>
                <input type="text" id="nome" name="pet_nome" placeholder="Nome do seu bichinho" required>
                <div>
                
                  <label for="file-upload" class="upload-label">Selecionar Foto</label>
                  <input id="file-upload" class="upload-input" type="file" name="photo" accept="image/*">
               
              </div>
              </div>
              <div class="tipo-raca"> <!-- Mesma linha -->
              <div class="tipo-pet">
                <label for="tipo_pet">Tipo de pet</label>
                <input type="text" id="tipo_pet" name="tipo_pet" maxlength="15" placeholder="Cachorro" required>
              </div>
              <div class="raca">
                <label for="raca">Raça</label>
                <input type="text" id="raca" name="raca" maxlength="15" placeholder="pitbull" required><br><br>
              </div>
              </div>
              <div class="lala">
              <div class="genero">
                <label for="genero">Gênero</label>
                <div>
                  <input type="radio" id="macho" name="genero" value="m">
                  <label for="macho">Macho</label>
                </div>
                <div>
                  <input type="radio" id="femea" name="genero" value="f">
                  <label for="femea">Fêmea</label>
                </div>
              </div>
              
            </div>
              
              <div class="comportamento">
                <label for="comportamento">Comportamento</label>
                <input type="text" name="comportamento" id="comportamento" placeholder="Amigável, tímido, agressivo, etc.">
              </div>
              <div class="obs">
                <label for="obs">Observações gerais</label>
                <textarea name="obs" id="obs" cols="30" rows="3" placeholder="Medicamentos, comandos, etc." wrap=""></textarea>
              </div>
            </div>
            <?php
// Certifique-se de que o cliente esteja logado e o ID seja armazenado em uma variável de sessão.

session_start();
if (isset($_SESSION['usuario_id'])) { // Verifique se o nome da variável de sessão é 'usuario_id'
    $id_cliente = $_SESSION['usuario_id']; // Use o nome correto da variável de sessão aqui
    echo '<input type="hidden" name="id_cliente" value="' . $id_cliente . '">';
}
?>

          </div>
            <div class="link">
            
              <button class="btn" type="submit">Finalizar cadastro</button>
          
              
        </div>
          
        </div>
        </form>
      </div>
      <div class="foto">
      <img src="../cadastrar-cliente/Imagens/backgrounds/img-cadastro2.png" alt="" width="100%" height="100%">
      </div>
    </div>
  </div>
  <?php
  
  ?>

</body>
</html>