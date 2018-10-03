
 <nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand" href="{{URL::to('/Home')}}">MyReads COLTEC</a>
    <button class="navbar-toggler" id="botaomenu" type="button" data-target="#sidebar" >
      <span class="navbar-toggler-icon"></span>
    </button>
   
    <div id="custom-search-input">
        <div class="input-group">
            <form action="{{URL::to('/pesquisar')}}" id="formsearch">
                <input name="busca" type="text" class="form-control input-lg" placeholder="Nome,autor e editora..." />
            </form>
        </div>
    </div>

    <h5 id="titleuser">Bom dia!</h5>
    <a href="/sair" id="logoutButton" class="btn btn-outline-success" type="button">Log Out</a>
</nav>

