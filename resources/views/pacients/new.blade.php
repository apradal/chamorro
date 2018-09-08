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
                    <h2><?php echo __('Crea/Edita usuarios'); ?></h2>
                    {!! Form::open(['url' => '/pacients/create', 'method' => 'GET']) !!}
                    {{--{{Form::label('name', 'Nombre: ')}}--}}
                    {{Form::text('name', '', ['placeholder' => 'Nombre: ', 'maxlength' => '30'])}}
                    {{--{{Form::label('lastname', 'Apellidos: ')}}--}}
                    {{Form::text('lastname', '', ['placeholder' => 'Apellidos: '])}}
                    {{--{{Form::label('phone', 'Teléfono: ')}}--}}
                    {{Form::text('phone', '', ['placeholder' => 'Teléfono: '])}}
                    {{Form::submit('Crear')}}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection