<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Kelas;
use App\Models\Mahasiswa_MataKuliah;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
            // Yang semula Mahasiswa::all, diubah menjadi with() yang menyatakan relasi
            // $mahasiswa = Mahasiswa::with('kelas')->get(); 
            // $paginate = Mahasiswa::orderBy('id_mahasiswa', 'asc')->paginate(4);
            // return view('mahasiswa.index', ['mahasiswa' => $mahasiswa,'paginate'=>$paginate]);
        if($request->has('search')){
            $mahasiswa = Mahasiswa::where('Nama', 'like', "%".$request->search."%")
            ->orWhere('Nim', $request->search)
            ->paginate(4);
        } else {
            //fungsi eloquent menampilkan data menggunakan pagination
            $mahasiswa = Mahasiswa::paginate(4); // Membuat pagination, setiap page, menampilkan 4 data
        }
        return view('mahasiswa.index', compact('mahasiswa'));
    }

    public function search(Request $request) 
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
        $kelas = Kelas::all();
        return view('mahasiswa.create',['kelas' => $kelas]); 
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

    $mahasiswa = new Mahasiswa;
    $mahasiswa->nim = $request->get('Nim');
    $mahasiswa->nama = $request->get('Nama');
    $mahasiswa->tanggal = $request->get('Tanggal');
    $mahasiswa->alamat = $request->get('Alamat');
    $mahasiswa->email = $request->get('Email');
    $mahasiswa->jurusan = $request->get('Jurusan');
    $mahasiswa->save();

    $kelas = new Kelas;
    $kelas->id = $request->get('Kelas');

    //fungsi eloquent untuk menambah data dengan relasi belongsTo
    $mahasiswa->kelas()->associate($kelas);
    $mahasiswa->save();

    //jika data berhasil ditambahkan, akan kembali ke halaman utama
    return redirect()->route('mahasiswa.index') 
        ->with('success', 'Mahasiswa Berhasil Ditambahkan'); 
    } 

    public function show($nim)
    {
        //menampilkan detail data dengan menemukan/berdasarkan Nim Mahasiswa
        //$Mahasiswa = Mahasiswa::where('nim', $nim)->first(); 

        $Mahasiswa = Mahasiswa::with('kelas')->where('nim', $nim)->first();
        return view('mahasiswa.detail', ['Mahasiswa' => $Mahasiswa]); 
    }

    public function edit($nim) 
    { 
        //menampilkan detail data dengan menemukan berdasarkan Nim Mahasiswa untuk diedit
        $Mahasiswa = Mahasiswa::find($nim);
        $kelas = Kelas::all(); // mendapatkan data dari tabel kelas
        return view('mahasiswa.edit', compact('Mahasiswa', 'kelas'));
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
    $Mahasiswa = Mahasiswa::with('kelas')->where('nim', $nim)->first();
    $Mahasiswa->nim = $request->get('Nim');
    $Mahasiswa->nama = $request->get('Nama');
    $Mahasiswa->tanggal = $request->get('Tanggal');
    $Mahasiswa->alamat = $request->get('Alamat');
    $Mahasiswa->email = $request->get('Email');
    $Mahasiswa->jurusan = $request->get('Jurusan');
    $Mahasiswa->save();

    $kelas = new Kelas;
    $kelas->id = $request->get('Kelas');

    //fungsi eloquent untuk menambah data dengan relasi belongsTo
    $Mahasiswa->kelas()->associate($kelas);
    $Mahasiswa->save();

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

    public function nilai($nim){
        $mahasiswa = Mahasiswa_MataKuliah::with('mahasiswa')
            ->where('mahasiswa_id', $nim)
            ->first();
        $nilai = Mahasiswa_MataKuliah::with('matakuliah')
            ->where('mahasiswa_id', $nim)
            ->get();
        return view('mahasiswa.nilai', compact('mahasiswa', 'nilai'));
    }
}
