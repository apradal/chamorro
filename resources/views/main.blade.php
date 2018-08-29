@extends('layouts.app')

@section('content')
    <div class="block-background hidden"></div>
    <div class="container">
        <h1>app principal</h1>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
            @endforeach
        @endif
        @if(session('message'))
            <div id="message" class="alert alert-success">{{session('message')}}</div>
        @endif
        <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="form" id="search-pacient-form">
                    {!! Form::open(['url' => '/main', 'method' => 'GET']) !!}
                    <input placeholder="Paciente: ..." maxlength="40" id="pacient" name="pacient" type="text"
                           value="<?php echo (isset($pacient)) ? $pacient->name . ' ' . $pacient->lastname : ''; ?>" class="ui-autocomplete-input" autocomplete="off">
                    {{Form::hidden('_token', csrf_token())}}
                    {{Form::submit('Buscar')}}
                    {!! Form::close() !!}
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="icon-boxed" id="treatments-btn">
                    <span><?php echo __('Tratamiento') ?></span><i class="fa fa-plus-square"></i>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="icon-boxed">
                    <span><?php echo __('Proxima Cita') ?></span><i class="fa fa-plus-square"></i>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                Cuadrado con todos los tratamientos
                <?php if (isset($pacient->cuadrantes)) : ?>
                    <?php foreach ($pacient->cuadrantes as $cuadrante) : ?>
                        <ul>
                            <li><?php echo $cuadrante->date ?></li>
                            <li><?php echo $cuadrante->observations ?></li>
                        </ul>
                    <?php endforeach;?>
                    <?php //echo $pacient->revisions; ?>
                <?php endif; ?>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <h2><?php echo __('Ficha Periodontal')?></h2>
                <div class="pediodontic-info info-box">
                    <?php if (isset($pacient->fichaperiodontal)) : ?>
                        <ul>
                            <li>
                                <p><?php echo __('Motivo consulta:')?></p>
                                <p><?php echo (isset($pacient->fichaperiodontal->reason)) ? $pacient->fichaperiodontal->reason :  __('No hay información') ?></p>
                            </li>
                            <li>
                                <p><?php echo __('Sintomas:')?></p>
                                <p><?php echo (isset($pacient->fichaperiodontal->symptom)) ? $pacient->fichaperiodontal->symptom :  __('No hay información') ?></p>
                            </li>
                            <li>
                                <p><?php echo __('Antecedentes familiares:')?></p>
                                <p><?php echo (isset($pacient->fichaperiodontal->family_background)) ? $pacient->fichaperiodontal->family_background : __('Ninguno') ?></p>
                            </li>
                            <li>
                                <p><?php echo __('Hábitos de higiene:')?></p>
                                <p><?php echo (isset($pacient->fichaperiodontal->habits)) ? $pacient->fichaperiodontal->habits : __('No hay información') ?></p>
                            </li>
                            <li>
                                <p><?php echo __('Fumador:')?></p>
                                <p><?php echo (isset($pacient->fichaperiodontal->smoker_desc)) ? $pacient->fichaperiodontal->smoker_desc : __('No') ?></p>
                            </li>
                            <li>
                                <p><?php echo __('Estrés:')?></p>
                                <p><?php echo (isset($pacient->fichaperiodontal->stress_desc)) ? $pacient->fichaperiodontal->stress_desc : __('No') ?></p>
                            </li>
                            <li>
                                <p><?php echo __('Halitosis:')?></p>
                                <p><?php echo (isset($pacient->fichaperiodontal->halitosis_desc)) ? $pacient->fichaperiodontal->halitosis_desc : __('No') ?></p>
                            </li>
                            <li>
                                <p><?php echo __('Sensibilidad:')?></p>
                                <p><?php echo (isset($pacient->fichaperiodontal->sensitivity_desc)) ? $pacient->fichaperiodontal->sensitivity_desc : __('No') ?></p>
                            </li>
                            <li>
                                <p><?php echo __('Sensibilidad:')?></p>
                                <p><?php echo (isset($pacient->fichaperiodontal->sensitivity_desc)) ? $pacient->fichaperiodontal->sensitivity_desc : __('No') ?></p>
                            </li>
                            <li>
                                <p><?php echo __('Sensibilidad:')?></p>
                                <p><?php echo (isset($pacient->fichaperiodontal->bleeding_desc)) ? $pacient->fichaperiodontal->bleeding_desc : __('No') ?></p>
                            </li>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                mostrar Proxima cita
            </div>
        </div>
        <p><?php echo (!empty($pacient)) ? __('Hay paciente') : __('No hay paciente'); ?></p>
    </div>
    <!-- Includes -->
    @include('includes.treatments.treatmentsbox')
    @include('includes.treatments.cuadrantesaddbox')
    @include('includes.treatments.revisionaddbox')
    <script src="{{asset('js/pacients/pacients.js')}}"></script>
    <script src="{{asset('js/main/main.js')}}"></script>
@endsection