<?php

$vetor_passagens = explode("\n", $passagens); //separar os dados pela quebra de linhas
$contexto = array(); //variável gravar o contexto da passagens
$count = 0; //contador de contexto
$count_vetor = 0; // contador de vetores$capitais_origem = array();
$capitais_origem = array();
$capitais_destino = array();

for ($i = 0; $i < count($vetor_passagens); $i++) {

    if ($count == 0) { //Passagens Aéreas a partir de
        $contexto[$count_vetor] = trim($vetor_passagens[$i]) . ",";
        $count = 1;
    } elseif ($count == 1) {// Origem e Destino ✈
        //$dado = explode('&#9992;', $vetor_passagens[$i]);
        $dado = explode('✈', $vetor_passagens[$i]);
        $contexto[$count_vetor] .= "<strong>Origem:</strong> ".$dado[0]." - <strong>Destino:</strong> ".trim($dado[1]).",";
         if(in_array(trim($dado[0]),$capitais_origem) == false){
           
            array_push($capitais_origem, trim($dado[0]));
        }
        //se o dado estiver no array $capitais_destino
        if(in_array(trim($dado[1]),$capitais_destino) == false){
            array_push($capitais_destino, trim($dado[1]));
        }
        $count = 2;
    } elseif ($count == 2) { //Valor da passagem
        $dado = explode('R$ ', $vetor_passagens[$i]);
        $contexto[$count_vetor] .= trim($dado[1]);
        $count = 0;    
        $count_vetor++;
    } 
    
}

sort($capitais_origem);
sort($capitais_destino);
shuffle($contexto);

end($capitais_origem);
$final_origem = current($capitais_origem);
end($capitais_destino);
$final_destino = current($capitais_destino);

foreach($capitais_origem as $origem){    
    if($origem == $final_origem){
        $origens .= $origem.".";
    }else{
        $origens .= $origem.", ";
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
echo "<p>".$saudacao."</p>";
echo"<p><strong>Data da Postagem da Passagem: </strong>".$data."</p>";
echo"<p>".$introducao."</p>";
echo"<h2>Descrição sobre a promoção - ".$palavra_chave."</h2>";
echo"<p>".$desc_promocao."</p>";
echo"<h3>Quais as origens desta promoção?</h3>";
echo"<p>".$origens."</p>";
echo"<h3>Quais os destinos desta promoção?</h3>";
echo"<p>".$destinos."</p>";
echo"Relação de ofertas logo a baixo: ".$palavra_chave.":";
echo"<ul>";
foreach ($contexto as $valor) {
    $dados_finais = explode(',',$valor);
    echo"<li>".$dados_finais[1]." - R$".$dados_finais[2]."</li>";
}
echo"</ul>";
echo"<p>Adquira as suas promoções e ofertas <a href='".$link."' title='' rel='nofollow'>aqui.</a></p>";
echo"<p>".$buscador."</p>";
echo"<h2>Regras da promoção - ".$palavra_chave."</h2>";
echo"<ul>";
echo"<li>Taxas e encargos podem estar presentes nestas ofertas.</li>";
echo"<li>Nós não temos nenhum vínculo na criação destas ofertas.</li>";
echo"<li>Os preços destas ofertas foram postadas no momento que foram encontradas.</li>";
echo"</ul>";
echo"<p>".$seguidores."</p>";

// -------------------------- Fim do conteúdo das passagens aéreas ---------------------- //

?>