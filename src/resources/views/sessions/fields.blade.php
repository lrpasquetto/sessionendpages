<!--- Parent Id Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('parent_id', 'Sessão Pai:') !!}
	{!! Form::select('parent_id', $sessions,null, ['class' => 'form-control']) !!}
</div>

<!--- Name Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('name', 'Nome:') !!}
	{!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>


<!--- Submit Field --->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
