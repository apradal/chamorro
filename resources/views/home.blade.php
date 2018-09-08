@section('body_class', 'home')
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <div class="cabecera-home">
                <h1><?php echo __('Consulta María Quero Chamorro'); ?></h1>
                <p><?php echo __('Desde 1975 cuidando las bocas con la mayor profesionalidad posible y con la mejor atención de Zaragoza'); ?></p>
                <p><?php echo __('Pincha en el icono para empezar'); ?></p>
                <div class="separator-square">
                    <div class="generic-squares">
                        <div class="link-square">
                            <a href="{{ url('/periodontics/') }}">
                                <div class="icon-square">
                                    <i class="fas fa-tooth"></i>
                                </div>
                                <div class="link-square">
                                    <h2><?php echo __('Periodoncia')?></h2>
                                    <p>Acceso a la aplicación</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
