<?php
date_default_timezone_set('Asia/Jakarta');
$this->fpdf->FPDF("P","cm","A4");
$this->fpdf->SetMargins(1,1,1);
$this->fpdf->AddPage();
$this->fpdf->SetFont('Times','B',12);

$this->fpdf->Cell(19,0.7,'KWITANSI PEMBAYARAN',0,0,'C');

 $this->fpdf->Line(1,1.7,20,1.7);
 $this->fpdf->Line(1,1.8,20,1.8);

 $this->fpdf->Ln();
 $this->fpdf->Ln();
 
    $this->fpdf->SetFont('Times','',12);
	
	$this->fpdf->Cell(5,1,'Nomor'			 ,0,0,'L'); // nomor
	$this->fpdf->Cell(5,1,'_______',0,1,'L'); // isi nomor
	$this->fpdf->Cell(5,1,'Sudah terima dari',0,0,'L'); // sudah terima dari
	$this->fpdf->Cell(8.9,1,$nama  	 ,0,0,'L'); // isi sudah terima dari
	$this->fpdf->Cell(2.8,1,'Kelas : ',0,0,'L'); //no. panggilan
	$this->fpdf->Cell(5,1,$kelas  		 ,0,1,'L'); // isi no. panggilan
    $this->fpdf->Cell(5,1,'Banyaknya Uang'	 ,0,0,'L'); 
    $this->fpdf->Cell(14,1,$terbilang."Rupiah",1,1,'L');
	$this->fpdf->Cell(5,1,'Untuk Pembayaran' ,0,0,'L');
    $this->fpdf->Cell(8.9,1,'1. Sumbangan Bulanan' ,0,0,'L');
	$this->fpdf->Cell(1,1,'Rp.' ,0,0,'L');
	$this->fpdf->Cell(5,1,$spp,0,1,'L');
	$this->fpdf->Cell(5,1,'' ,0,0,'L');
	$this->fpdf->Cell(8.9,1,'2. Sumbangan Awal Tahun KBM' ,0,0,'L');
	$this->fpdf->Cell(1,1,'Rp.' ,0,0,'L');
	$this->fpdf->Cell(5,1,$dsp,0,1,'L');
	$this->fpdf->Cell(5,1,'' ,0,0,'L');
	$this->fpdf->Cell(8.9,1,'3. Sumbangan Pembangunan dan Sarana Prasarana',0,0,'L');
	$this->fpdf->Cell(1,1,'Rp.' ,0,0,'L');
	$this->fpdf->Cell(5,1,$tahunan,0,1,'L');
	$this->fpdf->Cell(5,1,'' ,0,0,'L');
	$this->fpdf->Cell(8.9,1,'Jumlah',0,0,'R');
	$this->fpdf->Cell(1,1,'Rp.' ,0,0,'L');
	$this->fpdf->Cell(5,1,$spp+$dsp+$tahunan,0,1,'L');

$this->fpdf->Line(15,8.4,20,8.4); // garis total

$this->fpdf->Ln();

// tanda tangan
$this->fpdf->Cell(14,0.8,	'',0,0,'L');
$this->fpdf->Cell(5,0.8,	'Cirebon, '.date('d/m/Y').'',0,1,'L');
$this->fpdf->Cell(14,0.8,	'',0,0,'L');
$this->fpdf->Cell(5,0.8,	'Petugas',0,1,'L');
$this->fpdf->Line(15,14.6,20,14.6); // garis tandatangan

$this->fpdf->Cell(5,1,'JUMLAH' ,0,0,'L');
$this->fpdf->Cell(5,1,'Rp. '.$spp+$dsp+$tahunan.'' ,1,1,'L');

$this->fpdf->Cell(14,0.8,	'',0,0,'L');
$this->fpdf->Cell(5,4,		'NIP.',0,1,'L');
$this->fpdf->Line(1,16.7,20,16.7);
$this->fpdf->Line(1,16.8,20,16.8);

//$this->fpdf->SetY(-21);
//$this->fpdf->SetFont('Times','',10);
//$this->fpdf->Cell(9.5, 0.5, 'Dicetak Pada Tanggal : '.date('d/m/Y H:i').' | SMAN 1 CIREBON',0,'LR','L');



$this->fpdf->Output("Nota SPP.pdf","I");
?>