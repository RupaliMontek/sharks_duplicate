<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'libraries/vendor/autoload.php'; // Correct path to autoload.php

use Mpdf\Mpdf;

class Mpdf_library {

    protected $mpdf;

    public function __construct()
    {
        $this->mpdf = new Mpdf();
    } 

    public function createPdf($html, $filename = 'document.pdf',$css_file_path=NULL)
    {
        $css = file_get_contents($css_file_path);
        $content = '<style>' . $css . '</style>' . $html;
        $this->mpdf->WriteHTML($content);
        $this->mpdf->Output($filename, 'D'); // 'D' for download, 'I' for inline display
    }

}
