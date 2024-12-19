<?php
include '../koneksi.php';

// Include PhpSpreadsheet
require '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

// Query untuk mengambil data
$query = "SELECT om.*, 
                 GROUP_CONCAT(oi.ordermeisi_tanggal ORDER BY oi.ordermeisi_id SEPARATOR '\n') AS ordermeisi_tanggal, 
                 GROUP_CONCAT(oi.ordermeisi_history ORDER BY oi.ordermeisi_id SEPARATOR '\n') AS ordermeisi_history 
          FROM order_me om 
          LEFT JOIN orderme_isi oi ON om.orderme_id = oi.ordermeisi_order_id
          GROUP BY om.orderme_id";
$result = mysqli_query($koneksi, $query);

// Cek jika ada data
if (mysqli_num_rows($result) > 0) {
    // Data array untuk Excel
    $data = [
        ["NO", "KATEGORI", "TANGGAL PENGAJUAN", "REQUEST ORDER", "DESKRIPSI", "LOKASI", "PENANGGUNG JAWAB", "PENERIMA REQUEST", "STATUS", "TANGGAL FOLLOW UP", "HISTORI FOLLOW UP", "TANGGAL SELESAI", "DOKUMEN / EVIDEN"]
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
        $sheet->setCellValue('C' . $row, $rowData['orderme_kategori']);
        $sheet->getStyle('C' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->setCellValue('D' . $row, date('d/m/Y', strtotime($rowData['orderme_tanggal'])));
        $sheet->getStyle('D' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->setCellValue('E' . $row, $rowData['orderme_request']);
        $sheet->getStyle('E' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->setCellValue('F' . $row, $rowData['orderme_desk']);
        $sheet->getStyle('F' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->setCellValue('G' . $row, $rowData['orderme_lokasi']);
        $sheet->getStyle('G' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->setCellValue('H' . $row, !empty($rowData['orderme_pj']) ? $rowData['orderme_pj'] : '-');
        $sheet->getStyle('H' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->setCellValue('I' . $row, $rowData['orderme_penerima']);
        $sheet->getStyle('I' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->setCellValue('J' . $row, $rowData['orderme_status']);
        $sheet->getStyle('J' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $sheet->setCellValue('M' . $row, $rowData['orderme_tglselesai'] === '0000-00-00' ? '-' : date('d/m/Y', strtotime($rowData['orderme_tglselesai'])));
        $sheet->getStyle('M' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->setCellValue('N' . $row, !empty($rowData['orderme_dokumen']) ? "Upload" : "Belum Upload");
        $sheet->getStyle('N' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        // Split the concatenated dates and histories
        $followUpDates = explode("\n", $rowData['ordermeisi_tanggal']);
        $followUpHistories = explode("\n", $rowData['ordermeisi_history']);

        // Insert follow-up data in new rows
        if (empty($followUpDates[0]) && empty($followUpHistories[0])) {
            $sheet->setCellValue('K' . $row, '-');
            $sheet->getStyle('K' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
            $sheet->setCellValue('L' . $row, '-');
            $sheet->getStyle('L' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
            $row++;
        } else {
            // Insert follow-up data in new rows
            foreach ($followUpDates as $index => $date) {
                $formattedDate = date('d/m/Y', strtotime($date));
                $sheet->setCellValue('K' . $row, $formattedDate);
                $sheet->getStyle('K' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                $sheet->setCellValue('L' . $row, isset($followUpHistories[$index]) ? $followUpHistories[$index] : '');
                $sheet->getStyle('L' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                $row++;
            }
        }
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
    header('Content-Disposition: attachment;filename="Order_Me.xlsx"');
    header('Cache-Control: max-age=0');

    $writer = new Xlsx($spreadsheet);
    $writer->save('php://output');
    exit;
} else {
    echo "Tidak ada data yang tersedia untuk diekspor.";
}