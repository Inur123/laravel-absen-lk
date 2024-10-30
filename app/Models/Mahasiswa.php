<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;

class Mahasiswa extends Model
{
    use HasFactory;
    use Sortable;


    protected $table = 'mahasiswa';
    protected $fillable = ['nim', 'nama', 'prodi', 'fakultas', 'kelompok', 'qr_code'];

    public $sortable = [
        'nim',
        'nama',
        'prodi',
        'fakultas',
        'kelompok',
        'absen1',
        'absen2',
        'absen3',
    ];

    public static function boot()
    {
        parent::boot();

        static::created(function ($mahasiswa) {
            // Buat direktori jika belum ada
            $directory = 'qr_codes';
            $fullPath = public_path($directory);

            if (!is_dir($fullPath)) {
                mkdir($fullPath, 0755, true);
            }

            // Generate QR code
            $qrCode = QrCode::format('png')->size(100)->generate($mahasiswa->nim);
            $filePath = $fullPath . '/' . $mahasiswa->nim . '.png';

            // Save QR code to file
            file_put_contents($filePath, $qrCode);

            // Simpan path QR code ke database
            $mahasiswa->qr_code = 'qr_codes/' . $mahasiswa->nim . '.png';
            $mahasiswa->save();
        });
    }
}
