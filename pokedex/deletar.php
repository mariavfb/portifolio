<?php

    if(!empty($_GET['cd_pokemon']))
    {
        include_once('config.php');

        $cd_pokemon = $_GET['cd_pokemon'];

        $sqlSelect = "SELECT *  FROM tb_pokemon WHERE cd_pokemon=$cd_pokemon";

        $result = $conexao->query($sqlSelect);

        if($result->num_rows > 0)
        {
            $sqlDelete = "DELETE FROM tb_pokemon WHERE cd_pokemon=$cd_pokemon";
            $resultDelete = $conexao->query($sqlDelete);
        }
    }
    header('Location: index.php');
   
?>