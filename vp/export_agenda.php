<?php
include '../koneksi.php';

// Include PhpSpreadsheet
require '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

// Query untuk mengambil data
$query = "SELECT * FROM agenda";
$result = mysqli_query($koneksi, $query);

// Cek jika ada data
if (mysqli_num_rows($result) > 0) {
    // Data array untuk Excel
    $data = [
        ["NO", "KATEGORI", "TANGGAL", "WAKTU", "KEGIATAN", "DESKRIPSI", "LOKASI", "PENANGGUNG JAWAB", "STATUS", "DOKUMEN RISALAH RAPAT"]
    ];

    $no = 1;
    $row = 3;
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    $sheet->fromArray($data, NULL, 'B2');
    $sheet->getStyle('B2:K2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

    while ($rowData = mysqli_fetch_assoc($result)) {
        $sheet->setCellValue('B' . $row, $no++);
        $sheet->getStyle('B' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->setCellValue('C' . $row, $rowData['agenda_kategori']);
        $sheet->getStyle('C' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->setCellValue('D' . $row, date('d/m/Y', strtotime($rowData['agenda_tanggal'])));
        $sheet->getStyle('D' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $waktu = date('H:i', strtotime($rowData['agenda_waktu_awal'])) . ' - ' . date('H:i', strtotime($rowData['agenda_waktu_akhir']));
        $sheet->setCellValue('E' . $row, $waktu);
        $sheet->getStyle('E' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->setCellValue('F' . $row, $rowData['agenda_kegiatan']);
         $sheet->getStyle('F' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->setCellValue('G' . $row, $rowData['agenda_deskripsi']);
         $sheet->getStyle('G' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->setCellValue('H' . $row, $rowData['agenda_lokasi']);
         $sheet->getStyle('H' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->setCellValue('I' . $row, $rowData['agenda_pj']);
         $sheet->getStyle('I' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->setCellValue('J' . $row, $rowData['agenda_status']);
        $sheet->getStyle('J' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->setCellValue('K' . $row, !empty($rowData['agenda_dokumen']) ? "Upload" : "Belum Upload");
        $sheet->getStyle('K' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $row++;
    }

    // Styling
    $lastRow = $row - 1;
    $sheet->getStyle('B2:K' . $lastRow)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
    $sheet->getStyle('B2:K2')->getFont()->setBold(true);

    // Auto-size columns
    foreach (range('B', 'K') as $col) {
        $sheet->getColumnDimension($col)->setAutoSize(true);
    }

    // Output
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="Agenda_Rapat.xlsx"');
    header('Cache-Control: max-age=0');

    $writer = new Xlsx($spreadsheet);
    $writer->save('php://output');
    exit;
} else {
    echo "Tidak ada data yang tersedia untuk diekspor.";
}