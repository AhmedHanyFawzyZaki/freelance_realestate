<div class="form-group row {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Name', ['class' => 'col-md-3 control-label text-right']) !!}
    <div class="col-md-9">
        {!! Form::text('name', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group row {{ $errors->has('name_ar') ? 'has-error' : ''}}">
    {!! Form::label('name_ar', 'Name Arabic', ['class' => 'col-md-3 control-label text-right']) !!}
    <div class="col-md-9">
        {!! Form::text('name_ar', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('name_ar', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group row {{ $errors->has('name_sp') ? 'has-error' : ''}}">
    {!! Form::label('name_sp', 'Name Spanish', ['class' => 'col-md-3 control-label text-right']) !!}
    <div class="col-md-9">
        {!! Form::text('name_sp', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('name_sp', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group row {{ $errors->has('introduction') ? 'has-error' : ''}}">
    {!! Form::label('introduction', 'Introduction', ['class' => 'col-md-3 control-label text-right']) !!}
    <div class="col-md-9">
        {!! Form::textarea('introduction', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('introduction', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group row {{ $errors->has('introduction_ar') ? 'has-error' : ''}}">
    {!! Form::label('introduction_ar', 'Introduction Arabic', ['class' => 'col-md-3 control-label text-right']) !!}
    <div class="col-md-9">
        {!! Form::textarea('introduction_ar', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('introduction_ar', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group row {{ $errors->has('introduction_sp') ? 'has-error' : ''}}">
    {!! Form::label('introduction_sp', 'Introduction Spanish', ['class' => 'col-md-3 control-label text-right']) !!}
    <div class="col-md-9">
        {!! Form::textarea('introduction_sp', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('introduction_sp', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group row {{ $errors->has('description') ? 'has-error' : ''}}">
    {!! Form::label('description', 'Description', ['class' => 'col-md-3 control-label text-right']) !!}
    <div class="col-md-9">
        {!! Form::textarea('description', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group row {{ $errors->has('description_ar') ? 'has-error' : ''}}">
    {!! Form::label('description_ar', 'Description Arabic', ['class' => 'col-md-3 control-label text-right']) !!}
    <div class="col-md-9">
        {!! Form::textarea('description_ar', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('description_ar', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group row {{ $errors->has('description_sp') ? 'has-error' : ''}}">
    {!! Form::label('description_sp', 'Description Spanish', ['class' => 'col-md-3 control-label text-right']) !!}
    <div class="col-md-9">
        {!! Form::textarea('description_sp', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('description_sp', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('price') ? 'has-error' : ''}}">
    {!! Form::label('price', 'Price', ['class' => 'col-md-3 control-label text-right']) !!}
    <div class="col-md-9">
        {!! Form::text('price', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('cover_image') ? 'has-error' : ''}}">
    {!! Form::label('cover_image', 'Cover Image', ['class' => 'col-md-3 control-label text-right']) !!}
    <div class="col-md-9">
        {!! Form::file('cover_image', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('cover_image', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group row {{ $errors->has('main_image') ? 'has-error' : ''}}">
    {!! Form::label('main_image', 'Main Image', ['class' => 'col-md-3 control-label text-right']) !!}
    <div class="col-md-9">
        {!! Form::file('main_image', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('main_image', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group text-right">
    <div class="col-md-12">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
