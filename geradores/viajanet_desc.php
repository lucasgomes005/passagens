<?php

/* GERADOR - VIAJANET COM DESCONTOS
 * 
 * Postagem gerada para passagens aéreas pelo Viajanet com descontos.
 * 
 */

/*Declação de variáveis e definição de valores*/
$vetor_passagens = explode("\n", $passagens); //separar os dados pela quebra de linhas
$contexto = array(); //variável gravar o contexto da passagens
$count = 0; //passo a passo para montar a promoção (1 - origem e destino, 2 - preço, 3 - desconto)
$count_vetor = 0; //contador de promoção 
$capitais_origem = array(); //receber todas as origens, sem repetição
$capitais_destino = array(); //receber todos os destinos, sem repetição
$origens = ""; //definir variavel para todas as origens já montadas
$destinos = ""; // definir variavel para todos os destinos já montados

/*mecanismo para montar o modelo das passagens aéreas*/
for ($i = 0; $i < count($vetor_passagens); $i++) {

    if ($count == 0) { //PASSO 0 - Passagens Aéreas a partir de
        $contexto[$count_vetor] = trim($vetor_passagens[$i]) . ",";//constroe o valor da promoção
        $count = 1;//próximo passo
    } elseif ($count == 1) {//PASSO 1 - Origem e Destino ✈
        //$dado = explode('&#9992;', $vetor_passagens[$i]);
        $dado = explode('✈', $vetor_passagens[$i]); //dividir os valores de origem e destino
        $contexto[$count_vetor] .= "<strong>Origem:</strong> ".$dado[0]." - <strong>Destino:</strong> ".trim($dado[1]).","; // construir o modelo promoção
        if(in_array(trim($dado[0]),$capitais_origem) == false){ // vetor recebe as origens. caso esteja repetido, a fila não recebe
            array_push($capitais_origem, trim($dado[0]));
        }
        if(in_array(trim($dado[1]),$capitais_destino) == false){ // vetor recebe os destinos. caso esteja repetido, a fila não recebe
            array_push($capitais_destino, trim($dado[1]));
        }
        $count = 2;//próximo passo
    } elseif ($count == 2) { //PASSO 2 - Valor da passagem
        $dado = explode('R$ ', $vetor_passagens[$i]);
        $contexto[$count_vetor] .= trim($dado[1]) . ",";
        $count = 3;//próximo passo 
    } elseif ($count == 3) { // PASSO 3 - Desconto
        $contexto[$count_vetor] .= trim($vetor_passagens[$i]);
        $count = 0; //volta ao passo 1
        $count_vetor++; // próximoa promoção
    }    
    
}

/*ordenção das capitais e das promoções de passagens aereas*/
sort($capitais_origem); 
sort($capitais_destino);
shuffle($contexto);

/*pega os valores finais de $final_origem e $final_destino*/
end($capitais_origem);
$final_origem = current($capitais_origem);
end($capitais_destino);
$final_destino = current($capitais_destino);

foreach($capitais_origem as $origem){//pega a fila $capitais_origem e separa cada valor    
    if($origem == $final_origem){//se for o valor final
        $origens .= $origem.".";//finaliza a construção
    }else{//senão
        $origens .= $origem.", ";//continua construindo
    }    
}

foreach($capitais_destino as $destino){
    if($destino != $final_destino){
        $destinos .= $destino.", ";
    }else{
        $destinos .= $destino.".";
    }    
}

// -------------------------- Conteúdo das passagens aéreas ---------------------- //

echo"<ul>";
echo"<li> <strong>Palavra-Chave: </strong>".$palavra_chave."</li>";
echo"<li> <strong>Titulo: </strong>".ucwords($palavra_chave)."</li>";
echo"<li> <strong>URL: </strong>".str_replace(' ','-',$palavra_chave)."</li>";
echo"</ul>";
echo"<p>".$saudacao."<p>";
echo"<p><strong>Data da Publicação: </strong>".$data."</p>";
echo"<p>".$o_que_encontra."</p>";
echo"<p>".$so_divulgamos."</p>";
echo"<p>".$disponibilidade."</p>";
echo"<h2>Como é a promoção - ".$palavra_chave."</h2>";
echo"<h3>Quais as origens desta promoção?</h3>";
echo"<p>".$origens."</p>";
echo"<h3>Quais os destinos desta promoção?</h3>";
echo"<p>".$destinos."</p>";
echo"<p>".$chamada_passagens." - ".$palavra_chave.": </p>";
echo"<ul>";
foreach ($contexto as $valor) {
    $dados_finais = explode(',',$valor);
    echo"<li>".$dados_finais[1]." - passagem aerea a partir de R$".$dados_finais[2]." - Desc: ".$dados_finais[3]."</li>";
}
echo"</ul>";
echo"<p>".$clicar_link."<a href='".$link."' title='' rel='nofollow'>Clique aqui</a></p>";
echo"<h2>Econtrando mais ofertas - ".$palavra_chave."</h2>";
echo"<p>".$sobre_buscador."</p>";
echo"<p>".$o_que_encontra_buscador."</p>";
echo"<p>".$ultima_chamada_buscador."</p>";
echo"<h2>Regras da promoção - ".$palavra_chave."</h2>";
echo"<ul>";
echo"<li>Nestas promoções estão algumas taxas e encargos imbutidos na promoção.</li>";
echo"<li>Nosso blog não realiza estas promoções, apenas divulgamos.</li>";
echo"<li>Estas ofertas divulgamos no momento que os preços estão disponíveis. Se caso vocÊ consulta e o preço não se encontra, não assumimos esta responsabilidade.</li>";
echo"</ul>";
echo"<h2>Receba todas estas promoções - ".$palavra_chave."</h2>";
echo"<p>".$email."</p>";
echo"<p>".$facebook."</p>";
echo"<p>".$pushcrew."</p>";


// -------------------------- Fim do conteúdo das passagens aéreas ---------------------- //

?>