<?php
    include_once('config.php');
    if(isset($_POST['update']))
    {
        $cd_pokemon = $_POST['cd_pokemon'];
        $nm_pokemon = $_POST['nm_pokemon'];
        $ds_tipo1 = $_POST['ds_tipo1'];
        $ds_tipo2 = $_POST['ds_tipo2'];
        $img_url = $_POST['img_url'];
        
        $sqlInsert = "UPDATE tb_pokemon 
        SET nm_pokemon='$nm_pokemon',ds_tipo1='$ds_tipo1',ds_tipo2='$ds_tipo2',img_url='$img_url'
        WHERE cd_pokemon=$cd_pokemon";
        $result = $conexao->query($sqlInsert);
        print_r($result);
    }
    header('Location: index.php');

?>