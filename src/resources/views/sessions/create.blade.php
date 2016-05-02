@extends('layouts.app')

@section('content')
    <div class="panel">
        <div class="panel-heading">
            <h2 class="panel-title">Novo Registro</h2>
        </div>
        <div class="panel-body">
            @include('common.errors')
            {!! Form::open(['route' => 'sessions.store', 'files'=>true]) !!}
            @include('sessions.fields')
            {!! Form::close() !!}
        </div>
    </div>
@endsection

