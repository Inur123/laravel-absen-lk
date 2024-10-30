@extends('layouts.app')

@section('content')
    <!-- page content -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="d-flex flex-wrap justify-content-center">
                    <a href="{{ route('scan1') }}" class="btn btn-primary m-1">Scan Materi 1</a>
                    <a href="{{ route('scan2') }}" class="btn btn-primary m-1">Scan Materi 2</a>
                    <a href="{{ route('scan3') }}" class="btn btn-primary m-1">Scan Materi 3</a>
                    <a href="{{ route('scan4') }}" class="btn btn-primary m-1">Scan Materi 4</a>
                    <a href="{{ route('scan5') }}" class="btn btn-primary m-1">Scan Materi 5</a>
                    <a href="{{ route('scan6') }}" class="btn btn-primary m-1">Scan Materi 6</a>
                    <a href="{{ route('scan7') }}" class="btn btn-success m-1">Scan Materi 7</a>
                    <a href="{{ route('scan8') }}" class="btn btn-success m-1">Scan Materi 8</a>
                    <a href="{{ route('scan9') }}" class="btn btn-success m-1">Scan Materi 9</a>
                    <a href="{{ route('scan10') }}" class="btn btn-success m-1">Scan Materi 10</a>
                    <a href="{{ route('scan11') }}" class="btn btn-success m-1">Scan Materi 11</a>
                    <a href="{{ route('scan12') }}" class="btn btn-warning m-1">Scan Backup 1</a>
                    <a href="{{ route('scan13') }}" class="btn btn-warning m-1">Scan Backup 2</a>
                    <a href="{{ route('scan14') }}" class="btn btn-warning m-1">Scan Backup 3</a>
                    <a href="{{ route('scan15') }}" class="btn btn-warning m-1">Scan Backup 4</a>
                    <a href="{{ route('scan16') }}" class="btn btn-warning m-1">Scan Backup 5</a>

                </div>
            </div>
        </div>
    </div>
@endsection
