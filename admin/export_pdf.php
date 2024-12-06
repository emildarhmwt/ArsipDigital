<?php
require('../fpdf/fpdf.php'); // Sesuaikan path ke library FPDF

// Buat instance FPDF
$pdf = new FPDF();
$pdf->AddPage('L');
$pdf->SetFont('Times', '', 12);

// Judul PDF
$pdf->SetFillColor(200, 200, 200);
$pdf->SetFont('Times', 'B', 16);
$pdf->Cell(0, 10, 'MONITORING KONTRAK', 0, 1, 'C');
$pdf->Ln(5);

// Header tabel
$pdf->SetFont('Times', 'B', 8);
$header = [
    'NO' => 8,
    'JUDUL KONTRAK' => 40,
    'NO SPPH' => 15,
    'KATEGORI' => 23,
    'START DATE' => 20,
    'END DATE' => 20,
    'PERIODE REALISASI' => 20,
    'NILAI KONTRAK' => 30,
    'REALISASI S.D.' => 25,
    'NILAI SISA KONTRAK' => 30,
    '% SISA' => 15,
    'KETERANGAN' => 30,
];

// Cetak header
foreach ($header as $title => $width) {
    if ($title == 'PERIODE REALISASI') {
        $x = $pdf->GetX();
        $y = $pdf->GetY();
        $pdf->MultiCell($width, 5, "PERIODE\nREALISASI", 1, 'C');
        $pdf->SetXY($x + $width, $y);
    } elseif ($title == 'JUDUL KONTRAK') {
        $x = $pdf->GetX();
        $y = $pdf->GetY();
        $pdf->MultiCell($width, 5, "JUDUL\nKONTRAK", 1, 'C');
        $pdf->SetXY($x + $width, $y);
    } elseif ($title == 'START DATE') {
        $x = $pdf->GetX();
        $y = $pdf->GetY();
        $pdf->MultiCell($width, 5, "START\nDATE", 1, 'C');
        $pdf->SetXY($x + $width, $y);
    } elseif ($title == 'END DATE') {
        $x = $pdf->GetX();
        $y = $pdf->GetY();
        $pdf->MultiCell($width, 5, "END\nDATE", 1, 'C');
        $pdf->SetXY($x + $width, $y);
    } elseif ($title == 'NILAI KONTRAK') {
        $x = $pdf->GetX();
        $y = $pdf->GetY();
        $pdf->MultiCell($width, 5, "NILAI\nKONTRAK", 1, 'C');
        $pdf->SetXY($x + $width, $y);
    } elseif ($title == 'NILAI SISA KONTRAK') {
        $x = $pdf->GetX();
        $y = $pdf->GetY();
        $pdf->MultiCell($width, 5, "NILAI SISA\nKONTRAK", 1, 'C');
        $pdf->SetXY($x + $width, $y);
    } elseif ($title == 'REALISASI S.D.') {
        $x = $pdf->GetX();
        $y = $pdf->GetY();
        $pdf->MultiCell($width, 5, "REALISASI\nS.D.", 1, 'C');
        $pdf->SetXY($x + $width, $y);
    } else {
        $pdf->Cell($width, 10, $title, 1, 0, 'C', true);
    }
}
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

$pdf->SetFont('Times', '', 7);

$no = 1;
function getMaxLines($pdf, $text, $width)
{
    $lines = $pdf->GetStringWidth($text) / $width;
    return ceil($lines); // Hitung jumlah baris
}

while ($p = mysqli_fetch_array($kategori)) {
    $nilai_kontrak = $p['total_nilai_kontrak'];
    $realisasi_sd = $p['total_realisasi'];
    $nilai_sisa_kontrak = $nilai_kontrak - $realisasi_sd;
    $persen_sisa = ($nilai_kontrak > 0) ? ($nilai_sisa_kontrak / $nilai_kontrak) * 100 : 0;

    // Hitung tinggi maksimum untuk baris
    $maxLines = max(
        getMaxLines($pdf, $p['header_judul'], $header['JUDUL KONTRAK']),
        getMaxLines($pdf, $p['header_ket'], $header['KETERANGAN'])
    );
    $rowHeight = $maxLines * 5; // Tinggi setiap baris (5 adalah tinggi per baris teks)

    // Cetak data per kolom
    $x = $pdf->GetX();
    $y = $pdf->GetY();
    $pdf->MultiCell($header['NO'], $rowHeight, $no++, 1, 'C');
    $pdf->SetXY($x + $header['NO'], $y);

    $x = $pdf->GetX();
    $y = $pdf->GetY();
    $pdf->MultiCell($header['JUDUL KONTRAK'], $rowHeight, $p['header_judul'], 1, 'L');
    $pdf->SetXY($x + $header['JUDUL KONTRAK'], $y);

    $x = $pdf->GetX();
    $y = $pdf->GetY();
    $pdf->MultiCell($header['NO SPPH'], $rowHeight, $p['header_nomor'], 1, 'C');
    $pdf->SetXY($x + $header['NO SPPH'], $y);

    $x = $pdf->GetX();
    $y = $pdf->GetY();
    $pdf->MultiCell($header['KATEGORI'], $rowHeight, $p['header_kategori'], 1, 'C');
    $pdf->SetXY($x + $header['KATEGORI'], $y);

    $x = $pdf->GetX();
    $y = $pdf->GetY();
    $pdf->MultiCell($header['START DATE'], $rowHeight, date('F Y', strtotime($p['kontrak_awal'])), 1, 'C');
    $pdf->SetXY($x + $header['START DATE'], $y);

    $x = $pdf->GetX();
    $y = $pdf->GetY();
    $pdf->MultiCell($header['END DATE'], $rowHeight, date('F Y', strtotime($p['kontrak_akhir'])), 1, 'C');
    $pdf->SetXY($x + $header['END DATE'], $y);

    $x = $pdf->GetX();
    $y = $pdf->GetY();
    $pdf->MultiCell($header['PERIODE REALISASI'], $rowHeight, date('F Y', strtotime($p['kontrak_awal'])), 1, 'C');
    $pdf->SetXY($x + $header['PERIODE REALISASI'], $y);

    $x = $pdf->GetX();
    $y = $pdf->GetY();
    $pdf->MultiCell($header['NILAI KONTRAK'], $rowHeight, number_format($nilai_kontrak, 2, ',', '.'), 1, 'R');
    $pdf->SetXY($x + $header['NILAI KONTRAK'], $y);

    $x = $pdf->GetX();
    $y = $pdf->GetY();
    $pdf->MultiCell($header['REALISASI S.D.'], $rowHeight, number_format($realisasi_sd, 2, ',', '.'), 1, 'R');
    $pdf->SetXY($x + $header['REALISASI S.D.'], $y);

    $x = $pdf->GetX();
    $y = $pdf->GetY();
    $pdf->MultiCell($header['NILAI SISA KONTRAK'], $rowHeight, number_format($nilai_sisa_kontrak, 2, ',', '.'), 1, 'R');
    $pdf->SetXY($x + $header['NILAI SISA KONTRAK'], $y);

    $x = $pdf->GetX();
    $y = $pdf->GetY();
    $pdf->MultiCell($header['% SISA'], $rowHeight, number_format($persen_sisa, 2) . '%', 1, 'C');
    $pdf->SetXY($x + $header['% SISA'], $y);

    $x = $pdf->GetX();
    $y = $pdf->GetY();
    $pdf->MultiCell($header['KETERANGAN'], $rowHeight, $p['header_ket'], 1, 'L');
    $pdf->SetXY($x + $header['KETERANGAN'], $y);

    $pdf->Ln();
}

// Output PDF
$pdf->Output('I', 'monitoring_kontrak.pdf');