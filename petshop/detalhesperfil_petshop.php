<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/detalhesperfil_petshop.css">

    <title>ControlPet - cliente</title>
</head>
<body>
    <div class="fundo">
        <div class="perfil">
            
            <div class="ajustarfotonaesquerda">
                <img src="../imagens/perfilpetshop.jpg" alt="foto de perfil" class="fotodeperfil">
                    
                <form action="logout.php" method="get">
                        <div class="ajustebotoes">
                    <a href="logout.php">
                    <button class="sair" type="submit">Sair</button></a>
                        </div>
                </form>
            </div>

            

            <div class="formulario">
                    <h1>Suas informações</h1>
                <hr>
                <label class="inputnome" for=""><text>Nome </text></label><br>
                <input class="inputnome" type="text" autofocus><br><br>

                <label class="inputnome" for=""><text>Cnpj </text></label><br>
                <input class="inputnome" type="text"><br><br>

                <label class="inputnome" for=""><text>Email </text></label><br>
                <input class="inputnome" type="email"><br><br>
                
                <label class="input" for=""><text>Tel 1 </text></label>
                <input class="telefone1" type="text">

                <label for=""><text>Tel 2 </text></label>
                <input class="telefone2" type="text"><br><br>

                <label class="inputnome" for=""><text>Senha </text></label><br>
                <input class="inputnome" type="password"><br><br><br>

                <label class="inputnome" for=""><text>Confirmação de senha </text></label><br>
                <input class="inputnome" type="password"><br>
                

                    <h1>Endereço</h1>
                <hr>
                <label class="input" for=""><text>Rua </text></label>
                <input class="input" type="text">

                <label for=""><text class="text1">Numero </text></label>
                <input class="inputcenter"type="text"><br><br>


                <div class="alinhar">

                    <div class="left">
                        <label for=""><text>Comp </text></label>
                        <input class="tamanho" type="text">
                    </div>

                    <div class="center">
                        <label for=""><text>Estado </text></label>
                        <input class="tamanho" type="text">
                    </div>

                    <div class="right">
                        <label for=""><text>Cidade </text></label>
                        <input class="tamanho" type="text"><br>
                    </div>   

                </div>
                
                <button class="mais" type="submit">Salvar</button>
                <a href="indexpetshop.php">
                <button class="mais" type="submit">Voltar</button></a><br><br>
            </div>

            

        </div>

        
    </div>
</body>
</html>