<form action="conteudo.php" method="post">
    
                <div class="row">
                    <div class="col">
                        <h2>Dados do Monumento </h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col">                        
                        <input type="text" name="nome_monumento" id="txt_nome_monumento" class="form-control" placeholder="Nome do Monumento" />
                    </div>
                </div>
                <div class="row">
                    <div class="col">                        
                        <input type="text" name="cidade" id="txt_cidade" class="form-control" placeholder="Qual a cidade?" />
                    </div>
                    <div class="col">                        
                        <input type="text" name="estado" id="txt_estado" class="form-control" placeholder="Qual o estado?" />
                    </div>
                </div>  
                <div class="row">
                    <div class="col">                        
                        <input type="text" name="quando" id="txt_quando" class="form-control" placeholder="Quando foi feito?" />
                    </div>
                </div>
                <div class="row">
                    <div class="col">                        
                        <input type="text" name="largura" id="txt_largura" class="form-control" placeholder="Qual a largura?" />
                    </div>
                    <div class="col">                        
                        <input type="text" name="altura" id="txt_altura" class="form-control" placeholder="Qual a altura?" />
                    </div>
                    <div class="col">                        
                        <input type="text" name="peso" id="txt_peso" class="form-control" placeholder="Qual o peso?" />
                    </div>
                </div>  
                <div class="row">
                    <div class="col">                        
                        <input type="text" name="localizacao" id="txt_localizacao" class="form-control" placeholder="Quando a localização?" />
                    </div>
                </div>
                <div class="row">
                    <div class="col">                        
                        <input type="text" name="youtube" id="txt_youtube" class="form-control" placeholder="Link do Youtube" />
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h2>Sobre o Monumento</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col">                        
                        <textarea name="sobre" id="txt_sobre" class="form-control" placeholder="História do Monumento"></textarea>
                        <div class="qtde_caracteres">Quantidade de palavras: <b>0</b></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">                        
                        <textarea name="como_chegar" id="txt_como_chegar" class="form-control" placeholder="Como chegar ao local?"></textarea>
                        <div class="qtde_caracteres">Quantidade de palavras: <b>0</b></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h2>Curiosidades</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col">                        
                        <textarea name="curiosidade_1" id="txt_curiosidade_1" class="form-control" placeholder="Curiosidade 1"></textarea>
                        <div class="qtde_caracteres">Quantidade de palavras: <b>0</b></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">                        
                        <textarea name="curiosidade_2" id="txt_curiosidade_2" class="form-control" placeholder="Curiosidade 2"></textarea>
                        <div class="qtde_caracteres">Quantidade de palavras: <b>0</b></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">                        
                        <textarea name="curiosidade_3" id="txt_curiosidade_3" class="form-control" placeholder="Curiosidade 3"></textarea>
                        <div class="qtde_caracteres">Quantidade de palavras: <b>0</b></div>
                    </div>
                </div>
               <div class="row">
                    <div class="col">
                        <input type="submit" value="Gerar Postagem" id="btn_gerar_postagem" class="btn btn-primary btn-lg" />
                        <input type="hidden" name="conteudo" id="conteudo" value="monumentos" />
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <input type="reset" value="Limpar Campos" id="btn_limpar_campos" class="btn btn-danger btn-lg" />
                    </div>
                </div>     
                            
</form>     