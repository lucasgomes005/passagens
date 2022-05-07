<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Gerador de Passagens Aéreas - Versao 1.0</title>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="icon" type="image/x-icon" href="img/favicon.ico">
    </head>
    <body>
        <div class="container">
            <h1>Gerador de Passagens Aéreas - Versão 1.2</h1>

            <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#home">Promoções de Passagens</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#menu1">Destinos</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#menu2">Praias</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#menu3">Reservas Naturais</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#menu4">Monumentos</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#menu5">Cachoeiras</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#menu6">Link Building</a></li>
            </ul>

            <div class="tab-content">
                <div id="home" class="show tab-pane fade in">
                    <?php include "forms/promocoes.php" ?>                     
                </div>
                <div id="menu1" class="tab-pane fade in">
                    <?php include "forms/destinos.php"; ?> 
                </div>
                <div id="menu2" class="tab-pane fade in">
                    <?php include "forms/praias.php"; ?> 
                </div>
                <div id="menu3" class="tab-pane fade in">
                    <?php include "forms/reservas_naturais.php"; ?> 
                </div>
                <div id="menu4" class="tab-pane fade in">
                    <?php include "forms/monumentos.php"; ?> 
                </div>
                <div id="menu5" class="tab-pane fade in">
                    <?php include "forms/cachoeiras.php"; ?> 
                </div>
                <div id="menu6" class="tab-pane fade in">
                    <?php include "forms/link_building.php"; ?> 
                </div>
            </div>     
            
        </div>  
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
        <script src="js/bootstrap.min.js" ></script>
        <script src="js/scripts.js"></script>
    </body>
</html>