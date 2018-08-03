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
                    {!! Form::open(['url' => '/pacients/create', 'method' => 'GET']) !!}
                    {{Form::label('name', 'Nombre: ')}}
                    {{Form::text('name', '', ['placeholder' => 'Antonio, José*', 'maxlength' => '30'])}}
                    {{Form::label('lastname', 'Apellidos: ')}}
                    {{Form::text('lastname', '')}}
                    {{Form::label('phone', 'Teléfono: ')}}
                    {{Form::text('phone', '')}}
                    {{Form::submit('Crear')}}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection