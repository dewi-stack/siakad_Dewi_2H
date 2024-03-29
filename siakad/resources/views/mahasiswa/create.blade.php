@extends('mahasiswa.layout') 
 
@section('content') 
 
<div class="container mt-5">
 
    <div class="row justify-content-center align-items-center">
            <div class="card" style="width: 24rem;">
            <div class="card-header">
            Tambah Mahasiswa 
            </div>
            <div class="card-body">
                @if ($errors->any()) 
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error) 
                            <li>{{ $error }}</li>
                        @endforeach 
                    </ul>
                </div>
            @endif 
        <form method="post" action="{{ route('mahasiswa.store') }}" id="myForm">
        @csrf 
            <div class="form-group">
                <label for="Nim">Nim</label> 
                <input type="text" name="Nim" class="form-control" id="Nim" aria-describedby="Nim" data-id="Nim"> 
            </div>
            <div class="form-group">
                <label for="Nama">Nama</label> 
                <input type="Nama" name="Nama" class="form-control" id="Nama" ariadescribedby="Nama" data-id="Nama"> 
            </div>
            <div class="form-group">
                <label for="Tanggal"> Tanggal Lahir </label> 
                <input type="date" name="Tanggal" class="form-control" id="Tanggal" ariadescribedby="Tanggal" data-id="Tanggal"> 
            </div>
            <div class="form-group">
                <label for="Alamat">Alamat</label> 
                <input type="alamat" name="Alamat" class="form-control" id="Alamat" ariadescribedby="Alamat" data-id="Alamat"> 
            </div>
            <div class="form-group">
                <label for="Email">E-mail</label> 
                <input type="email" name="Email" class="form-control" id="Email" ariadescribedby="Email" data-id="Email"> 
            </div>
            <div class="form-group">
                <label for="Kelas">Kelas</label> 
                <select class="form-control" name="Kelas" id="Kelas" ariadescribedby="Kelas" data-id="Kelas">
                @foreach($kelas as $kls)
                    <option value="{{$kls->id}}">{{$kls->nama_kelas}}</option>
                @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="Jurusan">Jurusan</label> 
                <input type="Jurusan" name="Jurusan" class="form-control" id="Jurusan" ariadescribedby="Jurusan" data-id="Jurusan"> 
            </div>
        <button type="submit" class="btn btn-primary" data-id="btn-primary">Submit</button>
        </form>
        </div>
    </div>
</div>
</div>
@endsection