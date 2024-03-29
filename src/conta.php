<?php
    class conta{
       function selectPagamento(){
           global $conexao;
            $sql="SELECT * FROM pagamento";
            $retorno=mysqli_query($conexao, $sql);

            while($aux=mysqli_fetch_array($retorno)){
               echo '<option value="'.$aux["id"].'">'.$aux['tipo'].'</option>';
            }
       }

       function selectPessoas($table){
        global $id;
         $retorno=select('*', $table.' WHERE id_usuario='.$id.' and status="1" ORDER BY nome');

         while($aux=mysqli_fetch_array($retorno)){
            echo '<option value="'.$aux["id"].'">'.$aux['nome'].'</option>';
         }
    }

    //Pagina de editar conta
         function selectPagamentoEdit($valor){
            global $conexao;
            $sql="SELECT * FROM pagamento";
            $retorno=mysqli_query($conexao, $sql);

            while($aux=mysqli_fetch_array($retorno)){
               $selected=($valor==$aux["id"])?'selected':'';
               echo '<option value="'.$aux["id"].'"'.$selected.'>'.$aux['tipo'].'</option>';
            }
      }

         function selectPessoasEdit($table, $valor){
            global $id;
            $retorno=select('*', $table.' WHERE id_usuario='.$id.' and status="1" ORDER BY nome');

            while($aux=mysqli_fetch_array($retorno)){
               $selected=($valor==$aux["id"])?'selected':'';
               echo '<option value="'.$aux["id"].'"'.$selected.'>'.$aux['nome'].'</option>';
            }
         }

         //$CF é o id do cliente ou do fornecedor
       function adicionar($CF, $table ,$url, $nome, $idCF, $idForma, $periodo, $quant, $dataVenci, $valor){
         $form= new Form();
         global $id;
         $DatHoje=date('Y-m-d H:m:s');
         $add = array();
         $add[0] = $form->Nome($nome);
         $add[1] = $form->Parcelas($quant);
         $add[2] = $form->Data($dataVenci);
         $add[3] = $form->Valor($valor);
         
         $retorno = $form->erro($add);
         
         if($retorno == 1) {
            $data=explode("/", $dataVenci);
            $dat=$data[2]."-".$data[1]."-".$data[0];
            $valor     = str_replace(".","",$valor);
            $valor     = str_replace(",",".",$valor);
               insert($table, 'id_usuario, id_pagamento,'.$CF.', nome_conta, periodo_conta, data_parcela, data_parcela_inicial, valor, quant_parcelas, status, data_cadastro', 
                              "'".$id."','".$idForma."','".$idCF."','".$nome."','".$periodo."','".$dat."','".$dat."','".$valor."','".$quant."','1','".$DatHoje."'");
               header ('Location:'.URL_HOME.'receber');
         }else{
            header ('Location:'.$url.'adicionar');
         }
      
       }

       function editar($CF, $table, $url, $nome, $idCF, $idForma, $periodo, $quant, $valor, $ide){
          
         $form= new Form();
         $add = array();
         $add[0] = $form->Nome($nome);
         $add[1] = $form->Parcelas($quant);
         $add[2] = $form->Valor($valor);
         
         $retorno = $form->erro($add);
         
         if($retorno == 1) {
            $valor     = str_replace(".","",$valor);
            $valor     = str_replace(",",".",$valor);
               update($table, "id_pagamento='".$idForma."', ".$CF."='".$idCF."', nome_conta='".$nome."', periodo_conta='".$periodo."', valor='".$valor."', quant_parcelas='".$quant."'", "id='".$ide."'");
               header ('Location:'.URL_HOME.'receber');
         }else{
            header ('Location:'.$url.'editar/'.$ide);
         }
      
       }

       function valorRecebido(){
          global $id;
         $valor=explode('/', $_GET['url']);
         if(isset($_POST['hidden'.$valor[2]]) AND $valor[2]<>'' AND is_numeric($valor[2])){

             
                 $retorno=select('*', $valor[0].' WHERE id="'.$valor[2].'"');

                 while($aux=mysqli_fetch_array($retorno)){
                     $valorInicial=$aux['valor_recebido'];
                     $parcela=$aux['valor'];
                 }

                 $soma     = str_replace(".","",$_POST['valor']);
                 $soma=str_replace(",",".",$soma)+$valorInicial;
                 if($soma<$parcela){
                  update($valor[0], 'valor_recebido="'.$soma.'"', 'id="'.$valor[2].'"');
                 }else{
                  $_SESSION['MSG']=ERRO;
                 }
             }else{
                 $_SESSION['MSG']=ERRO;
             }
          header('Location:'.URL_HOME.'receber');
       }
    }