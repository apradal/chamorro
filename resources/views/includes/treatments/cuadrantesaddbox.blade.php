<div id="cuadrante-box-add" class="hidden">
    <i class="fa fa-times-circle icon" id="cuadrante-box-close"></i>
    {!! Form::open(['url' => '/cuadrante/add', 'method' => 'POST']) !!}
    <label for="pattern"><?php echo __('Cuadrante: ') ?></label>
    <input type="radio" name="pattern" value="cuadrante1">
    <svg class="svg-cuadrante cuadrante1" height="15" width="37">
        <polyline points="0,10 30,10 30,0" style="fill:#fff;stroke:#000;stroke-width:2" />
    </svg>
    <input type="radio" name="pattern" value="cuadrante2">
    <svg class="svg-cuadrante cuadrante2" height="15" width="37">
        <polyline points="1,0 1,10 30,10" style="fill:#fff;stroke:#000;stroke-width:2" />
    </svg>
    <input type="radio" name="pattern" value="cuadrante3">
    <svg class="svg-cuadrante cuadrante3" height="15" width="37">
        <polyline points="0,1 30,1 30,10" style="fill:#fff;stroke:#000;stroke-width:2" />
    </svg>
    <input type="radio" name="pattern" value="cuadrante4">
    <svg class="svg-cuadrante cuadrante4" height="15" width="37">
        <polyline points="1,10 1,1 30,1" style="fill:#fff;stroke:#000;stroke-width:2" />
    </svg>
    <br>
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