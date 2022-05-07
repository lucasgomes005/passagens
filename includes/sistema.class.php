<?php 

require_once "BD.class.php";

$obj = new BancoDeDados('localhost','root','','promocoes');
$obj->conectar();

class sistemaDePromocoes extends BancoDeDados{

	private $palavraChave;
	private $saudacao;
	private $passagens;
	private $link;
    private $geradorAutomatico;
    private $qualPromocao;
    private $menorValor;
    private $companhiaAerea = '';
    private $prefixosAeroportos = array('AJU', 'BEL', 'BGX', 'BNU', 'BPS', 'BSB', 'BVB', 'CAC', 'CFB', 'CGB', 'CGH', 'CGR', 'CNF', 'CPV', 'CWB', 'CXJ', 'FLN', 'FOR', 'GIG', 'GPB', 'GRU', 'GYN', 'IGU', 'IMP', 'IOS', 'JDO', 'JOI', 'JPA', 'LDB', 'LAJ', 'MAO', 'MCZ', 'MGF', 'MVF', 'NAT', 'PET', 'PLU', 'PHB', 'PFB', 'PMW', 'PNZ', 'POA', 'REC', 'RIA', 'SDU', 'SLZ', 'SOD', 'SSA', 'THE', 'VCP', 'UDI', 'VDC', 'VIX', 'XAP');
    private $imagemDestacada;
    
    private static $specialChar = array(
        'À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Æ', 'Ç',
        'È', 'É', 'Ê', 'Ë',
        'Ì', 'Í', 'Î', 'Ï', 'Ð', 'Ñ',
        'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ø',
        'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'Þ', 'ß',
        'À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Æ', 'Ç',
        'È', 'É', 'Ê', 'Ë',
        'Ì', 'Í', 'Î', 'Ï', 'Ð', 'Ñ',
        'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ø',
        'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'Þ', 'ß',
        'à', 'á', 'â', 'ã', 'ä', 'å', 'æ', 'ç',
        'è', 'é', 'ê', 'ë',
        'ì', 'í', 'î', 'ï', 'ð', 'ñ',
        'ò', 'ó', 'ô', 'õ', 'ö', 'ø',
        'ù', 'ú', 'û', 'ü', 'ý', 'þ', 'ÿ', 'º');

    private static $htmlEntity = array(
        '&Agrave;', '&Aacute;', '&Acirc;', '&Atilde;', '&Auml;', '&Aring;', '&AElig;', '&Ccedil;',
        '&Egrave;', '&Eacute;', '&Ecirc;', '&Euml;',
        '&Igrave;', '&Iacute;', '&Icirc;', '&Iuml;', '&ETH;', '&Ntilde;',
        '&Ograve;', '&Oacute;', '&Ocirc;', '&Otilde;', '&Ouml;', '&Oslash;',
        '&Ugrave;', '&Uacute;', '&Ucirc;', '&Uuml;', '&Yacute;', '&THORN;', '&szlig;',
        '&AGRAVE;', '&AACUTE;', '&ACIRC;', '&ATILDE;', '&AUML;', '&ARING;', '&AELIG;', '&CCEDIL;',
        '&EGRAVE;', '&EACUTE;', '&ECIRC;', '&EUML;',
        '&IGRAVE;', '&IACUTE;', '&ICIRC;', '&IUML;', '&ETH;', '&NTILDE;',
        '&OGRAVE;', '&OACUTE;', '&OCIRC;', '&OTILDE;', '&OUML;', '&OSLASH;',
        '&UGRAVE;', '&UACUTE;', '&UCIRC;', '&UUML;', '&YACUTE;', '&THORN;', '&SZLIG;',
        '&agrave;', '&aacute;', '&acirc;', '&atilde;', '&auml;', '&aring;', '&aelig;', '&ccedil;',
        '&egrave;', '&eacute;', '&ecirc;', '&euml;',
        '&igrave;', '&iacute;', '&icirc;', '&iuml;', '&eth;', '&ntilde;',
        '&ograve;', '&oacute;', '&ocirc;', '&otilde;', '&ouml;', '&oslash;',
        '&ugrave;', '&uacute;', '&ucirc;', '&uuml;', '&yacute;', '&thorn;', '&yuml;', '&deg;');

    private static $imagemDestacadaGeral = array('6281','6293','6297','6320','6342','6378','6508','6524','6508','6490','6478','6528','6673','6699','6797','7570','7644','7638','7630','7905','6699');

    private static $imagemDestacadaAzul = array('6481','6570','6669','6695','7609','7575','7667','7648','7701','8921','12744','7616','6786');

    private static $imagemDestacadaGol = array('6320','6338','6495','6692','6778','7619','7559','7606','7597','7635','7654','12747','8183','6789');

    private static $imagemDestacadaLATAM = array('8832','7793','7612','7562','6806','6712','6682','6658','6577','6436');
    

	public function __construct($palavraChave, $saudacao, $passagens, $link, $geradorAutomatico, $qualPromocao){

		$this->palavraChave = $palavraChave;
		$this->saudacao = $saudacao;
		$this->passagens = $passagens;
		$this->link = $link;
        $this->geradorAutomatico = $geradorAutomatico;
        $this->qualPromocao = $qualPromocao;

	}

    public function conectarSistema(){
        BancoDeDados::__construct('localhost','root','','promocoes');
        BancoDeDados::conectar();
    }

    public function retornaQualPromocao(){

        return $this->qualPromocao;

    }


    public function retornaVariavelSaudacao(){

        return $this->saudacao;

    }

    public function retornaVariavelPalavraChave(){

        return $this->palavraChave;

    }

    public function retornaVariavelPassagensAereas(){

        if(is_array($this->passagensAlterada)){
            return "<pre>".print_r($this->passagensAlterada)."</pre>";
        }else{
            return $this->passagensAlterada;
        }

    }

    public function retornaVariavelLink(){

        return $this->link;

    }

    public function link(){

        return "<a href='".$this->link." rel='nofollow'>Clique Aqui</a>";

    }

    public function retornaPrefixos(){

        return $this->prefixosAeroportos;

    }

    public function misturarArray($array){

        shuffle($array);
        return $array[0];

    }

    public function retornaMenorValor() {


        if(!$this->menorValor){

            $menorValor = array();
            for($i = 100; $i <= 170; $i++){
                array_push($menorValor, $i);
            }   
            shuffle($menorValor);
            return 'R$ '.$menorValor[0].',00';  

        }else{

            return $this->menorValor;  

        }        

    }

    public function retornaVariavelMenorValor() {

        return $this->menorValor;

    }

    public static function convertText2HTML($texto)
    {
        return str_replace(self::$specialChar, self::$htmlEntity, $texto);
    }
 
    public static function convertHTML2Text($texto)
    {
        return str_replace(self::$htmlEntity, self::$specialChar, $texto);
    }

	public function mostrarSaudacao(){

        self::conectarSistema();


                    switch ($this->saudacao){
                        case 'geral':
                            BancoDeDados::consultaRandomica('frase', 'promocao_saudacao_geral', '', 'limit 1');
                            break;
                        case 'latam':
                            BancoDeDados::consultaRandomica('frase', 'promocao_saudacao_latam', '', 'limit 1');
                            break;
                        case 'azul':
                            BancoDeDados::consultaRandomica('frase', 'promocao_saudacao_azul', '', 'limit 1');
                            break;
                        case 'gol':
                            BancoDeDados::consultaRandomica('frase', 'promocao_saudacao_gol', '', 'limit 1');
                            break;
                    }

                    return $saudacao = mb_convert_encoding(BancoDeDados::setResultado(), 'HTML-ENTITIES', 'UTF-8');

       
	}

    public function passagensGOL(): void{

        $prefixos = $this->prefixosAeroportos;
        $tira_compre_aqui = str_replace("Compre aqui", "", $this->passagens); //tira o "compre aqui"
        $vetor_quebra_linha = explode("\n", $tira_compre_aqui); //separar os dados pela quebra de linhas
        $passagens = array();


        for($i = 0; $i < count($vetor_quebra_linha); $i++){

            for ($j = 0; $j < count($prefixos); $j++) {

                $promoTemp = str_replace('('.$prefixos[$j].')',' - ', $vetor_quebra_linha[$i]);

                if(strpos($promoTemp,'-') !== false){

                    for ($y = 0; $y < count($prefixos); $y++) {

                        $promoTemp2 = str_replace('('.$prefixos[$y].')','/', $promoTemp);

                        if(strpos($promoTemp2,'/') !== false){

                            $passagens[$i] = $promoTemp2;

                        }

                    }

                }

            }

        }

        $passagens = str_replace('-',',', $passagens);
        $passagens = str_replace('/',',', $passagens);


        shuffle($passagens);

        $this->passagens = $passagens;

        //return $passagens;

    }

    //função de enxugamento de dados da Azul

    public function enxugaDados($dado){

            $pontos = array();
            $palavras_descartadas = array('a partir de','pontos TudoAzul','Comprar','', 'a partir de:');
            for($i = 1; $i <= 100; $i++){   
                $ponto = 'ou '.$i.'.000';
                array_push($pontos, $ponto);    
            }
            if(!in_array($dado, $palavras_descartadas) && 
               !in_array($dado, $pontos)){
                return $dado;
            } 

    }

    /*CONVERTER AS PASSAGENS DA AZUL LINHAS AÉREAS*/

    public function passagensAzul(): void{

        $dados = $this->passagens;
        $novos_dados = array();
        $divisao = explode("\n", $dados);
        $sair = false;
        $passagens_aereas = array();
        $passagem_aerea = '';
        $cont = 1;
        $valores = array();

        //enxugando a lista
        foreach($divisao as $dado){
            if(self::enxugaDados(trim($dado)) != NULL){
                $funcao = self::enxugaDados(trim($dado));
                array_push($novos_dados, $funcao);
            }
        }

        //contextualizando os dados
        $valores = array();
        for($i = 0; $i < count($novos_dados); $i++){
                if($cont == 3){
                    array_push($valores, $novos_dados[$i]);
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

        sort($valores);        
        shuffle($passagens_aereas);

        $this->passagens = $passagens_aereas;
        $this->menorValor = $valores[0];

    }

    public function gerarPassagens($passagens){

        $passagensAPI = '';

        if($this->geradorAutomatico == 'nao'){

                if($passagens){
                    echo '<ul>';
                    foreach($passagens as $passagem){

                        $dado = explode(',', $passagem);
                        echo '<li>Saindo de: '.$dado[0].' - Para: '.$dado[1].' - a partir de '.$dado[2].'</li>';

                    }
                    echo '</ul>';
                }else{
                    echo "Não há nenhum dado na variável";
                }


        }else{

                $passagensAPI .= htmlspecialchars('<ul>',ENT_QUOTES);
                foreach($passagens as $passagem){

                    $dado = explode(',', $passagem);
                    $passagensAPI .= htmlspecialchars('<li>Saindo de: '.$dado[0].' - Para: '.$dado[1].' - a partir de '.$dado[2].'</li>', ENT_QUOTES);

                }
                $passagensAPI .= htmlspecialchars('</ul>', ENT_QUOTES);
                return $passagensAPI;

        }

    }

    public function passagensLatam(){

        $dados = $this->passagens;
        $vetores = explode("\n", $dados);
        $excluir = array('COMPRAR');
        $novosVetores = array();

        foreach($vetores as $vetor){
            if(!in_array(trim($vetor), $excluir)){
                array_push($novosVetores, trim($vetor));
            }
        }

        $vetorOrigem = array();
        $vetorDestino = array();
        $vetorValor = array();
        $cont = 1;

        foreach($novosVetores as $vetor){

            if($cont == 1){
                array_push($vetorOrigem, $vetor);
                $cont++;
            }elseif($cont == 2){
                array_push($vetorDestino, $vetor);
                $cont++;
            }else{
                array_push($vetorValor, $vetor);
                $cont = 1;
            }

        }

        unset($cont);

        $passagens = array();

        for($i = 0; $i < count($vetorValor); $i++){
            $conteudo = $vetorOrigem[$i].','.$vetorDestino[$i].','.$vetorValor[$i];
            array_push($passagens, $conteudo);
        }

        shuffle($passagens);

        $this->passagens = $passagens;

    }

    public function passagensPassagensImperdiveis(): void{

        $dados = $this->passagens;
        $passagens = explode("\n", $dados);
        shuffle($passagens);

        $this->passagens = $passagens;

    }

    public function passagensCVC(): void{

        $dados = $this->passagens;
        $passagens = explode("\n", $dados);
        shuffle($passagens);

        $this->passagens = $passagens;

    }

    public function passagensViajanet(): void{

        $dados = $this->passagens;
        $divisao = explode("\n", $dados);
        $vetorEnxugamento = array('Passagens Aéreas de');
        $cidadesPrincipais = array('São Paulo','Rio de Janeiro','Brasília','Salvador','Recife','Belo Horizonte','Fortaleza','Porto Alegre','Curitiba','Belém','Manaus','Goiânia','Florianópolis','Vitória','Cuiabá','São Luís','Maceió','Natal','Aracaju','João Pessoa');
        $vetorDestinos = array();
        $vetorValor = array();
        $vetorDesconto = array();

        foreach($divisao as $dados){

            if(!in_array(trim($dados),$vetorEnxugamento)){
                if(strrchr($dados,'%') == true){
                    array_push($vetorDesconto, trim($dados));
                }elseif(strrchr($dados,'$') == true){
                    array_push($vetorValor, trim($dados));
                }else{
                    array_push($vetorDestinos, trim($dados));
                }                
            }

        }

        $vetorOrigem = array();
        $vetorDestino = array();
        $ciclo = false;

        foreach($vetorDestinos as $dados){

            foreach($cidadesPrincipais as $cidade){

                if(stripos($dados,trim($cidade)) !== false && $ciclo === false){
                    $destino = str_replace($cidade,'',$dados);
                    array_push($vetorOrigem,trim($cidade));
                    array_push($vetorDestino,trim($destino));
                    $ciclo = true;
                }

            }

            $ciclo = false;

        }

        $passagens = array();

        for($i = 0; $i < count($vetorDestinos); $i++){
            $texto = $vetorOrigem[$i].','.$vetorDestino[$i].','.$vetorValor[$i];
            array_push($passagens,$texto);
        }

        //shuffle($passagens);
        $this->passagens = $passagens;

    }

    public function escolhePromocao(): void{

        switch ($this->qualPromocao) {
            case "selecione":
                echo"Selecione a promoção correta";
                break;
            case 'portal_gol':
                self::passagensGOL();
                $this->imagemDestacada = self::misturarArray(self::$imagemDestacadaGol);
                $this->companhiaAerea = 'GOL - ';
                break;
            case 'portal_azul':
                self::passagensAzul();
                $this->imagemDestacada = self::misturarArray(self::$imagemDestacadaAzul);
                $this->companhiaAerea = 'AZUL - ';
                break;
            case 'portal_latam':
                self::passagensLatam();
                //$this->imagemDestacada = self::misturarArray(self::$imagemDestacadaLatam);
                $this->companhiaAerea = 'LATAM - ';
                break;    
            case 'passagens_imperdiveis':
                self::passagensPassagensImperdiveis();
                $this->imagemDestacada = self::misturarArray(self::$imagemDestacadaGeral);
                break;    
            case 'cvc':
                self::passagensCVC();
                $this->imagemDestacada = self::misturarArray(self::$imagemDestacadaGeral);
                break; 
            case 'viajanet_desc':
                self::passagensViajanet();
                $this->imagemDestacada = self::misturarArray(self::$imagemDestacadaGeral);
                break;             
        }
        
    }

    public function companhiaAerea(): void{

        switch ($this->qualPromocao) {
            case "selecione":
                echo"Selecione a promoção correta";
                break;
            case 'portal_gol':
                $this->companhiaAerea = 'GOL - ';
                break;
            case 'portal_azul':
                $this->companhiaAerea = 'AZUL - ';
                break;
            case 'portal_latam':
                $this->companhiaAerea = 'LATAM - ';
                break;             
        }

    }

    public function imagemPostagem(){

        $array = array();
        for($i = 1; $i <= 325; $i++){
            array_push($array, 'aviao-'.$i);
        }
        shuffle($array);
        $imagem = $array[0];
        $palavraChave = $this->palavraChave;

        return '<img class="aligncenter wp-image-12720 size-full" src="https://www.passagenspromo.com/wp-content/uploads/2020/04/'.$imagem.'.jpg" alt="'.$this->palavraChave.'" width="630" />';

    }

    public function misturaSetor($frase1, $frase2, $frase3){

        $frases = array($frase1, $frase2, $frase3);
        shuffle($frases);
        return $frases;

    }

    public function tituloPromocao(){

        BancoDeDados::consultaRandomica('titulo', 'promocao_titulos', '', 'limit 1');
        $titulo = mb_convert_encoding(BancoDeDados::setResultado(), 'HTML-ENTITIES', 'UTF-8');

        return self::convertHTML2Text(strtoupper($titulo));
        //return strtoupper(self::convertHTML2Text($titulo));

    }

    public function tituloGoogle(){

        BancoDeDados::consultaRandomica('frase', 'palavra-chave', '', 'limit 1');
        $titulo = mb_convert_encoding(BancoDeDados::setResultado(), 'HTML-ENTITIES', 'UTF-8');

        return ucwords($titulo);

    }

    public function slug(){

        BancoDeDados::consultaRandomica('frase', 'palavra-chave', '', 'limit 1');
        $slug = str_replace(' ','-', mb_convert_encoding(BancoDeDados::setResultado(), 'HTML-ENTITIES', 'UTF-8'));

        return strtolower($slug);

    }


	public function oQueEncontra(){

        BancoDeDados::consultaRandomica('frase', 'promocao_o_que_encontra', '', 'limit 1');
        $frase = mb_convert_encoding(BancoDeDados::setResultado(), 'HTML-ENTITIES', 'UTF-8');

        return $frase;

    }

    public function soDivulgamos(){

        BancoDeDados::consultaRandomica('frase', 'promocao_so_divulgamos', '', 'limit 1');
        $frase = mb_convert_encoding(BancoDeDados::setResultado(), 'HTML-ENTITIES', 'UTF-8');

        return $frase;

    }

    public function disponibilidade(){

        BancoDeDados::consultaRandomica('frase', 'promocao_disponibilidade', '', 'limit 1');
        $frase = mb_convert_encoding(BancoDeDados::setResultado(), 'HTML-ENTITIES', 'UTF-8');

        return $frase;

    }

    public function chamadaParaPassagens(){

        BancoDeDados::consultaRandomica('frase', 'promocao_chamada_passagens', '', 'limit 1');
        $frase = mb_convert_encoding(BancoDeDados::setResultado(), 'HTML-ENTITIES', 'UTF-8');

        return $frase;

    }

    public function clicarLink(){

        BancoDeDados::consultaRandomica('frase', 'promocao_clicar_link', '', 'limit 1');
        $frase = mb_convert_encoding(BancoDeDados::setResultado(), 'HTML-ENTITIES', 'UTF-8');

        return $frase.'<a href="'.$this->link.'">Clique aqui.</a>';

    }

    public function sobreBuscador(){

        BancoDeDados::consultaRandomica('frase', 'promocao_sobre_buscador', '', 'limit 1');
        $frase = mb_convert_encoding(BancoDeDados::setResultado(), 'HTML-ENTITIES', 'UTF-8');

        return $frase;

    }

    public function oQueEncontraBuscador(){

        BancoDeDados::consultaRandomica('frase', 'promocao_o_que_encontra_buscador', '', 'limit 1');
        $frase = mb_convert_encoding(BancoDeDados::setResultado(), 'HTML-ENTITIES', 'UTF-8');

        return $frase;

    }

    public function ultimaChamadaBuscador(){

        BancoDeDados::consultaRandomica('frase', 'promocao_ultima_chamada_buscador', '', 'limit 1');
        $frase = mb_convert_encoding(BancoDeDados::setResultado(), 'HTML-ENTITIES', 'UTF-8');

        return $frase;

    }

    public function deixeEmail(){

        BancoDeDados::consultaRandomica('frase', 'promocao_deixe_email', '', 'limit 1');
        $frase = mb_convert_encoding(BancoDeDados::setResultado(), 'HTML-ENTITIES', 'UTF-8');

        return $frase;

    }

    public function sigaFacebook(){

        BancoDeDados::consultaRandomica('frase', 'promocao_facebook', '', 'limit 1');
        $frase = mb_convert_encoding(BancoDeDados::setResultado(), 'HTML-ENTITIES', 'UTF-8');

        return $frase;

    }

    public function sigapushCrew(){

        BancoDeDados::consultaRandomica('frase', 'promocao_pushcrew', '', 'limit 1');
        $frase = mb_convert_encoding(BancoDeDados::setResultado(), 'HTML-ENTITIES', 'UTF-8');

        return $frase;

    }

    /*MODELO DE POSTAGEM DE PROMOÇÃO INDIVIDUAL*/

    public function modeloPromocao() : void{

        self::conectarSistema();

        self::escolhePromocao();

        echo self::tituloPromocao()." - a partir de R$ ".self::retornaMenorValor();

        echo "<p>".self::mostrarSaudacao()."</p>";

        $parte1 = self::misturaSetor(self::oQueEncontra(), self::soDivulgamos(), self::disponibilidade());
        
        foreach($parte1 as $frase){
            echo '<p>'.$frase.'</p>';
        }

        echo "<p>".self::chamadaParaPassagens()."</p>";

        if($this->qualPromocao != "selecione"){

           self::gerarPassagens($this->passagens); 

        }

        echo "<p>".self::clicarLink()."</p>";

        echo "<h2>Buscador de Promoções e Ofertas</h2>";

        $parte2 = self::misturaSetor(self::sobreBuscador(), self::oQueEncontraBuscador(), self::ultimaChamadaBuscador());

        foreach($parte2 as $frase){
            echo '<p>'.$frase.'</p>';
        }

        echo "<h2>Siga-nos em nossas Redes Sociais</h2>";

        $parte3 = self::misturaSetor(self::deixeEmail(), self::sigaFacebook(), self::sigaPushCrew());

        foreach($parte3 as $frase){
            echo '<p>'.$frase.'</p>';
        }


    }

    public function modeloAPIRest($usuario, $senha){

        self::conectarSistema();
        self::companhiaAerea();

        $url = 'https://passagenspromo.com/wp-json/wp/v2/posts';

        $create_post = 'wp_remote_post("'.$url.'",
            array(
                "headers" => array(
                    "Authorization" => "Basic " . base64_encode("'.$usuario.':'.$senha.'")
                ),
                "body" => array(
                    "title" => "'.self::tituloPromocao().' - '.$this->companhiaAerea.'a partir de R$ '.self::retornaMenorValor().'",
                    "content" => "'.self::promocaoAPIRest().'",
                    "status" => "future",
                    "date" => "2020-04-08 02:00:00",
                    "date_gmt" => "2020-04-08 02:00:00",
                    "featured_media" => "'.$this->imagemDestacada.'"
                )
            )
        );<br /> <br />';

        echo $create_post;        
    }

    public function promocaoAPIRest(){

        self::conectarSistema();
        self::escolhePromocao();

        $conteudo = '';

        $conteudo .= htmlspecialchars("<p>".self::mostrarSaudacao()."</p>", ENT_QUOTES);

        $parte1 = self::misturaSetor(self::oQueEncontra(), self::soDivulgamos(), self::disponibilidade(), self::imagemPostagem());
        
        foreach($parte1 as $frase){
            $conteudo .= htmlspecialchars('<p>'.$frase.'</p>', ENT_QUOTES);
        }

        $conteudo .= htmlspecialchars("<p>".self::chamadaParaPassagens()."</p>", ENT_QUOTES);

        if($this->qualPromocao != "selecione"){

           $conteudo .= self::gerarPassagens($this->passagens); 

        }

        $conteudo .= htmlspecialchars("<p>".self::clicarLink()."</p>", ENT_QUOTES);

        $conteudo .= htmlspecialchars("<h2>Buscador de Promoções e Ofertas</h2>", ENT_QUOTES);

        $parte2 = self::misturaSetor(self::sobreBuscador(), self::oQueEncontraBuscador(), self::ultimaChamadaBuscador(), self::imagemPostagem());

        foreach($parte2 as $frase){
            $conteudo .= htmlspecialchars('<p>'.$frase.'</p>', ENT_QUOTES);
        }

        $conteudo .= htmlspecialchars("<h2>Siga-nos em nossas Redes Sociais</h2>", ENT_QUOTES);

        $parte3 = self::misturaSetor(self::deixeEmail(), self::sigaFacebook(), self::sigaPushCrew(), self::imagemPostagem());

        foreach($parte3 as $frase){
            $conteudo .= htmlspecialchars('<p>'.$frase.'</p>', ENT_QUOTES);
        }

        return $conteudo;

    }
    
	
}