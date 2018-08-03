@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 col-sm-6 col-xs-12">
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="generic-squares">
                <a href="{{ url('/periodontics/') }}"><?php echo __('Periodoncia')?></a>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
        </div>
    </div>
</div>
@endsection
