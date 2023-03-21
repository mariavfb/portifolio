<?php

if (isset($_POST['submit'])) {

    include_once('config.php');
    $nm_pokemon = $_POST['nm_pokemon'];
    $ds_tipo1 = $_POST['ds_tipo1'];
    $ds_tipo2 = $_POST['ds_tipo2'];
    $img_url = $_POST['img_url'];

    $result = mysqli_query($conexao, "INSERT INTO tb_pokemon(nm_pokemon,ds_tipo1,ds_tipo2,img_url) 
        VALUES ('$nm_pokemon','$ds_tipo1','$ds_tipo2','$img_url')");

    header('Location: index.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="wcd_pokemonth=device-wcd_pokemonth, initial-scale=1.0">
    <title>ADICIONAR POKEDEX</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #580141;
        }

        .box {
            color: white;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(0, 0, 0, 0.6);
            padding: 15px;
            border-radius: 15px;
            width: 20%;
        }

        fieldset {
            border: 3px solid #580141;
        }

        legend {
            border: 1px solid #4b0137;
            padding: 10px;
            text-align: center;
            background-color: #4b0137;
            border-radius: 8px;
        }

        .inputBox {
            position: relative;
        }

        .inputUser {
            background: none;
            border: none;
            border-bottom: 1px solid white;
            outline: none;
            color: white;
            font-size: 15px;
            width: 100%;
            letter-spacing: 2px;
        }

        .labelInput {
            position: absolute;
            top: 0px;
            left: 0px;
            pointer-events: none;
            transition: .5s;
        }

        .inputUser:focus~.labelInput,
        .inputUser:valid~.labelInput {
            top: -20px;
            font-size: 12px;
            color: #580141;
        }

        #data_nascimento {
            border: none;
            padding: 8px;
            border-radius: 10px;
            outline: none;
            font-size: 15px;
        }

        #submit {
            background-color: #4b0137;
            width: 100%;
            border: none;
            padding: 15px;
            color: white;
            font-size: 15px;
            cursor: pointer;
            border-radius: 10px;
        }

        #submit:hover {
            background-color: #580141;
        }
    </style>
</head>

<body>
    <a href="index.php">
        <button style="background-color: #580141;color:white; margin-top:2%;border:none;">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-chevron-double-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8.354 1.646a.5.5 0 0 1 0 .708L2.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z" />
                <path fill-rule="evenodd" d="M12.354 1.646a.5.5 0 0 1 0 .708L6.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z" />
            </svg> 
        </button>
    </a>
    <div class="box">
        <form action="formulario.php" method="POST">
            <fieldset>
                <legend><b>Adicionar Pokemon</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="nm_pokemon" id="nm_pokemon" class="inputUser" required>
                    <label for="nm_pokemon" class="labelInput">Nome do Pokemon</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="ds_tipo1" id="ds_tipo1" class="inputUser" required>
                    <label for="ds_tipo1" class="labelInput">Tipo do Pokemon</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="ds_tipo2" id="ds_tipo2" class="inputUser" required>
                    <label for="ds_tipo2" class="labelInput">Tipo do Pokemon</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="img_url" id="img_url" class="inputUser" required>
                    <label for="img_url" class="labelInput">URL da Imagem</label>
                </div>
                <br><br>
                <input type="submit" name="submit" id="submit">
            </fieldset>
        </form>
    </div>
</body>

</html>