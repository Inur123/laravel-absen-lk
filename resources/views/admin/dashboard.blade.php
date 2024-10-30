@extends('layouts.app')

@section('content')
    <div class="container-fluid p-10">
        <div class="row">
            <div class="col-md-12">
                <h4 class="mb-2">Dashboard</h4>
                Welcome <b>{{ Auth::user()->role }}</b>, pilih kolom scan untuk mulai <a
                    href="/operator/scan"><b>Scan</b></a>.
                <br>
                Silahkan pilih kolom <a href="/admin/mahasiswa"><b>Mahasiswa 2024</b><a> untuk menambah data mahasiswa (hanya
                        untuk admin).</a></a>

                <!-- Filter Form -->
                <form method="GET" action="{{ route('admin.dashboard') }}" class="mb-4">
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="fakultasSelect">Fakultas</label>
                            <select class="form-select rounded-3" id="fakultasSelect" name="fakultas">
                                <option value="">Semua</option>
                                <option value="TEKNIK" {{ $fakultas == 'TEKNIK' ? 'selected' : '' }}>TEKNIK</option>
                                <option value="HUKUM" {{ $fakultas == 'HUKUM' ? 'selected' : '' }}>HUKUM</option>
                                <option value="FAI" {{ $fakultas == 'FAI' ? 'selected' : '' }}>FAI
                                </option>
                                <option value="FISIP" {{ $fakultas == 'FISIP' ? 'selected' : '' }}>FISIP
                                </option>
                                <option value="FKIP" {{ $fakultas == 'FKIP' ? 'selected' : '' }}>FKIP
                                </option>
                                <option value="EKONOMI" {{ $fakultas == 'EKOMINI' ? 'selected' : '' }}>EKONOMI
                                </option>
                                <option value="FIK" {{ $fakultas == 'FIK' ? 'selected' : '' }}>FIK
                                </option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="prodiSelect">Program Studi</label>
                            <select class="form-select rounded-3" id="prodiSelect" name="prodi">
                                <option value="">Semua</option>
                                <option value="Teknik Informatika" {{ $prodi == 'Teknik Informatika' ? 'selected' : '' }}>
                                    Teknik Informatika
                                </option>
                                <option value="Teknik Mesin" {{ $prodi == 'Teknik Mesin' ? 'selected' : '' }}>
                                    Teknik Mesin
                                </option>
                                <option value="Teknik Elektro" {{ $prodi == 'Teknik Elektro' ? 'selected' : '' }}>
                                    Teknik Elektro </option>
                                <option value="Psikologi Islam" {{ $prodi == 'Psikologi Islam' ? 'selected' : '' }}>
                                    Psikologi Islam</option>
                                <option value="Ppkn" {{ $prodi == 'Ppkn' ? 'selected' : '' }}>
                                    Ppkn</option>
                                <option value="Pgmi" {{ $prodi == 'Pgmi' ? 'selected' : '' }}>
                                    Pgmi</option>
                                <option value="Pgpaud" {{ $prodi == 'Pgpaud' ? 'selected' : '' }}>
                                    Pgpaud</option>
                                <option value="Pendidikan Matematika"
                                    {{ $prodi == 'Pendidikan Matematika' ? 'selected' : '' }}>
                                    Pendidikan Matematika</option>
                                <option value="Pendidikan Bahasa Inggris"
                                    {{ $prodi == 'Pendidikan Bahasa Inggris' ? 'selected' : '' }}>
                                    Pendidikan Bahasa Inggris</option>
                                <option value="Pai" {{ $prodi == 'Pai' ? 'selected' : '' }}>
                                    Pai</option>
                                <option value="Manajemen" {{ $prodi == 'Manajemen' ? 'selected' : '' }}>
                                    Manajemen</option>
                                <option value="Keperawatan S1" {{ $prodi == 'Keperawatan S1' ? 'selected' : '' }}>
                                    Keperawatan S1</option>
                                <option value="Keperawatan D3" {{ $prodi == 'Keperawatan D3' ? 'selected' : '' }}>
                                    Keperawatan D3</option>
                                <option value="Kebidanan" {{ $prodi == 'Kebidanan' ? 'selected' : '' }}>
                                    Kebidanan</option>
                                <option value="Ipii" {{ $prodi == 'Ipii' ? 'selected' : '' }}>
                                    Ipii</option>
                                <option value="Ilmu Pemerintahan" {{ $prodi == 'Ilmu Pemerintahan' ? 'selected' : '' }}>
                                    Ilmu Pemerintahan</option>
                                <option value="Ilmu Komunikasi" {{ $prodi == 'Ilmu Komunikasi' ? 'selected' : '' }}>
                                    Ilmu Komunikasi</option>
                                <option value="Ilmu Hukum" {{ $prodi == 'Ilmu Hukum' ? 'selected' : '' }}>
                                    Ilmu Hukum</option>
                                <option value="Fisioterapi" {{ $prodi == 'Fisioterapi' ? 'selected' : '' }}>
                                    Fisioterapi</option>
                                <option value="Ekonomi Syariah" {{ $prodi == 'Ekonomi Syariah' ? 'selected' : '' }}>
                                    Ekonomi Syariah</option>
                                <option value="Ekonomi Pembangunan"
                                    {{ $prodi == 'Ekonomi Pembangunan' ? 'selected' : '' }}>
                                    Ekonomi Pembangunan</option>
                                <option value="Akuntansi S1" {{ $prodi == 'Akuntansi S1' ? 'selected' : '' }}>
                                    Akuntansi S1</option>
                                <option value="Akuntansi D3" {{ $prodi == 'Akuntansi D3' ? 'selected' : '' }}>
                                    Akuntansi D3</option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="kelompokSelect">Kelompok</label>
                            <select class="form-select rounded-3" id="kelompokSelect" name="kelompok">
                                <option value="">Semua</option>
                                @for ($i = 1; $i <= 33; $i++)
                                    <option value="{{ $i }}" {{ $kelompok == $i ? 'selected' : '' }}>
                                        {{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-md-3 mb-3 d-flex align-items-end">
                            <button type="submit" class="btn btn-primary w-100">Filter</button>
                        </div>
                    </div>
                </form>

                <!-- Total Mahasiswa -->
                <div class="card mb-4 mt-4">
                    <div class="card-header">Total Mahasiswa</div>
                    <div class="card-body">
                        <p>Total mahasiswa terdaftar: {{ $totalMahasiswa }}</p>
                    </div>
                </div>

                <!-- Data Absensi Setiap Hari -->
                <div class="card mb-4">
                    <div class="card-header">Data Absensi Setiap Hari</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <div class="card">
                                    <div class="card-header">
                                        TM
                                    </div>
                                    <div class="card-body">
                                        <p>Total Absensi: {{ $absensiPerHari['hari_11']['total_absensi'] }}</p>
                                        <p>Total Belum Absen:
                                            {{ $totalMahasiswa - $absensiPerHari['hari_11']['total_absensi'] }}</p>
                                        <button class="btn btn-primary" data-bs-toggle="collapse"
                                            data-bs-target="#details-hari11">
                                            Lihat Detail Absensi TM
                                        </button>
                                        <div id="details-hari11" class="collapse mt-3">
                                            <h5>Mahasiswa yang sudah absen</h5>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Nama</th>
                                                        <th>NIM</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($absensiPerHari['hari_11']['absen'] as $mahasiswa)
                                                        <tr>
                                                            <td>{{ $mahasiswa->nama }}</td>
                                                            <td>{{ $mahasiswa->nim }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <!-- Pagination Links -->
                                            {{ $absensiPerHari['hari_11']['absen']->links() }}

                                            <h5>Mahasiswa yang belum absen</h5>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Nama</th>
                                                        <th>NIM</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($absensiPerHari['hari_11']['belum_absen'] as $mahasiswa)
                                                        <tr>
                                                            <td>{{ $mahasiswa->nama }}</td>
                                                            <td>{{ $mahasiswa->nim }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <!-- Pagination Links -->
                                            {{ $absensiPerHari['hari_11']['belum_absen']->links() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Day 1 Card -->
                            <div class="col-md-4 mb-3">
                                <div class="card">
                                    <div class="card-header">
                                        Hari 1 Datang
                                    </div>
                                    <div class="card-body">
                                        <p>Total Absensi: {{ $absensiPerHari['hari_1']['total_absensi'] }}</p>
                                        <p>Total Belum Absen:
                                            {{ $totalMahasiswa - $absensiPerHari['hari_1']['total_absensi'] }}</p>
                                        <button class="btn btn-primary" data-bs-toggle="collapse"
                                            data-bs-target="#details-hari1">
                                            Lihat Detail Absensi Hari 1 Datang
                                        </button>
                                        <div id="details-hari1" class="collapse mt-3">
                                            <h5>Mahasiswa yang sudah absen</h5>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Nama</th>
                                                        <th>NIM</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($absensiPerHari['hari_1']['absen'] as $mahasiswa)
                                                        <tr>
                                                            <td>{{ $mahasiswa->nama }}</td>
                                                            <td>{{ $mahasiswa->nim }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <!-- Pagination Links -->
                                            {{ $absensiPerHari['hari_1']['absen']->links() }}

                                            <h5>Mahasiswa yang belum absen</h5>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Nama</th>
                                                        <th>NIM</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($absensiPerHari['hari_1']['belum_absen'] as $mahasiswa)
                                                        <tr>
                                                            <td>{{ $mahasiswa->nama }}</td>
                                                            <td>{{ $mahasiswa->nim }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <!-- Pagination Links -->
                                            {{ $absensiPerHari['hari_1']['belum_absen']->links() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="card">
                                    <div class="card-header">
                                        Materi 1 hari 1
                                    </div>
                                    <div class="card-body">
                                        <p>Total Absensi: {{ $absensiPerHari['hari_12']['total_absensi'] }}</p>
                                        <p>Total Belum Absen:
                                            {{ $totalMahasiswa - $absensiPerHari['hari_12']['total_absensi'] }}</p>
                                        <button class="btn btn-primary" data-bs-toggle="collapse"
                                            data-bs-target="#details-hari12">
                                            Lihat Detail Absensi Materi 1 Hari 1
                                        </button>
                                        <div id="details-hari12" class="collapse mt-3">
                                            <h5>Mahasiswa yang sudah absen</h5>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Nama</th>
                                                        <th>NIM</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($absensiPerHari['hari_12']['absen'] as $mahasiswa)
                                                        <tr>
                                                            <td>{{ $mahasiswa->nama }}</td>
                                                            <td>{{ $mahasiswa->nim }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <!-- Pagination Links -->
                                            {{ $absensiPerHari['hari_12']['absen']->links() }}

                                            <h5>Mahasiswa yang belum absen</h5>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Nama</th>
                                                        <th>NIM</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($absensiPerHari['hari_12']['belum_absen'] as $mahasiswa)
                                                        <tr>
                                                            <td>{{ $mahasiswa->nama }}</td>
                                                            <td>{{ $mahasiswa->nim }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <!-- Pagination Links -->
                                            {{ $absensiPerHari['hari_12']['belum_absen']->links() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="card">
                                    <div class="card-header">
                                        Materi 2 Hari 1
                                    </div>
                                    <div class="card-body">
                                        <p>Total Absensi: {{ $absensiPerHari['hari_13']['total_absensi'] }}</p>
                                        <p>Total Belum Absen:
                                            {{ $totalMahasiswa - $absensiPerHari['hari_13']['total_absensi'] }}</p>
                                        <button class="btn btn-primary" data-bs-toggle="collapse"
                                            data-bs-target="#details-hari13">
                                            Lihat Detail Absensi Materi 2 Hari 1
                                        </button>
                                        <div id="details-hari13" class="collapse mt-3">
                                            <h5>Mahasiswa yang sudah absen</h5>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Nama</th>
                                                        <th>NIM</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($absensiPerHari['hari_13']['absen'] as $mahasiswa)
                                                        <tr>
                                                            <td>{{ $mahasiswa->nama }}</td>
                                                            <td>{{ $mahasiswa->nim }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <!-- Pagination Links -->
                                            {{ $absensiPerHari['hari_13']['absen']->links() }}

                                            <h5>Mahasiswa yang belum absen</h5>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Nama</th>
                                                        <th>NIM</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($absensiPerHari['hari_13']['belum_absen'] as $mahasiswa)
                                                        <tr>
                                                            <td>{{ $mahasiswa->nama }}</td>
                                                            <td>{{ $mahasiswa->nim }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <!-- Pagination Links -->
                                            {{ $absensiPerHari['hari_13']['belum_absen']->links() }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Day 2 Card -->
                            <div class="col-md-4 mb-3">
                                <div class="card">
                                    <div class="card-header">
                                        Hari 1 Pulang
                                    </div>
                                    <div class="card-body">
                                        <p>Total Absensi: {{ $absensiPerHari['hari_2']['total_absensi'] }}</p>
                                        <p>Total Belum Absen:
                                            {{ $totalMahasiswa - $absensiPerHari['hari_2']['total_absensi'] }}</p>
                                        <button class="btn btn-primary" data-bs-toggle="collapse"
                                            data-bs-target="#details-hari2">
                                            Lihat Detail Absensi Hari 1 Pulang
                                        </button>
                                        <div id="details-hari2" class="collapse mt-3">
                                            <h5>Mahasiswa yang sudah absen</h5>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Nama</th>
                                                        <th>NIM</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($absensiPerHari['hari_2']['absen'] as $mahasiswa)
                                                        <tr>
                                                            <td>{{ $mahasiswa->nama }}</td>
                                                            <td>{{ $mahasiswa->nim }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <!-- Pagination Links -->
                                            {{ $absensiPerHari['hari_2']['absen']->links() }}

                                            <h5>Mahasiswa yang belum absen</h5>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Nama</th>
                                                        <th>NIM</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($absensiPerHari['hari_2']['belum_absen'] as $mahasiswa)
                                                        <tr>
                                                            <td>{{ $mahasiswa->nama }}</td>
                                                            <td>{{ $mahasiswa->nim }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <!-- Pagination Links -->
                                            {{ $absensiPerHari['hari_2']['belum_absen']->links() }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Day 3 Card -->
                            <div class="col-md-4 mb-3">
                                <div class="card">
                                    <div class="card-header">
                                        Hari 2 Datang
                                    </div>
                                    <div class="card-body">
                                        <p>Total Absensi: {{ $absensiPerHari['hari_3']['total_absensi'] }}</p>
                                        <p>Total Belum Absen:
                                            {{ $totalMahasiswa - $absensiPerHari['hari_3']['total_absensi'] }}</p>
                                        <button class="btn btn-primary" data-bs-toggle="collapse"
                                            data-bs-target="#details-hari3">
                                            Lihat Detail Absensi Hari 2 Datang
                                        </button>
                                        <div id="details-hari3" class="collapse mt-3">
                                            <h5>Mahasiswa yang sudah absen</h5>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Nama</th>
                                                        <th>NIM</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($absensiPerHari['hari_3']['absen'] as $mahasiswa)
                                                        <tr>
                                                            <td>{{ $mahasiswa->nama }}</td>
                                                            <td>{{ $mahasiswa->nim }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <!-- Pagination Links -->
                                            {{ $absensiPerHari['hari_3']['absen']->links() }}

                                            <h5>Mahasiswa yang belum absen</h5>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Nama</th>
                                                        <th>NIM</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($absensiPerHari['hari_3']['belum_absen'] as $mahasiswa)
                                                        <tr>
                                                            <td>{{ $mahasiswa->nama }}</td>
                                                            <td>{{ $mahasiswa->nim }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <!-- Pagination Links -->
                                            {{ $absensiPerHari['hari_3']['belum_absen']->links() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="card">
                                    <div class="card-header">
                                        Materi 1 Hari 2
                                    </div>
                                    <div class="card-body">
                                        <p>Total Absensi: {{ $absensiPerHari['hari_14']['total_absensi'] }}</p>
                                        <p>Total Belum Absen:
                                            {{ $totalMahasiswa - $absensiPerHari['hari_14']['total_absensi'] }}</p>
                                        <button class="btn btn-primary" data-bs-toggle="collapse"
                                            data-bs-target="#details-hari14">
                                            Lihat Detail Absensi Materi 1 Hari 2
                                        </button>
                                        <div id="details-hari14" class="collapse mt-3">
                                            <h5>Mahasiswa yang sudah absen</h5>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Nama</th>
                                                        <th>NIM</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($absensiPerHari['hari_14']['absen'] as $mahasiswa)
                                                        <tr>
                                                            <td>{{ $mahasiswa->nama }}</td>
                                                            <td>{{ $mahasiswa->nim }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <!-- Pagination Links -->
                                            {{ $absensiPerHari['hari_14']['absen']->links() }}

                                            <h5>Mahasiswa yang belum absen</h5>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Nama</th>
                                                        <th>NIM</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($absensiPerHari['hari_14']['belum_absen'] as $mahasiswa)
                                                        <tr>
                                                            <td>{{ $mahasiswa->nama }}</td>
                                                            <td>{{ $mahasiswa->nim }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <!-- Pagination Links -->
                                            {{ $absensiPerHari['hari_14']['belum_absen']->links() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="card">
                                    <div class="card-header">
                                        Materi 2 Hari 2
                                    </div>
                                    <div class="card-body">
                                        <p>Total Absensi: {{ $absensiPerHari['hari_15']['total_absensi'] }}</p>
                                        <p>Total Belum Absen:
                                            {{ $totalMahasiswa - $absensiPerHari['hari_15']['total_absensi'] }}</p>
                                        <button class="btn btn-primary" data-bs-toggle="collapse"
                                            data-bs-target="#details-hari15">
                                            Lihat Detail Absensi Materi 2 Hari 2
                                        </button>
                                        <div id="details-hari15" class="collapse mt-3">
                                            <h5>Mahasiswa yang sudah absen</h5>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Nama</th>
                                                        <th>NIM</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($absensiPerHari['hari_15']['absen'] as $mahasiswa)
                                                        <tr>
                                                            <td>{{ $mahasiswa->nama }}</td>
                                                            <td>{{ $mahasiswa->nim }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <!-- Pagination Links -->
                                            {{ $absensiPerHari['hari_15']['absen']->links() }}

                                            <h5>Mahasiswa yang belum absen</h5>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Nama</th>
                                                        <th>NIM</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($absensiPerHari['hari_15']['belum_absen'] as $mahasiswa)
                                                        <tr>
                                                            <td>{{ $mahasiswa->nama }}</td>
                                                            <td>{{ $mahasiswa->nim }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <!-- Pagination Links -->
                                            {{ $absensiPerHari['hari_15']['belum_absen']->links() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="card">
                                    <div class="card-header">
                                        Materi 3 Hari 2
                                    </div>
                                    <div class="card-body">
                                        <p>Total Absensi: {{ $absensiPerHari['hari_16']['total_absensi'] }}</p>
                                        <p>Total Belum Absen:
                                            {{ $totalMahasiswa - $absensiPerHari['hari_16']['total_absensi'] }}</p>
                                        <button class="btn btn-primary" data-bs-toggle="collapse"
                                            data-bs-target="#details-hari16">
                                            Lihat Detail Absensi Materi 3 Hari 2
                                        </button>
                                        <div id="details-hari16" class="collapse mt-3">
                                            <h5>Mahasiswa yang sudah absen</h5>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Nama</th>
                                                        <th>NIM</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($absensiPerHari['hari_16']['absen'] as $mahasiswa)
                                                        <tr>
                                                            <td>{{ $mahasiswa->nama }}</td>
                                                            <td>{{ $mahasiswa->nim }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <!-- Pagination Links -->
                                            {{ $absensiPerHari['hari_16']['absen']->links() }}

                                            <h5>Mahasiswa yang belum absen</h5>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Nama</th>
                                                        <th>NIM</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($absensiPerHari['hari_16']['belum_absen'] as $mahasiswa)
                                                        <tr>
                                                            <td>{{ $mahasiswa->nama }}</td>
                                                            <td>{{ $mahasiswa->nim }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <!-- Pagination Links -->
                                            {{ $absensiPerHari['hari_16']['belum_absen']->links() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="card">
                                    <div class="card-header">
                                        Hari 2 Pulang
                                    </div>
                                    <div class="card-body">
                                        <p>Total Absensi: {{ $absensiPerHari['hari_4']['total_absensi'] }}</p>
                                        <p>Total Belum Absen:
                                            {{ $totalMahasiswa - $absensiPerHari['hari_4']['total_absensi'] }}</p>
                                        <button class="btn btn-primary" data-bs-toggle="collapse"
                                            data-bs-target="#details-hari4">
                                            Lihat Detail Absensi Hari 2 Pulang
                                        </button>
                                        <div id="details-hari4" class="collapse mt-3">
                                            <h5>Mahasiswa yang sudah absen</h5>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Nama</th>
                                                        <th>NIM</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($absensiPerHari['hari_4']['absen'] as $mahasiswa)
                                                        <tr>
                                                            <td>{{ $mahasiswa->nama }}</td>
                                                            <td>{{ $mahasiswa->nim }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <!-- Pagination Links -->
                                            {{ $absensiPerHari['hari_4']['absen']->links() }}

                                            <h5>Mahasiswa yang belum absen</h5>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Nama</th>
                                                        <th>NIM</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($absensiPerHari['hari_4']['belum_absen'] as $mahasiswa)
                                                        <tr>
                                                            <td>{{ $mahasiswa->nama }}</td>
                                                            <td>{{ $mahasiswa->nim }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <!-- Pagination Links -->
                                            {{ $absensiPerHari['hari_4']['belum_absen']->links() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="card">
                                    <div class="card-header">
                                        Hari 3 Datang
                                    </div>
                                    <div class="card-body">
                                        <p>Total Absensi: {{ $absensiPerHari['hari_5']['total_absensi'] }}</p>
                                        <p>Total Belum Absen:
                                            {{ $totalMahasiswa - $absensiPerHari['hari_5']['total_absensi'] }}</p>
                                        <button class="btn btn-primary" data-bs-toggle="collapse"
                                            data-bs-target="#details-hari5">
                                            Lihat Detail Absensi Hari 3 Datang
                                        </button>
                                        <div id="details-hari5" class="collapse mt-3">
                                            <h5>Mahasiswa yang sudah absen</h5>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Nama</th>
                                                        <th>NIM</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($absensiPerHari['hari_5']['absen'] as $mahasiswa)
                                                        <tr>
                                                            <td>{{ $mahasiswa->nama }}</td>
                                                            <td>{{ $mahasiswa->nim }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <!-- Pagination Links -->
                                            {{ $absensiPerHari['hari_5']['absen']->links() }}

                                            <h5>Mahasiswa yang belum absen</h5>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Nama</th>
                                                        <th>NIM</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($absensiPerHari['hari_5']['belum_absen'] as $mahasiswa)
                                                        <tr>
                                                            <td>{{ $mahasiswa->nama }}</td>
                                                            <td>{{ $mahasiswa->nim }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <!-- Pagination Links -->
                                            {{ $absensiPerHari['hari_5']['belum_absen']->links() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="card">
                                    <div class="card-header">
                                        Hari 3 Pulang
                                    </div>
                                    <div class="card-body">
                                        <p>Total Absensi: {{ $absensiPerHari['hari_6']['total_absensi'] }}</p>
                                        <p>Total Belum Absen:
                                            {{ $totalMahasiswa - $absensiPerHari['hari_6']['total_absensi'] }}</p>
                                        <button class="btn btn-primary" data-bs-toggle="collapse"
                                            data-bs-target="#details-hari6">
                                            Lihat Detail Absensi Hari 3 Pulang
                                        </button>
                                        <div id="details-hari6" class="collapse mt-3">
                                            <h5>Mahasiswa yang sudah absen</h5>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Nama</th>
                                                        <th>NIM</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($absensiPerHari['hari_6']['absen'] as $mahasiswa)
                                                        <tr>
                                                            <td>{{ $mahasiswa->nama }}</td>
                                                            <td>{{ $mahasiswa->nim }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <!-- Pagination Links -->
                                            {{ $absensiPerHari['hari_6']['absen']->links() }}

                                            <h5>Mahasiswa yang belum absen</h5>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Nama</th>
                                                        <th>NIM</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($absensiPerHari['hari_6']['belum_absen'] as $mahasiswa)
                                                        <tr>
                                                            <td>{{ $mahasiswa->nama }}</td>
                                                            <td>{{ $mahasiswa->nim }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <!-- Pagination Links -->
                                            {{ $absensiPerHari['hari_6']['belum_absen']->links() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="card">
                                    <div class="card-header">
                                        Hari 4 Datang
                                    </div>
                                    <div class="card-body">
                                        <p>Total Absensi: {{ $absensiPerHari['hari_7']['total_absensi'] }}</p>
                                        <p>Total Belum Absen:
                                            {{ $totalMahasiswa - $absensiPerHari['hari_7']['total_absensi'] }}</p>
                                        <button class="btn btn-primary" data-bs-toggle="collapse"
                                            data-bs-target="#details-hari7">
                                            Lihat Detail Absensi Hari 4 Datang
                                        </button>
                                        <div id="details-hari7" class="collapse mt-3">
                                            <h5>Mahasiswa yang sudah absen</h5>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Nama</th>
                                                        <th>NIM</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($absensiPerHari['hari_7']['absen'] as $mahasiswa)
                                                        <tr>
                                                            <td>{{ $mahasiswa->nama }}</td>
                                                            <td>{{ $mahasiswa->nim }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <!-- Pagination Links -->
                                            {{ $absensiPerHari['hari_7']['absen']->links() }}

                                            <h5>Mahasiswa yang belum absen</h5>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Nama</th>
                                                        <th>NIM</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($absensiPerHari['hari_7']['belum_absen'] as $mahasiswa)
                                                        <tr>
                                                            <td>{{ $mahasiswa->nama }}</td>
                                                            <td>{{ $mahasiswa->nim }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <!-- Pagination Links -->
                                            {{ $absensiPerHari['hari_7']['belum_absen']->links() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="card">
                                    <div class="card-header">
                                        Hari 4 Pulang
                                    </div>
                                    <div class="card-body">
                                        <p>Total Absensi: {{ $absensiPerHari['hari_8']['total_absensi'] }}</p>
                                        <p>Total Belum Absen:
                                            {{ $totalMahasiswa - $absensiPerHari['hari_8']['total_absensi'] }}</p>
                                        <button class="btn btn-primary" data-bs-toggle="collapse"
                                            data-bs-target="#details-hari8">
                                            Lihat Detail Absensi Hari 4 Pulang
                                        </button>
                                        <div id="details-hari8" class="collapse mt-3">
                                            <h5>Mahasiswa yang sudah absen</h5>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Nama</th>
                                                        <th>NIM</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($absensiPerHari['hari_8']['absen'] as $mahasiswa)
                                                        <tr>
                                                            <td>{{ $mahasiswa->nama }}</td>
                                                            <td>{{ $mahasiswa->nim }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <!-- Pagination Links -->
                                            {{ $absensiPerHari['hari_8']['absen']->links() }}

                                            <h5>Mahasiswa yang belum absen</h5>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Nama</th>
                                                        <th>NIM</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($absensiPerHari['hari_8']['belum_absen'] as $mahasiswa)
                                                        <tr>
                                                            <td>{{ $mahasiswa->nama }}</td>
                                                            <td>{{ $mahasiswa->nim }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <!-- Pagination Links -->
                                            {{ $absensiPerHari['hari_8']['belum_absen']->links() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="card">
                                    <div class="card-header">
                                        Hari 5 Datang
                                    </div>
                                    <div class="card-body">
                                        <p>Total Absensi: {{ $absensiPerHari['hari_9']['total_absensi'] }}</p>
                                        <p>Total Belum Absen:
                                            {{ $totalMahasiswa - $absensiPerHari['hari_9']['total_absensi'] }}</p>
                                        <button class="btn btn-primary" data-bs-toggle="collapse"
                                            data-bs-target="#details-hari9">
                                            Lihat Detail Absensi Hari 5 Datang
                                        </button>
                                        <div id="details-hari9" class="collapse mt-3">
                                            <h5>Mahasiswa yang sudah absen</h5>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Nama</th>
                                                        <th>NIM</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($absensiPerHari['hari_9']['absen'] as $mahasiswa)
                                                        <tr>
                                                            <td>{{ $mahasiswa->nama }}</td>
                                                            <td>{{ $mahasiswa->nim }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <!-- Pagination Links -->
                                            {{ $absensiPerHari['hari_9']['absen']->links() }}

                                            <h5>Mahasiswa yang belum absen</h5>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Nama</th>
                                                        <th>NIM</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($absensiPerHari['hari_9']['belum_absen'] as $mahasiswa)
                                                        <tr>
                                                            <td>{{ $mahasiswa->nama }}</td>
                                                            <td>{{ $mahasiswa->nim }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <!-- Pagination Links -->
                                            {{ $absensiPerHari['hari_9']['belum_absen']->links() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="card">
                                    <div class="card-header">
                                        Hari 5 Pulang
                                    </div>
                                    <div class="card-body">
                                        <p>Total Absensi: {{ $absensiPerHari['hari_10']['total_absensi'] }}</p>
                                        <p>Total Belum Absen:
                                            {{ $totalMahasiswa - $absensiPerHari['hari_10']['total_absensi'] }}
                                        </p>
                                        <button class="btn btn-primary" data-bs-toggle="collapse"
                                            data-bs-target="#details-hari10">
                                            Lihat Detail Absensi Hari 5 Pulang
                                        </button>
                                        <div id="details-hari10" class="collapse mt-3">
                                            <h5>Mahasiswa yang sudah absen</h5>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Nama</th>
                                                        <th>NIM</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($absensiPerHari['hari_10']['absen'] as $mahasiswa)
                                                        <tr>
                                                            <td>{{ $mahasiswa->nama }}</td>
                                                            <td>{{ $mahasiswa->nim }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <!-- Pagination Links -->
                                            {{ $absensiPerHari['hari_10']['absen']->links() }}

                                            <h5>Mahasiswa yang belum absen</h5>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Nama</th>
                                                        <th>NIM</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($absensiPerHari['hari_10']['belum_absen'] as $mahasiswa)
                                                        <tr>
                                                            <td>{{ $mahasiswa->nama }}</td>
                                                            <td>{{ $mahasiswa->nim }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <!-- Pagination Links -->
                                            {{ $absensiPerHari['hari_10']['belum_absen']->links() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('scripts')
    <!-- Bootstrap JS (for collapse) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
@endpush
