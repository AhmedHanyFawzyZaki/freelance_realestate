<div class="form-group row {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Name', ['class' => 'col-md-3 control-label text-right']) !!}
    <div class="col-md-9">
        {!! Form::text('name', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group row {{ $errors->has('description') ? 'has-error' : ''}}">
    {!! Form::label('description', 'Description', ['class' => 'col-md-3 control-label text-right']) !!}
    <div class="col-md-9">
        {!! Form::textarea('description', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group row {{ $errors->has('name_ar') ? 'has-error' : ''}}">
    {!! Form::label('name_ar', 'Name Arabic', ['class' => 'col-md-3 control-label text-right']) !!}
    <div class="col-md-9">
        {!! Form::text('name_ar', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('name_ar', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group row {{ $errors->has('description_ar') ? 'has-error' : ''}}">
    {!! Form::label('description_ar', 'Description Arabic', ['class' => 'col-md-3 control-label text-right']) !!}
    <div class="col-md-9">
        {!! Form::textarea('description_ar', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('description_ar', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group row {{ $errors->has('name_sp') ? 'has-error' : ''}}">
    {!! Form::label('name_sp', 'Name Spanish', ['class' => 'col-md-3 control-label text-right']) !!}
    <div class="col-md-9">
        {!! Form::text('name_sp', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('name_sp', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group row {{ $errors->has('description_sp') ? 'has-error' : ''}}">
    {!! Form::label('description_sp', 'Description Spanish', ['class' => 'col-md-3 control-label text-right']) !!}
    <div class="col-md-9">
        {!! Form::textarea('description_sp', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('description_sp', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('image') ? 'has-error' : ''}}">
    {!! Form::label('image', 'Image', ['class' => 'col-md-3 control-label text-right']) !!}
    <div class="col-md-9">
        {!! Form::file('image', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group text-right">
    <div class="col-md-12">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
