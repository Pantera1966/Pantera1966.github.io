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
            $this->Cell(200,10,'REPORTE USUARIOS ACTIVOS',0,1,"L");
            // Salto de línea
            $this->Ln(20);
        //      Final de la cabezera

        //      Inicio del cuerpo del pdf encabezado del reporte
            $this->SetTextColor(200,200,0);
            $this->SetDrawColor(200,200,100);
            $this -> cell(10, 10, 'ID', 1, 0, 'C', 1);
            $this -> cell(50, 10, 'NOMBRE', 1, 0, 'C', 1);
            $this -> cell(50, 10, 'APELLIDO1', 1, 0, 'C', 1);
            $this -> cell(50, 10, 'APELLIDO2', 1, 0, 'C', 1);
            $this -> cell(50, 10, 'CEDULA', 1, 0, 'C', 1);
            $this -> cell(50, 10, 'DEPARTAMENTO', 1, 1, 'C', 1);
                        
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

$consulta = "SELECT * FROM t_usuarios";
$resultado = $conectar -> query($consulta);

//Caracteristicas de la hoja en formato pdf

$pdf = new PDF("L", 'mm', "letter");
$pdf -> AliasNbPages();
$pdf -> AddPage();
$pdf -> Setfont('Arial', '', 10);

// ciclo que carga en pantalla los datos de la tabla del servidor

while ($row = $resultado -> fetch_assoc()) 
            {
                
                $pdf -> cell(10, 10, $row['consecutivo_usu'], 1, 0, 'C', 0);
                $pdf -> cell(50, 10, $row['Nombre'], 1, 0, 'C', 0);
                $pdf -> cell(50, 10, $row['Apellido1'], 1, 0, 'C', 0);
                $pdf -> cell(50, 10, $row['Apellido2'], 1, 0, 'C', 0);
                $pdf -> cell(50, 10, $row['Cedula'], 1, 0, 'C', 0);
                $pdf -> cell(50, 10, $row['Departamento'], 1, 1, 'C', 0);
                                
            }

$pdf -> Output();

?>