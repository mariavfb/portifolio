<!DOCTYPE html>
<html lang="pr-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <title>Movie API</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="img/logo.png" alt="Bootstrap" width="80" height="75">
            </a>
            <div class="collapse navbar-collapse" id="navbarColor02">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php"><h4>Mais populares</h4>
                            <span class="visually-hidden">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="atores.php"><h4>Atores</h4></a>
                    </li>
                </ul>
                <form class="d-flex" action="index.php" method="post">
                    <input class="form-control me-sm-2" type="get" id="pesquisa" name="pesquisa">
                    <button class="btn btn-secondary my-2 my-sm-0" type="submit">Pesquisar</button>
                </form>
            </div>
        </div>
    </nav>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Bree+Serif&family=EB+Garamond:ital,wght@0,500;1,800&display=swap');

    #container {
        box-shadow: 0 15px 30px 1px grey;
        background: rgba(255, 255, 255, 0.90);
        text-align: center;
        border-radius: 5px;
        overflow: hidden;
        margin: 5em auto;
        height: 90%;
        width: 50%;
    }

    .product-details {
        position: relative;
        text-align: left;
        overflow: hidden;
        padding: 30px;
        height: 100%;
        float: left;
        width: 50%;
    }

    #container .product-details h1 {
        font-family: 'Bebas Neue', cursive;
        display: inline-block;
        position: relative;
        font-size: 30px;
        color: #344055;
        margin-top: 5%;
    }

    #container .product-details h1:before {
        position: absolute;
        right: 0%;
        top: 0%;
        transform: translate(25px, -15px);
        font-family: 'Bree Serif', serif;
        display: inline-block;
        background: #ffe6e6;
        border-radius: 5px;
        font-size: 14px;
        padding: 5px;
        color: white;
        margin: 0;
        animation: chan-sh 6s ease infinite;
    }

    #container .product-details>p {
        font-family: 'EB Garamond', serif;
        text-align: justify;
        font-size: 18px;
        color: #7d7d7d;
    }

    .product-image {
        transition: all 0.3s ease-out;
        /* display: inline-block; */
        position: relative;
        overflow: hidden;
        height: 100%;
        float: right;
        width: 50%;
        /* display: inline-block; */
    }

    #container img {
        width: 100%;
        min-height: 100%;
    }

    .info {
        background: rgba(27, 26, 26, 0.9);
        font-family: 'Bebas Neue', cursive;
        transition: all 0.3s ease-out;
        transform: translateX(-100%);
        position: absolute;
        line-height: 1.8;
        text-align: left;
        font-size: 105%;
        cursor: no-drop;
        color: #FFF;
        height: 100%;
        width: 100%;
        left: 0;
        top: 0;
    }

    .info h2 {
        text-align: center;
        margin-top: 10%;
    }

    .info ul ol {
        font-family: sistem-ui;
    }

    .product-image:hover .info {
        transform: translateX(0);
    }

    .info ul ol {
        transition: 0.3s ease;
    }

    .info ul ol:hover {
        transform: translateX(50px) scale(1.3);
    }

    .product-image:hover img {
        transition: all 0.3s ease-out;
    }

    .product-image:hover img {
        transform: scale(1.2, 1.2);
    }
    </style>
    <?php
    if (isset($_POST['pesquisa'])) {
        $APIKEY = "c7ab045a7a61bb551d1eea508a6d67c2";
        $search = $_POST['pesquisa'];
        $url = "https://api.themoviedb.org/3/search/movie?query={$search}&api_key={$APIKEY}&language=pt-BR&page=1&include_adult=false";
        $json = file_get_contents($url);
        $obj = json_decode($json);


        $total_pages = $obj->total_pages;
        for ($x = 1; $x <= $total_pages; $x++) {
            $url_single = "https://api.themoviedb.org/3/search/movie?query={$search}&api_key={$APIKEY}&language=pt-BR&page=1&include_adult=false";
            $json_single = file_get_contents($url_single);
            $obj_single = json_decode($json_single);

            foreach ($obj_single->results as $resultado) {
                echo 
                "<div id='container'>
                    <div class='product-details'>
                        <h1>$resultado->title</h1>
                        <p class='information'>$resultado->overview</p>
                     </div>
                     <div class='product-image'>
                        <img src='https://image.tmdb.org/t/p/original/$resultado->poster_path' alt=''>
                        <div class='info'>
                            <h2>Ficha técnica</h2>
                            <ul>
                                <ol><strong>Nome original: </strong>$resultado->original_title</ol>
                                <ol><strong>Língua original: </strong>$resultado->original_language</ol>
                                <ol><strong>Ano de lançamento: </strong>$resultado->release_date</ol>
                                <ol><strong>Nota: </strong>$resultado->vote_average</ol>
                                <ol><strong>Id: </strong>$resultado->id</ol>
                            </ul>
                        </div>
                    </div>
                </div>";
            }
        }
    } else {
        $APIKEY = "c7ab045a7a61bb551d1eea508a6d67c2";

        $url = "https://api.themoviedb.org/3/movie/top_rated?api_key={$APIKEY}&language=pt-BR&page=1";
        $json = file_get_contents($url);
        $obj = json_decode($json);

        $total_pages = $obj->total_pages;
        
        for ($x = 1; $x <= 1; $x++) {
            $url_single = "https://api.themoviedb.org/3/movie/top_rated?api_key={$APIKEY}&language=pt-BR&page={$x}";
            $json_single = file_get_contents($url_single);
            $obj_single = json_decode($json_single);
            
            foreach ($obj_single->results as $resultado) {
                echo 
                "<div id='container'>
                    <div class='product-details'>
                        <h1>$resultado->title</h1>
                        <p class='information'>$resultado->overview</p>
                     </div>
                     <div class='product-image'>
                        <img src='https://image.tmdb.org/t/p/original/$resultado->poster_path' alt=''>
                        <div class='info'>
                            <h2>Ficha técnica</h2>
                            <ul>
                                <ol><strong>Nome original: </strong>$resultado->original_title</ol>
                                <ol><strong>Língua original: </strong>$resultado->original_language</ol>
                                <ol><strong>Ano de lançamento: </strong>$resultado->release_date</ol>
                                <ol><strong>Nota: </strong>$resultado->vote_average</ol>
                                <ol><strong>Id: </strong>$resultado->id</ol>
                            </ul>
                        </div>
                    </div>
                </div>";
                }
            }
        }
    ?>

</body>

</html>