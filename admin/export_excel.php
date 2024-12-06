<?php
include '../koneksi.php';
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="data_monitoring.xlsx"');

$kategori = mysqli_query($koneksi, "SELECT hk.*, k.kontrak_awal, k.kontrak_akhir, 
    (SELECT SUM(k2.kontrak_total) 
     FROM kontrak k2 
     WHERE k2.kontrak_header_id = hk.header_id) AS total_nilai, 
     (SELECT SUM(b2.bulan_realisasi) 
     FROM bulan_kontrak b2 
     WHERE b2.bulan_header_id = hk.header_id) AS total_realisasi 
    FROM header_kontrak hk 
    LEFT JOIN kontrak k ON hk.header_id = k.kontrak_header_id 
    LEFT JOIN bulan_kontrak b ON hk.header_id = b.bulan_header_id 
    GROUP BY hk.header_id");

require 'vendor/autoload.php'; // Make sure to include PhpSpreadsheet

$spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setTitle('Monitoring Data');

// Set header
$headers = ['No', 'Judul Kontrak', 'No SPPH', 'Kategori', 'Start Date', 'End Date', 'Periode Realisasi', 'Nilai Kontrak', 'Realisasi S.D.', 'Nilai Sisa Kontrak', '% Sisa', 'Keterangan'];
$sheet->fromArray($headers, NULL, 'A1');

// Populate data
$row = 2;
$no = 1;
while ($p = mysqli_fetch_array($kategori)) {
    $sheet->fromArray([
        $no++,
        $p['header_judul'],
        $p['header_nomor'],
        $p['header_kategori'],
        date('F Y', strtotime($p['kontrak_awal'])),
        date('F Y', strtotime($p['kontrak_akhir'])),
        date('F Y', strtotime($p['kontrak_awal'])),
        $p['total_nilai'],
        $p['total_realisasi'],
        ($p['total_nilai'] - $p['total_realisasi']),
        ($p['total_nilai'] - $p['total_realisasi']) / $p['total_nilai'] * 100,
        $p['header_ket']
    ], NULL, 'A' . $row++);
}

// Save Excel file
$writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
$writer->save('php://output');
exit;
?>