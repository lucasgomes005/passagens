<form action="conteudo.php" method="post">
    
                <div class="row">
                    <div class="col">                        
                        <h2>Dados da Cachoeira</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col">                        
                        <input type="text" name="nome_cachoeira" id="txt_nome_cachoeira" class="form-control" placeholder="Nome da Cachoeira" />
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
                        <input type="text" name="altura" id="txt_altura" class="form-control" placeholder="Altura da Cachoeira" />
                    </div>
                </div>
                <div class="row">
                    <div class="col">                        
                        <input type="text" name="localizacao" id="txt_localizacao" class="form-control" placeholder="Onde está localizado?" />
                    </div>
                </div>
                <div class="row">
                    <div class="col">                        
                        <input type="text" name="km" id="txt_km" class="form-control" placeholder="Quantos km até o início do local?" />
                    </div>
                </div>
                <div class="row">
                    <div class="col">                        
                        <input type="text" name="youtube" id="txt_youtube" class="form-control" placeholder="Linx Youtube" />
                    </div>
                </div>
                <div class="row">
                    <div class="col">                        
                        <h2>Sobre a Cachoeira</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col">                        
                        <input type="text" name="fauna" id="txt_fauna" class="form-control" placeholder="Fauna" />
                    </div>
                </div>
                <div class="row">
                    <div class="col">                        
                        <input type="text" name="flora" id="txt_flora" class="form-control" placeholder="Flora" />
                    </div>
                </div>
                <div class="row">
                    <div class="col">                        
                        <textarea name="sobre" id="txt_sobre" class="form-control" placeholder="Sobre a Cachoeira"></textarea>
                        <div class="qtde_caracteres">Quantidade de palavras: <b>0</b></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">                        
                        <textarea name="como_chegar" id="txt_como_chegar" class="form-control" placeholder="Como chegar até a cachoeira?"></textarea>
                        <div class="qtde_caracteres">Quantidade de palavras: <b>0</b></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">                        
                        <textarea name="link_maps" id="txt_link_maps" class="form-control" placeholder="Aidcione o Link do Google Maps"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <input type="submit" value="Gerar Postagem" id="btn_gerar_postagem" class="btn btn-primary btn-lg" />
                        <input type="hidden" name="conteudo" id="conteudo" value="cachoeiras" />
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <input type="reset" value="Limpar Campos" id="btn_limpar_campos" class="btn btn-danger btn-lg" />
                    </div>
                </div> 
                              
</form>     