@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>Tambah Data Kader 2024</h2>
            </div>
            <div class="card-body">
                <form action="/admin/mahasiswa" method="post">
                    @csrf
                    <div class="container mt-4">
                        <div class="mb-3">
                            <p><b>NIM</b></p>
                            <input type="text" class="form-control" id="nim" name="nim" placeholder="">
                        </div>
                        <div class="mb-3">
                            <p><b>Nama</b></p>
                            <input type="text" class="form-control" id="nama" name="nama">
                        </div>
                        <div class="mb-3">
                            <p><b>Fakultas</b></p>
                            <input type="text" class="form-control" id="fakultas" name="fakultas">
                        </div>
                        <div class="mb-3">
                            <p><b>Prodi</b></p>
                            <input type="text" class="form-control" id="prodi" name="prodi">
                        </div>
                        <div class="mb-3">
                            <p><b>kelompok</b></p>
                            <input type="text" class="form-control" id="kelompok" name="kelompok">
                        </div>
                        <button class="btn btn-primary mr-1" name="submit" type="submit">Submit</button>
                        <a href="/admin/mahasiswa" class="btn btn-danger">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var fakultasSelect = document.getElementById('fakultasSelect');
            var prodiSelect = document.getElementById('prodiSelect');

            var prodiOptions = {
                'TEKNIK': [
                    'Teknik Informatika',
                    'Teknik Mesin',
                    'Teknik Elektro',
                ],
                'HUKUM': [
                    'Ilmu Hukum',
                ],
                'FKIP': [
                    'Pendidikan Bahasa Inggris',
                    'Pendidikan Matematika',
                    'PPKN',
                    'PG PAUD',
                ],
                'EKONOMI': [
                    'Manajemen',
                    'Akuntansi',
                    'Ekonomi Pembangunan',
                    'D3 Akuntansi',

                ],
                'FAI': [
                    'S1 Psikologi Islam',
                    'S1 Pendidikan Agama Islam',
                    'S1 PGMI',
                    'S1 Ekonomi Syariah',
                    'IPII',
                ],
                'FIK': [
                    'S1 Keperawatan',
                    'Fisioterapi',
                    'D3 Keperawatan',
                    'Kebidanan',
                ],
                'FISIP': [
                    'Ilmu Komunikasi',
                    'Ilmu Pemerintahan',
                ]

            };
            fakultasSelect.addEventListener('change', function() {
                var selectedFakultas = fakultasSelect.value;
                var options = prodiOptions[selectedFakultas] || [];

                prodiSelect.innerHTML = '<option value="" disabled selected>Pilih Program Studi</option>';
                options.forEach(function(prodi) {
                    var option = document.createElement('option');
                    option.value = prodi;
                    option.textContent = prodi;
                    prodiSelect.appendChild(option);
                });
            });
        });
    </script>
@endsection
