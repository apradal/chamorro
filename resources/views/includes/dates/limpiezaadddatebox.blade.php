<div id="limpieza-date-box-add" class="hidden">
    <i class="fa fa-times-circle icon" id="limpieza-date-box-close" data-box="#limpieza-date-box-add"></i>
    {!! Form::open(['url' => '/nextdate/addTreatment', 'method' => 'POST']) !!}
    <label for="next_date"><?php echo __('Fecha Próxima cita:') ?></label>
    <input type="date" name="next_date" id="next_date" value="<?php echo Carbon\Carbon::now()->format('Y-m-d'); ?>">
    <br>
    <input type="hidden" name="treatment" id="treatment" value="limpieza">
    <input name="paciente_id" id="paciente_id" type="hidden" value="<?php if (isset($pacient)) echo $pacient->id; ?>">
    {{Form::hidden('_token', csrf_token())}}
    <br>
    {{Form::submit('Añadir')}}
    {!! Form::close() !!}
</div>