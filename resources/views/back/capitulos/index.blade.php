@extends("app")

@section("contenido")

<div class="row" style="padding-top; 20px; padding-bottom: 20px">
    <div class="col-md-12">
        <div class="section-title">
            <h4>Capítulos {{$anime->titulo}}</h4>
        </div>
    </div>

    <div class="col-md-12 text-right">
        <a href="admin-capitulos-anime/create?anime_id={{$anime_id}}" type="button" class="btn btn-success">Nuevo</a>
    </div>

    <div class="col-md-12">
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Episodio</th>
                    <th>Descripción</th>
                    <th>Video</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($capitulos as $capitulo)
                <tr>
                    <td>{{$capitulo->id}}</td>
                    <td>{{$capitulo->titulo}}</td>
                    <td>{{$capitulo->episodio}}</td>
                    <td>{{$capitulo->descripcion}}</td>
                    <td>

                        <video width="320" height="240" controls>
                            <source src="capitulo_anime/{{$capitulo->video}}" type="video/mp4">
                          Your browser does not support the video tag.
                        </video>
                        <br>
                        {{$capitulo->video}}
                    
                    </td>
                    <td>
                        <a href="{{ route('admin-capitulos-anime.edit', $capitulo->id)}}" class="btn btn-info">Editar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@stop