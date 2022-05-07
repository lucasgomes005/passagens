<?php

/*** variaveis gerais ****/

$cidade = (isset($_POST['cidade'])?$_POST['cidade']:'');
$estado = (isset($_POST['estado'])?$_POST['estado']:'');
$youtube = (isset($_POST['youtube'])?$_POST['youtube']:'');
$introducao = (isset($_POST['introducao'])?$_POST['introducao']:'');
$altura = (isset($_POST['altura'])?$_POST['altura']:'');

$fauna = (isset($_POST['fauna'])?$_POST['fauna']:'');
$flora = (isset($_POST['flora'])?$_POST['flora']:'');
$sobre = (isset($_POST['sobre'])?$_POST['sobre']:'');
$como_chegar = (isset($_POST['como_chegar'])?$_POST['como_chegar']:'');
$link_maps = (isset($_POST['link_maps'])?$_POST['link_maps']:'');

$curiosidade_1 = (isset($_POST['curiosidade_1'])?$_POST['curiosidade_1']:'');
$curiosidade_2 = (isset($_POST['curiosidade_2'])?$_POST['curiosidade_2']:'');
$curiosidade_3 = (isset($_POST['curiosidade_3'])?$_POST['curiosidade_3']:'');

/**** variaveis especificas ****/

/*destinos*/

$populacao = (isset($_POST['populacao'])?$_POST['populacao']:'');
$area = (isset($_POST['area'])?$_POST['area']:'');
$temperatura_min = (isset($_POST['temperatura_min'])?$_POST['temperatura_min']:'');
$temperatura_max = (isset($_POST['temperatura_max'])?$_POST['temperatura_max']:'');

$aeroporto = (isset($_POST['aeroporto'])?$_POST['aeroporto']:'');
$cidade_bom = (isset($_POST['cidade_bom'])?$_POST['cidade_bom']:'');

$titulo_ponto_1 = (isset($_POST['titulo_ponto_1'])?$_POST['titulo_ponto_1']:'');
$desc_ponto_1 = (isset($_POST['desc_ponto_1'])?$_POST['desc_ponto_1']:'');
$titulo_ponto_2 = (isset($_POST['titulo_ponto_2'])?$_POST['titulo_ponto_2']:'');
$desc_ponto_2 = (isset($_POST['desc_ponto_1'])?$_POST['desc_ponto_2']:'');
$titulo_ponto_3 = (isset($_POST['titulo_ponto_3'])?$_POST['titulo_ponto_3']:'');
$desc_ponto_3 = (isset($_POST['desc_ponto_1'])?$_POST['desc_ponto_3']:'');

$titulo_evento_1 = (isset($_POST['titulo_evento_1'])?$_POST['titulo_evento_1']:'');
$desc_evento_1 = (isset($_POST['desc_evento_1'])?$_POST['desc_evento_1']:'');
$titulo_evento_2 = (isset($_POST['titulo_evento_2'])?$_POST['titulo_evento_2']:'');
$desc_evento_2 = (isset($_POST['desc_evento_2'])?$_POST['desc_evento_2']:'');
$titulo_evento_3 = (isset($_POST['titulo_evento_3'])?$_POST['titulo_evento_3']:'');
$desc_evento_3 = (isset($_POST['desc_evento_3'])?$_POST['desc_evento_3']:'');

/*praias*/

$nome_praia = (isset($_POST['nome_praia'])?$_POST['nome_praia']:'');
$historia = (isset($_POST['historia'])?$_POST['historia']:'');

$tit_hotel_1 = (isset($_POST['tit_hotel_1'])?$_POST['tit_hotel_1']:'');
$desc_hotel_1 = (isset($_POST['desc_hotel_1'])?$_POST['desc_hotel_1']:'');
$tit_hotel_2 = (isset($_POST['tit_hotel_2'])?$_POST['tit_hotel_2']:'');
$desc_hotel_2 = (isset($_POST['desc_hotel_2'])?$_POST['desc_hotel_2']:'');
$tit_hotel_3 = (isset($_POST['tit_hotel_3'])?$_POST['tit_hotel_3']:'');
$desc_hotel_3 = (isset($_POST['desc_hotel_3'])?$_POST['desc_hotel_3']:'');

$tit_restaurante_1 = (isset($_POST['titulo_restaurante_1'])?$_POST['titulo_restaurante_1']:'');
$desc_restaurante_1 = (isset($_POST['desc_restaurante_1'])?$_POST['desc_restaurante_1']:'');
$tit_restaurante_2 = (isset($_POST['titulo_restaurante_2'])?$_POST['titulo_restaurante_2']:'');
$desc_restaurante_2 = (isset($_POST['desc_restaurante_2'])?$_POST['desc_restaurante_2']:'');
$tit_restaurante_3 = (isset($_POST['titulo_restaurante_3'])?$_POST['titulo_restaurante_3']:'');
$desc_restaurante_3 = (isset($_POST['desc_restaurante_3'])?$_POST['desc_restaurante_3']:'');

/*cachoeira*/

$nome_cachoeira = (isset($_POST['nome_cachoeira'])?$_POST['nome_cachoeira']:'');
$localizacao = (isset($_POST['localizacao'])?$_POST['localizacao']:'');
$km = (isset($_POST['km'])?$_POST['km']:'');

/*reservas naturais*/

$nome_reserva_natural = (isset($_POST['nome_reserva_natural'])?$_POST['nome_reserva_natural']:'');
$horario_funcionamento = (isset($_POST['horario_funcionamento'])?$_POST['horario_funcionamento']:'');

/*monumentos*/

$nome_monumento = (isset($_POST['nome_monumento'])?$_POST['nome_monumento']:'');
$quando = (isset($_POST['quando'])?$_POST['quando']:'');
$largura = (isset($_POST['largura'])?$_POST['largura']:'');
$peso = (isset($_POST['peso'])?$_POST['peso']:'');


/*link building*/

$tit_artigo_1 = (isset($_POST['tit_artigo_1'])?$_POST['tit_artigo_1']:'');
$desc_artigo_1 = (isset($_POST['desc_artigo_1'])?$_POST['desc_artigo_1']:'');
$tit_artigo_2 = (isset($_POST['tit_artigo_2'])?$_POST['tit_artigo_2']:'');
$desc_artigo_2 = (isset($_POST['desc_artigo_2'])?$_POST['desc_artigo_2']:'');
$tit_artigo_3 = (isset($_POST['tit_artigo_3'])?$_POST['tit_artigo_3']:'');
$desc_artigo_3 = (isset($_POST['desc_artigo_3'])?$_POST['desc_artigo_3']:'');


/*Redirecionador*/
Header('X-XSS-Protection: 0');
$conteudo = $_POST['conteudo'];
include "geradores/conteudo/".$conteudo.".php";

?>