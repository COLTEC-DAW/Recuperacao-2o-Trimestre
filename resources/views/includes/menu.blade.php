<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="{{URL::to('/Home')}}">MyReads COLTEC</a>
    <button class="navbar-toggler" id="botaomenu" type="button" data-target="#sidebar" >
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent">
            <span class="navbar-toggler-icon"></span>
        </button>
        <ul class="navbar-nav mr-auto"> 
        </ul>
        <form class="form-inline my-2 my-lg-0" action="{{URL::to('/pesquisar')}}" id="formsearch">
            <input class="form-control mr-sm-2" type="busca" placeholder="Nome,autor e editora..." aria-label="Search">
        </form>
        <span id="ola" class="navbar-text">
            Olá,usuário!
        </span>
        <a href="/sair" id="logoutButton" class="btn btn-outline-success my-2 my-sm-0" type="submit">Logout</a>
    </div>
</nav>


