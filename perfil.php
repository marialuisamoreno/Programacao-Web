<?php
$servername = "localhost";
$database = "209611";
$username = "209611";
$password = "1005roger";
// Create connection
$db_conn = mysqli_connect($servername, $username, $password, $database);

// GET do usuario
$user = $_GET['username'];

// Select the user's animes on the database
$query_select = "SELECT 
                    AN.titulo,
                    AN.descricao,
                    AN.total_episodios,
                    AN.avaliacao,
                    UA.id AS id_relacao
                 FROM Relacao_Usuario_Anime UA 
                    LEFT JOIN 
                 Animes AN ON UA.titulo_anime = AN.titulo 
                 WHERE UA.login_usuario = '".$user."' 
                 ORDER BY UA.id";
$rs_select = mysqli_query($db_conn, $query_select);
$html = "";
while ($row = mysqli_fetch_assoc($rs_select)){
    $html .= "<tr>";
    $html .= "<th scope='row'>".$row['id']."</th>";
    $html .= "<td>".$row['titulo']."</td>";
    $html .= "<td>".$row['descricao']."</td>";
    $html .= "<td>".$row['total_episodios']."</td>";
    $html .= "<td>".$row['avaliacao']."</td>";
    $html .= "<td align='center'><input type='checkbox' class='form-check-input remove' value='".$row['id_relacao']."'></td>";
    $html .= "</tr>";
}

// Select de todos os animes cadastrados
$anime_list = "";
$query_select = "SELECT * FROM Animes ORDER BY id";
$rs_select = mysqli_query($db_conn, $query_select);
while ($row = mysqli_fetch_assoc($rs_select)){
    $anime_list .= "<option value='".$row['titulo']."'>".$row['titulo']."</option>";
}

mysqli_close($db_conn);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Perfil</title>
    <link rel="icon" type="image/png" href="favicon_sushi.png" />
    <!--Bootstrap CSS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" />
</head>

<body>
    <input type="hidden" id="username" name="username" value="<?php echo $user ;?>">
    <!-- Modal Add Anime -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Adicionar Anime</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                <div class="form-group">
                    <label for="titulo_update" class="col-form-label">Titulo:</label>
                    <select class="filter Arial_14_Preto" name="titulo_update" id="titulo_update" style="width:450px;">
                        <option></option>
                        <?php echo $anime_list; ?>
                    </select>
                </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary" id="addAnime">Adicionar</button>
            </div>
            </div>
        </div>
    </div>
    <!--Navbar do Bootstrap-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="http://sushidetempura.ueuo.com/about.html">
            <img src="favicon_sushi.png" width="30" height="30" class="d-inline-block align-top"> Sushi de Tempura!
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="http://sushidetempura.ueuo.com/menu.html">Home</a>
                <a class="nav-item nav-link" href="mailto:marialuisasmoreno@hotmail.com">Contato</a>
            </div>
        </div>
    </nav>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-auto">
                <img src="profile_image.png">
            </div>
            <div class="col">
                <h1>Meus Animes!</h1>
                <p> Estes sao os animes vinculados a sua conta! Sinta-se livre para adicionar ou remover titulos de sua lista.<br>
                    Para adicionar, clique no botao "Add Anime" e escolha um anime pre existente no catalago. Caso nao tenha o titulo que procura, adicione-o na pagina de <a href="http://sushidetempura.ueuo.com/catalogo.php">Catalogo</a> do site.<br>
                    Para remover, selecione a checkbox do anime desejado e clique em "Remover Anime".
                </p>
                <p><br>Lista atual:</p>
            </div>
        </div>
        <br>
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Anime</th>
                        <th scope="col">Descricao</th>
                        <th scope="col">Total de episodios</th>
                        <th scope="col">Pontuacao</th>
                        <th scope="col">Remover</th>
                    </tr>
                </thead>
                <tbody>
                    <? echo $html; ?>
                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="col">
                <button type="button" class="btn btn-success" data-toggle='modal' data-target='#exampleModal'>Add Anime</button>
            </div>
            <div class="col">
                <button id="btn_remove" type="button" class="btn btn-secondary" align="right">Remover Anime</button>
            </div>
        </div>
    </div>
</body>

</html>

<script>
    $(document).ready(function(){
        $("#titulo_update").select2({
            placeholder: "Select",
            allowClear: true
        });
    });

    $("#addAnime").click(function() {
        var titulo = document.getElementById("titulo_update").value;
        var username = document.getElementById("username").value;

        $.ajax({
            url: "addAnimeUsuario.php?titulo="+titulo+"&username="+username
        });

        setTimeout(function(){ 
            window.location.reload();
        }, 1500);
    });
    
    $("#btn_remove").click(function() {
        var ids = "";
        $(".remove").each(function(){
            if($(this).is(":checked")){
                ids += String($(this).val()) + "-";
            }
        });

        $.ajax({
            url: "removeAnimeUsuario.php?id="+ids
        });

        setTimeout(function(){ 
            window.location.reload();
        }, 1500);
    });
</script>
