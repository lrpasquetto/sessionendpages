@extends('layouts.app')

@section('content')

<div class="panel">
    <div class="panel-heading">
        <h2 class="panel-title">Sessões</h2>
    </div>
    <div class="panel-body">
        <div class="col-md-12 ">
            <a class="btn btn-primary pull-right" style="margin-bottom: 10px" href="{!! route('sessions.create') !!}">Novo Registro</a>
        </div>
        @if($sessions->isEmpty())
            <div class="well text-center">Sem registros</div>
        @else
            @include('sessions.table')
        @endif
        @include('common.paginate', ['records' => $sessions])

    </div>
</div>
@endsection