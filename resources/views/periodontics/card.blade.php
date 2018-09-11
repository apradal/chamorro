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
            <p><?php echo (!empty($pacient)) ? __('') : __('Busca un paciente para cargar su ficha.'); ?></p>
            <div class="col-xs-12">
                <div class="form" id="search-pacient-form">
                    {!! Form::open(['url' => '/periodontics/card', 'method' => 'GET']) !!}
                    <input placeholder="Paciente: ..." maxlength="40" id="pacient" name="pacient" type="text"
                           value="<?php echo (isset($pacient)) ? $pacient->name . ' ' . $pacient->lastname : ''; ?>" class="ui-autocomplete-input" autocomplete="off">
                    <input type="hidden" name="id" id="pacient-id-hidden" value=""/>
                    {{Form::hidden('_token', csrf_token())}}
                    {{Form::submit('Buscar')}}
                    {!! Form::close() !!}
                </div>
            </div>
            <?php if (isset($pacient)) : ?>
                <div class="col-xs-12">
                    {!! Form::open(['url' => '/periodontics/update-card', 'method' => 'GET']) !!}
                    <textarea placeholder="Motivo consulta: ..." name="reason" cols="50" rows="10"><?php if (isset($card)) echo $card->reason; ?></textarea>
                    <textarea placeholder="Síntomas: ..." name="symptom" cols="50" rows="10"><?php if (isset($card)) echo $card->symptom; ?></textarea>
                    <textarea placeholder="Antecedentes Familiares: ..." name="family_background" cols="50" rows="10"><?php if (isset($card)) echo $card->family_background; ?></textarea>
                    <textarea placeholder="Hábitos de higiene: ..." name="habits" cols="50" rows="10"><?php if (isset($card)) echo $card->habits; ?></textarea>
                    <div class="switch-container">
                        <div>
                            <label>Fumador:</label>
                            <label for="smoker" class="switch">
                                <input type="checkbox" id="smoker" <?php if (isset($card->smoker_desc)) : ?> checked <?php endif; ?>/>
                                <div class="slider round">
                                    <span class="on">SI</span>
                                    <span class="off">NO</span>
                                </div>
                            </label>
                        </div>
                        <textarea placeholder="Fumador: ..." <?php if (!isset($card->smoker_desc)) : ?> class="hidden" <?php endif; ?> id="smoker-desc" name="smoker_desc" cols="50" rows="10"><?php if (isset($card)) echo $card->smoker_desc; ?></textarea>
                    </div>
                    <div class="switch-container">
                        <div>
                            <label>Estrés:</label>
                            <label for="stress" class="switch">
                                <input type="checkbox" id="stress" <?php if (isset($card->stress_desc)) : ?> checked <?php endif; ?>/>
                                <div class="slider round">
                                    <span class="on">SI</span>
                                    <span class="off">NO</span>
                                </div>
                            </label>
                        </div>
                        <textarea placeholder="Estrés: ..." <?php if (!isset($card->stress_desc)) : ?> class="hidden" <?php endif; ?> id="stress-desc" name="stress_desc" cols="50" rows="10"><?php if (isset($card)) echo $card->stress_desc; ?></textarea>
                    </div>
                    <div class="switch-container">
                        <div>
                            <label>Halitosis:</label>
                            <label for="halitosis" class="switch">
                                <input type="checkbox" id="halitosis" <?php if (isset($card->halitosis_desc)) : ?> checked <?php endif; ?>/>
                                <div class="slider round">
                                    <span class="on">SI</span>
                                    <span class="off">NO</span>
                                </div>
                            </label>
                        </div>
                        <textarea placeholder="Halitosis: ..." <?php if (!isset($card->halitosis_desc)) : ?> class="hidden" <?php endif; ?> id="halitosis-desc" name="halitosis_desc" cols="50" rows="10"><?php if (isset($card)) echo $card->halitosis_desc; ?></textarea>
                    </div>
                    <div class="switch-container">
                        <div>
                            <label>Sensibilidad:</label>
                            <label for="sensitivity" class="switch">
                                <input type="checkbox" id="sensitivity" <?php if (isset($card->sensitivity_desc)) : ?> checked <?php endif; ?>/>
                                <div class="slider round">
                                    <span class="on">SI</span>
                                    <span class="off">NO</span>
                                </div>
                            </label>
                        </div>
                        <textarea placeholder="Sensibilidad: ..." <?php if (!isset($card->sensitivity_desc)) : ?> class="hidden" <?php endif; ?> id="sensitivity-desc" name="sensitivity_desc" cols="50" rows="10"><?php if (isset($card)) echo $card->sensitivity_desc; ?></textarea>
                    </div>
                    <div class="switch-container">
                        <div>
                            <label>Sangrado:</label>
                            <label for="bleeding" class="switch">
                                <input type="checkbox" id="bleeding" <?php if (isset($card->bleeding_desc)) : ?> checked <?php endif; ?>/>
                                <div class="slider round">
                                    <span class="on">SI</span>
                                    <span class="off">NO</span>
                                </div>
                            </label>
                        </div>
                        <textarea placeholder="Sangrado: ..." <?php if (!isset($card->bleeding_desc)) : ?> class="hidden" <?php endif; ?> id="bleeding-desc" name="bleeding_desc" cols="50" rows="10"><?php if (isset($card)) echo $card->bleeding_desc; ?></textarea>
                    </div>
                    <input name="pacient_id_card" id="pacient_id_card" type="hidden" value="<?php if (isset($pacient)) echo $pacient->id; ?>">
                    {{Form::hidden('_token', csrf_token())}}
                    {{Form::submit('Guardar')}}
                    {!! Form::close() !!}
                </div>
            <?php endif; ?>
        </div>
    </div>
    <script src="{{asset('js/pacients/pacients.js')}}"></script>
    <script src="{{asset('js/periodontal/card.js')}}"></script>
@endsection