@extends('layouts.app')
@section('content')
    <div class="container">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
            @endforeach
        @endif
        @if(session('message'))
            <div id="message" class="alert alert-success">{{session('message')}}</div>
        @endif
        <div class="row">
            <div class="col-md-6 col-xs-12">
                <div class="form" id="search-pacient-form">
                    {!! Form::open(['url' => '/pacients/create', 'method' => 'GET']) !!}
                    {{Form::label('pacient', 'Paciente: ')}}
                    {{Form::text('pacient', '', ['placeholder' => 'Antonio Prada, ...', 'maxlength' => '40'])}}
                    {{Form::hidden('pacient_id', '')}}
                    {{Form::hidden('_token', csrf_token())}}
                    {{Form::submit('Cargar')}}
                    {!! Form::close() !!}
                </div>
                <br/>
                <br/>
                <ul id="pacients-list"></ul>
                @if(!empty($pacient))
                    <h2>Ficha del paciente: {{ $pacient['name'] }}</h2>
                @endif
            </div>
            <div class="col-md-6 col-xs-12">
                tratamientos
            </div>
        </div>
    </div>
    <script src="{{asset('js/pacients/pacients.js')}}"></script>
@endsection