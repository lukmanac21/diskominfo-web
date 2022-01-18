<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require_once("./vendor/dompdf/dompdf/autoload.inc.php");
use Dompdf\Dompdf;

class Pdf_generator {

  public function generate($html, $filename='', $stream=TRUE, $paper = 'folio', $orientation = "portrait"){
      $dompdf = new DOMPDF();
      $dompdf->load_html($html);
      $dompdf->set_paper($paper, $orientation);
      $dompdf->render();
      if ($stream) {
          $dompdf->stream($filename.".pdf", array("Attachment" => 0));
      } else {
          return $dompdf->output();
      }
    }
    function createbagan($html, $filename='', $download=TRUE, $paper='folio', $orientation='potrait'){
        $dompdf = new DOMPDF();
        $dompdf->load_html($html);
        $dompdf->set_paper($paper, $orientation);
        $dompdf->render();
        if($download)
            $dompdf->stream($filename.'.pdf', array('Attachment' => 1));
        else
            $dompdf->stream($filename.'.pdf', array('Attachment' => 0));
        }

  function createpdf($html, $filename='', $download=TRUE, $paper='folio', $orientation='portrait'){
        $dompdf = new DOMPDF();
        $dompdf->load_html($html);
        $dompdf->set_paper($paper, $orientation);
        $dompdf->render();
        if($download)
            $dompdf->stream($filename.'.pdf', array('Attachment' => 1));
        else
            $dompdf->stream($filename.'.pdf', array('Attachment' => 0));
        }
}