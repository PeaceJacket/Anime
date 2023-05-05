<div class="form-group">
    <label for="titulo" style="color: white">Título</label>
    <input type="text" value="{{ isset($capitulo) ? $capitulo->titulo : '' }}" required name="titulo" class="form-control" id="titulo" aria-describedby="titulo" placeholder="Ingresa Título" maxlength="50">
    <small id="titulo" class="form-text text-muted">Aquí va el título del episodio</small>
</div>

<div class="form-group">
    <label for="episodio" style="color: white">No. Episodio</label>
    <input type="number" value="{{ isset($capitulo) ? $capitulo->episodio : '' }}" required name="episodio" class="form-control" id="episodio" aria-describedby="episodio" placeholder="Ingresa Episodio">
    <small id="episodio" class="form-text text-muted">Aquí va el episodio del episodio</small>
</div>

<div class="form-group">
    <label for="descripcion" style="color: white">Descripción</label>
    <textarea required name="descripcion" class="form-control" id="descripcion" aria-describedby="descripcion"  maxlength="1000">{{ isset($capitulo) ? $capitulo->descripcion : '' }}</textarea>
    <small id="descripcion" class="form-text text-muted">Aquí va la descripción del episodio</small>
</div>

<div class="form-group">
    <label for="video" style="color: white">Video</label>
    
    @if(isset($capitulo))
        <br>
        <span class="text-white">{{$capitulo->video}}<span>
        <input type="file" accept="video/mp4,video/x-m4v,video/*" class="form-control" id="video" aria-describedby="video" name="video">
    @else
        <input type="file" accept="video/mp4,video/x-m4v,video/*" class="form-control" id="video" aria-describedby="video" name="video" required>
    @endif

    <small id="video" class="form-text text-muted">Aquí va el video</small>
</div>

<div class="form-group">
    <input type="hidden" value="{{isset($anime_id) ? $anime_id : $capitulo->anime_id}}" name="anime_id">
</div>

<button type="submit" class="btn btn-primary">Guardar</button>