<?php
    session_start();
    require_once 'DAO\conexao.php';
    require_once 'config\config.php';

    if(!isset($_SESSION['ID_USUARIO'])){//definição do cabeçalho da página
      include_once 'pages/header_footer/headerOFF.php';

      $files = array('login', 'cadastro', 'home');//arquivos que o site possui
      $dir_  = array('home', 'usuario'); //Diretórios que o site possui

      }else{
        include_once 'pages/header_footer/headerON.php';
        $files = array('adicionar', 'periodo', 'home', 'listar', 'logout', 'editar');//arquivos que o site possui
        $dir_  = array('clientes', 'pagar', 'receber', 'fornecedor', 'gerar-relatorios', 'home', 'usuario');//Diretórios que o site possui
        
        $id    = $_SESSION['ID_USUARIO'];
  
      }
      if ($_GET){//recuperção da url
        $url = explode('/', $_GET['url']);
           $dir  = $url[0];
           $file = $url[1];

           if(in_array($dir, $dir_) AND isset($file) AND in_array($file, $files)){

                if(isset($_SESSION['MSG'])){//este bloco de código serve para mostrar messagem de alguams paginas
                  echo '<div class="float-md-left">'.$_SESSION['MSG'].'</div>';
                  unset($_SESSION['MSG']);}

              require_once PATH_PAGES.$dir."/". $file .'.php';//Inclução da página
           }else{
            include_once PATH_PAGES.'home/erro.php';
           }
      }else{
        include_once PATH_PAGES.'home/home.php';///pagina inicial
      }
      include_once 'pages/header_footer/footer.php';      