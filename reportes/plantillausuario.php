
<?php

require_once '../fpdf/fpdf.php';
class PDF extends FPDF
{

    public function Header()
    {
        $this->Image('../images/logo.png', 14, 3, 69);
//$this->Image('../images/logo.png', 140, 5, 69 );
        $this->SetFont('Arial', 'B', 8);

        $this->Cell(30);
        $this->SetTextColor(70, 130, 180);

        $this->Cell(260, 10, 'Fecha:' . date('d/m/Y'), 0, 1, 'C');

        $this->Ln(10);
        $this->SetFont('Arial', 'B', 15);

        $this->Cell(30);
        $this->SetTextColor(70, 130, 180);
        $this->Cell(14, 10, 'REPORTE DE USUARIOS', 0, 0, 'C');

        $this->Ln(20);

    }
    public function Footer()
    {
        //para el número de páginas
        $this->SetTextColor(70, 130, 180);
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(350, -1, 'Pagina ' . $this->PageNo() . '/{nb}', 0, 0, 'C');

    }

}
?>