<?php
require('../fpdf/fpdf.php'); // Sesuaikan path ke library FPDF

// Buat instance FPDF
$pdf = new FPDF();
$pdf->AddPage('L');
$pdf->SetFont('Times', '', 12);

$pdf->Cell(0, 10, 'MONITORING KONTRAK', 0, 1, 'C');
// Header tabel
$pdf->SetFont('Times', 'B', 12);
$pdf->Cell(10, 10, 'NO', 1);
$pdf->Cell(40, 10, 'JUDUL KONTRAK', 1);
$pdf->Cell(30, 10, 'NO SPPH', 1);
$pdf->Cell(30, 10, 'KATEGORI', 1);
$pdf->Cell(30, 10, 'START DATE', 1);
$pdf->Cell(30, 10, 'END DATE', 1);
$pdf->Cell(30, 10, 'PERIODE REALISASI', 1);
$pdf->Cell(30, 10, 'NILAI KONTRAK', 1);
$pdf->Cell(30, 10, 'REALISASI S.D.', 1);
$pdf->Cell(30, 10, 'NILAI SISA KONTRAK', 1);
$pdf->Cell(30, 10, '% SISA', 1);
$pdf->Cell(30, 10, 'KETERANGAN', 1);
$pdf->Ln();

// Ambil data dari database
include '../koneksi.php';
$kategori = mysqli_query($koneksi, "
    SELECT 
        hk.header_id,
        hk.header_judul,
        hk.header_nomor,
        hk.header_kategori,
        hk.header_ket,
        c.kontrak_awal,
        c.kontrak_akhir,
        SUM(c.kontrak_total) AS total_nilai_kontrak,
        SUM(b.bulan_realisasi) AS total_realisasi
    FROM 
        header_kontrak hk
    LEFT JOIN 
        kontrak c ON hk.header_id = c.kontrak_header_id
    LEFT JOIN 
        bulan_kontrak b ON hk.header_id = b.bulan_header_id
    GROUP BY 
        hk.header_id
");

$no = 1;
while ($p = mysqli_fetch_array($kategori)) {
    $nilai_kontrak = $p['total_nilai_kontrak'];
    $realisasi_sd = $p['total_realisasi'];
    $nilai_sisa_kontrak = $nilai_kontrak - $realisasi_sd;
    $persen_sisa = ($nilai_kontrak > 0) ? ($nilai_sisa_kontrak / $nilai_kontrak) * 100 : 0;

    $pdf->Cell(10, 10, $no++, 1);
    $pdf->Cell(40, 10, $p['header_judul'], 1);
    $pdf->Cell(30, 10, $p['header_nomor'], 1);
    $pdf->Cell(30, 10, $p['header_kategori'], 1);
    $pdf->Cell(30, 10, date('F Y', strtotime($p['kontrak_awal'])), 1);
    $pdf->Cell(30, 10, date('F Y', strtotime($p['kontrak_akhir'])), 1);
    $pdf->Cell(30, 10, date('F Y', strtotime($p['kontrak_awal'])), 1); // Periode realisasi
    $pdf->Cell(30, 10, number_format($nilai_kontrak, 2), 1); // Nilai kontrak
    $pdf->Cell(30, 10, number_format($realisasi_sd, 2), 1); // Realisasi S.D.
    $pdf->Cell(30, 10, number_format($nilai_sisa_kontrak, 2), 1); // Nilai sisa kontrak
    $pdf->Cell(30, 10, number_format($persen_sisa, 2) . '%', 1); // % Sisa
    $pdf->Cell(30, 10, $p['header_ket'], 1); // Keterangan
    $pdf->Ln();
}
// Output PDF
$pdf->Output('I', 'monitoring_kontrak.pdf');
?>