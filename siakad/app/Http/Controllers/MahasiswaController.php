<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) 
    { 
        if($request->has('search')){
            $mahasiswa = Mahasiswa::where('nama', 'LIKE', '%' .$request->search. '%')->paginate(4);
        }
        else{
            $mahasiswa = Mahasiswa::orderBy('id_mahasiswa', 'asc')->paginate(4); 
        }
        //fungsi eloquent menampilkan data menggunakan pagination
        return view('mahasiswa.index',compact('mahasiswa')); 
    } 

    public function create() 
    { 
        return view('mahasiswa.create'); 
    }

    public function store(Request $request) 
    { 
        //melakukan validasi data
        $request->validate([ 
            'Nim' => 'required', 
            'Nama' => 'required', 
            'Tanggal' => 'required',
            'Alamat' => 'required',
            'Email' => 'required',
            'Kelas' => 'required', 
            'Jurusan' => 'required', 
    ]); 
        //fungsi eloquent untuk menambah data
        Mahasiswa::create($request->all());
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('mahasiswa.index') 
        ->with('success', 'Mahasiswa Berhasil Ditambahkan'); 
    } 

    public function show($nim)
    {
        //menampilkan detail data dengan menemukan/berdasarkan Nim Mahasiswa
        $Mahasiswa = Mahasiswa::where('nim', $nim)->first(); 
        return view('mahasiswa.detail', compact('Mahasiswa')); 
    }

    public function edit($nim) 
    { 
        //menampilkan detail data dengan menemukan berdasarkan Nim Mahasiswa untuk diedit
        $Mahasiswa = DB::table('mahasiswa')->where('nim', $nim)->first(); 
        return view('mahasiswa.edit', compact('Mahasiswa')); 
    } 


    public function update(Request $request, $nim) 
    { 
    //melakukan validasi data
        $request->validate([ 
            'Nim' => 'required', 
            'Nama' => 'required', 
            'Tanggal' => 'required',
            'Alamat' => 'required',
            'Email' => 'required',
            'Kelas' => 'required', 
            'Jurusan' => 'required', 
        ]); 

    //fungsi eloquent untuk mengupdate data inputan kita
        Mahasiswa::where('nim', $nim)
        ->update([
            'Nim' => $request->Nim, 
            'Nama' => $request->Nama, 
            'Tanggal' => $request->Tanggal,
            'Alamat' => $request->Alamat,
            'Email' => $request->Email,
            'Kelas' => $request->Kelas, 
            'Jurusan' => $request->Jurusan, 
        ]); 
    //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('mahasiswa.index')
        ->with('success', 'Mahasiswa Berhasil Diupdate'); 
    }

    public function destroy($nim) 
    { 
    //fungsi eloquent untuk menghapus data
        Mahasiswa::where('nim', $nim)->delete(); 
        return redirect()->route('mahasiswa.index')
        ->with('success', 'Mahasiswa Berhasil Dihapus'); 
    } 
}
