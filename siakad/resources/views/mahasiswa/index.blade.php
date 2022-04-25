@extends('mahasiswa.layout')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left mt-2">
            <h2>JURUSAN TEKNOLOGI INFORMASI-POLITEKNIK NEGERI MALANG</h2>
        </div>
        <div class="float-right my-2">
            <a class="btn btn-success" href="{{ route('mahasiswa.create') }}">Input Mahasiswa</a>
        </div>
    </div>
</div>

<div class="row justify-content-end">
    <div class="col-md-4">
        <form action="{{ route('mahasiswa.index') }}" accept-charset="UTF-8" method="get">
            <div class="input-group">
                <input type="text" name="search" id="search" placeholder="Cari..." class="form-control">
                <span class="input-group-btn">
                    <input type="submit" value="Cari" class="btn btn-primary">
                </span>
            </div>
        </form>
    </div>
</div>


@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
@if ($message = Session::get('error'))
<div class="alert alert-error">
    <p>{{ $message }}</p>
</div>
@endif

<table class="table table-bordered">
    <tr>
        <th>Nim</th>
        <th>Nama</th>
        <th>Kelas</th>
        <th>Jurusan</th>
        <th>Email</th>
        <th>Tanggal Lahir</th>
        <th>Alamat</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($mahasiswa as $mhs)
    <tr>

        <td>{{ $mhs ->nim }}</td>
        <td>{{ $mhs ->nama }}</td>
        <td>{{ $mhs ->kelas->nama_kelas }}</td>
        <td>{{ $mhs ->jurusan }}</td>
        <td>{{ $mhs ->email }}</td>
        <td>{{ $mhs ->tanggal_lahir }}</td>
        <td>{{ $mhs ->alamat }}</td>

        <td>
            <form action="{{ route('mahasiswa.destroy',['mahasiswa'=>$mhs->nim]) }}" method="POST">

                <a class="btn btn-info" href="{{ route('mahasiswa.show',$mhs->nim) }}">Show</a>
                <a class="btn btn-primary" href="{{ route('mahasiswa.edit',$mhs->nim) }}">Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
                <a class="btn btn-warning" href="{{ route('mahasiswa.showNilai', $mhs->nim) }}">Nilai</a>
            </form>
        </td>
    </tr>
    @endforeach
</table>
<div class="d-flex">
    {{ $mahasiswa->links('pagination::bootstrap-4') }}
</div>
@endsection