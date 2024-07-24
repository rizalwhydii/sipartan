<?php
function flashData($message, $tittle, $icon)
{
    $CI = &get_instance();

    $CI->session->set_flashdata('message', $message);
    $CI->session->set_flashdata('tittle', $tittle);
    $CI->session->set_flashdata('icon', $icon);
}

function NotLogin()
{
    $CI = &get_instance();

    $email = $CI->session->userdata('email');
    $role = $CI->session->userdata('role');

    if (!$role && !$email) {
        redirect('frontend/login', 'refresh');
    }
}

function AdminSecure()
{
    $CI = &get_instance();

    $role = $CI->session->userdata('role');

    if ($role != 'Admin') {
        redirect('frontend', 'refresh');
    }
}

function weightPipa($diameter)
{
    if ($diameter == 15) {
        return '1';
    } elseif ($diameter == 20) {
        return '2';
    } elseif ($diameter == 25) {
        return '3';
    } elseif ($diameter == 40) {
        return '4';
    } elseif ($diameter == 50) {
        return '5';
    } elseif ($diameter == 75) {
        return '6';
    } elseif ($diameter == 100) {
        return '7';
    } elseif ($diameter == 125) {
        return '8';
    } elseif ($diameter == 150) {
        return '9';
    } elseif ($diameter == 200) {
        return '10';
    } elseif ($diameter == 250) {
        return '11';
    } else {
        return '0';
    };
}

function report($data)
{
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
    $pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE . ' 005', PDF_HEADER_STRING);

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
<h3>Report Data Pengaduan Pelanggan</h3>
OED;
    $pdf->WriteHTMLCell(0, 0, '', '', $title, 0, 1, 0, true, 'C', true);
    $table = '<table style="border:1px solid #000; padding:6px;">';
    $table .= '<tr>
<th style="border:1px solid #000;">Nomor PAM</th>
<td style="border:1px solid #000;">Data 1</td>
</tr>';

    $table .= '<tr>
<th style="border:1px solid #000;">Nama</th>
<td style="border:1px solid #000;">Data 2</td>
</tr>';

    $table .= '<tr>
<th style="border:1px solid #000;">Nomor Handphone</th>
<td style="border:1px solid #000;">Data 2</td>
</tr>';

    $table .= '<tr>
<th style="border:1px solid #000;">Email Aktif</th>
<td style="border:1px solid #000;">Data 2</td>
</tr>';

    $table .= '<tr>
<th style="border:1px solid #000;">Alamat</th>
<td style="border:1px solid #000;">Data 2</td>
</tr>';

    $table .= '<tr>
<th style="border:1px solid #000;">Kategori Pengaduan</th>
<td style="border:1px solid #000;">Data 2</td>
</tr>';

    $table .= '<tr>
<th style="border:1px solid #000;">Tanggal Pengaduan</th>
<td style="border:1px solid #000;">Data 2</td>
</tr>';

    $table .= '<tr>
<th style="border:1px solid #000;">Isi Pengaduan</th>
<td style="border:1px solid #000;">Data 2</td>
</tr>';

    $table .= '</table>';
    $pdf->WriteHTMLCell(0, 0, '', '', $table, 0, 1, 0, true, 'C', true);

    // move pointer to last page
    $pdf->lastPage();

    // ---------------------------------------------------------

    //Close and output PDF document
    // tambahkan fungsi ob_clean
    ob_clean();
    $pdf->Output('report.pdf', 'I');

    //============================================================+
    // END OF FILE
    //============================================================+

}
