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

        echo " page : {$i} <br>";

        /**
         *  $dados['name'] = 'Meginho Concurseiro';
            $dados['email'] = 'meginho@mege.com.br';
            $dados['fone'] = '99 98465-7677';
            $dados['cpf'] = '987.980.985-89';
            $pdf->setDado($dados);
         */

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