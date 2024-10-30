@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>Ubah Data Kader 2024</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('mahasiswa.update', $siswa->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="container mt-4">
                        <div class="mb-3">
                            <label for="nim">NIM</label>
                            <input type="text" class="form-control" value="{{ $siswa->nim }}" id="nim"
                                name="nim">
                        </div>
                        <div class="mb-3">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" value="{{ $siswa->nama }}" id="nama"
                                name="nama">
                        </div>

                        <div class="mb-3">
                            <label for="fakultas">Fakultas</label>
                            <input type="text" class="form-control" value="{{ $siswa->fakultas }}" id="fakultas"
                                name="fakultas">
                        </div>
                        <div class="mb-3">
                            <label for="prodi">Program Studi</label>
                            <input type="text" class="form-control" value="{{ $siswa->prodi }}" id="prodi"
                                name="prodi">
                        </div>
                        <div class="mb-3">
                            <label for="kelompok">Kelompok</label>
                            <input type="text" class="form-control" value="{{ $siswa->kelompok }}" id="kelompok"
                                name="kelompok">
                        </div>
                        <button class="btn btn-primary mr-1" name="submit" type="submit">Submit</button>
                        <a href="{{ route('mahasiswa.index') }}" class="btn btn-danger">Cancel</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
    </div>
@endsection
