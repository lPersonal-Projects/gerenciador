<div class='container mt-5'>
    <h1>Minhas contas</h1>

<?php
    require_once 'DAO/sqls.php';
    require_once 'class/listar.php';

    $lista= new listar();

    $rPagar=selectRows('pagar');
    $rReceber=selectRows('receber');

    if($rPagar==1 or $rReceber==1){

        echo '<h3 class="ml-5 mt-3 font">A receber</h3>';
        if($rReceber==1){
            $lista->lista("receber a join cliente b on a.id_usuario ='1' and b.id_usuario ='1' AND a.status='1' AND b.id=a.id_cliente order by a.data_parcela", URL_RECEBER);
        }else{
            $lista->MsgErro();
        }

        echo '<h3 class="ml-5 mt-3 font">A pagar</h3>';
        if($rPagar==1){
            $lista->lista("pagar a join fornecedor b on a.id_usuario ='1' and b.id_usuario ='1' AND a.status='1' AND b.id=a.id_fornecedor order by a.data_parcela", URL_FORNECEDOR);
       
        }else{
            $lista->MsgErro();
        }
    }else{
        $lista->MsgErro();
    }
?>
</div>