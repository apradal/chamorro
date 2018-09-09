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
                <div class="form" id="create-pacient-form">
                    <h2><?php echo __('Alta de nuevos pacientes'); ?></h2>
                    {!! Form::open(['url' => '/pacients/create', 'method' => 'GET']) !!}
                    {{Form::text('name', '', ['placeholder' => 'Nombre: ', 'maxlength' => '30'])}}
                    {{Form::text('lastname', '', ['placeholder' => 'Apellidos: '])}}
                    {{Form::text('phone', '', ['placeholder' => 'Teléfono: '])}}
                    {{Form::submit('Crear')}}
                    {!! Form::close() !!}
                </div>
            </div>
            <div class="col-xs-12">
                <div class="form" id="edit-pacient-form">
                    <h2><?php echo __('Edita información de pacientes'); ?></h2>
                    {!! Form::open(['url' => '/pacients/edit', 'method' => 'GET']) !!}
                    <input placeholder="Buscar Paciente: " maxlength="40" id="pacient" name="pacient" type="text"
                           value="<?php echo (isset($pacient)) ? $pacient->name . ' ' . $pacient->lastname : ''; ?>" class="ui-autocomplete-input" autocomplete="off">
                    {{Form::hidden('_token', csrf_token())}}
                    {{Form::submit('Editar')}}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('js/pacients/pacients.js')}}"></script>
@endsection