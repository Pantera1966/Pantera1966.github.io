<?php

//https://www.youtube.com/watch?v=1acB1_LqVyc
//https://aprende-web.net/php/php3_3.php --- Manual de PHP ---

require ('FPDF/fpdf.php');


class PDF extends FPDF
{
        // Cabecera de página
        function Header()
        {
             $this->SetTextColor(250,50,250);

            // Logo
            $this->Image('img/cpu.jpg',20,10,15);
           
            // Arial bold 15
            $this->SetFont('Arial','I',20);
            // Movernos a la derecha
            $this->Cell(80);
            // Título
            $this->Cell(30,20,'VALOR TOTAL INVENTARIO', 0, 1,"L");
            // Salto de línea
            $this->Ln(10);
        //      Final de la cabezera

        ////////////////////////////////////////////////////////////////////

        //      Inicio del cuerpo del pdf encabezado del reporte
            $this->SetTextColor(200,200,0);
            $this->SetDrawColor(145,140,50);
           
            //$this -> cell(30, 10, 'CONSECUTIVO', 1, 0, 'C', 1);
            $this -> cell(250, 10, 'VALOR INVENTARIO', 0, 1, 'C', 1);
           
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
                $this->Cell(70,10,'Pagina '.$this->PageNo().'/{nb}', 1, 1,"C");
            }

require 'conexion.php';

$consulta = "SELECT * FROM t_valor_inventario";
$resultado = $mysqli -> query ($consulta);

//Caracteristicas de la hoja en formato pdf
$pdf = new PDF("L", 'mm', "letter");
$pdf -> AliasNbPages();
$pdf -> AddPage();
$pdf -> Setfont('Arial', '', 45);

// ciclo que carga en pantalla los datos de la tabla del servidor

while ($row = $resultado -> fetch_assoc()) 
            {
                
                $pdf -> cell(30, 15, $row['Consecutivo'], 1, 0, 'C', 0);
                $pdf -> cell(50, 15, $row['VTotal_inventario'], 1, 1, 'C', 0);
               
            }

        $pdf -> Output();

?>