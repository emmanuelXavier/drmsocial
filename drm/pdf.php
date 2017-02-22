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
        $this->SetFont('Arial','B',30);
        $this->SetTextColor(235, 235, 235);
        $this->RotatedText(80,180, $this->dado['cpf'], 45);

        $this->SetFont('Arial','I',9);
        $this->SetTextColor(5, 6, 86);
        $this->RotatedText(15,15, "{$this->dado['name']} | {$this->dado['fone']} | {$this->dado['email']}", 0);

        $this->SetFont('Arial','',6);
        $this->SetTextColor(71, 71, 71);
        $this->RotatedText(45,285, utf8_decode('É proibida a reprodução deste material sem a devida autorização, sob pena da adotação das medidas cabíveis na esfera cível e penal.'), 0);
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