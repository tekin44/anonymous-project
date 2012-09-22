<?php
date_default_timezone_set('Asia/Jakarta');
$this->fpdf->FPDF("P","cm","A4");
$this->fpdf->SetMargins(1,1,1);
$this->fpdf->AddPage();
$this->fpdf->SetFont('Times','B',12);

//R:1
$this->fpdf->Cell(19,0.7,'KWITANSI PEMBAYARAN SPP',0,0,'C');

 $this->fpdf->Line(1,1.7,20,1.7);
 $this->fpdf->Line(1,1.8,20,1.8);

 $this->fpdf->Ln();
 $this->fpdf->Ln();
 
foreach($karyawan->result() as $data)
{
    $this->fpdf->SetFont('Times','',12);
	$this->fpdf->Cell(0,1,'Sudah terima dari',1,0,'L');
	$this->fpdf->Cell(0,1,$data->nik  		 ,0,1,'R');
    $this->fpdf->Cell(0,1,'Kelas' 			 ,1,0,'L');
    $this->fpdf->Cell(0,1,$data->nama 		 ,0,1,'R');
    $this->fpdf->Cell(0,1,'Sebanyak' 		 ,1,0,'L');
    $this->fpdf->Cell(0,1,'Rp. 300.000.00' 	 ,0,1,'R');
}

 $this->fpdf->Line(15,7.5,20,7.5);
 $this->fpdf->Cell(19,5.5,'Admin',0,0,'R');

$this->fpdf->SetY(-21);
$this->fpdf->SetFont('Times','',10);
$this->fpdf->Cell(9.5, 0.5, 'Dicetak Pada Tanggal : '.date('d/m/Y H:i').' | SMAN 1 CIREBON',0,'LR','L');

// R:2
$this->fpdf->Ln();
$this->fpdf->Ln();

$this->fpdf->SetFont('Times','B',12); 
$this->fpdf->Cell(19,0.7,'KWITANSI PEMBAYARAN SPP',0,0,'C');

 $this->fpdf->Line(1,10.5,20,10.5);
 $this->fpdf->Line(1,10.4,20,10.4);

 $this->fpdf->Ln();
 $this->fpdf->Ln();
 
foreach($karyawan->result() as $data)
{
    $this->fpdf->SetFont('Times','',12);
	$this->fpdf->Cell(0,1,'Sudah terima dari',1,0,'L');
	$this->fpdf->Cell(0,1,$data->nik  		 ,0,1,'R');
    $this->fpdf->Cell(0,1,'Kelas' 			 ,1,0,'L');
    $this->fpdf->Cell(0,1,$data->nama 		 ,0,1,'R');
    $this->fpdf->Cell(0,1,'Sebanyak' 		 ,1,0,'L');
    $this->fpdf->Cell(0,1,'Rp. 300.000.00' 	 ,0,1,'R');
}

 $this->fpdf->Line(15,16,20,16);
 $this->fpdf->Cell(19,5.2,'Admin',0,0,'R');

$this->fpdf->SetY(-12.3);
$this->fpdf->SetFont('Times','',10);
$this->fpdf->Cell(9.5, 0.5, 'Dicetak Pada Tanggal : '.date('d/m/Y H:i').' | SMAN 1 CIREBON',0,'LR','L');

// R:3
$this->fpdf->Ln();
$this->fpdf->Ln();

$this->fpdf->SetFont('Times','B',12); 
$this->fpdf->Cell(19,0.7,'KWITANSI PEMBAYARAN SPP',0,0,'C');

 $this->fpdf->Line(1,10.5,20,10.5);
 $this->fpdf->Line(1,10.4,20,10.4);

 $this->fpdf->Ln();
 $this->fpdf->Ln();
 
foreach($karyawan->result() as $data)
{
    $this->fpdf->SetFont('Times','',12);
	$this->fpdf->Cell(0,1,'Sudah terima dari',1,0,'L');
	$this->fpdf->Cell(0,1,$data->nik  		 ,0,1,'R');
    $this->fpdf->Cell(0,1,'Kelas' 			 ,1,0,'L');
    $this->fpdf->Cell(0,1,$data->nama 		 ,0,1,'R');
    $this->fpdf->Cell(0,1,'Sebanyak' 		 ,1,0,'L');
    $this->fpdf->Cell(0,1,'Rp. 300.000.00' 	 ,0,1,'R');
}

 $this->fpdf->Line(15,24.7,20,24.7);
 $this->fpdf->Cell(19,4.5,'Admin',0,0,'R');

$this->fpdf->SetY(-3);
$this->fpdf->SetFont('Times','',10);
$this->fpdf->Cell(9.5, 0.5, 'Dicetak Pada Tanggal : '.date('d/m/Y H:i').' | SMAN 1 CIREBON',0,'LR','L');

$this->fpdf->Output("Nota SPP.pdf","I");
?>