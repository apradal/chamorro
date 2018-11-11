@extends('layouts.app')
@section('body_class', 'main')
@section('content')
    <div class="main-cabecera">
        <h1><?php echo __('Histórico de Pacientes') ?></h1>
    </div>
    <div class="container">
        @if ($errors->any())
            <!-- Messages -->
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
            @endforeach
        @endif
        @if(session('message'))
            <div id="message" class="alert alert-success">{{session('message')}}</div>
        @endif
        <!-- Search pacient -->
        <div class="row cabecera">
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="form" id="search-pacient-form">
                    {!! Form::open(['url' => '/main', 'method' => 'GET']) !!}
                    <input placeholder="Buscar Paciente: " maxlength="40" id="pacient" name="pacient" type="text"
                           value="<?php echo (isset($pacient)) ? $pacient->name . ' ' . $pacient->lastname : ''; ?>" class="ui-autocomplete-input" autocomplete="off">
                    <input type="hidden" name="id" id="pacient-id-hidden" value=""/>
                    {{Form::hidden('_token', csrf_token())}}
                    <button class="button-form"><i class="fas fa-search"></i></button>
                    {!! Form::close() !!}
                </div>
            </div>
            <?php if (isset($pacient)) : ?>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="icon-boxed" id="treatments-btn">
                        <span><?php echo __('Tratamiento') ?></span><i class="fa fa-plus-square"></i>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="icon-boxed" id="next-dates-btn">
                        <span><?php echo __('Proxima Cita') ?></span><i class="fa fa-plus-square"></i>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <?php if (isset($pacient)) : ?>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12" id="treatments-ajax">
                    @include('main.treatments')
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <!-- Periodontal card -->
                    <h2><?php echo __('Ficha Periodontal')?></h2>
                    <div id="pediodontic-info" class="info-box">
                        <?php if (isset($pacient->fichaperiodontal)) : ?>
                        <ul>
                            <li>
                                <p class="info-title"><?php echo __('Motivo consulta:')?></p>
                                <p><?php echo (isset($pacient->fichaperiodontal->reason)) ? $pacient->fichaperiodontal->reason :  __('No hay información') ?></p>
                            </li>
                            <li>
                                <p class="info-title"><?php echo __('Sintomas:')?></p>
                                <p><?php echo (isset($pacient->fichaperiodontal->symptom)) ? $pacient->fichaperiodontal->symptom :  __('No hay información') ?></p>
                            </li>
                            <li>
                                <p class="info-title"><?php echo __('Antecedentes familiares:')?></p>
                                <p><?php echo (isset($pacient->fichaperiodontal->family_background)) ? $pacient->fichaperiodontal->family_background : __('Ninguno') ?></p>
                            </li>
                            <li>
                                <p class="info-title"><?php echo __('Hábitos de higiene:')?></p>
                                <p><?php echo (isset($pacient->fichaperiodontal->habits)) ? $pacient->fichaperiodontal->habits : __('No hay información') ?></p>
                            </li>
                            <li>
                                <p class="info-title"><?php echo __('Fumador:')?></p>
                                <p><?php echo (isset($pacient->fichaperiodontal->smoker_desc)) ? $pacient->fichaperiodontal->smoker_desc : __('No') ?></p>
                            </li>
                            <li>
                                <p class="info-title"><?php echo __('Estrés:')?></p>
                                <p><?php echo (isset($pacient->fichaperiodontal->stress_desc)) ? $pacient->fichaperiodontal->stress_desc : __('No') ?></p>
                            </li>
                            <li>
                                <p class="info-title"><?php echo __('Halitosis:')?></p>
                                <p><?php echo (isset($pacient->fichaperiodontal->halitosis_desc)) ? $pacient->fichaperiodontal->halitosis_desc : __('No') ?></p>
                            </li>
                            <li>
                                <p class="info-title"><?php echo __('Sensibilidad:')?></p>
                                <p><?php echo (isset($pacient->fichaperiodontal->sensitivity_desc)) ? $pacient->fichaperiodontal->sensitivity_desc : __('No') ?></p>
                            </li>
                            <li>
                                <p class="info-title"><?php echo __('Sensibilidad:')?></p>
                                <p><?php echo (isset($pacient->fichaperiodontal->sensitivity_desc)) ? $pacient->fichaperiodontal->sensitivity_desc : __('No') ?></p>
                            </li>
                            <li>
                                <p class="info-title"><?php echo __('Sensibilidad:')?></p>
                                <p><?php echo (isset($pacient->fichaperiodontal->bleeding_desc)) ? $pacient->fichaperiodontal->bleeding_desc : __('No') ?></p>
                            </li>
                        </ul>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-md-6 col-md-offset-6">
                    <!-- Next date -->
                    <h2><?php echo __('Próxima Cita')?></h2>
                    <?php if (isset($pacient->nextdates)) {
                        $nextDate = $pacient->getClosesNextDate();
                        echo (isset($nextDate)) ? __('Próxima cita para ' . $nextDate->treatment . ': ' . $nextDate->next_date) : __('No hay próxima cita');
                    } else {
                        echo __('No hay próxima cita');
                    } ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <!-- Includes -->
    <?php if (isset($pacient)) : ?>
        @include('includes.treatments.treatmentsbox')
        @include('includes.treatments.cuadrantesaddbox')
        @include('includes.treatments.revisionaddbox')
        @include('includes.treatments.limpiezaaddbox')
        @include('includes.treatments.mantenimientoaddbox')
        @include('includes.dates.nextdatebox')
        @include('includes.dates.revisionadddatebox')
        @include('includes.dates.limpiezaadddatebox')
        @include('includes.dates.mantenimientoadddatebox')
    <?php endif; ?>
    <script src="{{asset('js/pacients/pacients.js')}}"></script>
    <script src="{{asset('js/main/main.js')}}"></script>
@endsection