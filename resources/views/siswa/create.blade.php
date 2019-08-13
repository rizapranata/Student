

@extends('template')
@section('title','Siswa')

@section('content')

<div class="container">
  <div class="row">
   <div class="col-md-6 col-md-offset-3">
    <h2>Add Student</h2>

    {!! Form::open(['url' => 'siswa']) !!}
    @include('errors.form_error_list')
    @include('siswa.form',['submitButtonText' => 'Save'])
    {!! Form::close() !!}

   </div>
  </div>
</div>

@endsection