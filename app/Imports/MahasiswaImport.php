<?php

namespace App\Imports;

use App\Models\Mahasiswa;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;

class MahasiswaImport implements ToModel
{
    use Importable;
    private static $isFirstRow = true;
    public function model(array $row)
    {
        // Lewati baris pertama (header)
        if (self::$isFirstRow) {
            self::$isFirstRow = false;
            return null;
        }

        return new Mahasiswa([
            'nim' => $row[0],
            'nama' => $row[1],
            'fakultas' => $row[2],
            'prodi' => $row[3],
            'kelompok' => $row[4],
        ]);
    }
}
