

@extends('template')
@section('title','Edit')

@section('content')

<div class="container">
  <div class="row">
    <h2 id="edit">Edit Siswa</h2>
  <div class="col-md-6">
   
    {!! Form::model($siswa, ['method' => 'PATCH', 'action' => ['SiswaController@update', $siswa->id]]) !!}
    @include('siswa.form', ['submitButtonText' => 'Update'])     
    {!! Form::close() !!}

   </div>
  </div>
</div>

@endsection