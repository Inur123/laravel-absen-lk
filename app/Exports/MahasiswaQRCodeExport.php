<?php

namespace App\Exports;

use App\Models\Mahasiswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;

class MahasiswaQRCodeExport implements FromCollection, WithHeadings, WithStyles, WithColumnWidths, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Mahasiswa::all(['qr_code', 'nim', 'nama']);
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'QR Code',
            'NIM',
            'Nama',
        ];
    }

    /**
     * @param \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $sheet
     */
    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:C1')->applyFromArray([
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
            'A' => 30,  // Width for the 'QR Code' column
            'B' => 15,  // Width for the 'NIM' column
            'C' => 25,  // Width for the 'Nama' column
        ];
    }

    /**
     * @param \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $sheet
     */
    public function drawings(Worksheet $sheet)
    {
        $mahasiswas = Mahasiswa::all();
        foreach ($mahasiswas as $key => $mahasiswa) {
            $qrCodeImage = $this->generateQrCodeImage($mahasiswa->qr_code);
            $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
            $drawing->setName('QR Code');
            $drawing->setDescription('QR Code');
            $drawing->setPath($qrCodeImage);
            $drawing->setHeight(50);  // Adjust height as needed
            $drawing->setCoordinates('A' . ($key + 2));  // Set the coordinates where you want the image to be
            $drawing->setWorksheet($sheet);
        }
    }

    /**
     * Generate a QR Code image and save it temporarily.
     *
     * @param string $qrCodeData
     * @return string
     */
    private function generateQrCodeImage($qrCodeData)
    {
        $path = storage_path('app/public/qrcodes/');
        if (!is_dir($path)) {
            mkdir($path, 0777, true);
        }
        $fileName = 'qrcode_' . md5($qrCodeData) . '.png';
        $filePath = $path . $fileName;
        QrCode::format('png')->size(100)->generate($qrCodeData, $filePath);

        // Verify file existence
        if (!file_exists($filePath)) {
            throw new \Exception("File not found: " . $filePath);
        }

        return $filePath;
    }
}