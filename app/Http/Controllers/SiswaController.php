<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa_list = Student::orderBy('nama_siswa', 'asc')->simplePaginate(10);
        $jml_siswa = Student::count();
        return view('siswa.index',compact('siswa_list','jml_siswa'));
    }

    public function create()
    {
        $halaman = 'siswa';
        return view('siswa.create', compact('halaman'));
    }

    public function store(Request $request)
    {
        /*  
        * input data dengan cara Mass Assignment
        */
       Student::create($request->all());
       return redirect('siswa');

        /*  
        # input data dengan cara biasa
        _______________________________________
        $siswa = new Student;
        $siswa->nisn          = $request->nisn;
        $siswa->nama_siswa    = $request->nama_siswa;
        $siswa->tgl_lahir     = $request->tgl_lahir;
        $siswa->jenis_kelamin = $request->jenis_kelamin;
        $siswa->save();
        return redirect('siswa');
        */

    }

    public function show($id)
    {
        $halaman = 'siswa';
        $siswa = Student::findOrFail($id);
        return view('siswa.single', compact('halaman','siswa'));
    }

    public function edit($id)
    {
        $siswa = Student::find($id);
        return view('siswa.edit', compact('siswa'));
    }

    public function update($id, Request $request)
    {
        $siswa = Student::find($id);
        $siswa->update($request->all());
        return redirect('siswa');
    }

    public function destroy($id)
    {
        $siswa = Student::find($id);
        $siswa->delete();
        return redirect('siswa');
    }
}
