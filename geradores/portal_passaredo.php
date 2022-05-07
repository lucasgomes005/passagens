<?php 

$dados = explode("\n",($passagens));
/*
echo "<pre>";
print_r($dados);
echo "</pre>";
*/
shuffle($dados);

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
foreach($dados as $dado) {
        echo"<li><strong>Passagens Aéreas - </strong> <strong>Passaredo Promoções - </strong>".$dado."</li>";
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