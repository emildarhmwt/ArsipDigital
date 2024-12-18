<?php
include '../koneksi.php';

// Include PhpSpreadsheet
require '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

// Query untuk mengambil data yang sesuai
$query = "
    SELECT 
        ah.agendaheader_ticket,
        ah.agendaheader_nopeg,
        ah.agendaheader_nomor,
        ah.agendaheader_fasilitas,
        ah.agendaheader_jumlah,
        ah.agendaheader_kebutuhan,
        ah.agendaheader_layout,
        a.agenda_kategori,
        a.agenda_tanggal,
        a.agenda_tanggalawal,
        a.agenda_tanggalakhir,
        a.agenda_kegiatan,
        a.agenda_deskripsi,
        a.agenda_lokasi,
        a.agenda_pj,
        a.agenda_status,
        a.agenda_dokumen
    FROM agenda_header ah
    JOIN agenda a ON ah.agendaheader_id = a.agenda_header_id";

$result = mysqli_query($koneksi, $query);

// Cek jika ada data
if (mysqli_num_rows($result) > 0) {
    // Data array untuk Excel
    $data = [
        ["NO", "NO TICKET", "NOPEG", "NOMOR HP", "FASILITAS", "JUMLAH ORANG", "KEBUTUHAN TAMBAHAN", "LAYOUT RUANGAN", "KATEGORI", "TANGGAL", "WAKTU", "KEGIATAN", "DESKRIPSI", "LOKASI", "PENANGGUNG JAWAB", "STATUS", "DOKUMEN RISALAH RAPAT"]
    ];

    $no = 1;
    $row = 3;
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    $sheet->fromArray($data, NULL, 'B2');
    $sheet->getStyle('B2:R2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

    while ($rowData = mysqli_fetch_assoc($result)) {
        $sheet->setCellValue('B' . $row, $no++);
        $sheet->getStyle('B' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $sheet->setCellValue('C' . $row, $rowData['agendaheader_ticket']);
        $sheet->getStyle('C' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->setCellValue('D' . $row, $rowData['agendaheader_nopeg']);
        $sheet->getStyle('D' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->setCellValue('E' . $row, $rowData['agendaheader_nomor']);
        $sheet->getStyle('E' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->setCellValue('F' . $row, $rowData['agendaheader_fasilitas']);
        $sheet->getStyle('F' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->setCellValue('G' . $row, $rowData['agendaheader_jumlah']);
        $sheet->getStyle('G' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->setCellValue('H' . $row, $rowData['agendaheader_kebutuhan']);
        $sheet->getStyle('H' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->setCellValue('I' . $row, !empty($rowData['agendaheader_layout']) ? "Upload" : "Belum Upload");
        $sheet->getStyle('I' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->setCellValue('J' . $row, $rowData['agenda_kategori']);
        $sheet->getStyle('J' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->setCellValue('K' . $row, date('d/m/Y', strtotime($rowData['agenda_tanggal'])));
        $sheet->getStyle('K' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $waktu = date('H:i', strtotime($rowData['agenda_tanggalawal'])) . ' - ' . date('H:i', strtotime($rowData['agenda_tanggalakhir']));
        $sheet->setCellValue('L' . $row, $waktu);
        $sheet->getStyle('L' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->setCellValue('M' . $row, $rowData['agenda_kegiatan']);
        $sheet->getStyle('M' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->setCellValue('N' . $row, $rowData['agenda_deskripsi']);
        $sheet->getStyle('N' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->setCellValue('O' . $row, $rowData['agenda_lokasi']);
        $sheet->getStyle('O' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->setCellValue('P' . $row, $rowData['agenda_pj']);
        $sheet->getStyle('P' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->setCellValue('Q' . $row, $rowData['agenda_status']);
        $sheet->getStyle('Q' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->setCellValue('R' . $row, !empty($rowData['agenda_dokumen']) ? "Upload" : "Belum Upload");
        $sheet->getStyle('R' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $row++;
    }

    // Styling
    $lastRow = $row - 1;
    $sheet->getStyle('B2:R' . $lastRow)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
    $sheet->getStyle('B2:R2')->getFont()->setBold(true);

    // Auto-size columns
    foreach (range('B', 'R') as $col) {
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