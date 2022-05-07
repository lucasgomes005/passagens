<form action="conteudo.php" method="post">
    
                <div class="row">
                    <div class="col">
                        <h2>Dados do Reserva Natural </h2>
                    </div>
                </div>                   
                <div class="row">
                    <div class="col">                        
                        <input type="text" name="nome_reserva_natural" id="txt_nome_reserva_natural" class="form-control" placeholder="Nome do Monumento" />
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
                        <input type="text" name="horario_funcionamento" id="txt_horario_funcionamento" class="form-control" placeholder="Horario de Funcionamento" />
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
                        <input type="text" name="localizacao" id="txt_localizacao" class="form-control" placeholder="Qual a localização" />
                    </div>
                </div>
                <div class="row">
                    <div class="col">                        
                        <input type="text" name="youtube" id="txt_youtube" class="form-control" placeholder="Link do Youtube" />
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h2>Sobre a Reserva Natural</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col">                        
                        <textarea name="sobre" id="txt_sobre" class="form-control" placeholder="História da Reserva Natural"></textarea>
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
                        <textarea name="link_maps" id="txt_link_maps" class="form-control" placeholder="Link no Google Maps"></textarea>
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
                        <input type="hidden" name="conteudo" id="conteudo" value="reservas_naturais" />
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <input type="reset" value="Limpar Campos" id="btn_limpar_campos" class="btn btn-danger btn-lg" />
                    </div>
                </div>  
   
</form>     