<!DOCTYPE html>
    <html lang="pt-br">
        <head>
            <title>Finnac</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="keywords" content="finnac, contas, gerenciamento, dinheiro, organização, pagar, receber">
            <meta name="description" content="Finnac tem por misão oferecer para seus usuario uma forma de orgazar sua contas">

            <link rel="shortcut icon" type="image/x-icon" href="<?=URL_BASE?>img/icons/ico.ico">

            <link href="https://fonts.googleapis.com/css?family=Maven+Pro:400,900" rel="stylesheet">
            <link rel="stylesheet" href="<?=URL_BASE?>lib/bootstrap/css/bootstrap.css" type="text/css">
            <link href="<?=URL_BASE?>lib/fw/css/all.css" rel="stylesheet">
            <link type="text/css" rel="stylesheet" href="<?=URL_BASE?>css/style.css" />   
            <link type="text/css" rel="stylesheet" href="<?=URL_BASE?>css/erro.css" />
            <link type="text/css" rel="stylesheet" href="<?=URL_BASE?>css/responsivo.css" />
        </head>    
        <body>
            <header class='container-fluid bg-dark'>
                <nav class='navbar navbar-expand-lg p-3'>

                    <a class='navbar-brand text-white' href="<?=URL_HOME;?>receber"><i class="fab fa-connectdevelop fa-2x">Finnac</i></a>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                        <i class=" text-white fas fa-bars fa-2x"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarText">
                        <ul class="navbar-nav mr-auto menu ml-5 text-white mt-2">
                            <li class="nav-item ">
                                <a class='nav-link text-white mr-3 border-bottom' href="<?=URL_HOME;?>receber"><i class="fas fa-home"></i> Home</a>
                            </li>

                            <li class="nav-item ">
                                <a class='nav-link text-white mr-3 border-bottom' href="<?=URL_RECEBER?>adicionar"><i class="fas fa-donate"></i> Nova conta</a>
                            </li>

                            <li class="nav-item ">
                                <a class='nav-link text-white mr-3 border-bottom' href="<?=URL_CLIENTE?>listar"><i class="fas fa-at"></i> Adicionar</a>
                            </li>

                            <li class="nav-item">
                            <a class='nav-link text-white border-bottom mr-3' href="<?=URL_HISTORICO?>receber"><i class="fas fa-history"></i> Histórico</a>
                            </li>
                        </ul>

                        <ul class='nav text-white mt-2 menu mr-5'><!--Configurações da conta-->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown"><i class="fas fa-<?=$avatar?> fa-2x"></i></a>
                                <div class="dropdown-menu">
                                    <a class='nav-link text-white border-bottom ml-2' href="<?=URL_USUARIO?>editar">Editar perfil</a>
                                    <a class='nav-link text-white ml-2' href="<?=URL_USUARIO?>logout">Logout</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>