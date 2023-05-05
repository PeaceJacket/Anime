@extends("app")

@section("contenido")

    <div class="row">
        <div class="col-md-12 text-right">
            <a href="/admin-capitulos-anime?idAnime={{$anime_id}}" class="btn btn-success">Regresar</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 offset-md-3">
            <form action="{{route('admin-capitulos-anime.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('back.capitulos.form')
            </form>
        </div>
    </div>

@stop