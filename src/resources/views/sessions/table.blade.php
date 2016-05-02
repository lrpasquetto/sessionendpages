

@foreach($sessions as $session)
<div class="col-md-6 col-sm-6">
    <ul class="nav nav-pills nav-stacked nav-quirk">
        <li class="@if($session->hasChild()) nav-parent @endif active">
            <a href="#"><i class="fa fa-home"></i><span>{!! $session->name !!}</span></a>
            <span class="pull-right" style="top: 9px;position: absolute;right: 40px;">
                <a href="{!! route('sessions.pages.index', [$session->id]) !!}"><button type="button" class="btn btn-xs btn-info"><i class="glyphicon glyphicon-edit"></i> Páginas</button> </a>
                <a href="{!! route('sessions.edit', [$session->id]) !!}"><button type="button" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-edit"></i> Editar</button> </a>
                <a href="{!! route('sessions.delete', [$session->id]) !!}" onclick="return confirm('Are you sure wants to delete this Session?')"><button type="button" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove"></i> Remover</button></a>
            </span>
            {!! $session->printChilds($session->id) !!}
        </li>
    </ul>
</div>
@endforeach

