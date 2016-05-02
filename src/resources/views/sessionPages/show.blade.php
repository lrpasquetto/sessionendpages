@extends('layouts.app')

@section('content')
<div class="panel">
    <div class="panel-heading">
        <h2 class="panel-title">Dados do registro</h2>
    </div>
    <div class="panel-body">
        @include('sessionPages.show_fields')
    </div>
</div>
@endsection
