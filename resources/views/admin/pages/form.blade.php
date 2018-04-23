<div class="form-group row {{ $errors->has('title') ? 'has-error' : ''}}">
    {!! Form::label('title', 'Title', ['class' => 'col-md-3 control-label text-right']) !!}
    <div class="col-md-9">
        {!! Form::text('title', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group row {{ $errors->has('content') ? 'has-error' : ''}}">
    {!! Form::label('content', 'Content', ['class' => 'col-md-3 control-label text-right']) !!}
    <div class="col-md-9">
        {!! Form::textarea('content', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('content', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group row {{ $errors->has('title_ar') ? 'has-error' : ''}}">
    {!! Form::label('title_ar', 'Title Arabic', ['class' => 'col-md-3 control-label text-right']) !!}
    <div class="col-md-9">
        {!! Form::text('title_ar', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('title_ar', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group row {{ $errors->has('content_ar') ? 'has-error' : ''}}">
    {!! Form::label('content_ar', 'Content Arabic', ['class' => 'col-md-3 control-label text-right']) !!}
    <div class="col-md-9">
        {!! Form::textarea('content_ar', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('content_ar', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group row {{ $errors->has('title_sp') ? 'has-error' : ''}}">
    {!! Form::label('title_sp', 'Title Spanish', ['class' => 'col-md-3 control-label text-right']) !!}
    <div class="col-md-9">
        {!! Form::text('title_sp', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('title_sp', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group row {{ $errors->has('content_sp') ? 'has-error' : ''}}">
    {!! Form::label('content_sp', 'Content Spanish', ['class' => 'col-md-3 control-label text-right']) !!}
    <div class="col-md-9">
        {!! Form::textarea('content_sp', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('content_sp', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group text-right">
    <div class="col-md-12">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
