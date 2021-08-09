<?php
namespace App\Classes;

use Anouar\Fpdf\Fpdf as FPDF;
use tidy;

class Ticket
{
    public static function createTicket($data){
        date_default_timezone_set('America/Mexico_City');//utilizamos la zona horaria de mexico
        $fecha = date ('d/m/Y');//creamos una variable para almacenar la fecha

		$fpdf = new FPDF();
		$fpdf->pagina = 0;
		$fpdf->AliasNbPages(); //Permitir el conteo de la cantidad de páginas existentes {nb}
        $fpdf->AddPage();
             
		$fpdf->Image('img/LogoSystemDoc.png',10,8,33); //Insertamos el logo si es en PNG su calidad o formato debe estar entre PNG 8/PNG 24
			 
			$ancho = 190;
			$fpdf->SetFont('Arial', 'B', 6);
			 /*metrics*/
			 $fpdf->setXY(150,20);
			 $y = $fpdf->getY();
			 $x = $fpdf->getX();
			 $border = 0;
			 $width = 48;
			/* Header Ticket - Information - */
			$fpdf->SetFont('Courier','B',7);
			$cellHeight = 4;
			$fpdf->setXY($x,$y);
			$fpdf->MultiCell(($width),$cellHeight,utf8_decode('Av Constituyentes 4, Centro, 42630'),$border,'C',0);
			$y = $fpdf->getY();
			$fpdf->setXY($x,$y);
			$fpdf->MultiCell(($width),$cellHeight,utf8_decode('Patria Nueva, Hgo.'),$border,'C',0);
			$y = $fpdf->getY();
			$fpdf->setXY($x,$y);
			$fpdf->MultiCell(($width),$cellHeight,utf8_decode('7721230419 / 7721546737'),$border,'C',0);          
		 
			$yy = 40; //Variable auxiliar para desplazarse 40 puntos del borde superior hacia abajo en la coordenada de las Y para evitar que el título este al nivel de la cabecera.
			$y = $fpdf->GetY(); 
			$x = 12;
			
			 
			$fpdf->SetFont('helvetica', 'B', 20); //Asignar la fuente, el estilo de la fuente (negrita) y el tamaño de la fuente
			$fpdf->SetXY(0, $y); //Ubicación según coordenadas X, Y. X=0 porque empezará desde el borde izquierdo de la página
			$fpdf->Cell(220, 10, "Reporte de citas", 0, 1, 'C');
			 
			$fpdf->SetFont('courier', 'U', 15); //Asignar la fuente, el estilo de la fuente (subrayado) y el tamaño de la fuente
			$y1 = $fpdf->GetY(); 
			$fpdf->SetXY(0, $y1); //Ubicación según coordenadas X, Y. X=0 porque empezará desde el borde izquierdo de la página
			$fpdf->Cell(220, 10, "Lista de Citas", 0, 1, 'C');
			$fpdf->SetFont('arial', '', 8); //Asignar la fuente, el estilo de la fuente (subrayado) y el tamaño de la fuente
			$fpdf ->SetFillColor (255,255,255);
			$y = $fpdf->GetY()+8;
			$fpdf->SetXY(10, $y);
			$fpdf->Cell(20,6,'Nombre',1,0,'C',1);
			$fpdf->SetXY(30, $y);
			$fpdf->Cell(25,6,'Telefono',1,0,'C',1);
			$fpdf->SetXY(55, $y);
			$fpdf->Cell(15,6,'Edad',1,0,'C',1);
			$fpdf->SetXY(70, $y);
			$fpdf->Cell(20,6,'Fecha',1,0,'C',1);
			$fpdf->SetXY(90, $y);
			$fpdf->Cell(20,6,'Hora',1,0,'C',1);
			$fpdf->SetXY(110, $y);
			$fpdf->Cell(15,6,'Peso.',1,0,'C',1);
			$fpdf->SetXY(125, $y);
			$fpdf->Cell(15,6,'Talla',1,0,'C',1);
			$fpdf->SetXY(140, $y);
			$fpdf->Cell(40,6,'Motivo de la cita',1,1,'C',1);      
	 
			//lenamos la tabla con los resultados de la consulta
		$items = count($data);	
		for ($i=0; $i < $items; $i++) { 
			$y = $fpdf->getY();
			$fpdf->SetXY(10, $y);
			$fpdf->cell(20,6,utf8_decode($data[$i]['nombre_paciente']),1,0,'C');
			$fpdf->SetXY(30, $y);
			$fpdf->cell(25,6,utf8_decode($data[$i]['telefono']),1,0,'C');
			$fpdf->SetXY(55, $y);
			$fpdf->cell(15,6,utf8_decode($data[$i]['edad']),1,0,'C');
			$fpdf->SetXY(70, $y);
			$fpdf->cell(20,6,utf8_decode($data[$i]['fecha']),1,0,'C');
			$fpdf->SetXY(90, $y);
			$fpdf->cell(20,6,utf8_decode($data[$i]['hora']),1,0,'C');
			$fpdf->SetXY(110, $y);
			$fpdf->cell(15,6,utf8_decode($data[$i]['peso']),1,0,'C');
			$fpdf->SetXY(125, $y);
			$fpdf->cell(15,6,utf8_decode($data[$i]['talla']),1,0,'C');
			$fpdf->SetXY(140, $y);
			$fpdf->cell(40,6,utf8_decode($data[$i]['motivo_cita']),1,1,'C');
			$fpdf->Ln();


			//Center
			$y = $fpdf->getY();
			$fpdf->setXY(10,$y);
			$fpdf->Cell(190,10,utf8_decode('Observaciones:'.$data[$i]['observaciones']),1,1,'J');
			$fpdf->Ln();
		}	 

			   
			$fpdf->SetY(265);
			// Select Arial italic 8
			$fpdf->SetFont('Arial','B',10);
				// Print centered page number
			$fpdf->Cell(0,10,utf8_decode('© Medica Social "San Antonio de Padua" - Todos los derechos reservados - Página ').$fpdf->PageNo().'/{nb}',0,0,'C');
			$nombre_reporte="Medical - ".$data[0]['nombre_paciente']." - ".$fecha.".pdf";        
	 
	
	$fpdf->Output($nombre_reporte, 'I'); //El primer parámetro es para colocar el nombre del archivo al momento de ser descargado y el segundo parámetro es para abrir el archivo en el navegador con la opción para poder ser descargado
	
    }
}
