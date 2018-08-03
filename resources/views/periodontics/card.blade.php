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
                @if(session('message'))
                    <div id="message" class="alert alert-success">{{session('message')}}</div>
                @endif
                <h1>Ficha periodontal</h1>
                @if(!empty($pacient))
                    <h2>Ficha del paciente: {{ $pacient['name'] }}</h2>
                @endif
            </div>
        </div>
    </div>
@endsection