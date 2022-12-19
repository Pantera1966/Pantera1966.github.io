<?php

//https://www.youtube.com/watch?v=1acB1_LqVyc
//https://aprende-web.net/php/php3_3.php --- Manual de PHP ---

require ('FPDF/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
        function Header()
        {
             $this->SetTextColor(150,150,0);

            // Logo
            $this->Image('img/cpu.jpg',12,10,15);
           
            // Arial bold 15
            $this->SetFont('Arial','I',10);
            // Movernos a la derecha
            $this->Cell(80);
            // Título
            $this->Cell(200,10,'REPORTE DE IMPRESORAS',0,1,"L");
            // Salto de línea
            $this->Ln(20);
        //      Final de la cabezera

        //      Inicio del cuerpo del pdf encabezado del reporte
            $this->SetTextColor(200,200,0);
            $this->SetDrawColor(200,200,100);
            $this -> cell(10, 10, 'ID', 1, 0, 'C', 1);
            $this -> cell(25, 10, 'INGRESO', 1, 0, 'C', 1);
            $this -> cell(25, 10, 'PLACA', 1, 0, 'C', 1);
            $this -> cell(25, 10, 'UBICACION', 1, 0, 'C', 1);
            $this -> cell(20, 10, 'MARCA', 1, 0, 'C', 1);
            $this -> cell(25, 10, 'MODELO', 1, 0, 'C', 1);
            $this -> cell(39, 10, 'TIPO IMP', 1, 0, 'C', 1);
            $this -> cell(24, 10, 'MODO IMP', 1, 0, 'C', 1);
            $this -> cell(51, 10, 'OBSERVACIONES', 1, 1, 'C', 1);
            
        }
        //      Final del cuerpo del pdf
}

// Pie de página
function Footer()
            {
                // Posición: a 1,5 cm del final
                $this->SetY(-15);
                // Arial italic 8
                $this->SetFont('Arial','I',8);
                // Número de página
                $this->Cell(70,10,'Pagina '.$this->PageNo().'/{nb}',0,0,"C");
            }
{}
require 'conexion.php';

$consulta = "SELECT * FROM t_impresoras";
$resultado = $conectar -> query ($consulta);

//Caracteristicas de la hoja en formato pdf

$pdf = new PDF("L", 'mm', "letter");
$pdf -> AliasNbPages();
$pdf -> AddPage();
$pdf -> Setfont('Arial', '', 10);

// ciclo que carga en pantalla los datos de la tabla del servidor

while ($row = $resultado -> fetch_assoc()) 
            {
                
                $pdf -> cell(10, 10, $row['Consecutivo'], 1, 0, 'C', 0);
                $pdf -> cell(25, 10, $row['Fingreso'], 1, 0, 'C', 0);
                $pdf -> cell(25, 10, $row['Noplaca'], 1, 0, 'C', 0);
                $pdf -> cell(25, 10, $row['Ubicacion'], 1, 0, 'C', 0);
                $pdf -> cell(20, 10, $row['Marca'], 1, 0, 'C', 0);
                $pdf -> cell(25, 10, $row['Modelo'], 1, 0, 'C', 0);
                $pdf -> cell(39, 10, $row['Tipoimpresora'], 1, 0, 'C', 0);
                $pdf -> cell(25, 10, $row['Tipoimpresion'], 1, 0, 'C', 0);
                $pdf -> cell(50, 10, $row['Observaciones'], 1, 1, 'C', 0);
                
            }

$pdf -> Output();

?>