

@extends('template')
@section('title','Siswa')

@section('content')

<div class="container">
    <div class="row">
    <div id="siswa">
        <h2>Students</h2>

        @if(!empty($siswa_list))
            <table class="table table-striped">
                <thead class="head">
                    <tr>
                        <th>NISN</th>
                        <th>Name</th>
                        <th>Birth Date</th>
                        <th>Gender</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($siswa_list as $s)
                    <tr>
                        <td>{{ $s->nisn }}</td>
                        <td>{{ $s->nama_siswa }}</td>
                        <td>{{ $s->tgl_lahir }}</td>
                        <td>{{ $s->jenis_kelamin }}</td>
                        <td class="tombol">
                            <div class="box-button">
                                <a href="http://localhost/siswa/public/siswa/{{ $s->id }}">
                                    <input type="submit" class="btn btn-primary btn-sm" value="Detail">
                                </a>
                            </div>
                            <div class="box-button">
                                <a href="http://localhost/siswa/public/siswa/{{ $s->id }}/edit">
                                    <input type="submit" class="btn btn-warning btn-sm" value="Edit">
                                </a>
                            </div>
                            <div class="box-button">
                                {!! Form::open(['method' => 'DELETE','action' => ['SiswaController@destroy', $s->id]]) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                                {!! Form::close() !!}
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Tidak ada data siswa.</p>
        @endif

        <div class="table-nav">
            <div class="jml-data">
                <strong>Count Student : {{ $jml_siswa }}</strong>
            </div>
            <div class="paging">
               {{ $siswa_list->links() }}
            </div>
        </div>

        <div class="tombol-nav">
            <div>
                <a href="http://localhost/siswa/public/siswa/create" class="btn btn-primary">Add Student</a>
            </div>
        </div>
    </div>
</div>
</div>

@endsection