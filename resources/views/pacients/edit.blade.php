@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">{{ $error }}</div>
                    @endforeach
                @endif
                <?php if (isset($pacient)) : ?>
                    <div class="form" id="edit-pacient-form">
                        <h2><?php echo __('Editar paciente'); ?></h2>
                        {!! Form::open(['url' => '/pacients/edit', 'method' => 'GET']) !!}
                        {{Form::text('name', $pacient->name, ['placeholder' => 'Nombre: ', 'maxlength' => '30'])}}
                        {{Form::text('lastname', $pacient->lastname, ['placeholder' => 'Apellidos: '])}}
                        {{Form::text('phone', $pacient->phone, ['placeholder' => 'Teléfono: '])}}
                        {{Form::hidden('_token', csrf_token())}}
                        {{Form::hidden('id', $pacient->id)}}
                        <br>
                        {{Form::submit('Editar')}}
                        {!! Form::close() !!}
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
@endsection