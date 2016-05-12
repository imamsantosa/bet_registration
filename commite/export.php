<?php 
include ('otentikasi.php');
$key = '12171996';

require_once('../registration/assets/dbase.php');
require_once('assets/write-excel/Worksheet.php');
require_once('assets/write-excel/Workbook.php');

$db = dbase::koneksi();

function HeaderingExcel($filename) {
  header("Content-type: application/vnd.ms-excel");
  header("Content-Disposition: attachment; filename=$filename" );
  header("Expires: 0");
  header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
  header("Pragma: public");
}

function bayar($d){
	if ($d == 1) {
		return "sudah";
	} else {
		return "belum";
	}
}

$namaf = "bet2016 - ".date("Y-m-d h:i:s").".xls";
HeaderingExcel($namaf);

$workbook = new Workbook("");

$worksheet1 =& $workbook->add_worksheet('Debate');

$format =& $workbook->add_format();
$format->set_align('vcenter');
$format->set_align('center');
$format->set_color('white');
$format->set_bold();
$format->set_italic();
$format->set_pattern();
$format->set_fg_color('blue');

$worksheet1->set_row(0,  20);
$worksheet1->set_column(0,  0,  20);
$worksheet1->set_column(0,  1, 20);
$worksheet1->set_column(0,  2, 20);
$worksheet1->set_column(0,  3, 20);
$worksheet1->set_column(0,  4, 20);
$worksheet1->set_column(0,  5, 20);
$worksheet1->set_column(0,  6, 20);
$worksheet1->set_column(0,  7, 20);
$worksheet1->set_column(0,  8, 20);
$worksheet1->set_column(0,  9, 20);
$worksheet1->set_column(0,  10, 20);
$worksheet1->set_column(0,  11, 20);
$worksheet1->set_column(0,  12, 20);
$worksheet1->set_column(0,  13, 20);
$worksheet1->set_column(0,  14, 20);
$worksheet1->set_column(0,  15, 20);
$worksheet1->set_column(0,  16, 20);
$worksheet1->set_column(0,  17, 20);
$worksheet1->set_column(0,  18, 20);

$worksheet1->write_string(0, 0, 'Username', $format);
$worksheet1->write_string(0, 1, 'Email', $format);
$worksheet1->write_string(0, 2, 'Nama Sekolah' , $format);
$worksheet1->write_string(0, 3, 'Alamat Sekolah' , $format);
$worksheet1->write_string(0, 4, 'Telepon' , $format);
$worksheet1->write_string(0, 5, 'Nama Pendamping' , $format);
$worksheet1->write_string(0, 6, 'Kontak Pendamping' , $format);
$worksheet1->write_string(0, 7, 'Upload' , $format);
$worksheet1->write_string(0, 8, 'Konfirmasi' , $format);
$worksheet1->write_string(0, 9, 'Nama Peserta 1' , $format);
$worksheet1->write_string(0, 10, 'No Telp Peserta 1' , $format);
$worksheet1->write_string(0, 11, 'Alergi Peserta 1' , $format);
$worksheet1->write_string(0, 12, 'Nama Peserta 2' , $format);
$worksheet1->write_string(0, 13, 'No Telp Peserta 2' , $format);
$worksheet1->write_string(0, 14, 'Alergi Peserta 2' , $format);
$worksheet1->write_string(0, 15, 'Nama Peserta 3' , $format);
$worksheet1->write_string(0, 16, 'No Telp Peserta 3' , $format);
$worksheet1->write_string(0, 17, 'Alergi Peserta 3' , $format);
$worksheet1->write_string(0, 18, 'Tanggal Mendaftar' , $format);

$q = $db->prepare("SELECT *, debate.tgl_daftar as debate_tanggal from debate left outer join pendaftar on debate.username = pendaftar.username ORDER BY `upload` asc, `konfirmasi` asc, debate.username asc");
$q->execute();
$baris=1;
while($data=$q->fetch(PDO::FETCH_ASSOC)){
    $worksheet1->write_string($baris,0,  $data['username']);
    $worksheet1->write_string($baris,1, $data['email']);
    $worksheet1->write_string($baris,2, $data['nama_sekolah']);
    $worksheet1->write_string($baris,3, $data['alamat_sekolah']);
    $worksheet1->write_string($baris,4, $data['phone'] );
    $worksheet1->write_string($baris,5, $data['nama_pendamping'] );
    $worksheet1->write_string($baris,6, $data['kontak_pendamping'] );
    $worksheet1->write_string($baris,7, bayar($data['upload']) );
    $worksheet1->write_string($baris,8, bayar($data['konfirmasi']) );
    $worksheet1->write_string($baris,9, $data['nama_peserta_1'] );
    $worksheet1->write_string($baris,10,  $data['no_telp_1'] );
    $worksheet1->write_string($baris,11, $data['alergi_1'] );
    $worksheet1->write_string($baris,12, $data['nama_peserta_2'] );
    $worksheet1->write_string($baris,13, $data['no_telp_2'] );
    $worksheet1->write_string($baris,14, $data['alergi_2'] );
    $worksheet1->write_string($baris,15, $data['nama_peserta_3'] );
    $worksheet1->write_string($baris,16, $data['no_telp_3'] );
    $worksheet1->write_string($baris,17, $data['alergi_3'] );
    $worksheet1->write_string($baris,18, $data['debate_tanggal'] );
    $baris++;
}

 /* work sheet ke 2 */

$worksheet2 =& $workbook->add_worksheet('Speech');

$format =& $workbook->add_format();
$format->set_align('vcenter');
$format->set_align('center');
$format->set_color('white');
$format->set_bold();
$format->set_italic();
$format->set_pattern();
$format->set_fg_color('blue');

$worksheet2->set_row(0,  20);
$worksheet2->set_column(0,  0,  20);
$worksheet2->set_column(0,  1, 20);
$worksheet2->set_column(0,  2, 20);
$worksheet2->set_column(0,  3, 20);
$worksheet2->set_column(0,  4, 20);
$worksheet2->set_column(0,  5, 20);
$worksheet2->set_column(0,  6, 20);
$worksheet2->set_column(0,  7, 20);
$worksheet2->set_column(0,  8, 20);
$worksheet2->set_column(0,  9, 20);
$worksheet2->set_column(0,  10, 20);
$worksheet2->set_column(0,  11, 20);
$worksheet2->set_column(0,  12, 20);

$worksheet2->write_string(0, 0, 'Username', $format);
$worksheet2->write_string(0, 1, 'Email', $format);
$worksheet2->write_string(0, 2, 'Nama Sekolah' , $format);
$worksheet2->write_string(0, 3, 'Alamat Sekolah' , $format);
$worksheet2->write_string(0, 4, 'Telepon' , $format);
$worksheet2->write_string(0, 5, 'Nama Pendamping' , $format);
$worksheet2->write_string(0, 6, 'Kontak Pendamping' , $format);
$worksheet2->write_string(0, 7, 'Upload' , $format);
$worksheet2->write_string(0, 8, 'Konfirmasi' , $format);
$worksheet2->write_string(0, 9, 'Nama Peserta' , $format);
$worksheet2->write_string(0, 10, 'No Telp Peserta' , $format);
$worksheet2->write_string(0, 11, 'Alergi Peserta' , $format);
$worksheet2->write_string(0, 12, 'Tanggal Mendaftar' , $format);

$q = $db->prepare("SELECT *, speech.tgl_daftar as speech_tanggal from speech left outer join pendaftar on speech.username = pendaftar.username ORDER BY `upload` asc, `konfirmasi` asc, speech.username asc");
$q->execute();
$baris=1;
while($data=$q->fetch(PDO::FETCH_ASSOC)){
    $worksheet2->write_string($baris,0,  $data['username']);
    $worksheet2->write_string($baris,1, $data['email']);
    $worksheet2->write_string($baris,2, $data['nama_sekolah']);
    $worksheet2->write_string($baris,3, $data['alamat_sekolah']);
    $worksheet2->write_string($baris,4, $data['phone'] );
    $worksheet2->write_string($baris,5, $data['nama_pendamping'] );
    $worksheet2->write_string($baris,6, $data['kontak_pendamping'] );
    $worksheet2->write_string($baris,7, bayar($data['upload']) );
    $worksheet2->write_string($baris,8, bayar($data['konfirmasi']) );
    $worksheet2->write_string($baris,9, $data['nama_peserta'] );
    $worksheet2->write_string($baris,10,  $data['no_telp'] );
    $worksheet2->write_string($baris,11, $data['alergi'] );
    $worksheet2->write_string($baris,12, $data['speech_tanggal'] );
    $baris++;
}


/** wk sheet 3 */

$worksheet3 =& $workbook->add_worksheet('Story Telling');

$format =& $workbook->add_format();
$format->set_align('vcenter');
$format->set_align('center');
$format->set_color('white');
$format->set_bold();
$format->set_italic();
$format->set_pattern();
$format->set_fg_color('blue');

$worksheet3->set_row(0,  20);
$worksheet3->set_column(0,  0,  20);
$worksheet3->set_column(0,  1, 20);
$worksheet3->set_column(0,  2, 20);
$worksheet3->set_column(0,  3, 20);
$worksheet3->set_column(0,  4, 20);
$worksheet3->set_column(0,  5, 20);
$worksheet3->set_column(0,  6, 20);
$worksheet3->set_column(0,  7, 20);
$worksheet3->set_column(0,  8, 20);
$worksheet3->set_column(0,  9, 20);
$worksheet3->set_column(0,  10, 20);
$worksheet3->set_column(0,  11, 20);
$worksheet3->set_column(0,  12, 20);

$worksheet3->write_string(0, 0, 'Username', $format);
$worksheet3->write_string(0, 1, 'Email', $format);
$worksheet3->write_string(0, 2, 'Nama Sekolah' , $format);
$worksheet3->write_string(0, 3, 'Alamat Sekolah' , $format);
$worksheet3->write_string(0, 4, 'Telepon' , $format);
$worksheet3->write_string(0, 5, 'Nama Pendamping' , $format);
$worksheet3->write_string(0, 6, 'Kontak Pendamping' , $format);
$worksheet3->write_string(0, 7, 'Upload' , $format);
$worksheet3->write_string(0, 8, 'Konfirmasi' , $format);
$worksheet3->write_string(0, 9, 'Nama Peserta' , $format);
$worksheet3->write_string(0, 10, 'No Telp Peserta' , $format);
$worksheet3->write_string(0, 11, 'Alergi Peserta' , $format);
$worksheet3->write_string(0, 12, 'Tanggal Mendaftar' , $format);

$q = $db->prepare("SELECT *, story_telling.tgl_daftar as story_telling_tanggal from story_telling left outer join pendaftar on story_telling.username = pendaftar.username ORDER BY `upload` asc, `konfirmasi` asc, story_telling.username asc");
$q->execute();
$baris=1;
while($data=$q->fetch(PDO::FETCH_ASSOC)){
    $worksheet3->write_string($baris,0,  $data['username']);
    $worksheet3->write_string($baris,1, $data['email']);
    $worksheet3->write_string($baris,2, $data['nama_sekolah']);
    $worksheet3->write_string($baris,3, $data['alamat_sekolah']);
    $worksheet3->write_string($baris,4, $data['phone'] );
    $worksheet3->write_string($baris,5, $data['nama_pendamping'] );
    $worksheet3->write_string($baris,6, $data['kontak_pendamping'] );
    $worksheet3->write_string($baris,7, bayar($data['upload']) );
    $worksheet3->write_string($baris,8, bayar($data['konfirmasi']) );
    $worksheet3->write_string($baris,9, $data['nama_peserta'] );
    $worksheet3->write_string($baris,10,  $data['no_telp'] );
    $worksheet3->write_string($baris,11, $data['alergi'] );
    $worksheet3->write_string($baris,12, $data['story_telling_tanggal'] );
    $baris++;
}

/** wsht 4 **/

$worksheet4 =& $workbook->add_worksheet('Pendaftar');

$format =& $workbook->add_format();
$format->set_align('vcenter');
$format->set_align('center');
$format->set_color('white');
$format->set_bold();
$format->set_italic();
$format->set_pattern();
$format->set_fg_color('blue');

$worksheet4->set_row(0,  20);
$worksheet4->set_column(0,  0,  20);
$worksheet4->set_column(0,  1, 20);
$worksheet4->set_column(0,  2, 20);
$worksheet4->set_column(0,  3, 20);
$worksheet4->set_column(0,  4, 20);
$worksheet4->set_column(0,  5, 20);
$worksheet4->set_column(0,  6, 20);
$worksheet4->set_column(0,  7, 20);
$worksheet4->set_column(0,  8, 20);
$worksheet4->set_column(0,  9, 20);

$worksheet4->write_string(0, 0, 'Username', $format);
$worksheet4->write_string(0, 1, 'Email', $format);
$worksheet4->write_string(0, 2, 'Nama Sekolah' , $format);
$worksheet4->write_string(0, 3, 'Alamat Sekolah' , $format);
$worksheet4->write_string(0, 4, 'Telepon' , $format);
$worksheet4->write_string(0, 5, 'Nama Pendamping' , $format);
$worksheet4->write_string(0, 6, 'Kontak Pendamping' , $format);
$worksheet4->write_string(0, 7, 'Upload' , $format);
$worksheet4->write_string(0, 8, 'Konfirmasi' , $format);
$worksheet4->write_string(0, 9, 'Tanggal Daftar' , $format);

$q = $db->prepare("SELECT * from pendaftar order by upload asc, konfirmasi asc");
$q->execute();
$baris=1;
while($data=$q->fetch(PDO::FETCH_ASSOC)){
    $worksheet4->write_string($baris,0,  $data['username']);
    $worksheet4->write_string($baris,1, $data['email']);
    $worksheet4->write_string($baris,2, $data['nama_sekolah']);
    $worksheet4->write_string($baris,3, $data['alamat_sekolah']);
    $worksheet4->write_string($baris,4, $data['phone'] );
    $worksheet4->write_string($baris,5, $data['nama_pendamping'] );
    $worksheet4->write_string($baris,6, $data['kontak_pendamping'] );
    $worksheet4->write_string($baris,7, bayar($data['upload']) );
    $worksheet4->write_string($baris,8, bayar($data['konfirmasi']) );
    $worksheet4->write_string($baris,9, $data['tgl_daftar'] );
    $baris++;
}
$workbook->close();

?>