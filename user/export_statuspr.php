<?php
include '../koneksi.php';

// Include PhpSpreadsheet
require '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

// Query untuk mengambil data
$query = "SELECT * FROM status_pr";
$result = mysqli_query($koneksi, $query);

// Cek jika ada data
if (mysqli_num_rows($result) > 0) {
    // Data array untuk Excel
    $data = [
        ["NO", "TANGGAL PENGAJUAN", "KODE PENGADAAN", "NAMA BARANG / JASA", "JUMLAH", "SATUAN", "VENDOR", "TANGGAL TAHAP PROSES", "TAHAP PROSES", "LAMA PROSES", "ESTIMASI PENYELESAIAN", "STATUS", "CATATAN"]
    ];

    $no = 1;
    $row = 3;
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    $sheet->fromArray($data, NULL, 'B2');
    $sheet->getStyle('B2:N2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

    while ($rowData = mysqli_fetch_assoc($result)) {
        $sheet->setCellValue('B' . $row, $no++);
        $sheet->getStyle('B' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->setCellValue('C' . $row, date('d/m/Y', strtotime($rowData['statuspr_tanggal_pengajuan'])));
        $sheet->getStyle('C' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->setCellValue('D' . $row, $rowData['statuspr_kode']);
        $sheet->getStyle('D' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->setCellValue('E' . $row, $rowData['statuspr_nama']);
        $sheet->getStyle('E' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->setCellValue('F' . $row, $rowData['statuspr_jumlah']);
        $sheet->getStyle('F' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->setCellValue('G' . $row, $rowData['statuspr_satuan']);
        $sheet->getStyle('G' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->setCellValue('H' . $row, $rowData['statuspr_vendor']);
        $sheet->getStyle('H' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->setCellValue('I' . $row, $rowData['statuspr_tanggal_proses'] === '0000-00-00' ? '-' : date('d/m/Y', strtotime($rowData['statuspr_tanggal_proses'])));
        $sheet->getStyle('I' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->setCellValue('J' . $row, $rowData['statuspr_tahap'] === NULL ? '-' : $rowData['statuspr_tahap']);
        $sheet->getStyle('J' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->setCellValue('K' . $row, $rowData['statuspr_lama'] == 0 ? '-' : $rowData['statuspr_lama'] . ' Hari');
        $sheet->getStyle('K' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->setCellValue('L' . $row, date('d/m/Y', strtotime($rowData['statuspr_estimasi']))); 
        $sheet->getStyle('L' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->setCellValue('M' . $row, $rowData['statuspr_status']);
        $sheet->getStyle('M' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->setCellValue('N' . $row, $rowData['statuspr_catatan'] === NULL ? '-' : $rowData['statuspr_catatan']);
        $sheet->getStyle('N' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $row++;
    }

    // Styling
    $lastRow = $row - 1;
    $sheet->getStyle('B2:N' . $lastRow)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
    $sheet->getStyle('B2:N2')->getFont()->setBold(true);

    // Auto-size columns
    foreach (range('B', 'N') as $col) {
        $sheet->getColumnDimension($col)->setAutoSize(true);
    }

    // Output
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="Status_PR.xlsx"');
    header('Cache-Control: max-age=0');

    $writer = new Xlsx($spreadsheet);
    $writer->save('php://output');
    exit;
} else {
    echo "Tidak ada data yang tersedia untuk diekspor.";
}