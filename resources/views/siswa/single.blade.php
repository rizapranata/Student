
@extends('template')
@section('title','Detail Siswa')

@section('content')

<div class="container">
    <div class="row col-md-6">
        <div id="siswa">
            <h2>Detail Student</h2>
            <table class="table table-striped">
                <tr>
                    <th>NISN</th>
                    <td>{{ $siswa->nisn }}</td>
                </tr>
                <tr>
                    <th>Nama</th>
                    <td>{{ $siswa->nama_siswa }}</td>
                </tr>
                <tr>
                    <th>Tgl Lahir</th>
                    <td>{{ $siswa->tgl_lahir }}</td>
                </tr>
                <tr>
                    <th>Jenis Kel</th>
                    <td>{{ $siswa->jenis_kelamin }}</td>
                </tr>
                <tr>
                    <th>Telepon</th>
                    <td>{{ !empty($siswa->telepon->no_telepon) ? $siswa->telepon->no_telepon : '-' }}</td>
                </tr>
            </table>

            <a href="http://localhost/siswa/public/siswa">
                <button type="button" class="btn btn-info pull-right btn-sm">Back</button>
            </a>
        </div>
    </div>
</div>

@endsection