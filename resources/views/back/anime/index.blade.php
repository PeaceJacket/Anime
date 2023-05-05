@extends("app")

@section("contenido")

<div class="row" style="padding-top; 20px; padding-bottom: 20px">
    <div class="col-md-12">
        <div class="section-title">
            <h4>Animes</h4>
        </div>
    </div>

    <div class="col-md-12 text-right">
        <a href="admin-list-anime/create" type="button" class="btn btn-success">Nuevo</a>
    </div>

    <div class="col-md-12">
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Descripción</th>
                    <th>Imagen</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($anime as $anime_individual)
                <tr>
                    <td>{{$anime_individual->id}}</td>
                    <td>{{$anime_individual->titulo}}</td>
                    <td>{{$anime_individual->descripcion}}</td>
                    <td><img src="poster_anime/{{$anime_individual->imagen}}"></td>
                    <td>
                        <a href="{{ route('admin-list-anime.edit', $anime_individual->id)}}" class="btn btn-info">Editar</a>
                        <br><br>
                        <a href="admin-capitulos-anime?idAnime={{$anime_individual->id}}" class="btn btn-success">Capitulos</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@stop