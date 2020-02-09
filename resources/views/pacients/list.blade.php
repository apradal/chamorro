@extends('layouts.app')
@section('content')
    <div class="container">
        <h1 class="page-title"><?php echo __('Listado de Pacientes')?></h1>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
            @endforeach
        @endif
        @if(session('message'))
            <div id="message" class="alert alert-success">{{session('message')}}</div>
        @endif
        <!-- Form searcher -->
        {!! Form::open(['url' => '/pacients/list', 'method' => 'GET', 'id' => 'pacient-list-searcher']) !!}
        {{Form::text('name', '', ['placeholder' => 'Nombre ', 'maxlength' => '30'])}}
        {{Form::text('lastname', '', ['placeholder' => 'Apellidos '])}}
        {{Form::text('phone', '', ['placeholder' => 'Teléfono '])}}
        {{Form::submit('Buscar')}}
        {!! Form::close() !!}

        @if (count($pacients))
            <div id="pacientlist-table">
                <div class="pacient-list-head col-xs-12">
                    <span><?php echo __('Nombre') ?></span>
                    <span><?php echo __('Apellidos')?></span>
                    <span><?php echo __('Teléfono')?></span>
                    <span></span>
                    <span></span>
                </div>
                @foreach ($pacients as $pacient)
                   <div class="pacient-list-row col-xs-12">
                       <div class="pacient-name td">
                           {{ $pacient->name }}
                       </div>
                       <div class="pacient-lastname td">
                           {{ $pacient->lastname }}
                       </div>
                       <div class="pacient-lastname td">
                           {{ $pacient->phone }}
                       </div>
                       <div class="pacient-edit td">
                           {!! Form::open(['url' => '/pacients/edit-page', 'method' => 'GET']) !!}
                           <input type="hidden" name="id" id="pacient-id-hidden" value="{{ $pacient->id }}"/>
                           {{Form::hidden('_token', csrf_token())}}
                           {{Form::submit('Editar')}}
                           {!! Form::close() !!}
                       </div>
                       <div class="pacient-delete td">
                           {!! Form::open(['url' => '/pacients/delete', 'method' => 'POST']) !!}
                           <input type="hidden" name="id" id="pacient-id-hidden" value="{{ $pacient->id }}"/>
                           {{Form::hidden('_token', csrf_token())}}
                           {{Form::submit('Eliminar')}}
                           {!! Form::close() !!}
                       </div>
                   </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection