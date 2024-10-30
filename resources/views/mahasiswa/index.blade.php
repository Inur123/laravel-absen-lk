@extends('layouts.app')

@section('content')
    <!-- page content -->
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h2>Data Calon Anggota HMI Komisariat Fitrah 2024</h2>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-12 col-md-8 d-flex flex-column flex-md-row align-items-center justify-content-between">
                        <div class="flex-column flex-md-row  ">
                            <!-- Action Buttons -->
                            <a href="/admin/mahasiswa/create" class="btn btn-primary mx-2 my-1">
                                <i class="bi bi-plus-circle"></i> Tambah Kader
                            </a>
                            <button class="btn btn-success mx-2 my-1" onclick="downloadAllQRCodes()">Download All QR
                                Codes</button>
                            <button type="button" onclick="window.location.href='{{ route('export.mahasiswa') }}'"
                                class="btn btn-info mx-2 my-1 rounded-2">
                                <i class="bi bi-download"></i> Export Semua
                            </button>
                        </div>

                        <div class="text-end mt-3 mt-md-0">
                            <!-- Removed Pagination Info -->
                        </div>
                    </div>
                </div>

                <!-- Form for import -->
                <form action="{{ route('mahasiswa.import') }}" method="POST" enctype="multipart/form-data" class="mt-2">
                    @csrf
                    <div class="input-group">
                        <input type="file" class="form-control" name="file" required>
                        <button class="btn btn-primary rounded-2" type="submit">Import Excel</button>
                    </div>
                </form>

                <div class="table-responsive mt-2">
                    <table id="myTable" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>QR Code</th>
                                <th>NIM</th>
                                <th>Nama Mahasiswa</th>
                                <th>Fakultas</th>
                                <th>Prodi</th>
                                <th>Kelompok</th>
                                <th>Absen Materi 1</th>
                                <th>Absen Materi 2</th>
                                <th>Absen Materi 3</th>
                                <th>Absen Materi 4</th>
                                <th>Absen Materi 5</th>
                                <th>Absen Materi 6</th>
                                <th>Absen Materi 7</th>
                                <th>Absen Materi 8</th>
                                <th>Absen Materi 9</th>
                                <th>Absen Materi 10</th>
                                <th>Absen Materi 11</th>
                                <th>Absen Backup 1</th>
                                <th>Absen Backup 2</th>
                                <th>Absen Backup 3</th>
                                <th>Absen Backup 4</th>
                                <th>Absen Backup 5</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($siswa as $s)
                                <tr>
                                    <td>{{ $loop->iteration }}</td> <!-- Display the sequential number -->
                                    <td class="d-none d-md-flex">
                                        <div id="qrcode-{{ $s->nim }}" data-nama="{{ $s->nama }}"
                                            data-kelompok=" {{ $s->kelompok }}">
                                            {!! \SimpleSoftwareIO\QrCode\Facades\QrCode::size(100)->generate($s->qr_code) !!}
                                        </div>
                                    </td>
                                    <td>{{ $s->nim }}</td>
                                    <td style="text-transform: uppercase;">{{ $s->nama }}</td>
                                    <td style="text-transform: uppercase;">{{ $s->fakultas }}</td>
                                    <td style="text-transform: uppercase;">{{ $s->prodi }}</td>
                                    <td>{{ $s->kelompok }}</td>
                                    <td>{{ $s->absen1 }}</td>
                                    <td>{{ $s->absen2 }}</td>
                                    <td>{{ $s->absen3 }}</td>
                                    <td>{{ $s->absen4 }}</td>
                                    <td>{{ $s->absen5 }}</td>
                                    <td>{{ $s->absen6 }}</td>
                                    <td>{{ $s->absen7 }}</td>
                                    <td>{{ $s->absen8 }}</td>
                                    <td>{{ $s->absen9 }}</td>
                                    <td>{{ $s->absen10 }}</td>
                                    <td>{{ $s->absen11 }}</td>
                                    <td>{{ $s->absen12 }}</td>
                                    <td>{{ $s->absen13 }}</td>
                                    <td>{{ $s->absen14 }}</td>
                                    <td>{{ $s->absen15 }}</td>
                                    <td>{{ $s->absen16 }}</td>
                                    
                                    <td>
                                        <form action="{{ route('mahasiswa.destroy', $s->id) }}" method="POST"
                                            class="d-flex flex-column flex-md-row">
                                            <a href="{{ route('mahasiswa.show', $s->id) }}"
                                                class="btn btn-round btn-primary mx-1 my-1">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <a href="{{ route('mahasiswa.edit', $s->id) }}"
                                                class="btn btn-success mx-1 my-1">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <a href="#" class="btn btn-warning mx-1 my-1"
                                                onclick="downloadQRCode('{{ $s->nim }}', '{{ $s->nama }}', ' {{ $s->kelompok }}')">
                                                <i class="bi-qr-code-scan"></i>
                                            </a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger mx-1 my-1">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- Removed Pagination Controls -->
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.7.1/jszip.min.js"></script>
    {{-- <script>
        // Refresh the page every 5 minutes (300000 milliseconds)
        setInterval(function() {
            location.reload();
        }, 10000);
    </script> --}}
    <script>
        function downloadQRCode(nim, nama, kelompok) {
            const node = document.getElementById(`qrcode-${nim}`);

            domtoimage.toBlob(node)
                .then(function(blob) {
                    const formattedName = nama.replace(/\s+/g, '_')
                        .toLowerCase(); // Ganti spasi dengan underscore dan ubah huruf menjadi kecil
                    window.saveAs(blob, `${formattedName}-${nim}-kelompok${kelompok}.png`);
                })
                .catch(function(error) {
                    console.error('oops, something went wrong!', error);
                });
        }

        function downloadAllQRCodes() {
            const qrcodes = document.querySelectorAll('[id^=qrcode-]');
            const zip = new JSZip();
            const imgFolder = zip.folder("qrcodes");

            let promises = [];

            qrcodes.forEach(node => {
                const nim = node.id.replace('qrcode-', '');
                const nama = node.getAttribute('data-nama'); // Ambil nama dari atribut 'data-nama'
                const kelompok = node.getAttribute('data-kelompok'); // Ambil kelompok dari atribut 'data-kelompok'
                promises.push(
                    domtoimage.toBlob(node)
                    .then(function(blob) {
                        const formattedName = nama.replace(/\s+/g, '_').toLowerCase(); // Format nama
                        imgFolder.file(`${formattedName}-${nim}-kelompok${kelompok}.png`, blob);
                    })
                    .catch(function(error) {
                        console.error('oops, something went wrong!', error);
                    })
                );
            });

            Promise.all(promises).then(() => {
                zip.generateAsync({
                        type: "blob"
                    })
                    .then(function(content) {
                        saveAs(content, "all_qrcodes.zip");
                    });
            });
        }
    </script>
@endpush
