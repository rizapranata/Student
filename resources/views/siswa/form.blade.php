
@if ($errors->any())
<div class="form-group {{ $errors->has('nisn') ? 'has-error' : 'has-success' }}">
@else
<div class="form-group">
@endif
    {!! Form::label('nisn', 'NISN', ['class' => 'control-lable']) !!}
    {!! Form::text('nisn', null, ['class' => 'form-control']) !!}
    @if ($errors->has('nisn'))
        <span class="help-block">{{ $errors->first('nisn') }}</span>
    @endif
</div>

@if ($errors->any())
<div class="form-group {{ $errors->has('nama_siswa') ? 'has-error' : 'has-success' }}">
@else
<div class="form-group">
@endif
    {!! Form::label('nama_siswa', 'Name', ['class' => 'control-lable']) !!}
    {!! Form::text('nama_siswa', null, ['class' => 'form-control']) !!}
    @if ($errors->has('nama_siswa'))
        <span class="help-block">{{ $errors->first('nama_siswa') }}</span>
    @endif
</div>

@if ($errors->any())
<div class="form-group {{ $errors->has('tgl_lahir') ? 'has-error' : 'has-success' }}">
@else
<div class="form-group">
@endif
    {!! Form::label('tgl_lahir', 'Birth Date', ['class' => 'control-lable']) !!}
    {!! Form::date('tgl_lahir', null, ['class' => 'form-control', 'id' => 'tgl_lahir']) !!}
    @if ($errors->has('tgl_lahir'))
        <span class="help-block">{{ $errors->first('tgl_lahir') }}</span>
    @endif
</div>

@if ($errors->any())
<div class="form-group {{ $errors->has('jenis_kelamin') ? 'has-error' : 'has-success' }}">
@else
<div class="form-group">
@endif
    {!! Form::label('jenis_kelamin','Gender', ['class' => 'control-label']) !!}
    <div class="radio">
        <label>{!! Form::radio('jenis_kelamin', 'L') !!} Male</label>
    </div>
    <div class="radio">
        <label>{!! Form::radio('jenis_kelamin', 'P') !!} Female</label>
    </div>
    @if ($errors->has('jenis_kelamin'))
        <span class="help-block">{{ $errors->first('jenis_kelamin') }}</span>
    @endif
</div>

<div class="form-group">
        {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>