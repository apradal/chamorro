<div id="cuadrante-box-add" class="hidden">
    <i class="fa fa-times-circle icon" id="cuadrante-box-close"></i>
    {!! Form::open(['url' => '/cuadrantes/add', 'method' => 'POST']) !!}
    <input type="radio" name="pattern" value="dibujo1">dibujo1
    <input type="radio" name="pattern" value="dibujo2">dibujo2
    <input type="radio" name="pattern" value="dibujo3">dibujo3
    <input type="radio" name="pattern" value="dibujo4">dibujo4
    <br>
    <label for="cuadrante-date"><?php echo __('Fecha:') ?></label>
    <input type="date" name="cuadrante-date" id="cuadrante-date">
    <br>
    <textarea placeholder="Observaciones: ..." id="obs-cuadrante" name="obs-cuadrante"></textarea>
    {{Form::hidden('_token', csrf_token())}}
    <br>
    {{Form::submit('Añadir')}}
    {!! Form::close() !!}
</div>