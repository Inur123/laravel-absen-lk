@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row my-5">
            <div class="col-md-12 d-flex flex-column align-items-center justify-content-center">
                @if ($siswa && $siswa->qr_code)
                    {!! \SimpleSoftwareIO\QrCode\Facades\QrCode::size(500)->generate($siswa->qr_code) !!}
                    <!-- Tambahkan Nama dan NIM -->
                    <div class="mt-4 text-center">
                        <h4>{{ $siswa->nama }}</h4>
                        <p>{{ $siswa->nim }}</p>
                    </div>
                @else
                    <p>QR Code tidak tersedia untuk siswa ini.</p>
                @endif
                <div class="col-md-12 d-flex align-content-center justify-content-center">
                    <a class="btn btn-danger" href="{{ route('mahasiswa.index') }}">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
