<?php 

//variáveis
$dados = $passagens;
$novos_dados = array();
$divisao = explode("\n", $dados);
$sair = false;
$passagens_aereas = array();
$passagem_aerea = '';
$cont = 1;

//enxugando a lista
foreach($divisao as $dado){
    if(enxugaDados(trim($dado)) != NULL){
        $funcao = enxugaDados(trim($dado));
        array_push($novos_dados, $funcao);
    }
}

//contextualizando os dados
for($i = 0; $i < count($novos_dados); $i++){
        if($cont == 4){
            $passagem_aerea .= $novos_dados[$i];
            array_push($passagens_aereas, $passagem_aerea);
            //echo $passagem_aerea.'<br />';
            $cont = 1;
            $passagem_aerea = '';
        }else{
            $passagem_aerea .= $novos_dados[$i].' , ';
            //echo $passagem_aerea.'Contador:'. $cont.'<br />';
            $cont++;
        }
}

//função de enxugamento
function enxugaDados($dado){
    $pontos = array();
    $palavras_descartadas = array('a partir de','pontos TudoAzul','Comprar');
    for($i = 1; $i <= 100; $i++){   
        $ponto = 'ou '.$i.'.000';
        array_push($pontos, $ponto);    
    }
    if(!in_array($dado, $palavras_descartadas) && 
       !in_array($dado, $pontos)){
        return $dado;
    } 
}

/*
echo "<pre>";
print_r($passagens_aereas);
echo "</pre>";
*/
shuffle($passagens_aereas);

// -------------------------- Conteúdo das passagens aéreas ---------------------- //

echo"<ul>";
echo"<li> <strong>Palavra-Chave: </strong>".$palavra_chave."</li>";
echo"<li> <strong>Titulo: </strong>".ucwords($palavra_chave)."</li>";
echo"<li> <strong>URL: </strong>".str_replace(' ','-',$palavra_chave)."</li>";
echo"</ul>";
echo "<p>".$saudacao."</p>";
echo"<p><strong>Data da Publicação: </strong>".$data."</p>";
echo"<p>".$o_que_encontra."</p>";
echo"<p>".$so_divulgamos."</p>";
echo"<p>".$disponibilidade."</p>";
echo"Segue abaixo as promoção para curtir ".$palavra_chave.":";
echo"<ul>";
foreach($passagens_aereas as $valores) {
    $valor = explode(',',$valores);
        echo"<li><strong>TudoAzul - Portal Azul:</strong> <strong>Passagens Promocionais: </strong>".trim($valor[0])." ".trim($valor[1])." ".trim($valor[2])." - ".trim($valor[3])."</li>";
}
echo"</ul>";
echo"<p>Estas promoções e ofertas podem ser adquiridas <a href='".$link."' title='' rel='nofollow'>aqui.</a></p>";
echo"<p>".$sobre_buscador."</p>";
echo"<p>".$o_que_encontra_buscador."</p>";
echo"<p>".$ultima_chamada_buscador."</p>";
echo"<h2>Regras da promoção - ".$palavra_chave."</h2>";
echo"<ul>";
echo"<li>Nestas promoções estão algumas taxas e encargos imbutidos na promoção.</li>";
echo"<li>Nosso blog não realiza estas promoções, apenas divulgamos.</li>";
echo"<li>Estas ofertas divulgamos no momento que os preços estão disponíveis. Se caso vocÊ consulta e o preço não se encontra, não assumimos esta responsabilidade.</li>";
echo"</ul>";
echo"<p>".$email."</p>";
echo"<p>".$facebook."</p>";
echo"<p>".$pushcrew."</p>";



// -------------------------- Fim do conteúdo das passagens aéreas ---------------------- //

?>