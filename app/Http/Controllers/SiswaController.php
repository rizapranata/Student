<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\Kelas;
use App\Models\Student;
use App\Models\Telepon;
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
        $list_kelas = Kelas::pluck('nama_kelas', 'id');
        return view('siswa.create', compact('list_kelas','halaman'));
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
                'no_telepon'    => 'sometimes|numeric|digits_between:10,15|unique:telepon,no_telepon',
                'id_kelas'      => 'required',
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
       $siswa = Student::create($input);
       $telepon = new Telepon;
       $telepon->no_telepon = $request->input('no_telepon');
       $siswa->telepon()->save($telepon);

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
        $siswa = Student::findOrFail($id);
        $list_kelas = Kelas::pluck('nama_kelas', 'id');
        if(!empty($siswa->telepon->no_telepon)){
            $siswa->no_telepon = $siswa->telepon->no_telepon;
        }
        return view('siswa.edit', compact('siswa','list_kelas'));
    }

    public function update($id, Request $request)
    {
        $siswa = Student::find($id);
        $input = $request->all();

        $validator = Validator::make($input, [
                'nisn'          => 'required|string|size:5|unique:students,nisn,' . $request->input('id'),
                'nama_siswa'    => 'required|string|max:30',
                'tgl_lahir'     => 'required|date',
                'jenis_kelamin' => 'required|in:L,P',
                'no_telepon'    => 'sometimes|numeric|digits_between:10,15|unique:telepon,no_telepon,' . $request->input('id') . ',id_siswa',
                'id_kelas'      => 'required',
        ]);

        if ($validator->fails()){
            return redirect('siswa/' . $id . '/edit')->withInput()
            ->withErrors($validator);
        }

        $siswa->update($request->all());

        //update no telepon
        if($siswa->telepon){
            //jika telepon diisi, update!
            if($request->filled('no_telepon')){
                $telepon = $siswa->telepon;
                $telepon->no_telepon = $request->input('no_telepon');
                $siswa->telepon()->save($telepon);
            }
            //jika telepon tidak diisi, hapus!!
            else{
                $siswa->telepon()->delete();
            }
        }
        //buat entry baru, jika sebelumnya tdk ada no telepon
        else{
            if($request->filled('no_telepon')){
                $telepon = new Telepon;
                $telepon->no_telepon = $request->input('no_telepon');
                $siswa->telepon()->save($telepon);
            }
        }

        return redirect('siswa');
    }

    public function destroy($id)
    {
        $siswa = Student::find($id);
        $siswa->delete();
        return redirect('siswa');
    }

    
}
