<?php

require_once('fpdf/fpdf.php');
require_once('fpdi/fpdi.php');
require_once('pdf.php');

function drmPDF($dados, $pathFilePdf, $pathNewPdf)
{
    $pdf = new PDF();

    $pdf->setDado($dados);

    $pdf->AddPage();
    $pagecount = $pdf->setSourceFile($pathFilePdf);

    for ($i = 1; $i <= $pagecount; $i++) {

        $tpl = $pdf->importPage($i);
        $size = $pdf->useTemplate($tpl);

        if ($i != $pagecount) {
            if ($size['w'] > $size['h']) {
                $pdf->AddPage('L', array($size['w'], $size['h']));
            } else {
                $pdf->AddPage('P', array($size['w'], $size['h']));
            }
        }
    }

    $pdf->Output($pathNewPdf, "F");

}
