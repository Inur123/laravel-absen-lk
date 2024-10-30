<?php

namespace App\Exports;

use App\Models\Mahasiswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class MahasiswaExport implements FromCollection, WithHeadings, WithStyles, WithColumnWidths, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $mahasiswas = Mahasiswa::all();

        // Add sequential numbers to the collection
        return $mahasiswas->map(function ($mahasiswa, $index) {
            return [
                'no' => $index + 1, // Sequential number

                'nim' => $mahasiswa->nim,
                'nama' => $mahasiswa->nama,
                'fakultas' => $mahasiswa->fakultas,
                'prodi' => $mahasiswa->prodi,
                'kelompok' => $mahasiswa->kelompok,
                'absen1' => $mahasiswa->absen1,
                'absen2' => $mahasiswa->absen2,
                'absen3' => $mahasiswa->absen3,
                'absen4' => $mahasiswa->absen4,
                'absen5' => $mahasiswa->absen5,
                'absen6' => $mahasiswa->absen6,
                'absen7' => $mahasiswa->absen7,
                'absen8' => $mahasiswa->absen8,
                'absen9' => $mahasiswa->absen9,
                'absen10' => $mahasiswa->absen10,
                'absen11' => $mahasiswa->absen11,
                'absen12' => $mahasiswa->absen12,
                'absen13' => $mahasiswa->absen13,
                'absen14' => $mahasiswa->absen14,
                'absen15' => $mahasiswa->absen15,
                'absen16' => $mahasiswa->absen16,
                
            ];
        });
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'No', // Changed from 'ID' to 'No'
            'NIM',
            'Nama',
            'Fakultas',
            'Program Studi',
            'Kelompok',
            'Absen Materi 1',
            'Absen Materi 2',
            'Absen Materi 3',
            'Absen Materi 4',
            'Absen Materi 5',
            'Absen Materi 6',
            'Absen Materi 7',
            'Absen Materi 8',
            'Absen Materi 9',
            'Absen Materi 10',
            'Absen Materi 11',
            'Absen Backup 1',
            'Absen Materi 2',
            'Absen Materi 4',
            'Absen Materi 5',
          
            
            
        ];
    }

    /**
     * @param \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $sheet
     */
    public function styles(\PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $sheet)
    {
        $sheet->getStyle('A1:V1')->applyFromArray([
            'font' => [
                'bold' => true,
                'size' => 12,
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => [
                    'rgb' => 'FFFF00',
                ],
            ],
        ]);
    }

    /**
     * @return array
     */
    public function columnWidths(): array
    {
        return [
            'A' => 10, // Width for the 'No' column
            'B' => 20, // Width for the 'QR Code' column
            'C' => 15, // Width for the 'NIM' column
            'D' => 25, // Width for the 'Nama' column
            'E' => 20, // Width for the 'Program Studi' column
            'F' => 15, // Width for the 'Fakultas' column
            'G' => 15, // Width for the 'Kelompok' column
            'H' => 15, // Width for the 'Absen 1' column
            'I' => 15, // Width for the 'Absen 2' column
            'J' => 15, // Width for the 'Absen 2' column
            'K' => 15, // Width for the 'Absen 2' column
            'L' => 15, // Width for the 'Absen 2' column
            'M' => 15, // Width for the 'Absen 2' column
            'N' => 15, // Width for the 'Absen 2' column
            'O' => 15, // Width for the 'Absen 2' column
            'P' => 15, // Width for the 'Absen 2' column
            'Q' => 15, // Width for the 'Absen 2' column
            'R' => 15, // Width for the 'Absen 2' column
            'S' => 15, // Width for the 'Absen 2' column
            'T' => 15, // Width for the 'Absen 2' column
            'U' => 15, // Width for the 'Absen 2' column
            'V' => 15, // Width for the 'Absen 2' column
            // Width for the 'Absen 3' column
        ];
    }
}
