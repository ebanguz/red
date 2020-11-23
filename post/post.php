<?php

    require_once '../Helpers/auth.php';
    require_once '../service/post.php';
    require_once '../service/IServiceBase.php';
    require_once '../Filehandler/Ifilehandler.php';
    require_once '../Filehandler/Jsonfhandler.php';
    require_once '../database/context.php';
    require_once '../service/PserviceDB.php';
    require_once '../user/User.php';

    $service = New PserviceDB("../database");

    if (isset($_POST['titulo']) && isset($_POST['contenido'])) {

        date_default_timezone_set('America/Santo_Domingo');
        $time  = time();
        $fecha = date("Y-m-d H:i:s");

        $user = json_decode($_SESSION['user']);

        $p = new Post();
        $p->initializeData(0, $_POST['titulo'], $_POST['contenido'], $fecha, $user->username);
        $service->add($p);

        header("Location: ../index.php");
        exit();

    }

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">


    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/blog/">
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

    <link href="../assets/css/index.css" rel="stylesheet">

</head>

<body>

    <div class="container">
        <header class="blog-header py-3">
            <div class="row flex-nowrap justify-content-between align-items-center">
                <div class="col-4 text-center">
                    <a class="blog-header-logo text-dark" href="../index.php">L </a>
                </div>
                <li><?php
                        $user = json_decode($_SESSION['user']);
                    echo $user->username
                    ?></li>
            </div>
        </header>

        <div class="nav-scroller py-1 mb-2">
        </div>



        <form action="post.php" method="POST">
            <div class="form-row">
                <div class="form-group col-md-6">

                    <label for="titulo">Titulo</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Titulo">

                    <div class="py-2">
                    </div>

                    <label for="contenido">Contenido</label>
                    <input type="text" class="form-control" id="contenido" name="contenido" placeholder="Contenido">

                    <div class="py-2">
                    </div>

                </div>
            </div>

            <button type="submit" class="btn btn-primary" id="sendForm">Agregar</button>

            <div class="nav-scroller py-1 mb-2">
            </div>

        </form>

</body>

</html>