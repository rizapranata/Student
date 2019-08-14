<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\Student;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $halaman = 'siswa';
        $siswa_list = Student::orderBy('nama_siswa', 'asc')->paginate(5);
        $jml_siswa = Student::count();
        return view('siswa.index',compact('siswa_list','jml_siswa','halaman'));
    }

    public function create()
    {
        $halaman = 'siswa';
        return view('siswa.create', compact('halaman'));
    }

    public function store(Request $request)
    {
        /**
         * proses validasi data
         */
        $input = $request->all();
        $validator = Validator::make($input, [
                'nisn'          => 'required|string|size:5|unique:students,nisn',
                'nama_siswa'    => 'required|string|max:30',
                'tgl_lahir'     => 'required|date',
                'jenis_kelamin' => 'required|in:L,P',
        ]);

        if($validator->fails()){
            return redirect('siswa/create')
                ->withInput()
                ->withErrors($validator);
        }

        /*  
        * input data dengan cara Mass Assignment
        * jika lolos dari validasi
        */
       Student::create($input);
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
