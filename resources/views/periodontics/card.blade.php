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
            <h2><?php echo __('Ficha Periodontal')?></h2>
            <div class="col-xs-12">
                <div class="form" id="search-pacient-form">
                    {!! Form::open(['url' => '/periodontics/card', 'method' => 'GET']) !!}
                    {{Form::label('pacient', 'Paciente: ')}}
                    @if(!empty($pacient))
                        {{Form::text('pacient', $pacient->name . ' ' . $pacient->lastname, ['maxlength' => '40'])}}
                        {{Form::hidden('pacient_id', $pacient->id)}}
                    @else
                        {{Form::text('pacient', '', ['placeholder' => 'Antonio Prada, ...', 'maxlength' => '40'])}}
                        {{Form::hidden('pacient_id', '')}}
                    @endif
                    {{Form::hidden('_token', csrf_token())}}
                    {{Form::submit('Cargar')}}
                    {!! Form::close() !!}
                </div>
                <br/>
                <br/>
            </div>
            <div class="col-xs-12">
                Empieza el formulario
            </div>
        </div>
    </div>
    <script src="{{asset('js/pacients/pacients.js')}}"></script>
@endsection