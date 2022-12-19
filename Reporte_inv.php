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
            $this->Cell(100);
            // Título
            $this->Cell(100,10,'REPORTE INVENTARIO',0,1,"L");
            // Salto de línea
            $this->Ln(20);
        //      Final de la cabezera

        //      Inicio del encabezado del reporte en pdf
            $this->SetTextColor(250,250,250);
            $this->SetDrawColor(105,140,150);
           
            $this -> cell(10, 10, 'ID', 1, 0, 'C', 1);
            $this -> cell(15, 10, 'CODIGO', 1, 0, 'C', 1);
            $this -> cell(25, 10, 'FACTURA', 1, 0, 'C', 1);
            $this -> cell(40, 10, 'DESCRIPCION', 1, 0, 'C', 1);
            $this -> cell(25, 10, 'INGRESO', 1, 0, 'C', 1);
            $this -> cell(23, 10, 'CANTIDAD', 1, 0, 'C', 1);
            $this -> cell(15, 10, 'UD', 1, 0, 'C', 1);
            $this -> cell(25, 10, 'PRECIO', 1, 0, 'C', 1);
            $this -> cell(23, 10, 'SUBTOTAL', 1, 0, 'C', 1);
            $this -> cell(35, 10, 'OBSERVACION', 1, 1, 'C', 1);
                       
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

$consulta  = "SELECT * FROM t_inventarios";
$resultado = $conectar -> query ($consulta);

//Caracteristicas de la hoja en formato pdf

$pdf = new PDF("L", 'mm', "letter");
$pdf -> AliasNbPages();
$pdf -> AddPage();
$pdf -> Setfont('Arial', '', 10);

// ciclo que carga en pantalla los datos de la tabla del servidor

while ($row = $resultado -> fetch_assoc()) 
            {
                
                $pdf -> cell(10, 15, $row['Id_inventario'], 1, 0, 'C', 0);
                $pdf -> cell(15, 15, $row['Cod_inventario'], 1, 0, 'C', 0);
                $pdf -> cell(25, 15, $row['Factura'], 1, 0, 'C', 0);
                $pdf -> cell(40, 15, $row['Descrip_inventario'], 1, 0, 'C', 0);
                $pdf -> cell(25, 15, $row['Fingreso_inventario'], 1, 0, 'C', 0);
                $pdf -> cell(23, 15, $row['Cant_inventario'], 1, 0, 'C', 0);
                $pdf -> cell(15, 15, $row['Ud_inventario'], 1, 0, 'C', 0);
                $pdf -> cell(25, 15, $row['Precio_inventario'], 1, 0, 'C', 0);
                $pdf -> cell(23, 15, $row['Sub_total_inventario'], 1, 0, 'C', 0);
                $pdf -> cell(35, 15, $row['Observaciones'], 1, 1, 'C', 0);
                                                
            }

$pdf -> Output();


