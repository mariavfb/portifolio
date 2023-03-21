<?php
include_once('config.php');
if (!empty($_GET['search'])) {
    $data = $_GET['search'];
    $sql = "SELECT * FROM tb_pokemon WHERE cd_pokemon LIKE '%$data%' or nm_pokemon LIKE '%$data%' ORDER BY cd_pokemon DESC";
} else {
    $sql = "SELECT * FROM tb_pokemon ORDER BY cd_pokemon ASC";
}
$result = $conexao->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="wcd_pokemonth=device-wcd_pokemonth, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <link rel="icon" type="image/png" href="icon.png"/>
    <title>POKEDEX</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light navColor">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <h1 style="color:#ea39b8;">Pokedex</h1>
            </a>
            <div class="box-search">
                <input type="search" class="form-control w-100" placeholder="Pesquisar" id="pesquisar">
                <button onclick="searchData()" class="btn btn-secondary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                    </svg>
                </button>
            </div>
            <a href="formulario.php"><button type="button" class="btn btn-secondary">Adicionar</button></a>
        </div>
    </nav>
    <br>
    <br>

    <div class="m-5">
        <?php
        while ($user_data = mysqli_fetch_assoc($result)){
            echo "<div style='width:100%; margin:auto;'>
            <div class='card border-secondary' style='width: 32%; min-height:70%;float: left; margin-right: 1%; margin-bottom: 2%; background: rgb(94,94,205); background: linear-gradient(0deg, rgba(94,94,205,1) 0%, rgba(194,111,186,1) 100%);'>
                        <img src='" . $user_data['img_url'] . "' class='card-img-top' alt='...'>
                        <div class='card-body'>
                          <h5 class='card-title'>" . $user_data['cd_pokemon'] . "" . ' - ' . "" . $user_data['nm_pokemon'] . "</h5><br>
                          <h6>Tipo do Pokémon</h6>
                          <p class='card-text' style='width:40%; margin:auto;'>" .  $user_data['ds_tipo1'] . "" . ' | ' . "" . $user_data['ds_tipo2'] .  "</p><br>
                          <a class='btn btn-sm' style='background-color:#bd3498; color:white;' href='editar.php?cd_pokemon=$user_data[cd_pokemon]' title='Editar'>
                            <svg xmlns='http://www.w3.org/2000/svg' wcd_pokemonth='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                                <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                            </svg>
                            </a> 
                            <a class='btn btn-sm' style='background-color:#4e003e; color:white;' href='deletar.php?cd_pokemon=$user_data[cd_pokemon]' title='Deletar'>
                                <svg xmlns='http://www.w3.org/2000/svg' wcd_pokemonth='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                                    <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
                                </svg>
                            </a>
                        </div>
                      </div>
                    </div>";
        }
        ?>
    </div>
</body>
<script>
    var search = document.getElementById('pesquisar');

    search.addEventListener("keydown", function(event) {
        if (event.key === "Enter") {
            searchData();
        }
    });

    function searchData() {
        window.location = 'index.php?search=' + search.value;
    }
</script>

</html>