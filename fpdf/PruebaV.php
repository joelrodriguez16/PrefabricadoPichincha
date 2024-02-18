<?php

require('./fpdf.php');

class PDF extends FPDF
{

   // Cabecera de página
   function Header()
   {
   
      $this->Image('logo1.png', 175, 5, 30); //logo de la empresa,moverDerecha,moverAbajo,tamañoIMG
      $this->SetFont('Arial', 'B', 19); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(45); // Movernos a la derecha
      $this->SetTextColor(0, 0, 0); //color
      //creamos una celda o fila
      $this->Cell(110, 15, utf8_decode('Preprosesados Pichincha'), 1, 1, 'C', 0); // AnchoCelda,AltoCelda,titulo,borde(1-0),saltoLinea(1-0),posicion(L-C-R),ColorFondo(1-0)
      $this->Ln(3); // Salto de línea
      $this->SetTextColor(103); //color

      /* UBICACION */
      $this->Cell(2);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(90, 10, utf8_decode("Ubicación : Esmeraldas "), 0, 0, '', 0);
      $this->Ln(5);

      /* TELEFONO */
      $this->Cell(2);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(59, 10, utf8_decode("Teléfono : 0984547812 "), 0, 0, '', 0);
      $this->Ln(5);

      /* COREEO */
      $this->Cell(2);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(85, 10, utf8_decode("Correo : preprosesadospichinca@gmail.com "), 0, 0, '', 0);
      $this->Ln(5);

      /* TELEFONO */
      $this->Cell(2);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(85, 10, utf8_decode("Sucursal : UVP - Los mangos "), 0, 0, '', 0);
      $this->Ln(10);

      /* TITULO DE LA TABLA */
      //color
      $this->SetTextColor(228, 100, 0);
      $this->Cell(50); // mover a la derecha
      $this->SetFont('Arial', 'B', 15);
      $this->Cell(100, 10, utf8_decode("Reporte de Productos"), 0, 1, 'C', 0);
      $this->Ln(7);

      /* CAMPOS DE LA TABLA */
   
      $this->Cell(50, 10, 'Nombre', 1, 0, 'C', 0);
      $this->Cell(40, 10, 'Cantidad/U', 1, 0, 'C', 0);
      $this->Cell(40, 10, 'Precio', 1, 0, 'C', 0);
      $this->Cell(60, 10, 'Fecha/Reserv', 1, 1, 'C', 0);
      

   }

   // Pie de página
   function Footer()
   {
      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C'); //pie de pagina(numero de pagina)

      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, cursiva, tamañoTexto
      $hoy = date('d/m/Y');
      $this->Cell(355, 10, utf8_decode($hoy), 0, 0, 'C'); // pie de pagina(fecha de pagina)
   }
}

require 'cn.php';
$consulta = "SELECT  * FROM historial_reservas";
$resultado = $mysqli->query($consulta);



$pdf = new PDF();
$pdf->AddPage(); /* aqui entran dos para parametros (horientazion,tamaño)V->portrait H->landscape tamaño (A3.A4.A5.letter.legal) */
$pdf->AliasNbPages(); //muestra la pagina / y total de paginas

$i = 0;
$pdf->SetFont('Arial', '', 12);
$pdf->SetDrawColor(163, 163, 163); //colorBorde

// ... (código existente)

$totalReserva = 0; // Variable para almacenar el total de la reserva

while ($row = $resultado->fetch_assoc()) {
    $pdf->Cell(50, 10, $row['nombre_producto'], 1, 0, 'C', 0);
    $pdf->Cell(40, 10, $row['cantidad'], 1, 0, 'C', 0);
    $pdf->Cell(40, 10, $row['precio'], 1, 0, 'C', 0);
    $pdf->Cell(60, 10, $row['fecha_reserva'], 1, 1, 'C', 0);

    // Actualiza el total de la reserva sumando el producto del precio y la cantidad
    $totalReserva += ($row['precio'] * $row['cantidad']);
}

// Agrega una fila para mostrar el total de la reserva
$pdf->Cell(50 + 40 + 40, 10, 'Total Reserva:', 1, 0, 'C', 0);
$pdf->Cell(60, 10, number_format($totalReserva, 2), 1, 1, 'C', 0); // Formatea el total con dos decimales

$pdf->Output('Reserva.pdf', 'I'); //nombreDescarga, Visor(I->visualizar - D->descargar)
