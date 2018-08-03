@extends('layouts.app')
@section('content')
    <div class="container">
        @if(session('message'))
            <div id="message" class="alert alert-success">{{session('message')}}</div>
        @endif
        <div class="row">
            <div class="col-sm-6 col-xs-12">
                <div class="generic-squares">
                    <a href="{{ url('/pacients/new') }}"><?php echo __('Nuevo Paciente')?></a>
                </div>
            </div>
            <div class="col-sm-6 col-xs-12">
                <div class="generic-squares">
                    <a href="{{ url('/periodontics/card') }}"><?php echo __('Ficha perdiodontal')?></a>
                </div>
            </div>
        </div>
    </div>
@endsection