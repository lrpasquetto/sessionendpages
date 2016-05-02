@extends('layouts.app')

@section('content')
<div class="panel">
        <div class="panel-heading">
            <h2 class="panel-title">Editar registro</h2>
        </div>

        <div class="panel-body">
            @include('common.errors')
            {!! Form::model($session, ['route' => ['sessions.update', $session->id], 'method' => 'patch', 'files'=>true]) !!}
                @include('sessions.fields')
            {!! Form::close() !!}
        </div>
    </div>
@endsection
