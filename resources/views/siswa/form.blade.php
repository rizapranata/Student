
<div class="form-group">
    {!! Form::label('nisn', 'NISN', ['class' => 'control-lable']) !!}
    {!! Form::text('nisn', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('nama_siswa', 'Name', ['class' => 'control-lable']) !!}
    {!! Form::text('nama_siswa', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('tgl_lahir', 'Birth Date', ['class' => 'control-lable']) !!}
    {!! Form::date('tgl_lahir', null, ['class' => 'form-control', 'id' => 'tgl_lahir']) !!}
</div>

<div class="form-group">
    {!! Form::label('jenis_kelamin','Gender', ['class' => 'control-label']) !!}
    <div class="radio">
        <label>{!! Form::radio('jenis_kelamin', 'L') !!} Male</label>
    </div>
    <div class="radio">
        <label>{!! Form::radio('jenis_kelamin', 'P') !!} Female</label>
    </div>
</div>

<div class="form-group">
        {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>