<?php

//https://www.youtube.com/watch?v=1acB1_LqVyc
//https://aprende-web.net/php/php3_3.php --- Manual de PHP ---

require ('FPDF/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
        function Header()
        {
             $this->SetTextColor(150,150,150);

            // Logo
            $this->Image('img/cpu.jpg',12,10,15);
           
            // Arial bold 15
            $this->SetFont('Arial','I',10);
            // Movernos a la derecha
            $this->Cell(80);
            // Título
            $this->Cell(200,10,'REPORTE COMPUTADORAS',0,1,"L");
            // Salto de línea
            $this->Ln(20);
        //      Final de la cabezera

        //      Inicio del cuerpo del pdf encabezado del reporte
            $this->SetTextColor(200,200,0);
            $this->SetDrawColor(105,140,100);
            $this -> cell(10, 10, 'ID', 1, 0, 'C', 1);
            $this -> cell(20, 10, 'INGRESO', 1, 0, 'C', 1);
            $this -> cell(25, 10, 'PLACA', 1, 0, 'C', 1);
            $this -> cell(25, 10, 'UBICACION', 1, 0, 'C', 1);
            $this -> cell(20, 10, 'MARCA', 1, 0, 'C', 1);
            $this -> cell(25, 10, 'MODELO', 1, 0, 'C', 1);
            $this -> cell(25, 10, 'WINDOWS', 1, 0, 'C', 1);
            $this -> cell(20, 10, 'OFFICE', 1, 0, 'C', 1);
            $this -> cell(30, 10, 'PROCESADOR', 1, 0, 'C', 1);
            $this -> cell(20, 10, 'MEMORIA', 1, 0, 'C', 1);
            $this -> cell(15, 10, 'HDD', 1, 0, 'C', 1);
            $this -> cell(25, 10, 'PLATAFORMA', 1, 1, 'C', 1);
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

require 'conexion.php';

$consulta = "SELECT * FROM t_computadoras";
$resultado = $conectar -> query ($consulta);

//Caracteristicas de la hoja en formato pdf

$pdf = new PDF("L", 'mm', "letter");
$pdf -> AliasNbPages();
$pdf -> AddPage();
$pdf -> Setfont('Arial', '', 10);

// ciclo que carga en pantalla los datos de la tabla del servidor

while ($row = $resultado -> fetch_assoc()) 
            {
                
                $pdf -> cell(10, 15, $row['Consecutivo'], 1, 0, 'C', 0);
                $pdf -> cell(20, 15, $row['FIngreso'], 1, 0, 'C', 0);
                $pdf -> cell(25, 15, $row['NoPlaca'], 1, 0, 'C', 0);
                $pdf -> cell(25, 15, $row['Ubicacion'], 1, 0, 'C', 0);
                $pdf -> cell(20, 15, $row['Marca'], 1, 0, 'C', 0);
                $pdf -> cell(25, 15, $row['Modelo'], 1, 0, 'C', 0);
                $pdf -> cell(25, 15, $row['Windows'], 1, 0, 'C', 0);
                $pdf -> cell(20, 15, $row['Office'], 1, 0, 'C', 0);
                $pdf -> cell(30, 15, $row['Procesador'], 1, 0, 'C', 0);
                $pdf -> cell(20, 15, $row['Memoria'], 1, 0, 'C', 0);
                $pdf -> cell(15, 15, $row['Discoduro'], 1, 0, 'C', 0);
                $pdf -> cell(25, 15, $row['Plataforma'], 1, 1, 'C', 0);
            }

        $pdf -> Output();

            
?>