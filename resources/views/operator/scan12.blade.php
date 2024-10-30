@extends('layouts.app')

@section('content')
    <!-- page content -->
    <div class="container-fluid p-0">
        <div class="row m-0 h-100">
            <div class="col-md-12 p-0 d-flex flex-column align-items-center">
                <!-- Display name and NIM -->
                <div class="text-center">
                    <h3 style="color: red">Scan Materi 12 </h3>
                    <h4 id="student-name">Nama: </h4>
                    <p id="student-nim">NIM: </p>
                </div>
                <!-- QR code scanner -->
                <div id="reader" style="width: 80%; height: 80%;"></div>
                <input type="hidden" id="result">
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
    <script>
        function onScanSuccess(decodedText, decodedResult) {
            $("#result").val(decodedText);

            let id = decodedText;

            csrf_token = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                url: "{{ route('validasiqr12') }}",
                type: "POST",
                data: {
                    '_method': 'POST',
                    '_token': csrf_token,
                    'qr_code': id,
                },
                success: function(response) {
                    if (response.status_error) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oh, tidak!',
                            text: response.status_error // Display error message
                        });
                    } else if (response.berhasil) {
                        // Update the displayed name and NIM
                        $("#student-name").text('Nama: ' + response.name);
                        $("#student-nim").text('NIM: ' + response.nim);

                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: response.berhasil // Display success message
                        });
                    }
                },
                error: function(xhr) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Kesalahan!',
                        text: 'Terjadi kesalahan dalam proses absensi.'
                    });
                }
            });
        }

        function onScanFailure(error) {
            // Handle scan failure
            console.warn(`Code scan error = ${error}`);
        }

        let html5QrcodeScanner = new Html5QrcodeScanner(
            "reader", {
                fps: 10,
                qrbox: {
                    width: window.innerWidth * 0.8, // Adjust width as needed
                    height: window.innerHeight * 0.8 // Adjust height as needed
                }
            },
            /* verbose= */
            false);
        html5QrcodeScanner.render(onScanSuccess, onScanFailure);
    </script>
@endpush
