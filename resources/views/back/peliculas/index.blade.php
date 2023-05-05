@extends("app")

@section("contenido")

<div class="row" style="padding-top; 20px; padding-bottom: 20px">
    <div class="col-md-12">
        <div class="section-title">
            <h4>Peliculas</h4>
        </div>
    </div>

    <div class="col-md-12 text-right">
        <a href="admin-list-peliculas/create" type="button" class="btn btn-success">Nuevo</a>
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
                @foreach($peliculas as $peliculas_individual)
                <tr>
                    <td>{{$peliculas_individual->id}}</td>
                    <td>{{$peliculas_individual->titulo}}</td>
                    <td>{{$peliculas_individual->descripcion}}</td>
                    <td><img src="poster_peliculas/{{$peliculas_individual->imagen}}"></td>
                    <td><a href="{{ route('admin-list-peliculas.edit', $peliculas_individual->id)}}" class="btn btn-info">Editar</a></td>                    
                </tr>
                @endforeach
            </tbody>  
        </table>  
    </div>
</div>              

@stop