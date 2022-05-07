<?php

$tira_compre_aqui = str_replace("Compre aqui", "", $passagens); //tira o "compre aqui"
$vetor_quebra_linha = explode("\n", $tira_compre_aqui); //separar os dados pela quebra de linhas
$contexto = str_replace(")",",",$vetor_quebra_linha); //variável gravar o contexto da passagens
shuffle($contexto);

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
echo"Segue abaixo as promoções da GOL ".$palavra_chave.":";
echo"<ul>";
foreach($contexto as $valor){
    $dados_finais = explode(',',$valor);
    if(strlen($dados_finais[0]) != 0){
        echo"<li> <strong>Portal GOL</strong> - <strong>Origem: </strong>".trim($dados_finais[0]).") - <strong>Destino: </strong>".trim($dados_finais[1]).") - <strong>Valor da Passagem: </strong>".trim($dados_finais[2])."</li>";
    }
}
echo"</ul>";
echo"<p>Esta promoção de passagens aéreas pela GOL Linhas Aéreas podem ser adquiridas <a href='".$link."' title='' rel='nofollow'>aqui.</a></p>";
echo"<p>".$sobre_buscador."</p>";
echo"<p>".$o_que_encontra_buscador."</p>";
echo"<p>".$ultima_chamada_buscador."</p>";
echo"<h2>Considerações sobre estas promoções - ".$palavra_chave."</h2>";
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