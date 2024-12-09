<?php
include '../koneksi.php';

// Include PhpSpreadsheet
require '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

// Query untuk mengambil data
$header_id = $_GET['kontrak_header_id'];

// Update the query to select all contracts with the same header_id
$query = "SELECT k.*, hk.header_judul, hk.header_nomor, hk.header_kategori 
          FROM kontrak k 
          LEFT JOIN header_kontrak hk ON k.kontrak_header_id = hk.header_id 
          WHERE k.kontrak_header_id = '$header_id'";

$result = mysqli_query($koneksi, $query);

// Cek jika ada data
if (mysqli_num_rows($result) > 0) {
    // Data array untuk Excel
    $data = [
        ["NO", "DESKRIPSI", "JUMLAH", "TAHUN PEMBUATAN", "MASA SEWA", "START DATE", "END DATE", "MIN HM", "MAX HM", "TARIF", "TOTAL"]
    ];

    $no = 1;
    $row = 7;
    $total = 0;
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    $sheet->fromArray($data, NULL, 'B6');
    $sheet->setCellValue('B2', 'JUDUL KONTRAK');
    $sheet->getStyle('B2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
    $header_judul = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT header_judul FROM header_kontrak WHERE header_id = '$header_id'"))['header_judul'];
    $sheet->setCellValue('C2', $header_judul);
    $sheet->getStyle('C2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
    $sheet->setCellValue('B3', 'NO SPPH');
    $sheet->getStyle('B3')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
    $header_nomor = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT header_nomor FROM header_kontrak WHERE header_id = '$header_id'"))['header_nomor'];
    $sheet->setCellValue('C3', $header_nomor);
    $sheet->getStyle('C3')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
    $sheet->setCellValue('B4', 'KATEGORI KONTRAK');
    $sheet->getStyle('B4')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
    $header_kategori = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT header_kategori FROM header_kontrak WHERE header_id = '$header_id'"))['header_kategori'];
    $sheet->setCellValue('C4', $header_kategori);
    $sheet->getStyle('C4')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
    $sheet->getStyle('B6:L6')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

    while ($data = mysqli_fetch_assoc($result)) {
        $sheet->setCellValue('B' . $row, $no++);
        $sheet->getStyle('B')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->setCellValue('C' . $row, $data['kontrak_desk']);
        $sheet->setCellValue('D' . $row, $data['kontrak_jumlah']);
        $sheet->getStyle('D')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->setCellValue('E' . $row, $data['kontrak_tahun']);
        $sheet->getStyle('E')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->setCellValue('F' . $row, $data['kontrak_masa']);
        $sheet->getStyle('F')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->setCellValue('G' . $row, date('d/m/Y', strtotime($data['kontrak_awal'])));
        $sheet->getStyle('G')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->setCellValue('H' . $row, date('d/m/Y', strtotime($data['kontrak_akhir'])));
        $sheet->getStyle('H')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->setCellValue('I' . $row, $data['kontrak_minhm']);
        $sheet->getStyle('I')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->setCellValue('J' . $row, $data['kontrak_maxhm']);
        $sheet->getStyle('J')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->setCellValue('K' . $row, number_format($data['kontrak_tarif'], 2, ',', '.'));
        $sheet->getStyle('K')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);
        $sheet->setCellValue('L' . $row, number_format($data['kontrak_total'], 2, ',', '.'));
        $sheet->getStyle('L')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);
        $total += $data['kontrak_total'];
        $row++;
    }

    $sheet->setCellValue('B' . $row, 'SUB TOTAL');
    $sheet->getStyle('B' . $row)->getFont()->setBold(true);
    $sheet->getStyle('B' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);
    $sheet->setCellValue('L' . $row, number_format($total, 2, ',', '.'));
    $sheet->getStyle('L' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);
    $sheet->mergeCells('B' . $row . ':K' . $row);
    $sheet->getStyle('B' . $row . ':K' . $row)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN); // Set border for merged cells
    $sheet->getStyle('L' . $row)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN); // Set border for column L

    $ppn = $total * 0.10; // Calculate 10% VAT
    $row++; // Move to the next row for PPN
    $sheet->setCellValue('B' . $row, 'PPN 10%');
    $sheet->getStyle('B' . $row)->getFont()->setBold(true);
    $sheet->getStyle('B' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);
    $sheet->setCellValue('L' . $row, number_format($ppn, 2, ',', '.'));
    $sheet->getStyle('L' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);
    $sheet->mergeCells('B' . $row . ':K' . $row); // Merge cells for PPN
    $sheet->getStyle('B' . $row . ':K' . $row)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN); // Set border for merged cells
    $sheet->getStyle('L' . $row)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN); // Set border for column L

    $total_semua = $total + $ppn;
    $row++; // Move to the next row for PPN
    $sheet->setCellValue('B' . $row, 'TOTAL');
    $sheet->getStyle('B' . $row)->getFont()->setBold(true);
    $sheet->getStyle('B' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);
    $sheet->getStyle('L' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);
    $sheet->setCellValue('L' . $row, number_format($total_semua, 2, ',', '.'));
    $sheet->mergeCells('B' . $row . ':K' . $row); // Merge cells for PPN
    $sheet->getStyle('B' . $row . ':K' . $row)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN); // Set border for merged cells
    $sheet->getStyle('L' . $row)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN); // Set border for column L

    // Styling
    $lastRow = $row - 1;
    $sheet->getStyle('B6:L' . $lastRow)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
    $sheet->getStyle('B6:L6')->getFont()->setBold(true);

    // Auto-size columns
    foreach (range('B', 'L') as $col) {
        $sheet->getColumnDimension($col)->setAutoSize(true);
    }

    $data_new = [
        ["NO", "BULAN", "NILAI INVOICE", "NILAI DENDA", "REALISASI", "REALISASI KUMULATIF"]
    ];

    $row_new = 7;
    $no_new = 1;
    $total_invoice = 0;
    $total_denda = 0;
    $total_realisasi = 0;
    $sheet->fromArray($data_new, NULL, 'N6');
    $sheet->getStyle('N6:S6')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

    $bulan_query = "SELECT * FROM bulan_kontrak b WHERE b.bulan_header_id = '$header_id'";
    $bulan_result = mysqli_query($koneksi, $bulan_query);

    if (mysqli_num_rows($bulan_result) > 0) {
        while ($data = mysqli_fetch_assoc($bulan_result)) {
            $sheet->setCellValue('N' . $row_new, $no_new++);
            $sheet->getStyle('N')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
            $sheet->setCellValue('O' . $row_new, date('F Y', strtotime($data['bulan_bulan'])));
            $sheet->getStyle('O')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
            $sheet->setCellValue('P' . $row_new, number_format($data['bulan_invoice'], 2, ',', '.'));
            $sheet->getStyle('P')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);
            $sheet->setCellValue('Q' . $row_new, number_format($data['bulan_denda'], 2, ',', '.'));
            $sheet->getStyle('Q')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);
            $sheet->setCellValue('R' . $row_new, number_format($data['bulan_realisasi'], 2, ',', '.'));
            $sheet->getStyle('R')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);
            $sheet->setCellValue('S' . $row_new, number_format($data['bulan_rk'], 2, ',', '.'));
            $sheet->getStyle('S')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);
            $total_invoice += $data['bulan_invoice'];
            $total_denda += $data['bulan_denda'];
            $total_realisasi += $data['bulan_realisasi'];
            $row_new++;
        }

        $sheet->setCellValue('N' . $row_new, 'TOTAL');
        $sheet->mergeCells('N' . $row_new . ':O' . $row_new); // Merge cells N and O for TOTAL
        $sheet->getStyle('N' . $row_new)->getFont()->setBold(true);
        $sheet->setCellValue('P' . $row_new, number_format($total_invoice, 2, ',', '.')); // Total invoice calculation
        $sheet->getStyle('P' . $row_new)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);
        $sheet->setCellValue('Q' . $row_new, number_format($total_denda, 2, ',', '.')); // Total denda calculation
        $sheet->getStyle('Q' . $row_new)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);
        $sheet->setCellValue('R' . $row_new, number_format($total_realisasi, 2, ',', '.')); // Total realisasi calculation
        $sheet->getStyle('R' . $row_new)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);
        $sheet->getStyle('N' . $row_new . ':S' . $row_new)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
        $sheet->getStyle('S' . $row_new)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);

        $lastRowNew = $row_new - 1;
        $sheet->getStyle('N6:S' . $lastRowNew)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
        $sheet->getStyle('N6:S6')->getFont()->setBold(true);

        foreach (range('N', 'S') as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true); // Menyesuaikan ukuran kolom
        }
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