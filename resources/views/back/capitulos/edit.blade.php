@extends("app")

@section("contenido")

    <div class="row">
        <div class="col-md-12 text-right">
            <a href="/admin-capitulos-anime?idAnime={{$capitulo->anime_id}}" class="btn btn-success">Regresar</a>
        </div>
        
    </div>

    <div class="row">
        <div class="col-md-6 offset-md-3">
            <form action="{{url('/admin-capitulos-anime/'.$capitulo->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                {{ method_field('PATCH')}}
                @include('back.capitulos.form')
            </form>
        </div>
    </div>

@stop