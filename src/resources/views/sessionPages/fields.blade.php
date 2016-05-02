<!--- Parent Id Field --->
<div class="form-group col-sm-6 col-lg-4" style="display: none">
    {!! Form::label('parent_id', 'Parent Id:') !!}
	{!! Form::text('parent_id', $session_id, ['class' => 'form-control']) !!}
</div>

<!--- Name Field --->
<div class="form-group col-sm-6 col-lg-6">
    {!! Form::label('name', 'Nome:') !!}
	{!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!--- Url Field --->
<div class="form-group col-sm-6 col-lg-4">
    <div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('url', 'Url para página externa:') !!}
	{!! Form::text('url', null, ['class' => 'form-control', 'placeholder'=>"http://www.exemple.com"]) !!}
    </div>
    <div class="form-group col-sm-6 col-lg-4">
        <div class="checkbox">
            <label>{!! Form::checkbox('newpage', 1, null) !!}Newpage</label>
        </div>
    </div>
</div>

<!--- Newpage Field --->


<!--- Content Field --->
<div class="form-group col-sm-12">
	{!! Form::textarea('content', null, ['class' => 'form-control ckeditor']) !!}
</div>


<!--- Submit Field --->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
