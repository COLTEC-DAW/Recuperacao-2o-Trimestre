@extends('template.templatecomum')

@section('padrao')

            @foreach($obras as $obrasp)
            {{ csrf_field() }}
                <div class="list-group col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <h4 class="mb-1">{{$obrasp->nome}}</h4>
                        </div>
                        <p class="mb-1">{{$obrasp->resumo}}</p> 
                        <br/>
                        <small>{{$obrasp->autor}}</small>
                        <div class="d-flex w-100 justify-content-between">
                            <h6>Editora:</h6>
                            <small> {{$obrasp->editora}}</small>
                            <small>Número de exemplares disponíveis: {{$obrasp->exemplares}}</small>
                        </div>
                    </a>
                </div>
                <br/>
            @endforeach

            <div class="list-group">
  <a href="#" class="list-group-item list-group-item-action flex-column align-items-start active">
    <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1">List group item heading</h5>
      <small>3 days ago</small>
    </div>
    <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
    <small>Donec id elit non mi porta.</small>
  </a>
  <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
    <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1">List group item heading</h5>
      <small class="text-muted">3 days ago</small>
    </div>
    <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
    <small class="text-muted">Donec id elit non mi porta.</small>
  </a>
  <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
    <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1">List group item heading</h5>
      <small class="text-muted">3 days ago</small>
    </div>
    <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
    <small class="text-muted">Donec id elit non mi porta.</small>
  </a>
</div>




@endsection
