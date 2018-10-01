
 <nav class="navbar navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidebar" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="{{URL::to('/Home')}}"><h5><b>MyReads COLTEC</b></h5></a>

    <div id="custom-search-input">
        <div class="input-group">
            <form action="{{URL::to('/pesquisar')}}" method="post">
                <input name="busca" type="text" class="form-control input-lg" placeholder="Nome,autor e editora..." />
            </form>
        </div>
    </div>

    <h5 id="titleuser">Bom dia!</h5>
    <a href="/sair" id="logoutButton" class="btn btn-outline-success" type="button">Log Out</a>
</nav>

