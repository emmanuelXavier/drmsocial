<?php

require_once 'PDFRotate.php';

class PDF extends PDFRotate
{

    private $dado;

    public function setDado($dado)
    {
        $this->dado = $dado;
    }

    function Header()
    {
        $this->SetFont('Arial','B',80);
        $this->SetTextColor(229, 245, 255);
        $this->RotatedText(43,220, $this->dado['cpf'], 45);

        $this->SetFont('Arial','I',9);
        $this->SetTextColor(5, 6, 86);
        $this->RotatedText(15,15, "{$this->dado['name']} | {$this->dado['fone']} | {$this->dado['email']}", 0);
    }

    function RotatedText($x,$y,$txt,$angle)
    {
        $this->Rotate($angle,$x,$y);
        $this->Text($x,$y,$txt);
        $this->Rotate(0);
    }

    function RotatedImage($file,$x,$y,$w,$h,$angle)
    {
        $this->Rotate($angle,$x,$y);
        $this->Image($file,$x,$y,$w,$h);
        $this->Rotate(0);
    }
}