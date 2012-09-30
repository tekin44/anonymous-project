<?php
require_once ("Spreadsheet/Excel/Writer.php");
// Creating a workbook
//$workbook = new Spreadsheet_Excel_Writer();

/* Sending HTTP headers, this will popup a file save/open
dialog in the browser when this file is run
*/
print_r($dates);
/*$workbook->send('rekap absen.xls');

foreach ($kelas as $class) {
	$worksheet1 = & $workbook->addWorksheet($class->nama_kelas);

	// Set header formating for Sheet 1
	$header = & $workbook->addFormat();
	$header->setBold(); // Make it bold
	$header->setColor('black'); // Make foreground color black
	$header->setFgColor("green"); // Set background color to green
	$header->setHAlign('center'); // Align text to center

	// Write some data on Sheet 1
	$worksheet1->write(0, 0, 'Nomor Induk', $header);
	$worksheet1->write(0, 1, 'Nama', $header);
	$worksheet1->write(0, 2, 'Waktu Masuk', $header);
	$worksheet1->write(0, 3, 'Waktu Keluar', $header);
	$worksheet1->write(0, 4, 'Keterangan', $header);
	$i = 1;
	foreach ($dates as $date) {
		$worksheet1->write($i, 0, $date->c);
		foreach ($rows as $row) {
			if ($item->tanggal_absensi == $date->c) {
				switch ($row->status_absen) {
					case '1' :
						$ket = 'Masuk';
						break;
					case '2' :
						$ket = 'Terlambat';
						break;
					case '3' :
						$ket = 'Sakit';
						break;
					case '4' :
						$ket = 'Ijin';
						break;
				}
				$worksheet1->write($i, 0, $row->nomor_induk_siswa);
				$worksheet1->write($i, 1, $row->nama_siswa);
				$worksheet1->write($i, 2, $row->waktu_masuk);
				$worksheet1->write($i, 3, $row->waktu_keluar);
				$worksheet1->write($i, 4, $ket);
				$i++;
			}
		}
		$i++;
	}
}
$workbook->close();*/
?>