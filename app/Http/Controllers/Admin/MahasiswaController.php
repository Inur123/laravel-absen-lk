<?php

namespace App\Http\Controllers\Admin;

use Barryvdh\DomPDF\PDF;
use App\Models\Mahasiswa;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Exports\MahasiswaExport;
use App\Imports\MahasiswaImport;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

use App\Exports\MahasiswaQRCodeExport;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

date_default_timezone_set('Asia/Jakarta');

class MahasiswaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $cari = $request->query('cari');

        if (!empty($cari)) {
            $datauser = Mahasiswa::where('nama', 'like', '%' . $cari . '%')
                ->sortable()
                ->get(); // Fetch all records without pagination
        } else {
            $datauser = Mahasiswa::sortable()->get(); // Fetch all records without pagination
        }

        return view('mahasiswa.index')->with([
            'siswa' => $datauser,
            'cari' => $cari,
        ]);
    }

    public function getAll()
    {
        $siswa = Mahasiswa::all(); // Fetch all student data
        return response()->json($siswa);
    }

    public function cetakqr($id)
    {
        $siswa = Mahasiswa::where('id', $id)->first();
        return view('mahasiswa.cetakqr', ['siswa' => $siswa]);
    }

    public function create()
    {
        return view('mahasiswa.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|unique:mahasiswa,nim',
            'nama' => 'required',
            'prodi' => 'required',
            'fakultas' => 'required',
            'kelompok' => 'required',
        ]);

        $qr_code = Str::random(20);
        Mahasiswa::create([
            'qr_code' => $request->qr_code,
            'nim' => $request->nim,
            'nama' => $request->nama,
            'prodi' => $request->prodi,
            'fakultas' => $request->fakultas,
            'kelompok' => $request->kelompok,
        ]);

        return redirect()->route('mahasiswa.index');
    }

    public function show($id)
    {
        $siswa = Mahasiswa::where('id', $id)->first();
        return view('mahasiswa.tampilan', ['siswa' => $siswa]);
    }

    public function edit($id)
    {
        $datasiswa = Mahasiswa::find($id);
        return view('mahasiswa.ubah', ['siswa' => $datasiswa]);
    }

    public function update(Request $request, $id)
    {
        $siswa = Mahasiswa::find($id);
        $siswa->nim = $request->nim;
        $siswa->nama = $request->nama;
        $siswa->prodi = $request->prodi;
        $siswa->fakultas = $request->fakultas;
        $siswa->kelompok = $request->kelompok;
        $siswa->save();

        return redirect()->route('mahasiswa.index');
    }

    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index');
    }

    public function validasiQR(Request $request)
    {
        $waktu = date('H:i');
        $absen = "Hadir $waktu";

        $mahasiswa = Mahasiswa::where('qr_code', $request->qr_code)->first();
        if ($mahasiswa) {
            // Check if the student is already marked as present
            if (!empty($mahasiswa->absen1)) {
                return response()->json([
                    'status_error' => 'Sudah absen hari ini.',
                    'name' => $mahasiswa->nama,
                    'nim' => $mahasiswa->nim,
                ]);
            }

            // Mark attendance
            $mahasiswa->absen1 = $absen;
            $mahasiswa->save();

            return response()->json([
                'berhasil' => 'Berhasil absen',
                'name' => $mahasiswa->nama,
                'nim' => $mahasiswa->nim,
            ]);
        }

        return response()->json([
            'status_error' => 'Gagal Absen. QR code tidak ditemukan.',
        ]);
    }
    public function validasiQR2(Request $request)
    {
        $waktu = date('H:i');
        $absen = "Hadir $waktu";

        // Retrieve the student record based on the QR code
        $mahasiswa = Mahasiswa::where('qr_code', $request->qr_code)->first();

        if ($mahasiswa) {
            // Check if the student is already marked as present in the second slot
            if (!empty($mahasiswa->absen2)) {
                // If the previous attendance is the same as the current time
                return response()->json([
                    'status_error' => 'Sudah absen hari ini.',
                    'name' => $mahasiswa->nama,
                    'nim' => $mahasiswa->nim,
                ]);
            }

            // Mark attendance
            $mahasiswa->absen2 = $absen;
            $mahasiswa->save();

            return response()->json([
                'berhasil' => 'Berhasil absen',
                'name' => $mahasiswa->nama, // Assuming `nama` is the student's name
                'nim' => $mahasiswa->nim, // Assuming `nim` is the student's NIM
            ]);
        }

        return response()->json([
            'status_error' => 'Gagal Absen. QR code tidak ditemukan.',
        ]);
    }

    public function validasiQR3(Request $request)
    {
        $waktu = date('H:i');
        $absen = "Hadir $waktu";

        // Retrieve the student record based on the QR code
        $mahasiswa = Mahasiswa::where('qr_code', $request->qr_code)->first();

        if ($mahasiswa) {
            // Check if the student is already marked as present in the second slot
            if (!empty($mahasiswa->absen3)) {
                // If the previous attendance is the same as the current time
                return response()->json([
                    'status_error' => 'Sudah absen hari ini.',
                    'name' => $mahasiswa->nama,
                    'nim' => $mahasiswa->nim,
                ]);
            }

            // Mark attendance
            $mahasiswa->absen3 = $absen;
            $mahasiswa->save();

            return response()->json([
                'berhasil' => 'Berhasil absen',
                'name' => $mahasiswa->nama, // Assuming `nama` is the student's name
                'nim' => $mahasiswa->nim, // Assuming `nim` is the student's NIM
            ]);
        }

        return response()->json([
            'status_error' => 'Gagal Absen. QR code tidak ditemukan.',
        ]);
    }
    public function validasiQR4(Request $request)
    {
        $waktu = date('H:i');
        $absen = "Hadir $waktu";

        // Retrieve the student record based on the QR code
        $mahasiswa = Mahasiswa::where('qr_code', $request->qr_code)->first();

        if ($mahasiswa) {
            // Check if the student is already marked as present in the second slot
            if (!empty($mahasiswa->absen4)) {
                // If the previous attendance is the same as the current time
                return response()->json([
                    'status_error' => 'Sudah absen hari ini.',
                    'name' => $mahasiswa->nama,
                    'nim' => $mahasiswa->nim,
                ]);
            }

            // Mark attendance
            $mahasiswa->absen4 = $absen;
            $mahasiswa->save();

            return response()->json([
                'berhasil' => 'Berhasil absen',
                'name' => $mahasiswa->nama, // Assuming `nama` is the student's name
                'nim' => $mahasiswa->nim, // Assuming `nim` is the student's NIM
            ]);
        }

        return response()->json([
            'status_error' => 'Gagal Absen. QR code tidak ditemukan.',
        ]);
    }
    public function validasiQR5(Request $request)
    {
        $waktu = date('H:i');
        $absen = "Hadir $waktu";

        // Retrieve the student record based on the QR code
        $mahasiswa = Mahasiswa::where('qr_code', $request->qr_code)->first();

        if ($mahasiswa) {
            // Check if the student is already marked as present in the second slot
            if (!empty($mahasiswa->absen5)) {
                // If the previous attendance is the same as the current time
                return response()->json([
                    'status_error' => 'Sudah absen hari ini.',
                    'name' => $mahasiswa->nama,
                    'nim' => $mahasiswa->nim,
                ]);
            }

            // Mark attendance
            $mahasiswa->absen5 = $absen;
            $mahasiswa->save();

            return response()->json([
                'berhasil' => 'Berhasil absen',
                'name' => $mahasiswa->nama, // Assuming `nama` is the student's name
                'nim' => $mahasiswa->nim, // Assuming `nim` is the student's NIM
            ]);
        }

        return response()->json([
            'status_error' => 'Gagal Absen. QR code tidak ditemukan.',
        ]);
    }
    public function validasiQR6(Request $request)
    {
        $waktu = date('H:i');
        $absen = "Hadir $waktu";

        // Retrieve the student record based on the QR code
        $mahasiswa = Mahasiswa::where('qr_code', $request->qr_code)->first();

        if ($mahasiswa) {
            // Check if the student is already marked as present in the second slot
            if (!empty($mahasiswa->absen6)) {
                // If the previous attendance is the same as the current time
                return response()->json([
                    'status_error' => 'Sudah absen hari ini.',
                    'name' => $mahasiswa->nama,
                    'nim' => $mahasiswa->nim,
                ]);
            }

            // Mark attendance
            $mahasiswa->absen6 = $absen;
            $mahasiswa->save();

            return response()->json([
                'berhasil' => 'Berhasil absen',
                'name' => $mahasiswa->nama, // Assuming `nama` is the student's name
                'nim' => $mahasiswa->nim, // Assuming `nim` is the student's NIM
            ]);
        }

        return response()->json([
            'status_error' => 'Gagal Absen. QR code tidak ditemukan.',
        ]);
    }
    public function validasiQR7(Request $request)
    {
        $waktu = date('H:i');
        $absen = "Hadir $waktu";

        // Retrieve the student record based on the QR code
        $mahasiswa = Mahasiswa::where('qr_code', $request->qr_code)->first();

        if ($mahasiswa) {
            // Check if the student is already marked as present in the second slot
            if (!empty($mahasiswa->absen7)) {
                // If the previous attendance is the same as the current time
                return response()->json([
                    'status_error' => 'Sudah absen hari ini.',
                    'name' => $mahasiswa->nama,
                    'nim' => $mahasiswa->nim,
                ]);
            }

            // Mark attendance
            $mahasiswa->absen7 = $absen;
            $mahasiswa->save();

            return response()->json([
                'berhasil' => 'Berhasil absen',
                'name' => $mahasiswa->nama, // Assuming `nama` is the student's name
                'nim' => $mahasiswa->nim, // Assuming `nim` is the student's NIM
            ]);
        }

        return response()->json([
            'status_error' => 'Gagal Absen. QR code tidak ditemukan.',
        ]);
    }
    public function validasiQR8(Request $request)
    {
        $waktu = date('H:i');
        $absen = "Hadir $waktu";

        // Retrieve the student record based on the QR code
        $mahasiswa = Mahasiswa::where('qr_code', $request->qr_code)->first();

        if ($mahasiswa) {
            // Check if the student is already marked as present in the second slot
            if (!empty($mahasiswa->absen8)) {
                // If the previous attendance is the same as the current time
                return response()->json([
                    'status_error' => 'Sudah absen hari ini.',
                    'name' => $mahasiswa->nama,
                    'nim' => $mahasiswa->nim,
                ]);
            }

            // Mark attendance
            $mahasiswa->absen8 = $absen;
            $mahasiswa->save();

            return response()->json([
                'berhasil' => 'Berhasil absen',
                'name' => $mahasiswa->nama, // Assuming `nama` is the student's name
                'nim' => $mahasiswa->nim, // Assuming `nim` is the student's NIM
            ]);
        }

        return response()->json([
            'status_error' => 'Gagal Absen. QR code tidak ditemukan.',
        ]);
    }
    public function validasiQR9(Request $request)
    {
        $waktu = date('H:i');
        $absen = "Hadir $waktu";

        // Retrieve the student record based on the QR code
        $mahasiswa = Mahasiswa::where('qr_code', $request->qr_code)->first();

        if ($mahasiswa) {
            // Check if the student is already marked as present in the second slot
            if (!empty($mahasiswa->absen9)) {
                // If the previous attendance is the same as the current time
                return response()->json([
                    'status_error' => 'Sudah absen hari ini.',
                    'name' => $mahasiswa->nama,
                    'nim' => $mahasiswa->nim,
                ]);
            }

            // Mark attendance
            $mahasiswa->absen9 = $absen;
            $mahasiswa->save();

            return response()->json([
                'berhasil' => 'Berhasil absen',
                'name' => $mahasiswa->nama, // Assuming `nama` is the student's name
                'nim' => $mahasiswa->nim, // Assuming `nim` is the student's NIM
            ]);
        }

        return response()->json([
            'status_error' => 'Gagal Absen. QR code tidak ditemukan.',
        ]);
    }
    public function validasiQR10(Request $request)
    {
        $waktu = date('H:i');
        $absen = "Hadir $waktu";

        // Retrieve the student record based on the QR code
        $mahasiswa = Mahasiswa::where('qr_code', $request->qr_code)->first();

        if ($mahasiswa) {
            // Check if the student is already marked as present in the second slot
            if (!empty($mahasiswa->absen10)) {
                // If the previous attendance is the same as the current time
                return response()->json([
                    'status_error' => 'Sudah absen hari ini.',
                    'name' => $mahasiswa->nama,
                    'nim' => $mahasiswa->nim,
                ]);
            }

            // Mark attendance
            $mahasiswa->absen10 = $absen;
            $mahasiswa->save();

            return response()->json([
                'berhasil' => 'Berhasil absen',
                'name' => $mahasiswa->nama, // Assuming `nama` is the student's name
                'nim' => $mahasiswa->nim, // Assuming `nim` is the student's NIM
            ]);
        }

        return response()->json([
            'status_error' => 'Gagal Absen. QR code tidak ditemukan.',
        ]);
    }
    public function validasiQR11(Request $request)
    {
        $waktu = date('H:i');
        $absen = "Hadir $waktu";

        // Retrieve the student record based on the QR code
        $mahasiswa = Mahasiswa::where('qr_code', $request->qr_code)->first();

        if ($mahasiswa) {
            // Check if the student is already marked as present in the second slot
            if (!empty($mahasiswa->absen11)) {
                // If the previous attendance is the same as the current time
                return response()->json([
                    'status_error' => 'Sudah absen hari ini.',
                    'name' => $mahasiswa->nama,
                    'nim' => $mahasiswa->nim,
                ]);
            }

            // Mark attendance
            $mahasiswa->absen11 = $absen;
            $mahasiswa->save();

            return response()->json([
                'berhasil' => 'Berhasil absen',
                'name' => $mahasiswa->nama, // Assuming `nama` is the student's name
                'nim' => $mahasiswa->nim, // Assuming `nim` is the student's NIM
            ]);
        }

        return response()->json([
            'status_error' => 'Gagal Absen. QR code tidak ditemukan.',
        ]);
    }
    public function validasiQR12(Request $request)
    {
        $waktu = date('H:i');
        $absen = "Hadir $waktu";

        // Retrieve the student record based on the QR code
        $mahasiswa = Mahasiswa::where('qr_code', $request->qr_code)->first();

        if ($mahasiswa) {
            // Check if the student is already marked as present in the second slot
            if (!empty($mahasiswa->absen12)) {
                // If the previous attendance is the same as the current time
                return response()->json([
                    'status_error' => 'Sudah absen hari ini.',
                    'name' => $mahasiswa->nama,
                    'nim' => $mahasiswa->nim,
                ]);
            }

            // Mark attendance
            $mahasiswa->absen12 = $absen;
            $mahasiswa->save();

            return response()->json([
                'berhasil' => 'Berhasil absen',
                'name' => $mahasiswa->nama, // Assuming `nama` is the student's name
                'nim' => $mahasiswa->nim, // Assuming `nim` is the student's NIM
            ]);
        }

        return response()->json([
            'status_error' => 'Gagal Absen. QR code tidak ditemukan.',
        ]);
    }
    public function validasiQR13(Request $request)
    {
        $waktu = date('H:i');
        $absen = "Hadir $waktu";

        // Retrieve the student record based on the QR code
        $mahasiswa = Mahasiswa::where('qr_code', $request->qr_code)->first();

        if ($mahasiswa) {
            // Check if the student is already marked as present in the second slot
            if (!empty($mahasiswa->absen13)) {
                // If the previous attendance is the same as the current time
                return response()->json([
                    'status_error' => 'Sudah absen hari ini.',
                    'name' => $mahasiswa->nama,
                    'nim' => $mahasiswa->nim,
                ]);
            }

            // Mark attendance
            $mahasiswa->absen13 = $absen;
            $mahasiswa->save();

            return response()->json([
                'berhasil' => 'Berhasil absen',
                'name' => $mahasiswa->nama, // Assuming `nama` is the student's name
                'nim' => $mahasiswa->nim, // Assuming `nim` is the student's NIM
            ]);
        }

        return response()->json([
            'status_error' => 'Gagal Absen. QR code tidak ditemukan.',
        ]);
    }
    public function validasiQR14(Request $request)
    {
        $waktu = date('H:i');
        $absen = "Hadir $waktu";

        // Retrieve the student record based on the QR code
        $mahasiswa = Mahasiswa::where('qr_code', $request->qr_code)->first();

        if ($mahasiswa) {
            // Check if the student is already marked as present in the second slot
            if (!empty($mahasiswa->absen14)) {
                // If the previous attendance is the same as the current time
                return response()->json([
                    'status_error' => 'Sudah absen hari ini.',
                    'name' => $mahasiswa->nama,
                    'nim' => $mahasiswa->nim,
                ]);
            }

            // Mark attendance
            $mahasiswa->absen14 = $absen;
            $mahasiswa->save();

            return response()->json([
                'berhasil' => 'Berhasil absen',
                'name' => $mahasiswa->nama, // Assuming `nama` is the student's name
                'nim' => $mahasiswa->nim, // Assuming `nim` is the student's NIM
            ]);
        }

        return response()->json([
            'status_error' => 'Gagal Absen. QR code tidak ditemukan.',
        ]);
    }
    public function validasiQR15(Request $request)
    {
        $waktu = date('H:i');
        $absen = "Hadir $waktu";

        // Retrieve the student record based on the QR code
        $mahasiswa = Mahasiswa::where('qr_code', $request->qr_code)->first();

        if ($mahasiswa) {
            // Check if the student is already marked as present in the second slot
            if (!empty($mahasiswa->absen15)) {
                // If the previous attendance is the same as the current time
                return response()->json([
                    'status_error' => 'Sudah absen hari ini.',
                    'name' => $mahasiswa->nama,
                    'nim' => $mahasiswa->nim,
                ]);
            }

            // Mark attendance
            $mahasiswa->absen15 = $absen;
            $mahasiswa->save();

            return response()->json([
                'berhasil' => 'Berhasil absen',
                'name' => $mahasiswa->nama, // Assuming `nama` is the student's name
                'nim' => $mahasiswa->nim, // Assuming `nim` is the student's NIM
            ]);
        }

        return response()->json([
            'status_error' => 'Gagal Absen. QR code tidak ditemukan.',
        ]);
    }
    public function validasiQR16(Request $request)
    {
        $waktu = date('H:i');
        $absen = "Hadir $waktu";

        // Retrieve the student record based on the QR code
        $mahasiswa = Mahasiswa::where('qr_code', $request->qr_code)->first();

        if ($mahasiswa) {
            // Check if the student is already marked as present in the second slot
            if (!empty($mahasiswa->absen16)) {
                // If the previous attendance is the same as the current time
                return response()->json([
                    'status_error' => 'Sudah absen hari ini.',
                    'name' => $mahasiswa->nama,
                    'nim' => $mahasiswa->nim,
                ]);
            }

            // Mark attendance
            $mahasiswa->absen16 = $absen;
            $mahasiswa->save();

            return response()->json([
                'berhasil' => 'Berhasil absen',
                'name' => $mahasiswa->nama, // Assuming `nama` is the student's name
                'nim' => $mahasiswa->nim, // Assuming `nim` is the student's NIM
            ]);
        }

        return response()->json([
            'status_error' => 'Gagal Absen. QR code tidak ditemukan.',
        ]);
    }

    public function scan1()
    {
        return view('operator.scan1');
    }

    public function scan2()
    {
        return view('operator.scan2');
    }

    public function scan3()
    {
        return view('operator.scan3');
    }
    public function scan4()
    {
        return view('operator.scan4');
    }
    public function scan5()
    {
        return view('operator.scan5');
    }
    public function scan6()
    {
        return view('operator.scan6');
    }
    public function scan7()
    {
        return view('operator.scan7');
    }
    public function scan8()
    {
        return view('operator.scan8');
    }
    public function scan9()
    {
        return view('operator.scan9');
    }
    public function scan10()
    {
        return view('operator.scan10');
    }
    public function scan11()
    {
        return view('operator.scan11');
    }
    public function scan12()
    {
        return view('operator.scan12');
    }
    public function scan13()
    {
        return view('operator.scan13');
    }
    public function scan14()
    {
        return view('operator.scan14');
    }
    public function scan15()
    {
        return view('operator.scan15');
    }
    public function scan16()
    {
        return view('operator.scan16');
    }

    // Metode untuk mengekspor data ke Excel
    public function exportMahasiswa()
    {
        return Excel::download(new MahasiswaExport(), 'mahasiswa.xlsx');
    }

    public function exportMahasiswaQRCode()
    {
        return Excel::download(new MahasiswaQRCodeExport(), 'mahasiswa_qrcode.xlsx');
    }

    // Metode untuk mengimpor data dari Excel
    public function import(Request $request)
    {
        // Import data dari file Excel
        Excel::import(new MahasiswaImport(), $request->file('file'));

        // Generate QR code untuk setiap mahasiswa
        $mahasiswas = Mahasiswa::whereNull('qr_code')->get(); // Ambil mahasiswa tanpa QR code

        foreach ($mahasiswas as $mahasiswa) {
            $qrCode = QrCode::size(100)->generate($mahasiswa->id); // Generate QR code
            $mahasiswa->qr_code = $qrCode;
            $mahasiswa->save(); // Simpan QR code ke database
        }

        return redirect()->route('mahasiswa.index')->with('success', 'Data berhasil diimpor dan QR code ditambahkan.');
    }
    // public function downloadPdf($id = null)
    // {
    //     if ($id) {
    //         $mahasiswa = Mahasiswa::findOrFail($id);
    //         $pdf = PDF::loadView('mahasiswa.pdf', compact('mahasiswa'));
    //         return $pdf->download('mahasiswa_' . $mahasiswa->nim . '.pdf');
    //     } else {
    //         $mahasiswa = Mahasiswa::all();
    //         $pdf = PDF::loadView('mahasiswa.pdf', compact('mahasiswa'));
    //         return $pdf->download('mahasiswa_all.pdf');
    //     }
    // }
    // app/Http/Controllers/Admin/MahasiswaController.php

    // app/Http/Controllers/Admin/MahasiswaController.php

    // app/Http/Controllers/Admin/MahasiswaController.php

    // app/Http/Controllers/Admin/MahasiswaController.php

    public function dashboard(Request $request)
    {
        // Ambil parameter filter dari request
        $fakultas = $request->input('fakultas');
        $prodi = $request->input('prodi');
        $kelompok = $request->input('kelompok');

        // Ambil total mahasiswa yang sesuai dengan filter
        $totalMahasiswaQuery = Mahasiswa::query();
        if ($fakultas) {
            $totalMahasiswaQuery->where('fakultas', $fakultas);
        }
        if ($prodi) {
            $totalMahasiswaQuery->where('prodi', $prodi);
        }
        if ($kelompok) {
            $totalMahasiswaQuery->where('kelompok', $kelompok);
        }
        $totalMahasiswa = $totalMahasiswaQuery->count();

        // Ambil data absensi per hari dengan filter jika ada
        $absensiPerHari = [
            'hari_1' => $this->getAbsensiData('absen1', $fakultas, $prodi, $kelompok),
            'hari_2' => $this->getAbsensiData('absen2', $fakultas, $prodi, $kelompok),
            'hari_3' => $this->getAbsensiData('absen3', $fakultas, $prodi, $kelompok),
            'hari_4' => $this->getAbsensiData('absen4', $fakultas, $prodi, $kelompok),
            'hari_5' => $this->getAbsensiData('absen5', $fakultas, $prodi, $kelompok),
            'hari_6' => $this->getAbsensiData('absen6', $fakultas, $prodi, $kelompok),
            'hari_7' => $this->getAbsensiData('absen7', $fakultas, $prodi, $kelompok),
            'hari_8' => $this->getAbsensiData('absen8', $fakultas, $prodi, $kelompok),
            'hari_9' => $this->getAbsensiData('absen9', $fakultas, $prodi, $kelompok),
            'hari_10' => $this->getAbsensiData('absen10', $fakultas, $prodi, $kelompok),
            'hari_11' => $this->getAbsensiData('absen11', $fakultas, $prodi, $kelompok),
            'hari_12' => $this->getAbsensiData('absen12', $fakultas, $prodi, $kelompok),
            'hari_13' => $this->getAbsensiData('absen13', $fakultas, $prodi, $kelompok),
            'hari_14' => $this->getAbsensiData('absen14', $fakultas, $prodi, $kelompok),
            'hari_15' => $this->getAbsensiData('absen15', $fakultas, $prodi, $kelompok),
            'hari_16' => $this->getAbsensiData('absen16', $fakultas, $prodi, $kelompok),
        ];

        return view('admin.dashboard', [
            'totalMahasiswa' => $totalMahasiswa,
            'absensiPerHari' => $absensiPerHari,
            'fakultas' => $fakultas,
            'prodi' => $prodi,
            'kelompok' => $kelompok,
        ]);
    }

    private function getAbsensiData($absenColumn, $fakultas, $prodi, $kelompok)
    {
        // Initialize query for all students
        $query = Mahasiswa::query();

        // Apply filters
        if ($fakultas) {
            $query->where('fakultas', $fakultas);
        }
        if ($prodi) {
            $query->where('prodi', $prodi);
        }
        if ($kelompok) {
            $query->where('kelompok', $kelompok);
        }

        // Total mahasiswa sesuai filter
        $totalMahasiswa = $query->count();

        // Query to fetch students who have attended
        $absenQuery = clone $query;
        $absen = $absenQuery->whereNotNull($absenColumn)->paginate(20);

        // Total mahasiswa yang sudah absen
        $totalAbsen = $absen->total();
        $belumAbsenCount = $totalMahasiswa - $totalAbsen;

        // Query to fetch students who haven’t attended
        $belumAbsenQuery = clone $query;
        $belumAbsen = $belumAbsenQuery->whereNull($absenColumn)->paginate(20);

        // Return results
        return [
            'total_absensi' => $totalAbsen,
            'absen' => $absen,
            'belum_absen' => $belumAbsen,
            'belum_absen_count' => $belumAbsenCount,
        ];
    }
}
