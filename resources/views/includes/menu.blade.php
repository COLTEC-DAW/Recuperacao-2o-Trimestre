<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="{{URL::to('/Home')}}"><h5><b>MyReads COLTEC</b></h5></a>
        <ul class="navbar-nav mr-auto "></ul>   
              
        <div id="custom-search-input">
            <div class="input-group col-md-12 ">
                <form action="{{URL::to('/pesquisar')}}" method="post">
                    <input name="busca" type="text" class="form-control input-lg" placeholder="Nome,autor e editora..." />
                </form>
            </div>
        </div>
        
        <h5 id="titleuser">Bom dia!</h5>
        <a href="/sair" class="btn btn-outline-success" type="button">Log Out</a>
</nav>