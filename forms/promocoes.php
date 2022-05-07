<form action="redirecionar.php" method="post">
                <div class="row">
                    <div class="col">
                        <p>Adicione aqui cada promoção para que possa ser gerado as promoções:</p>
                    </div>
                </div> 
                <div class="row">
                    <div class="col">
                        <div class="col">                        
                            <p>Habilitar postagens automáticas para API REST</p>                        
                        </div>
                        <div class="col">                        
                            <label class="radio-inline">
                              <input type="radio" name="gerador" value="sim"> Sim
                            </label>                        
                        </div>
                        <div class="col">                        
                            <label class="radio-inline">
                              <input type="radio" name="gerador" value="nao"> Não
                            </label>                       
                        </div>
                    </div>                      
                </div>
                <div class="row">
                    <div class="col">                        
                        <input type="text" name="qtdePostAutomatico" id="qtdePostAutomatico" class="form-control" placeholder="Se sim, quantas postagens você quer?" />
                    </div>
                </div> 
                <div class="row">
                    <div class="col">                        
                        <p>Esta promoção é referente a qual companhia?</p>                        
                    </div>
                    <div class="col">                        
                        <label class="radio-inline">
                          <input type="radio" name="saudacao" value="geral"> Geral
                        </label>                        
                    </div>
                    <div class="col">                        
                        <label class="radio-inline">
                          <input type="radio" name="saudacao" value="gol"> Gol
                        </label>                       
                    </div>
                    <div class="col">                        
                        <label class="radio-inline">
                          <input type="radio" name="saudacao" value="latam"> Latam
                        </label>                        
                    </div>
                    <div class="col">                        
                        <label class="radio-inline">
                          <input type="radio" name="saudacao" value="azul"> Azul
                        </label>                        
                    </div>
                </div>                
                <div class="row">
                    <div class="col">                        
                        <input type="text" name="palavra_chave" id="txt_palavra_chave" class="form-control" placeholder="Qual a palavra chave?" />
                    </div>
                </div>            
                <div class="row">
                    <div class="col">                        
                        <textarea name="passagens" id="txt_passagens" class="form-control" placeholder="Adicione as passagens aqui ..." /></textarea>
                        <div class="qtde_caracteres">Quantidade de palavras: <b>0</b></div>
                    </div>
                </div>                
                <div class="row">
                    <div class="col">                        
                        <select name="qual_promocao" id="combobox_promocao" class="form-control">
                            <option value="selecione">Selecione ... </option>
                            <option value="viajanet_desc">Viajanet c/ Desconto - COMPLETO</option>                       
                            <option value="portal_gol">Portal GOL - COMPLETO</option>
                            <option value="portal_azul">Portal Azul - COMPLETO</option>
                            <option value="portal_latam">Portal Latam - COMPLETO</option>
                            <option value="passagens_imperdiveis">Passagens Imperdíveis</option>
                            <option value="cvc">Portal CVC</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col">                        
                        <input type="text" name="link" id="txt_link" class="form-control" placeholder="Link da Promoção" />
                    </div>
                </div>   
                <div class="row">
                    <div class="col">
                        <input type="submit" value="Armazenas Passagens" id="btn_armazenar_passagens" class="btn btn-primary btn-lg" />
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <input type="reset" value="Limpar Campos" id="btn_limpar_campos" class="btn btn-danger btn-lg" />
                    </div>
                </div>
</form>     