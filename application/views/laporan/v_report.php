<?php
//============================================================+
// File name   : example_005.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 005 for TCPDF class
//               Multicell
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Multicell
 * @author Nicola Asuni
 * @since 2008-03-04
 * @group cell
 * @group pdf
 */

// Include the main TCPDF library (search for installation path).
//require_once('tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->setCreator(PDF_CREATOR);
$pdf->setAuthor('Nicola Asuni');
$pdf->setTitle('TCPDF Example 005');
$pdf->setSubject('TCPDF Tutorial');
$pdf->setKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->setMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->setHeaderMargin(PDF_MARGIN_HEADER);
$pdf->setFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->setAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
    require_once(dirname(__FILE__) . '/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->setFont('times', '', 10);

// add a page
$pdf->AddPage();

// set cell padding
$pdf->setCellPaddings(1, 1, 1, 1);

// set cell margins
$pdf->setCellMargins(1, 1, 1, 1);

// set color for background
$pdf->setFillColor(255, 255, 127);

// MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopadding=true, $maxh=0)

$title = <<<OED
<h3>Report Data Calon Pelanggan</h3>
OED;
$pdf->WriteHTMLCell(0, 0, '', '', $title, 0, 1, 0, true, 'C', true);
$table = '<table style="border:1px solid #000; padding:6px;">';
$table .= '<tr>
<th style="border:1px solid #000;">Nama</th>
<td style="border:1px solid #000;">' . $user->nama . '</td>
</tr>';

$table .= '<tr>
<th style="border:1px solid #000;">Telepon</th>
<td style="border:1px solid #000;">' . $user->telepon . '</td>
</tr>';

$table .= '<tr>
<th style="border:1px solid #000;">Alamat</th>
<td style="border:1px solid #000;">' . $user->alamat . '</td>
</tr>';

$table .= '<tr>
<th style="border:1px solid #000;">RT</th>
<td style="border:1px solid #000;">' . $user->rt . '</td>
</tr>';

$table .= '<tr>
<th style="border:1px solid #000;">RW</th>
<td style="border:1px solid #000;">' . $user->rw . '</td>
</tr>';

$table .= '<tr>
<th style="border:1px solid #000;">Kecamatan</th>
<td style="border:1px solid #000;">' . $user->kecamatan . '</td>
</tr>';

$table .= '<tr>
<th style="border:1px solid #000;">Kelurahan</th>
<td style="border:1px solid #000;">' . $user->kelurahan . '</td>
</tr>';

$table .= '<tr>
<th style="border:1px solid #000;">Kode Pos</th>
<td style="border:1px solid #000;">' . $user->kode_pos . '</td>
</tr>';

$table .= '<tr>
<th style="border:1px solid #000;">Fungsi Bangunan</th>
<td style="border:1px solid #000;">' . $user->fungsi_bangunan . '</td>
</tr>';

$table .= '<tr>
<th style="border:1px solid #000;">Detail Alamat</th>
<td style="border:1px solid #000;">' . $user->detail_alamat . '</td>
</tr>';

$table .= '<tr>
<th style="border:1px solid #000;">Jumlah Penghuni Tetap</th>
<td style="border:1px solid #000;">' . $user->jp_tetap . '</td>
</tr>';

$table .= '<tr>
<th style="border:1px solid #000;">Jumlah Penghuni Tidak Tetap</th>
<td style="border:1px solid #000;">' . $user->jp_tdk_tetap . '</td>
</tr>';

$table .= '<tr>
<th style="border:1px solid #000;">Lebar Jalan</th>
<td style="border:1px solid #000;">' . $user->lebar_jalan . '</td>
</tr>';

$table .= '<tr>
<th style="border:1px solid #000;">Luas Tanah</th>
<td style="border:1px solid #000;">' . $user->luas_tanah . '</td>
</tr>';

$table .= '<tr>
<th style="border:1px solid #000;">Luas Bangunan</th>
<td style="border:1px solid #000;">' . $user->luas_bangunan . '</td>
</tr>';

$table .= '<tr>
<th style="border:1px solid #000;">Tegangan Listrik</th>
<td style="border:1px solid #000;">' . $user->tegangan_listrik . '</td>
</tr>';
$table .= '</table>';
$pdf->WriteHTMLCell(0, 0, '', '', $table, 0, 1, 0, true, 'C', true);

// move pointer to last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
// tambahkan fungsi ob_clean
ob_clean();
$pdf->Output('daftar_sambungan_baru_' . $user->id . '.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
