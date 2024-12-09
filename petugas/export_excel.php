<?php
include '../koneksi.php';

// Include PhpSpreadsheet
require '../vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

// Query untuk mengambil data
$query = "SELECT hk.*, k.kontrak_awal, k.kontrak_akhir, 
                 (SELECT SUM(k2.kontrak_total) 
                  FROM kontrak k2 
                  WHERE k2.kontrak_header_id = hk.header_id) AS total_nilai, 
                 (SELECT SUM(b2.bulan_realisasi) 
                  FROM bulan_kontrak b2 
                  WHERE b2.bulan_header_id = hk.header_id) AS total_realisasi 
          FROM header_kontrak hk 
          LEFT JOIN kontrak k ON hk.header_id = k.kontrak_header_id 
          LEFT JOIN bulan_kontrak b ON hk.header_id = b.bulan_header_id 
          GROUP BY hk.header_id";

$result = mysqli_query($koneksi, $query);

// Cek jika ada data
if (mysqli_num_rows($result) > 0) {
    // Data array untuk Excel
    $data = [
        ["NO", "JUDUL KONTRAK", "NO SPPH", "KATEGORI", "START DATE", "END DATE", "PERIODE REALISASI", "NILAI KONTRAK", "REALISASI S.D.", "NILAI SISA KONTRAK", "% SISA", "KETERANGAN"]
    ];

    $no = 1;
    $row = 3; 
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    
    $sheet->fromArray($data, NULL, 'B2');
    $sheet->getStyle('B2:M2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    
    while ($data = mysqli_fetch_assoc($result)) {
        $nilaiSisa = $data['total_nilai'] - $data['total_realisasi'];
        $persentaseSisa = ($nilaiSisa / $data['total_nilai']) * 100;
        
        $sheet->setCellValue('B'.$row, $no++);
        $sheet->getStyle('B'.$row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->setCellValue('C'.$row, $data['header_judul']);
        $sheet->setCellValue('D'.$row, $data['header_nomor']);
        $sheet->getStyle('D'.$row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->setCellValue('E'.$row, $data['header_kategori']);
        $sheet->getStyle('E'.$row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->setCellValue('F'.$row, date('F Y', strtotime($data['kontrak_awal'])));
        $sheet->getStyle('F'.$row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->setCellValue('G'.$row, date('F Y', strtotime($data['kontrak_akhir'])));
        $sheet->getStyle('G'.$row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->setCellValue('H'.$row, date('F Y', strtotime($data['kontrak_awal'])));
        $sheet->getStyle('H'.$row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->setCellValue('I'.$row, number_format($data['total_nilai'], 2, ',', '.'));
        $sheet->getStyle('I'.$row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);
        $sheet->setCellValue('J'.$row, number_format($data['total_realisasi'], 2, ',', '.'));
        $sheet->getStyle('J'.$row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);
        $sheet->setCellValue('K'.$row, number_format($nilaiSisa, 2, ',', '.'));
        $sheet->getStyle('K'.$row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);
        $sheet->setCellValue('L'.$row, number_format($persentaseSisa, 2, ',', '.') . '%');
        $sheet->getStyle('L'.$row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->setCellValue('M'.$row, $data['header_ket']);
        $row++;
    }

    // Styling
    $lastRow = $row - 1;
    $sheet->getStyle('B2:M'.$lastRow)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
    $sheet->getStyle('B2:M2')->getFont()->setBold(true);
    
    // Auto-size columns
    foreach (range('B', 'M') as $col) {
        $sheet->getColumnDimension($col)->setAutoSize(true);
    }

    // Output
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="Monitoring_Kontrak.xlsx"');
    header('Cache-Control: max-age=0');

    $writer = new Xlsx($spreadsheet);
    $writer->save('php://output');
    exit;
} else {
    echo "Tidak ada data yang tersedia untuk diekspor.";
}
?>