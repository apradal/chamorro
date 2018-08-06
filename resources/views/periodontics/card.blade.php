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
                    @if(!empty($pacient))
                        {{Form::text('pacient', $pacient->name . ' ' . $pacient->lastname, ['maxlength' => '40'])}}
                        {{Form::hidden('pacient_id', $pacient->id)}}
                    @else
                        {{Form::text('pacient', '', ['placeholder' => 'Paciente: Antonio Prada ...', 'maxlength' => '40'])}}
                        {{Form::hidden('pacient_id', '')}}
                    @endif
                    {{Form::hidden('_token', csrf_token())}}
                    {{Form::submit('Buscar')}}
                    {!! Form::close() !!}
                </div>
                <br/>
                <br/>
            </div>
            <div class="col-xs-12">
                {!! Form::open(['url' => '/periodontics/card', 'method' => 'GET']) !!}
                {{Form::textarea('reason', '', ['placeholder' => 'Motivo consulta: ...'])}}
                {{Form::textarea('symptom', '', ['placeholder' => 'Síntomas: ...'])}}
                {{Form::textarea('bleeding_desc', '', ['placeholder' => 'Sangrado: ...', 'class' => 'hidden'])}}
                {{Form::textarea('family-background', '', ['placeholder' => 'Antecedentes Familiares: ...'])}}
                {{Form::textarea('habits', '', ['placeholder' => 'Hábitos de higiene: ...'])}}
                <div class="switch-container">
                    <div>
                        <label>Fumador:</label>
                        <label for="smoker" class="switch">
                            <input type="checkbox" id="smoker"/>
                            <div class="slider round">
                                <span class="on">SI</span>
                                <span class="off">NO</span>
                            </div>
                        </label>
                    </div>
                    {{Form::textarea('smoker_desc', '', ['placeholder' => 'Fumador: ...', 'class' => 'hidden', 'id' => 'smoker-desc'])}}
                </div>
                <div class="switch-container">
                    <div>
                        <label>Estrés:</label>
                        <label for="stress" class="switch">
                            <input type="checkbox" id="stress"/>
                            <div class="slider round">
                                <span class="on">SI</span>
                                <span class="off">NO</span>
                            </div>
                        </label>
                    </div>
                    {{Form::textarea('stress_desc', '', ['placeholder' => 'Estrés: ...', 'class' => 'hidden', 'id' => 'stress-desc'])}}
                </div>
                <div class="switch-container">
                    <div>
                        <label>Halitosis:</label>
                        <label for="halitosis" class="switch">
                            <input type="checkbox" id="halitosis"/>
                            <div class="slider round">
                                <span class="on">SI</span>
                                <span class="off">NO</span>
                            </div>
                        </label>
                    </div>
                    {{Form::textarea('halitosis_desc', '', ['placeholder' => 'Halitosis: ...', 'class' => 'hidden', 'id' => 'halitosis-desc'])}}
                </div>
                <div class="switch-container">
                    <div>
                        <label>Sensibilidad:</label>
                        <label for="sensitivity" class="switch">
                            <input type="checkbox" id="sensitivity"/>
                            <div class="slider round">
                                <span class="on">SI</span>
                                <span class="off">NO</span>
                            </div>
                        </label>
                    </div>
                    {{Form::textarea('sensivity_desc', '', ['placeholder' => 'Sensibilidad: ...', 'class' => 'hidden', 'id' => 'sensitivity-desc'])}}
                </div>
                <div class="switch-container">
                    <div>
                        <label>Sangrado:</label>
                        <label for="bleeding" class="switch">
                            <input type="checkbox" id="bleeding"/>
                            <div class="slider round">
                                <span class="on">SI</span>
                                <span class="off">NO</span>
                            </div>
                        </label>
                    </div>
                    {{Form::textarea('bleeding_desc', '', ['placeholder' => 'Sangrado: ...', 'class' => 'hidden', 'id' => 'bleeding-desc'])}}
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('js/pacients/pacients.js')}}"></script>
    <script src="{{asset('js/periodontal/card.js')}}"></script>
@endsection