<?php

/* REDIRECIONADOR DE GERADORES DE PROMOÇÕES
 * 
 * As variáveis principais do formulario declarados,
 * redirecionando para os geradores.
 * 
 */

include 'includes/sistema.class.php';

/*variáveis de conteudo*/

/*DECLARAÇÃO DAS VARIÁVEIS DO CONTEÚDO RANDÔMICO*/
//var_dump($promocao->passagensGOL());

$geradorAutomatico = $_POST['gerador'];
$qtde = $_POST['qtdePostAutomatico'];

if($geradorAutomatico == 'nao'){

    $saudacao = $_POST['saudacao'];
    $palavra_chave = $_POST['palavra_chave']; 
    $passagens = $_POST['passagens'];
    $link = $_POST['link'];
    $geradorAutomatico = $_POST['gerador'];
    $qualPromocao = $_POST['qual_promocao'];

    $promocao = new sistemaDePromocoes($palavra_chave, $saudacao, $passagens, $link, $geradorAutomatico, $qualPromocao);
    $promocao->modeloPromocao();
    //echo $promocao->retornaQualPromocao();

}else{

    //echo '<?php';
    //echo 'require_once "wp-load.php"';

    for ($i=0; $i < $qtde; $i++) { 

        $saudacao = $_POST['saudacao'];
        $palavra_chave = $_POST['palavra_chave']; 
        $passagens = $_POST['passagens'];
        $link = $_POST['link'];
        $geradorAutomatico = $_POST['gerador'];
        $qualPromocao = $_POST['qual_promocao'];

        $promocao = new sistemaDePromocoes($palavra_chave, $saudacao, $passagens, $link, $geradorAutomatico, $qualPromocao);
        $promocao->modeloAPIRest('lucasgomes','410134628agn31147@');

    }
}


?>

