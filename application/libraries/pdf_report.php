<?php
defined('BASEPATH') or exit('No direct script access allowed');


// sisipkan file tcpdfnya di sini
require_once dirname(__file__) . '/tcpdf/tcpdf.php';
class pdf_report extends TCPDF
{
    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
    }
}
