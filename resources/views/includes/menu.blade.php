<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="{{URL::to('/Home')}}"><h5><b>MyReads COLTEC</b></h5></a>
        <ul class="navbar-nav mr-auto "></ul>   
        
        <div class="search-container">
            <form action="{{URL::to('/pesquisar')}}">
                <input type="text" placeholder="Buscar obras por nome, autor e editora" name="busca">
                <button id="searchbutton" type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
        
        <h5 id="titleuser">Bom dia!</h5>
        <a href="/sair" class="btn btn-outline-success" type="button">Log Out</a>
</nav>