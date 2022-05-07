$(document).ready(function () {
    $('textarea').change(function () {
        var campo_texto = "#" + $(this).attr('id');
        //alert(campo_texto);
        $(campo_texto + " + .qtde_caracteres b").each(function () {
            var valor_campo = $(campo_texto).val();
            if (valor_campo == "") {
                $(this).text("0");
            } else {
                var valor_vetor = valor_campo.split(" ");
                var cont = 0;
                for (var i = 0; i < valor_vetor.length; i++) {
                    //$(this).append('<div>Posição '+i+': Valor: '+loja_vetor[i]+'</div>');
                    cont++;
                }
                $(this).text(cont);
            }
        });
    });
    
    $('#btn_limpar_campos').click(function(){
        $('.qtde_caracteres b').text("0");
    });
    
});