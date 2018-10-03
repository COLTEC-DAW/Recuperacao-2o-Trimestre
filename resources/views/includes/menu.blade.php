
 <nav class="navbar navbar-dark bg-dark">
    <button class="navbar-toggler" id="botaomenu" type="button" data-target="#sidebar" >
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="{{URL::to('/Home')}}"><h5><b>MyReads COLTEC</b></h5></a>

    <div id="custom-search-input">
        <div class="input-group">
            <form action="{{URL::to('/pesquisar')}}" id="formsearch">
                <input name="busca" type="text" class="form-control input-lg" placeholder="Nome,autor e editora..." />
            </form>
        </div>
    </div>

    <h5 id="titleuser">Bom dia! <?php echo $_SESSION["logado"] ?></h5>
    <a href="/sair" id="logoutButton" class="btn btn-outline-success" type="button">Log Out</a>
</nav>

