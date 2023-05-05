<div class="form-group">
    <label for="titulo" style="color: white">Título</label>
    <input type="text" value="{{ isset($anime) ? $anime->titulo : '' }}" required name="titulo" class="form-control" id="titulo" aria-describedby="titulo" placeholder="Ingresa Título">
    <small id="titulo" class="form-text text-muted">Aquí va el título del anime</small>
</div>

<div class="form-group">
    <label for="descripcion" style="color: white">Descripción</label>
    <textarea class="form-control" name="descripcion" required >{{ isset($anime) ? $anime->descripcion : ''}} </textarea>
    <small id="Descripción" class="form-text text-muted">Descripción del Anime</small>
</div>

@isset($anime)
<div class="form-group">
    <img src="{{asset("poster_anime/" . $anime->imagen)}}">
</div>
@endisset

<div class="form-group">
    <label for="poster" style="color: white">Poster</label>
    
    @if(isset($anime))
        <input type="file" class="form-control" id="poster" aria-describedby="poster" name="imagen">
    @else
        <input type="file" class="form-control" id="poster" aria-describedby="poster" name="imagen" required>
    @endif

    <small id="poster" class="form-text text-muted">Aquí va el poster</small>
</div>

<button type="submit" class="btn btn-primary">Guardar</button>