<?php
    $hoje=date('d/m/Y', strtotime("+1 month"));
    
    $conta=new conta();//Instanciando novo OBJ
    
        if(isset($_POST['hidden'])){
            
            foreach ($_POST as $campos => $value) {//Criando as variavies
                $$campos=Input($value);//escape sql e js
            }
            $conta->adicionar('id_fornecedor','pagar', URL_PAGAR, $nome, $idFornecedor, $idForma, $periodo, $parcela, $data, $valor);     
        }

         $retono=selectRows('*', 'fornecedor WHERE id_usuario='.$id.' AND status="1"');
        
        if($retono==1){
            require_once 'pages/pagar/form.php';

        }else{
           MsgErro('Adicione fornecedores', '4');
           echo '<div class="text-center"><a class="redondo" href="'.URL_FORNECEDOR.'adicionar">Add fornecedores</a></div>';
        }
 echo "</div>"
?>
