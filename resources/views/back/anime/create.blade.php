@extends("app")

@section("contenido")

    <div class="row">
        <div class="col-md-12 text-right">
            <a href="/admin-list-anime" class="btn btn-success">Regresar</a>
        </div>

    </div>

    <div class="row">
        <div class="col-md-6 offset-md-3">
            <form action="{{route('admin-list-anime.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('back.anime.form')
            </form>
        </div>
    </div>

@stop