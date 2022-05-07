<?php

class BancoDeDados{

//dados de conex�o
private  $host = ''; //declara��o da varival host
private  $usuario = ''; //declara��o da varival usuario
private  $senha = ''; //declara��o da varival senha
private  $bd = ''; //declara��o da varival banco de dados
private  $conecta;
private  $consulta;

public function __construct($host, $usuario, $senha, $bd){ // m�todo construtor - receber os dados de conex�o

	$this->host = $host; //vari�vel recebendo o valor do host
	$this->usuario = $usuario; //vari�vel recebendo o valor do usuario
	$this->senha = $senha; //vari�vel recebendo o valor do senha
	$this->bd = $bd; //vari�vel recebendo o valor do banco de dados
	
}

public function conectar(){ //m�todo conectar - $variavel->conectar()

	$this->conecta = mysqli_connect($this->host, $this->usuario, $this->senha, $this->bd) or print (mysql_error()); // conectando ao banco - fun��o de conex�o em php
	
}

public function consulta($select, $from, $where){ // m�todo de consulta no banco - $variavel->consulta('','','')

	//***** tratando dos campos do $select *****//
	 
	if($select == '*' || strstr($select,',') == false){ //se o valor for '*' - todos os campos da tabela
		$select = $select; // o valor ser� '*'
	}else{ //se for outro valor
		$campos = explode(',', $select); //separar os campos em vetores	
                        $primeiroVetor = true;
			foreach($campos as $campo){ //ordernando os vetores para uma vari�vel
				if($primeiroVetor){ // se n�o for o vetor final
					$select = $campo.', '; //variavel recebe valore com v�rgula
                                        $primeiroVetor = false;
				}else{ //se for o �ltimo vetor
					$select .= $campo; //receber o valor sem v�rgula
				}		
			}	
	}	

	$consulta = 'select '.$select; //primeiro trecho da query - os campos
	$consulta .= ' from '.$from; // segundo trecho da query - a tabela
	
	//***** tratando das condi��es do $where *****//
	
	if(empty($where)){ //se variavel estiver vazia
		$condicao = ''; // variavel $condi��o recebe vazio, pois n�o possuir� condi��o
	}else{ // sen�o
                if (strstr($select,',') == false){
                    $where = $where;
                }else{
                    $condicoes = explode(',',$where); // definir� e ordernar� as condi��es	
                    $primeiroVetor = true;
                    foreach($condicoes as $condicao){ // organizando todas as condi��es do where
                            if($primeiroVetor == 1){ // se for a primeira condi��o do 'where'
                                            $where = $condicao; // ele n�o recebe o 'and'
                                            $primeiroVetor = false;
                                    }else{ // sen�o
                                            $where .= ' and '.$condicao; //condi��o recebe 'and'
                                    }
                    }
                }		
		$consulta .= ' where '.$where; // segundo trecho da query - as condi��es
                
	}
	
        //return $consulta;
	$this->consulta = mysqli_query($this->conecta,$consulta); //mostrar como ficaria toda a query
}

public function consultaRandomica($select, $from, $where, $limit){ // m�todo de consulta no banco - $variavel->consulta('','','')

	//***** tratando dos campos do $select *****//
	 
	if($select == '*' || strstr($select,',') == false){ //se o valor for '*' - todos os campos da tabela
		$select = $select; // o valor ser� '*'
	}else{ //se for outro valor
		$campos = explode(',', $select); //separar os campos em vetores	
                        $primeiroVetor = true;
			foreach($campos as $campo){ //ordernando os vetores para uma vari�vel
				if($primeiroVetor){ // se n�o for o vetor final
					$select = $campo.', '; //variavel recebe valore com v�rgula
                                        $primeiroVetor = false;
				}else{ //se for o �ltimo vetor
					$select .= $campo; //receber o valor sem v�rgula
				}		
			}	
	}	

	$consulta = 'select '.$select; //primeiro trecho da query - os campos
	$consulta .= ' from '.$from; // segundo trecho da query - a tabela
	
	//***** tratando das condi��es do $where *****//
	
	if(empty($where)){ //se variavel estiver vazia
		$condicao = ''; // variavel $condi��o recebe vazio, pois n�o possuir� condi��o
	}else{ // sen�o
                if (strstr($select,',') == false){
                    $where = $where;
                }else{
                    $condicoes = explode(',',$where); // definir� e ordernar� as condi��es	
                    $primeiroVetor = true;
                    foreach($condicoes as $condicao){ // organizando todas as condi��es do where
                            if($primeiroVetor == 1){ // se for a primeira condi��o do 'where'
                                            $where = $condicao; // ele n�o recebe o 'and'
                                            $primeiroVetor = false;
                                    }else{ // sen�o
                                            $where .= ' and '.$condicao; //condi��o recebe 'and'
                                    }
                    }
                }	

		$consulta .= ' where '.$where; // segundo trecho da query - as condi��es
                
	}
	
	$consulta .= ' order by rand() '.$limit;
        $this->consulta = mysqli_query($this->conecta,$consulta);
}

public function setResultado(){
    
    while($linha = mysqli_fetch_array($this->consulta, MYSQLI_NUM)){
        $resultado = $linha[0].'<br/>';
    }
    
    //$resultado = mysql_free_result($this->consulta);
    return $resultado;
    
}

public function atualizar($update, $set, $where){
	
	$atualizacao = 'update '.$update;
	
	//******** tratando os valores do 'set' ********//
	
	if (!strstr(',',$set)){
		$set = $set;
	}else{
		$alteracoes = explode(',',$set);
		$set = '';
		foreach($alteracoes as $alteracao){
			if(!end($alteracao)){
				$set .= $alteracao.', ';
			}else{
				$set .= $alteracao;
			}
		}
	}
	
	$atualizacao .= ' set '.$set;
	
	//******** tratando os valores do 'where' ********//
        
        if(empty($where)){ //se variavel estiver vazia
		$condicao = ''; // variavel $condi��o recebe vazio, pois n�o possuir� condi��o
	}else{ // sen�o
                if (strstr($select,',') == false){
                    $where = $where;
                }else{
                    $condicoes = explode(',',$where); // definir� e ordernar� as condi��es	
                    $primeiroVetor = true;
                    foreach($condicoes as $condicao){ // organizando todas as condi��es do where
                            if($primeiroVetor == 1){ // se for a primeira condi��o do 'where'
                                            $where = $condicao; // ele n�o recebe o 'and'
                                            $primeiroVetor = false;
                                    }else{ // sen�o
                                            $where .= ' and '.$condicao; //condi��o recebe 'and'
                                    }
                    }
                }	

		$atualizacao .= ' where '.$where; // segundo trecho da query - as condi��es
	}		
	
	$atualizacao = mysql_query($atualizacao);
}

public function deletar($from, $where){

	$deletar = 'delete from '.$from;
	
	//******** tratando os valores do 'where' ********//
        
        if(empty($where)){ //se variavel estiver vazia
		$condicao = ''; // variavel $condi��o recebe vazio, pois n�o possuir� condi��o
	}else{ // sen�o
                if (strstr($select,',') == false){
                    $where = $where;
                }else{
                    $condicoes = explode(',',$where); // definir� e ordernar� as condi��es	
                    $primeiroVetor = true;
                    foreach($condicoes as $condicao){ // organizando todas as condi��es do where
                            if($primeiroVetor == 1){ // se for a primeira condi��o do 'where'
                                            $where = $condicao; // ele n�o recebe o 'and'
                                            $primeiroVetor = false;
                                    }else{ // sen�o
                                            $where .= ' and '.$condicao; //condi��o recebe 'and'
                                    }
                    }
                }	

		$deletar .= ' where '.$where; // segundo trecho da query - as condi��es
	}
	
	
	
	$deletar = mysql_query($deletar);

}

public function inserir($campos, $valores){
	
	$inserir = 'insert into('.$campos.') ';
	$inserir .= 'values('.$valores.')';
	
	$inserir = mysql_query($inserir);
	
}

public function desconectar(){
    mysqli_close($this->conecta);
}

public function setHost(){
    return $this->host;
}

public function setUsuario(){
    return $this->usuario;
}

public function setSenha(){
    return $this->senha;
}


}

?>