@extends('layouts.app')

@section('content')

<div class="panel">
    <div class="panel-heading">
        <h2 class="panel-title">Páginas de sessão</h2>
    </div>
    <div class="panel-body">
        <a class="btn btn-info" style="margin-bottom: 10px" href="{!! route('sessions.index',[$session_id]) !!}"><i class="fa fa-chevron-left" aria-hidden="true"></i> Sessões</a>
        <a class="btn btn-primary pull-right" style="margin-bottom: 10px" href="{!! route('sessions.pages.create',[$session_id]) !!}">Novo Registro</a>
        @if($sessionPages->isEmpty())
            <div class="well text-center">Sem registros</div>
        @else
            @include('sessionPages.table')
        @endif
        @include('common.paginate', ['records' => $sessionPages])

    </div>
</div>
@endsection