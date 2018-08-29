<div id="revision-box-add" class="hidden">
    <i class="fa fa-times-circle icon" id="revision-box-close"></i>
    {!! Form::open(['url' => '/revision/add', 'method' => 'POST']) !!}
    <label for="date"><?php echo __('Fecha:') ?></label>
    <input type="date" name="date" id="date" value="<?php echo Carbon\Carbon::now()->format('Y-m-d'); ?>">
    <br>
    <textarea placeholder="Observaciones: ..." id="observations" name="observations"></textarea>
    <input name="paciente_id" id="paciente_id" type="hidden" value="<?php if (isset($pacient)) echo $pacient->id; ?>">
    {{Form::hidden('_token', csrf_token())}}
    <br>
    {{Form::submit('Añadir')}}
    {!! Form::close() !!}
</div>