@section('body_class', 'periodontics')
@extends('layouts.app')
@section('content')
    <div class="container">
        @if(session('message'))
            <div id="message" class="alert alert-success">{{session('message')}}</div>
        @endif
        <div class="row">
            <div class="cabecera-home">
                <h1><?php echo __('La sonrisa es la curva de la felicidad!!!'); ?></h1>
                <div class="separator-square">
                    <div class="col-sm-4 col-xs-12">
                        <div class="generic-squares">
                            <div class="link-square">
                                <a href="{{ url('/pacients/new') }}">
                                    <div class="icon-square">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="link-square">
                                        <h2><?php echo __('Pacientes')?></h2>
                                        <p><?php echo __('Da de alta o edita un paciente'); ?></p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-xs-12">
                        <div class="generic-squares">
                            <div class="link-square">
                                <a href="{{ url('/main') }}">
                                    <div class="icon-square">
                                        <i class="fas fa-user-md"></i>
                                    </div>
                                    <div class="link-square">
                                        <h2><?php echo __('Historico')?></h2>
                                        <p><?php echo __('Información de tratamientos'); ?></p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-xs-12">
                        <div class="generic-squares">
                            <div class="link-square">
                                <a href="{{ url('/periodontics/card') }}">
                                    <div class="icon-square">
                                        <i class="fas fa-address-card"></i>
                                    </div>
                                    <div class="link-square">
                                        <h2><?php echo __('Ficha')?></h2>
                                        <p><?php echo __('Rellena la ficha de un paciente o editala'); ?></p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="next-dates-popup">
        <?php
        if (session('reminder')) {
            echo session('reminder');
        }
        ?>
    </div>
    <script>
        $(document).ready(function(){
            <?php if (!session('reminder')) : ?>
                CHA.reminder.init();
            <?php endif; ?>
        });
    </script>
@endsection