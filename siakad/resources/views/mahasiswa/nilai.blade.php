@extends('mahasiswa.layout')
@section('content')
<div class="row justify-content-center">
    <div class="col-sm-10">
        <h3>JURUSAN TEKNOLOGI INFORMASI-POLITEKNIK NEGERI MALANG</h3>
    </div>
    <div class="col-sm-4">
        <h4>KARTU HASIL STUDI</h4>
    </div>
</div>
@if($mahasiswa)
<p><strong>Nim&nbsp;: </strong>{{ $mahasiswa->mahasiswa->nim }}</p>
<p><strong>Nama&nbsp;: </strong>{{ $mahasiswa->mahasiswa->nama }}</p>
<p><strong>Kelas&nbsp;: </strong>{{ $mahasiswa->mahasiswa->Kelas->nama_kelas }}</p>
@else
<h2>Belum ada data!</h2>
@endif
<table class="table table-bordered">
    <tr>
        <th>Mata Kuliah</th>
        <th>SKS</th>
        <th>Semester</th>
        <th>Nilai</th>
    </tr>
    @if($nilai)
    @foreach($nilai as $Nilai)
    <tr>
        <td>{{ $Nilai->matakuliah->nama_matkul }}</td>
        <td>{{ $Nilai->matakuliah->sks }}</td>
        <td>{{ $Nilai->matakuliah->semester }}</td>
        <td>{{ $Nilai->nilai }}</td>
    </tr>
    @endforeach
    @endif
</table>
<div class="row justify-content-end">
    <a href="{{ route('mahasiswa.index') }}" class="btn btn-danger">Kembali</a>
</div>
@endsection