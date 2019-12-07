<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Export extends CI_Controller {

  function __construct()
  {
    parent::__construct();
    $this->load->model('admin/Admin_m');
    $this->load->library('Excel');
  }
  function dataexcel(){
    if ($this->ion_auth->logged_in()){
      $level = 'admin';  
      if (!$this->ion_auth->in_group($level)) {
       $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
       $this->session->set_flashdata('message', $pesan );
       redirect(base_url('index.php/admin/dashboard_c'));
     }else{
      $post = $this->input->post('');
      $data['title'] = 'Laporan Data Pegawai';
      // $data['page'] = 'admin/export-v';
      // $data['nav'] = 'nav/nav-admin';
      // $data['dtadm'] = $this->ion_auth->user()->row();
                // setting web server
      $file = new PHPExcel ();
      $file->getProperties ()->setCreator ( "Goblooge" );
      $file->getProperties ()->setLastModifiedBy ( "" );
      $file->getProperties ()->setTitle ( "Laporan Data Pegawai" );
      $file->getProperties ()->setSubject ( "Laporan Data Pegawai" );
      $file->getProperties ()->setDescription ( "Laporan Data Pegawai" );
      $file->getProperties ()->setKeywords ( "Laporan Data Pegawai" );
      $file->getProperties ()->setCategory ( "Laporan Data Pegawai" );
      /*end - BLOCK PROPERTIES FILE EXCEL*/

      /*start - BLOCK SETUP SHEET*/
      $file->createSheet ( NULL,0);
      $file->setActiveSheetIndex ( 0 );
      $sheet = $file->getActiveSheet ( 0 );
  //memberikan title pada sheet
      $sheet->setTitle ( "Laporan Data Pegawai" );
      $sheet->mergeCells('A1:J1');
      $sheet->setCellValue ( "A1", "DATA PEGAWAI BKPSDM KAB. BUTON TENGAH" );
      /*end - BLOCK SETUP SHEET*/

      /*start - BLOCK HEADER*/
      $sheet->setCellValue ( "A3", "No" );
      $sheet->setCellValue ( "B3", "NIP" );
      $sheet->setCellValue ( "C3", "NAMA PEGAWAI" );
      $sheet->setCellValue ( "D3", "JK" );
      $sheet->setCellValue ( "E3", "TEMPAT LAHIR" );
      $sheet->setCellValue ( "F3", "TANGGAL LAHIR" );
      $sheet->setCellValue ( "G3", "AGAMA" );
      $sheet->setCellValue ( "H3", "ALAMAT" );
      $sheet->setCellValue ( "I3", "NO HP" );
      /*end - BLOCK HEADER*/

      /* start - BLOCK MEMASUKAN DATABASE*/
      $nomor = 1;
      $nocel = 4;
      $hasil = $this->Admin_m->select_data('data_pegawai');
                // echo "<pre>";print_r($hasil);echo "</pre>";exit();
      foreach ($hasil as $data) {
        $sheet->setCellValue ( "A".$nocel, $nomor );
        $sheet->setCellValue ( "B".$nocel, $data->nip );
        $sheet->setCellValue ( "C".$nocel, $data->nama_pegawai );
        $sheet->setCellValue ( "D".$nocel, $data->jenis_kelamin );
        $sheet->setCellValue ( "E".$nocel, $data->tempat_lahir );
        $sheet->setCellValue ( "F".$nocel, $data->tanggal_lahir );
        $sheet->setCellValue ( "G".$nocel, strtoupper($this->Admin_m->detail_data_order('master_agama','id_agama',$data->agama)->nm_agama) );
        $sheet->setCellValue ( "H".$nocel, $data->alamat );
        $sheet->setCellValue ( "I".$nocel, $data->no_hp );

        $nomor++;
        $nocel++;
      }
      /* end - BLOCK MEMASUKAN DATABASE*/

      /*start - BLOK AUTOSIZE*/
  $sheet ->getColumnDimension ( "A" )->setWidth(4);
  $sheet ->getColumnDimension ( "B" )->setWidth(25);
  $sheet ->getColumnDimension ( "C" )->setWidth(45);
  $sheet ->getColumnDimension ( "D" )->setWidth(15);
  $sheet ->getColumnDimension ( "E" )->setWidth(40);
  $sheet ->getColumnDimension ( "F" )->setWidth(20);
  $sheet ->getColumnDimension ( "G" )->setWidth(10);
  $sheet ->getColumnDimension ( "H" )->setWidth(45);
  $sheet ->getColumnDimension ( "I" )->setWidth(20);

  /*end - BLOG AUTOSIZE*/

        /*start - BLOCK UNTUK BORDER*/
$thick = array ();
$thick['borders']=array();
$thick['borders']['allborders']=array();
$thick['borders']['allborders']['style']=PHPExcel_Style_Border::BORDER_THICK ;
$sheet->getStyle ( 'A3:I3' )->applyFromArray ($thick);

$thin = array ();
$thin['borders']=array();
$thin['borders']['allborders']=array();
$thin['borders']['allborders']['style']=PHPExcel_Style_Border::BORDER_THIN ;
$sheet->getStyle ( 'A4:I24' )->applyFromArray ($thin);
/*end - BLOCK UNTUK BORDER*/

/*start - BLOCK UNTUK BACKGROUND*/
$backgroound['fill']=array();
$backgroound['fill']['type']=PHPExcel_Style_Fill::FILL_SOLID;
$backgroound['fill']['color']=array();
$backgroound['fill']['color']['rgb']='99FFFF';
$sheet->getStyle ( 'A3:I3' )->applyFromArray ($backgroound);

/*end - BLOCK UNTUK BACKGROUND*/

      /* start - BLOCK MEMBUAT LINK DOWNLOAD*/
      header ( 'Content-Type: application/vnd.ms-excel' );
  //namanya adalah keluarga.xls
      header ( 'Content-Disposition: attachment;filename="laporan_data_pegawai.xls"' ); 
      header ( 'Cache-Control: max-age=0' );
      $writer = PHPExcel_IOFactory::createWriter ( $file, 'Excel5' );
      $writer->save ( 'php://output' );
      /* start - BLOCK MEMBUAT LINK DOWNLOAD*/
                // pagging setting
    }
  }else{
    $pesan = 'Login terlebih dahulu';
    $this->session->set_flashdata('message', $pesan );
    redirect(base_url('index.php/login'));
  }
}
function ex_bpk(){
  if ($this->ion_auth->logged_in()){
    $level = 'admin';  
    if (!$this->ion_auth->in_group($level)) {
     $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
     $this->session->set_flashdata('message', $pesan );
     redirect(base_url('index.php/admin/dashboard_c'));
   }else{
    $post = $this->input->post('');
                // setting web server
    $file = new PHPExcel ();
    $file->getProperties ()->setCreator ( "simpedaberkah" );
    $file->getProperties ()->setLastModifiedBy ( "BKPSDM Buteng" );
    $file->getProperties ()->setTitle ( "Laporan BPK" );
    $file->getProperties ()->setSubject ( "Laporan BPK" );
    $file->getProperties ()->setDescription ( "Laporan BPK" );
    $file->getProperties ()->setKeywords ( "Laporan BPK" );
    $file->getProperties ()->setCategory ( "Laporan BPK" );
    /*end - BLOCK PROPERTIES FILE EXCEL*/

    $style_col = array(
      'font' => array('bold' => true), // Set font nya jadi bold
      'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
      ),
      'borders' => array(
        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
      )
    );

    // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
    $style_row = array(
      'alignment' => array(
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
      ),
      'borders' => array(
        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
      )
    );

    /*start - BLOCK SETUP SHEET*/
    $file->createSheet ( NULL,0);
    $file->setActiveSheetIndex ( 0 );
    $sheet = $file->getActiveSheet (0);
  //memberikan title pada sheet
    $sheet->setTitle ( "Laporan BPK" );
    $sheet->mergeCells('A1:AG1');
    $sheet->setCellValue ( "A1", "Rekap Biaya Perjalanan Dinas" );
    $sheet->mergeCells('A2:AG2');
    $sheet->setCellValue ( "A2", "BADAN KEPEGAWAIAN DAN PENGEMBANGAN SUMBER DAYA MANUSIA BUTON TENGAH" );
    /*end - BLOCK SETUP SHEET*/

    /*start - BLOCK HEADER*/
    
    $sheet->mergeCells('A4:A6');
    $sheet->setCellValue ( "A4", "No" );
    $sheet->setCellValue ( "A7", "1" );
    $sheet->mergeCells('B4:B6');
    $sheet->setCellValue ( "B4", "No. Bukti" );
    $sheet->setCellValue ( "B7", "2" );
    $sheet->mergeCells('C4:C6');
    $sheet->setCellValue ( "C4", "Tanggal Bukti" );
    $sheet->setCellValue ( "C7", "3" );
    $sheet->mergeCells('D4:D6');
    $sheet->setCellValue ( "D4", "Nama Lengkap Tanpa Gelar" );
    $sheet->setCellValue ( "D7", "4" );
    $sheet->mergeCells('E4:E6');
    $sheet->setCellValue ( "E4", "NIP" );
    $sheet->setCellValue ( "E7", "5" );
    $sheet->mergeCells('F4:F6');
    $sheet->setCellValue ( "F4", "Keperluan Perjalanan Dinas" );
    $sheet->setCellValue ( "F7", "6" );
    $sheet->mergeCells('G4:G6');
    $sheet->setCellValue ( "G4", "Kode Anggaran" );
    $sheet->mergeCells('H4:H6');
    $sheet->setCellValue ( "H4", "Jumlah Dibayarkan" );
    $sheet->setCellValue ( "H7", "7" );
    $sheet->mergeCells('I4:I6');
    $sheet->setCellValue ( "I4", "Gol. Peg" );
    $sheet->setCellValue ( "I7", "8" );
    $sheet->mergeCells('J4:J6');
    $sheet->setCellValue ( "J4", "Tujuan" );
    $sheet->setCellValue ( "J7", "9" );
    $sheet->mergeCells('K4:M4');
    $sheet->setCellValue ( "K4", "SPPD" );
    $sheet->mergeCells('K5:L5');
    $sheet->setCellValue ( "K5", "Tanggal" );
    $sheet->setCellValue ( "K6", "Berangkat" );
    $sheet->setCellValue ( "K7", "10" );
    $sheet->setCellValue ( "L6", "Kembali" );
    $sheet->setCellValue ( "L7", "11" );
    $sheet->mergeCells('M5:M6');
    $sheet->setCellValue ( "M5", "Lama Hari" );
    $sheet->setCellValue ( "M7", "12" );
    $sheet->mergeCells('N4:T4');
    $sheet->setCellValue ( "N4", "Rincian Biaya" );
    $sheet->mergeCells('N5:O5');
    $sheet->setCellValue ( "N5", "Uang Harian" );
    $sheet->setCellValue ( "N6", "Per Hari (Rp)" );
    $sheet->setCellValue ( "N7", "13" );
    $sheet->setCellValue ( "O6", "Total (Rp)" );
    $sheet->setCellValue ( "O7", "14" );
    $sheet->mergeCells('P5:P6');
    $sheet->setCellValue ( "P5", "Biaya Akomodasi Hotel (Rp)" );
    $sheet->setCellValue ( "P7", "15" );
    $sheet->mergeCells('Q5:Q6');
    $sheet->setCellValue ( "Q5", "Biaya Representasi (Rp)" );
    $sheet->setCellValue ( "Q7", "16" );
    $sheet->mergeCells('R5:R6');
    $sheet->setCellValue ( "R5", "Biaya Lain/ Kontribusi/ Bantuan Transport (Rp)" );
    $sheet->setCellValue ( "R7", "17" );
    $sheet->mergeCells('S5:S6');
    $sheet->setCellValue ( "S5", "Biaya Tiket PP (Rp)" );
    $sheet->setCellValue ( "S7", "18" );
    $sheet->mergeCells('T5:T6');
    $sheet->setCellValue ( "T5", "Jumlah" );
    $sheet->setCellValue ( "T7", "19=14+15+16+17+18" );
    $sheet->mergeCells('U4:AF4');
    $sheet->setCellValue ( "U4", "Tiket/Akomodasi" );
    $sheet->mergeCells('U5:U6');
    $sheet->setCellValue ( "U5", "Nama Penginapan" );
    $sheet->setCellValue ( "U7", "20" );
    $sheet->mergeCells('V5:V6');
    $sheet->setCellValue ( "V5", "Tujuan" );
    $sheet->setCellValue ( "V7", "21" );
    $sheet->mergeCells('W5:AA5');
    $sheet->setCellValue ( "W5", "Berangkat" );
    $sheet->setCellValue ( "W7", "22" );
    $sheet->setCellValue ( "X6", "Pesawat/KA" );
    $sheet->setCellValue ( "X7", "23" );
    $sheet->setCellValue ( "Y6", "No. Tiket" );
    $sheet->setCellValue ( "Y7", "24" );
    $sheet->setCellValue ( "Z6", "Kode Booking" );
    $sheet->setCellValue ( "Z7", "25" );
    $sheet->setCellValue ( "AA6", "Harga (Rp)" );
    $sheet->setCellValue ( "AA7", "26" );
    $sheet->mergeCells('AB5:AF5');
    $sheet->setCellValue ( "AB5", "Kembali" );
    $sheet->setCellValue ( "AB7", "27" );
    $sheet->setCellValue ( "AB6", "Berangkat" );
    $sheet->setCellValue ( "AC6", "Pesawat/KA" );
    $sheet->setCellValue ( "AD6", "No. Tiket" );
    $sheet->setCellValue ( "AE6", "Kode Booking" );
    $sheet->setCellValue ( "AF6", "Harga (Rp)" );
    $sheet->mergeCells('AG4:AG6');
    $sheet->setCellValue ( "AG4", "Ket" );

    /*end - BLOCK HEADER*/

    /* start - BLOCK MEMASUKAN DATABASE*/
    $nomor = 1;
    $nocel = 8;
    $hasil = $this->Admin_m->data_sppd();
                // echo "<pre>";print_r($hasil);echo "</pre>";exit();
    foreach ($hasil as $data) {
        // echo "<pre>";print_r($this->Admin_m->jabatan_min2($data->id_pegawai));echo "<pre>";
      $detpeg = $this->Admin_m->detail_data_order('data_pegawai','id_pegawai',$data->id_pegawai);
      $sheet->setCellValue ( "A".$nocel, $nomor );
      $sheet->setCellValue ( "B".$nocel, $data->no_perjadin );
      $sheet->setCellValue ( "C".$nocel, $data->tgl_bukti );
      $sheet->setCellValue ( "D".$nocel, @$detpeg->nama_pegawai);
      $sheet->setCellValue ( "E".$nocel, @$detpeg->nip);
      $sheet->setCellValue ( "F".$nocel, $data->maksud_perjadin );
      $sheet->setCellValue ( "G".$nocel, $data->kd_anggaran );
      $sheet->setCellValue ( "H".$nocel, $data->jumlah_dibayarkan );
      $sheet->setCellValue ( "I".$nocel, @$this->Admin_m->detail_data_order('master_golongan','id_golongan',$data->id_golongan)->golongan);
      $sheet->setCellValue ( "J".$nocel, $data->tujuan );
      $sheet->setCellValue ( "K".$nocel, $data->tgl_berangkat );
      $sheet->setCellValue ( "L".$nocel, $data->tgl_kembali );
      $sheet->setCellValue ( "M".$nocel, $data->lama_hari);
      $sheet->setCellValue ( "N".$nocel, $data->uang_perhari);
      $sheet->setCellValue ( "O".$nocel, $data->total_uang_harian );
      $sheet->setCellValue ( "P".$nocel, $data->biaya_akomodasi_hotel );
      $sheet->setCellValue ( "Q".$nocel, $data->biaya_representasi );
      $sheet->setCellValue ( "R".$nocel, $data->biaya_lain );
      $sheet->setCellValue ( "S".$nocel, '');
      $sheet->setCellValue ( "T".$nocel, $data->jumlah_biaya );
      $sheet->setCellValue ( "U".$nocel, $data->nama_hotel );
      $sheet->setCellValue ( "V".$nocel, $data->tujuan );
      $sheet->setCellValue ( "W".$nocel, $data->tgl_ta_berangkat);
      $sheet->setCellValue ( "X".$nocel, $data->pesawat_berangkat);
      $sheet->setCellValue ( "Y".$nocel, $data->no_tiket_berangkat );
      $sheet->setCellValue ( "Z".$nocel, $data->kode_book_berangkat );
      $sheet->setCellValue ( "AA".$nocel, $data->harga_berangkat );
      $sheet->setCellValue ( "AB".$nocel, $data->tgl_ta_kembali);
      $sheet->setCellValue ( "AC".$nocel, $data->pesawat_kembali);
      $sheet->setCellValue ( "AD".$nocel, $data->no_tiket_kembali );
      $sheet->setCellValue ( "AE".$nocel, $data->kode_book_kembali );
      $sheet->setCellValue ( "AF".$nocel, $data->harga_kembali );
      $nomor++;
      $nocel++;
    }
    /* end - BLOCK MEMASUKAN DATABASE*/

    /*start - BLOK AUTOSIZE*/
  $sheet ->getColumnDimension ( "A" )->setWidth(4);
  $sheet ->getColumnDimension ( "B" )->setWidth(25);
  $sheet ->getColumnDimension ( "C" )->setWidth(20);
  $sheet ->getColumnDimension ( "D" )->setWidth(40);
  $sheet ->getColumnDimension ( "E" )->setWidth(35);
  $sheet ->getColumnDimension ( "F" )->setWidth(50);
  $sheet ->getColumnDimension ( "G" )->setWidth(20);
  $sheet ->getColumnDimension ( "H" )->setWidth(15);
  $sheet ->getColumnDimension ( "I" )->setWidth(10);
  $sheet ->getColumnDimension ( "J" )->setWidth(15);
  $sheet ->getColumnDimension ( "K" )->setWidth(15);
  $sheet ->getColumnDimension ( "L" )->setWidth(15);
  $sheet ->getColumnDimension ( "M" )->setWidth(15);
  $sheet ->getColumnDimension ( "N" )->setWidth(15);
  $sheet ->getColumnDimension ( "O" )->setWidth(15);
  $sheet ->getColumnDimension ( "P" )->setWidth(15);
  $sheet ->getColumnDimension ( "Q" )->setWidth(15);
  $sheet ->getColumnDimension ( "R" )->setWidth(15);
  $sheet ->getColumnDimension ( "S" )->setWidth(15);
  $sheet ->getColumnDimension ( "T" )->setWidth(15);
  $sheet ->getColumnDimension ( "U" )->setWidth(15);
  $sheet ->getColumnDimension ( "V" )->setWidth(15);
  $sheet ->getColumnDimension ( "W" )->setWidth(15);
  $sheet ->getColumnDimension ( "X" )->setWidth(15);
  $sheet ->getColumnDimension ( "Y" )->setWidth(15);
  $sheet ->getColumnDimension ( "Z" )->setWidth(15);
  $sheet ->getColumnDimension ( "AA" )->setWidth(15);
  $sheet ->getColumnDimension ( "AB" )->setWidth(15);
  $sheet ->getColumnDimension ( "AC" )->setWidth(15);
  $sheet ->getColumnDimension ( "AD" )->setWidth(15);
  $sheet ->getColumnDimension ( "AE" )->setWidth(15);
  $sheet ->getColumnDimension ( "AF" )->setWidth(15);
  $sheet ->getColumnDimension ( "AG" )->setWidth(15);

  /*end - BLOG AUTOSIZE*/

        /*start - BLOCK UNTUK BORDER*/
$thick = array ();
$thick['borders']=array();
$thick['borders']['allborders']=array();
$thick['borders']['allborders']['style']=PHPExcel_Style_Border::BORDER_THICK ;
$sheet->getStyle ( 'A4:AG4' )->applyFromArray ($thick);
$sheet->getStyle ( 'A5:AG5' )->applyFromArray ($thick);
$sheet->getStyle ( 'A6:AG6' )->applyFromArray ($thick);

$thin = array ();
$thin['borders']=array();
$thin['borders']['allborders']=array();
$thin['borders']['allborders']['style']=PHPExcel_Style_Border::BORDER_THIN ;
$sheet->getStyle ( 'A7:AG24' )->applyFromArray ($thin);
/*end - BLOCK UNTUK BORDER*/

/*start - BLOCK UNTUK BACKGROUND*/
$backgroound['fill']=array();
$backgroound['fill']['type']=PHPExcel_Style_Fill::FILL_SOLID;
$backgroound['fill']['color']=array();
$backgroound['fill']['color']['rgb']='99FFFF';
$sheet->getStyle ( 'A4:AG4' )->applyFromArray ($backgroound);
$sheet->getStyle ( 'A5:AG5' )->applyFromArray ($backgroound);
$sheet->getStyle ( 'A6:AG6' )->applyFromArray ($backgroound);

/*end - BLOCK UNTUK BACKGROUND*/

    /* start - BLOCK MEMBUAT LINK DOWNLOAD*/
    header ( 'Content-Type: application/vnd.ms-excel' );
  //namanya adalah keluarga.xls
    header ( 'Content-Disposition: attachment;filename="laporan_bpk.xls"' ); 
    header ( 'Cache-Control: max-age=0' );
    $writer = PHPExcel_IOFactory::createWriter ( $file, 'Excel5' );
    $writer->save ( 'php://output' );
    /* start - BLOCK MEMBUAT LINK DOWNLOAD*/
                // pagging setting
  }
}else{
  $pesan = 'Login terlebih dahulu';
  $this->session->set_flashdata('message', $pesan );
  redirect(base_url('index.php/login'));
}
}
function ex_bpk_honorer(){
  if ($this->ion_auth->logged_in()){
    $level = 'admin';  
    if (!$this->ion_auth->in_group($level)) {
     $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
     $this->session->set_flashdata('message', $pesan );
     redirect(base_url('index.php/admin/dashboard_c'));
   }else{
    $post = $this->input->post('');
                // setting web server
    $file = new PHPExcel ();
    $file->getProperties ()->setCreator ( "simpedaberkah" );
    $file->getProperties ()->setLastModifiedBy ( "BKPSDM Buteng" );
    $file->getProperties ()->setTitle ( "Laporan BPK" );
    $file->getProperties ()->setSubject ( "Laporan BPK" );
    $file->getProperties ()->setDescription ( "Laporan BPK" );
    $file->getProperties ()->setKeywords ( "Laporan BPK" );
    $file->getProperties ()->setCategory ( "Laporan BPK" );
    /*end - BLOCK PROPERTIES FILE EXCEL*/

    $style_col = array(
      'font' => array('bold' => true), // Set font nya jadi bold
      'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
      ),
      'borders' => array(
        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
      )
    );

    // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
    $style_row = array(
      'alignment' => array(
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
      ),
      'borders' => array(
        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
      )
    );

    /*start - BLOCK SETUP SHEET*/
    $file->createSheet ( NULL,0);
    $file->setActiveSheetIndex ( 0 );
    $sheet = $file->getActiveSheet ( 0 );
  //memberikan title pada sheet
    $sheet->setTitle ( "Laporan BPK Honorer" );
    $sheet->mergeCells('A1:AG1');
    $sheet->setCellValue ( "A1", "Rekap Biaya Perjalanan Dinas" );
    $sheet->mergeCells('A2:AG2');
    $sheet->setCellValue ( "A2", "BADAN KEPEGAWAIAN DAN PENGEMBANGAN SUMBER DAYA MANUSIA BUTON TENGAH" );
    /*end - BLOCK SETUP SHEET*/

    /*start - BLOCK HEADER*/
    
    $sheet->mergeCells('A4:A6');
    $sheet->setCellValue ( "A4", "No" );
    $sheet->setCellValue ( "A7", "1" );
    $sheet->mergeCells('B4:B6');
    $sheet->setCellValue ( "B4", "No. Bukti" );
    $sheet->setCellValue ( "B7", "2" );
    $sheet->mergeCells('C4:C6');
    $sheet->setCellValue ( "C4", "Tanggal Bukti" );
    $sheet->setCellValue ( "C7", "3" );
    $sheet->mergeCells('D4:D6');
    $sheet->setCellValue ( "D4", "Nama Lengkap Tanpa Gelar" );
    $sheet->setCellValue ( "D7", "4" );
    $sheet->mergeCells('E4:E6');
    $sheet->setCellValue ( "E4", "Kode Honorer" );
    $sheet->setCellValue ( "E7", "5" );
    $sheet->mergeCells('F4:F6');
    $sheet->setCellValue ( "F4", "Keperluan Perjalanan Dinas" );
    $sheet->setCellValue ( "F7", "6" );
    $sheet->mergeCells('G4:G6');
    $sheet->setCellValue ( "G4", "Kode Anggaran" );
    $sheet->mergeCells('H4:H6');
    $sheet->setCellValue ( "G4", "Jumlah Dibayarkan" );
    $sheet->setCellValue ( "H7", "7" );
    $sheet->mergeCells('I4:I6');
    $sheet->setCellValue ( "I4", "Tujuan" );
    $sheet->setCellValue ( "I7", "8" );
    $sheet->mergeCells('J4:L4');
    $sheet->setCellValue ( "J4", "SPPD" );
    $sheet->mergeCells('J5:K5');
    $sheet->setCellValue ( "J5", "Tanggal" );
    $sheet->setCellValue ( "J6", "Berangkat" );
    $sheet->setCellValue ( "J7", "9" );
    $sheet->setCellValue ( "K6", "Kembali" );
    $sheet->setCellValue ( "K7", "10" );
    $sheet->mergeCells('L5:L6');
    $sheet->setCellValue ( "L5", "Lama Hari" );
    $sheet->setCellValue ( "L7", "11" );
    $sheet->mergeCells('M4:S4');
    $sheet->setCellValue ( "M4", "Rincian Biaya" );
    $sheet->mergeCells('M5:N5');
    $sheet->setCellValue ( "M5", "Uang Harian" );
    $sheet->setCellValue ( "M6", "Per Hari (Rp)" );
    $sheet->setCellValue ( "M7", "12" );
    $sheet->setCellValue ( "N6", "Total (Rp)" );
    $sheet->setCellValue ( "N7", "13" );
    $sheet->mergeCells('O5:O6');
    $sheet->setCellValue ( "O5", "Biaya Akomodasi Hotel (Rp)" );
    $sheet->setCellValue ( "O7", "14" );
    $sheet->mergeCells('P5:P6');
    $sheet->setCellValue ( "P5", "Biaya Representasi (Rp)" );
    $sheet->setCellValue ( "P7", "15" );
    $sheet->mergeCells('Q5:Q6');
    $sheet->setCellValue ( "Q5", "Biaya Lain/ Kontribusi/ Bantuan Transport (Rp)" );
    $sheet->setCellValue ( "Q7", "16" );
    $sheet->mergeCells('R5:R6');
    $sheet->setCellValue ( "R5", "Biaya Tiket PP (Rp)" );
    $sheet->setCellValue ( "R7", "17" );
    $sheet->mergeCells('S5:S6');
    $sheet->setCellValue ( "S5", "Jumlah" );
    $sheet->setCellValue ( "S7", "18=13+14+15+16+17" );
    $sheet->mergeCells('T4:AE4');
    $sheet->setCellValue ( "T4", "Tiket/Akomodasi" );
    $sheet->mergeCells('T5:T6');
    $sheet->setCellValue ( "T5", "Nama Penginapan" );
    $sheet->setCellValue ( "T7", "19" );
    $sheet->mergeCells('U5:U6');
    $sheet->setCellValue ( "U5", "Tujuan" );
    $sheet->setCellValue ( "U7", "20" );
    $sheet->mergeCells('V5:Z5');
    $sheet->setCellValue ( "V5", "Berangkat" );
    $sheet->setCellValue ( "V7", "21" );
    $sheet->setCellValue ( "W6", "Pesawat/KA" );
    $sheet->setCellValue ( "W7", "22" );
    $sheet->setCellValue ( "X6", "No. Tiket" );
    $sheet->setCellValue ( "X7", "23" );
    $sheet->setCellValue ( "Y6", "Kode Booking" );
    $sheet->setCellValue ( "Y7", "24" );
    $sheet->setCellValue ( "Z6", "Harga (Rp)" );
    $sheet->setCellValue ( "Z7", "25" );
    $sheet->mergeCells('AA5:AE5');
    $sheet->setCellValue ( "AA5", "Kembali" );
    $sheet->setCellValue ( "AA7", "26" );
    $sheet->setCellValue ( "AA6", "Berangkat" );
    $sheet->setCellValue ( "AB6", "Pesawat/KA" );
    $sheet->setCellValue ( "AC6", "No. Tiket" );
    $sheet->setCellValue ( "AD6", "Kode Booking" );
    $sheet->setCellValue ( "AE6", "Harga (Rp)" );
    $sheet->mergeCells('AF4:AF6');
    $sheet->setCellValue ( "AF4", "Ket" );

    /*end - BLOCK HEADER*/

    /* start - BLOCK MEMASUKAN DATABASE*/
    $nomor = 1;
    $nocel = 8;
    $hasil = $this->Admin_m->data_sppd_honorer();
                // echo "<pre>";print_r($hasil);echo "</pre>";exit();
    foreach ($hasil as $data) {
        // echo "<pre>";print_r($this->Admin_m->jabatan_min2($data->id_pegawai));echo "<pre>";
      $dethon = $this->Admin_m->detail_data_order('honorer','id_honorer',$data->id_honorer);
      $sheet->setCellValue ( "A".$nocel, $nomor );
      $sheet->setCellValue ( "B".$nocel, $data->no_perjadin );
      $sheet->setCellValue ( "C".$nocel, $data->tgl_bukti );
      $sheet->setCellValue ( "D".$nocel, @$dethon->nama);
      $sheet->setCellValue ( "E".$nocel, @$dethon->kode_honorer);
      $sheet->setCellValue ( "F".$nocel, $data->maksud_perjadin );
      $sheet->setCellValue ( "G".$nocel, $data->kd_anggaran );
      $sheet->setCellValue ( "H".$nocel, $data->jumlah_dibayarkan );
      $sheet->setCellValue ( "I".$nocel, $data->tujuan );
      $sheet->setCellValue ( "J".$nocel, $data->tgl_berangkat );
      $sheet->setCellValue ( "K".$nocel, $data->tgl_kembali );
      $sheet->setCellValue ( "L".$nocel, $data->lama_hari);
      $sheet->setCellValue ( "M".$nocel, $data->uang_perhari);
      $sheet->setCellValue ( "N".$nocel, $data->total_uang_harian );
      $sheet->setCellValue ( "O".$nocel, $data->biaya_akomodasi_hotel );
      $sheet->setCellValue ( "P".$nocel, $data->biaya_representasi );
      $sheet->setCellValue ( "Q".$nocel, $data->biaya_lain );
      $sheet->setCellValue ( "R".$nocel, '');
      $sheet->setCellValue ( "S".$nocel, $data->jumlah_biaya );
      $sheet->setCellValue ( "T".$nocel, $data->nama_hotel );
      $sheet->setCellValue ( "U".$nocel, $data->tujuan );
      $sheet->setCellValue ( "V".$nocel, $data->tgl_ta_berangkat);
      $sheet->setCellValue ( "W".$nocel, $data->pesawat_berangkat);
      $sheet->setCellValue ( "X".$nocel, $data->no_tiket_berangkat );
      $sheet->setCellValue ( "Y".$nocel, $data->kode_book_berangkat );
      $sheet->setCellValue ( "Z".$nocel, $data->harga_berangkat );
      $sheet->setCellValue ( "AA".$nocel, $data->tgl_ta_kembali);
      $sheet->setCellValue ( "AB".$nocel, $data->pesawat_kembali);
      $sheet->setCellValue ( "AC".$nocel, $data->no_tiket_kembali );
      $sheet->setCellValue ( "AD".$nocel, $data->kode_book_kembali );
      $sheet->setCellValue ( "AE".$nocel, $data->harga_kembali );
      $nomor++;
      $nocel++;
    }
    /* end - BLOCK MEMASUKAN DATABASE*/

    /* start - BLOCK MEMBUAT LINK DOWNLOAD*/
    header ( 'Content-Type: application/vnd.ms-excel' );
  //namanya adalah keluarga.xls
    header ( 'Content-Disposition: attachment;filename="laporan_bpk.xls"' ); 
    header ( 'Cache-Control: max-age=0' );
    $writer = PHPExcel_IOFactory::createWriter ( $file, 'Excel5' );
    $writer->save ( 'php://output' );
    /* start - BLOCK MEMBUAT LINK DOWNLOAD*/
                // pagging setting
  }
}else{
  $pesan = 'Login terlebih dahulu';
  $this->session->set_flashdata('message', $pesan );
  redirect(base_url('index.php/login'));
}
}
function dataexcel_honorer(){
  if ($this->ion_auth->logged_in()){
    $level = 'admin';  
    if (!$this->ion_auth->in_group($level)) {
     $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
     $this->session->set_flashdata('message', $pesan );
     redirect(base_url('index.php/admin/dashboard_c'));
   }else{
    $post = $this->input->post('');
    $data['title'] = 'List Laporan Data Honorer';
      // $data['page'] = 'admin/export-v';
      // $data['nav'] = 'nav/nav-admin';
      // $data['dtadm'] = $this->ion_auth->user()->row();
                // setting web server
    $file = new PHPExcel ();
    $file->getProperties ()->setCreator ( "Goblooge" );
    $file->getProperties ()->setLastModifiedBy ( "simpedaberkah" );
    $file->getProperties ()->setTitle ( "List Laporan Data Honorer" );
    $file->getProperties ()->setSubject ( "Daftar Honorer" );
    $file->getProperties ()->setDescription ( "Daftar Honorer" );
    $file->getProperties ()->setKeywords ( "Daftar Honorer" );
    $file->getProperties ()->setCategory ( "Daftar Honorer" );
    /*end - BLOCK PROPERTIES FILE EXCEL*/

    /*start - BLOCK SETUP SHEET*/
    $file->createSheet ( NULL,0);
    $file->setActiveSheetIndex ( 0 );
    $sheet = $file->getActiveSheet ( 0 );
  //memberikan title pada sheet
    $sheet->setTitle ( "Daftar Honorer" );
    /*end - BLOCK SETUP SHEET*/

      /*start - BLOCK HEADER*/
    $sheet->setCellValue ( "A1", "No" );
    $sheet->setCellValue ( "B1", "NAMA" );
    $sheet->setCellValue ( "C1", "ALAMAT" );
    $sheet->setCellValue ( "D1", "NOMOR SK" );
    $sheet->setCellValue ( "E1", "LOKASI KERJA" );
    $sheet->setCellValue ( "F1", "TMT" );
    $sheet->setCellValue ( "G1", "NOMOR HP" );
    /*end - BLOCK HEADER*/

    /* start - BLOCK MEMASUKAN DATABASE*/
    $nomor = 1;
    $nocel = 2;
    $hasil = $this->Admin_m->select_data('honorer');
                // echo "<pre>";print_r($hasil);echo "</pre>";exit();
    foreach ($hasil as $data) {
      $sheet->setCellValue ( "A".$nocel, $nomor );
      $sheet->setCellValue ( "B".$nocel, strtoupper($data->nama));
      $sheet->setCellValue ( "C".$nocel, strtoupper($data->alamat) );
      $sheet->setCellValue ( "D".$nocel, strtoupper($data->nomor_sk));
      $sheet->setCellValue ( "E".$nocel, strtoupper(@$this->Admin_m->detail_data_order('master_satuan_kerja','id_satuan_kerja',$data->id_lokasi_kerja)->nama_satuan_kerja) );
      $sheet->setCellValue ( "F".$nocel, strtoupper($data->tmt));
      $sheet->setCellValue ( "G".$nocel, strtoupper($data->no_hp) );
      $nomor++;
      $nocel++;
    }
    /* end - BLOCK MEMASUKAN DATABASE*/

      /*start - BLOK AUTOSIZE*/
  $sheet ->getColumnDimension ( "A" )->setWidth(4);
  $sheet ->getColumnDimension ( "B" )->setWidth(40);
  $sheet ->getColumnDimension ( "C" )->setWidth(30);
  $sheet ->getColumnDimension ( "D" )->setWidth(35);
  $sheet ->getColumnDimension ( "E" )->setWidth(35);
  $sheet ->getColumnDimension ( "F" )->setWidth(20);
  $sheet ->getColumnDimension ( "G" )->setWidth(20);
  
/*end - BLOG AUTOSIZE*/

/*start - BLOCK UNTUK BORDER*/
$thick = array ();
$thick['borders']=array();
$thick['borders']['allborders']=array();
$thick['borders']['allborders']['style']=PHPExcel_Style_Border::BORDER_THICK ;
$sheet->getStyle ( 'A1:G1' )->applyFromArray ($thick);

$thin = array ();
$thin['borders']=array();
$thin['borders']['allborders']=array();
$thin['borders']['allborders']['style']=PHPExcel_Style_Border::BORDER_THIN ;
$sheet->getStyle ( 'A1:G12' )->applyFromArray ($thin);
/*end - BLOCK UNTUK BORDER*/

/*start - BLOCK UNTUK BACKGROUND*/
$backgroound['fill']=array();
$backgroound['fill']['type']=PHPExcel_Style_Fill::FILL_SOLID;
$backgroound['fill']['color']=array();
$backgroound['fill']['color']['rgb']='99FFFF';
$sheet->getStyle ( 'A1:G1' )->applyFromArray ($backgroound);
/*end - BLOCK UNTUK BACKGROUND*/

    /* start - BLOCK MEMBUAT LINK DOWNLOAD*/
    header ( 'Content-Type: application/vnd.ms-excel' );
  //namanya adalah keluarga.xls
    header ( 'Content-Disposition: attachment;filename="laporan_honorer.xls"' ); 
    header ( 'Cache-Control: max-age=0' );
    $writer = PHPExcel_IOFactory::createWriter ( $file, 'Excel5' );
    $writer->save ( 'php://output' );
    /* start - BLOCK MEMBUAT LINK DOWNLOAD*/
                // pagging setting
  }
}else{
  $pesan = 'Login terlebih dahulu';
  $this->session->set_flashdata('message', $pesan );
  redirect(base_url('index.php/login'));
}
}
function data_pegawai(){
  if ($this->ion_auth->logged_in()){
    $level = 'admin';  
    if (!$this->ion_auth->in_group($level)) {
     $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
     $this->session->set_flashdata('message', $pesan );
     redirect(base_url('index.php/admin/dashboard_c'));
   }else{
    $post = $this->input->post('');
                // setting web server
    $file = new PHPExcel ();
    $file->getProperties ()->setCreator ( "simpeg" );
    $file->getProperties ()->setLastModifiedBy ( "www.simpeg.com" );
    $file->getProperties ()->setTitle ( "Daftar Pegawai" );
    $file->getProperties ()->setSubject ( "Daftar Pegawai" );
    $file->getProperties ()->setDescription ( "Daftar Pegawai" );
    $file->getProperties ()->setKeywords ( "Daftar Pegawai" );
    $file->getProperties ()->setCategory ( "Daftar Pegawai" );
    /*end - BLOCK PROPERTIES FILE EXCEL*/

    /*start - BLOCK SETUP SHEET*/
    $file->createSheet ( NULL,0);
    $file->setActiveSheetIndex ( 0 );
    $sheet = $file->getActiveSheet ( 0 );
  //memberikan title pada sheet
    $sheet->setTitle ( "Daftar Listing Nominatif PNS" );
    $sheet->mergeCells('A1:AA1');
    $sheet->setCellValue ( "A1", "DAFTAR LISTING NOMINATIF PNS" );
    $sheet->mergeCells('A2:AA2');
    $sheet->setCellValue ( "A2", "DI LINGKUP PEMERINTAH KABUPATEN BUTON" );
    /*end - BLOCK SETUP SHEET*/

    /*start - BLOCK HEADER*/
    
    $sheet->mergeCells('A4:A6');
    $sheet->setCellValue ( "A4", "No" );
    $sheet->mergeCells('B4:C4');
    $sheet->setCellValue ( "B4", "NIP" );
    $sheet->mergeCells('B5:B6');
    $sheet->setCellValue ( "B5", "NIP Lama" );
    $sheet->mergeCells('C5:C6');
    $sheet->setCellValue ( "C5", "NIP Baru" );
    $sheet->mergeCells('D4:D6');
    $sheet->setCellValue ( "D4", "Nama" );
    $sheet->mergeCells('E4:E6');
    $sheet->setCellValue ( "E4", "Gelar Depan" );
    $sheet->mergeCells('F4:F6');
    $sheet->setCellValue ( "F4", "Gelar Belakang" );
    $sheet->mergeCells('G4:H4');
    $sheet->setCellValue ( "G4", "Tempat Tanggal Lahir" );
    $sheet->mergeCells('G5:G6');
    $sheet->setCellValue ( "G5", "Tempat Lahir" );
    $sheet->mergeCells('H5:H6');
    $sheet->setCellValue ( "H5", "Tanggal Lahir" );
    $sheet->mergeCells('I4:K4');
    $sheet->setCellValue ( "I4", "CPNS/PNS" );
    $sheet->mergeCells('I5:I6');
    $sheet->setCellValue ( "I5", "Gol Awal" );
    $sheet->mergeCells('J5:J6');
    $sheet->setCellValue ( "J5", "TMT CPNS" );
    $sheet->mergeCells('K5:K6');
    $sheet->setCellValue ( "K5", "TMT PNS" );
    $sheet->mergeCells('L4:L6');
    $sheet->setCellValue ( "L4", "L/p" );
    $sheet->mergeCells('M4:P4');
    $sheet->setCellValue ( "M4", "Golongan Ruang" );
    $sheet->mergeCells('M5:M6');
    $sheet->setCellValue ( "M5", "Gol Akhir" );
    $sheet->mergeCells('N5:N6');
    $sheet->setCellValue ( "N5", "TMT" );
    $sheet->mergeCells('O5:P5');
    $sheet->setCellValue ( "O5", "Masa Kerja" );
    $sheet->setCellValue ( "O6", "MK Thn" );
    $sheet->setCellValue ( "P6", "MK Bln" );
    $sheet->mergeCells('Q4:V4');
    $sheet->setCellValue ( "Q4", "Jabatan" );
    $sheet->mergeCells('Q5:S5');
    $sheet->setCellValue ( "Q5", "Struktural" );
    $sheet->setCellValue ( "Q6", "Eselon" );
    $sheet->setCellValue ( "R6", "TMT Struktural" );
    $sheet->setCellValue ( "S6", "NM Jab Struktural" );
    $sheet->mergeCells('T5:U5');
    $sheet->setCellValue ( "T5", "Fungsional Tertentu" );
    $sheet->setCellValue ( "T6", "FT Tertentu" );
    $sheet->setCellValue ( "U6", "FT Nm Jabatan" );
    $sheet->setCellValue ( "V5", "Fungsional Umum" );
    $sheet->setCellValue ( "V6", "Nama Jabatan" );
    $sheet->mergeCells('W4:W6');
    $sheet->setCellValue ( "W4", "Unit Kerja" );
    $sheet->mergeCells('X4:X6');
    $sheet->setCellValue ( "X4", "Unit Kerja Induk" );
    $sheet->mergeCells('Y4:Z4');
    $sheet->setCellValue ( "Y4", "Pendidikan" );
    $sheet->mergeCells('Y5:Y6');
    $sheet->setCellValue ( "Y5", "Nama Pendidikan Terakhir" );
    $sheet->mergeCells('Z5:Z6');
    $sheet->setCellValue ( "Z5", "Lulus" );
    $sheet->mergeCells('AA4:AA6');
    $sheet->setCellValue ( "AA4", "Ked.Huk" );

    /*end - BLOCK HEADER*/

    /* start - BLOCK MEMASUKAN DATABASE*/
    $nomor = 1;
    $nocel = 8;
    $hasil = $this->Admin_m->data_pegawai();
                // echo "<pre>";print_r($hasil);echo "</pre>";exit();
    foreach ($hasil as $data) {
      $sheet->setCellValue ( "A".$nocel, $nomor );
      $sheet->setCellValue ( "B".$nocel, $data->nip );
      $sheet->setCellValue ( "C".$nocel, $data->nip_lama );
      $sheet->setCellValue ( "D".$nocel, $data->nama_pegawai );
      $sheet->setCellValue ( "E".$nocel, $data->gelar_dpn );
      $sheet->setCellValue ( "F".$nocel, $data->gelar_belakang );
      $sheet->setCellValue ( "G".$nocel, $data->tempat_lahir );
      $sheet->setCellValue ( "H".$nocel, $data->tanggal_lahir );
      $sheet->setCellValue ( "I".$nocel, @$this->Admin_m->detail_data_order('master_golongan','id_golongan',$data->id_golongan)->golongan);
      $sheet->setCellValue ( "J".$nocel, $data->tmt_cpns );
      $sheet->setCellValue ( "K".$nocel, $data->tmt_pns );
      $sheet->setCellValue ( "L".$nocel, $data->jenis_kelamin );
      $sheet->setCellValue ( "M".$nocel, @$this->Admin_m->riwayat_max($data->id_pegawai)->golongan);
      $sheet->setCellValue ( "N".$nocel, @$this->Admin_m->riwayat_max($data->id_pegawai)->tanggal_mulai);
      $sheet->setCellValue ( "O".$nocel, @$this->Admin_m->riwayat_max($data->id_pegawai)->masa_kerja_bulan );
      $sheet->setCellValue ( "P".$nocel, @$this->Admin_m->riwayat_max($data->id_pegawai)->masa_kerja_tahun );
      $sheet->setCellValue ( "Q".$nocel, @$this->Admin_m->detail_data_order('master_eselon','id_eselon',$data->id_eselon)->nama_eselon );
      $sheet->setCellValue ( "R".$nocel, @$this->Admin_m->jabatan_min($data->id_pegawai)->tanggal_mulai);
      $sheet->setCellValue ( "S".$nocel, @$this->Admin_m->jabatan_min($data->id_pegawai)->nama_jabatan );
      $sheet->setCellValue ( "T".$nocel, $data->nip_lama );
      $sheet->setCellValue ( "U".$nocel, $data->nip_lama );
      $sheet->setCellValue ( "V".$nocel, $data->nip_lama );
      $sheet->setCellValue ( "W".$nocel, @$this->Admin_m->detail_data_order('master_unit_kerja','id_unit_kerja',$data->id_unit_kerja)->nama_unit_kerja);
      $sheet->setCellValue ( "X".$nocel, @$this->Admin_m->detail_data_order('master_unit_kerja','id_unit_kerja',$data->id_unit_kerja)->parent_unit);
      $sheet->setCellValue ( "Y".$nocel, @$this->Admin_m->detail_data_order('data_pendidikan','id_pegawai',$data->id_pegawai)->tingkat_pendidikan );
      $sheet->setCellValue ( "Z".$nocel, @$this->Admin_m->detail_data_order('data_pendidikan','id_pegawai',$data->id_pegawai)->tanggal_lulus );
      $sheet->setCellValue ( "AA".$nocel, $data->nip_lama );
      $nomor++;
      $nocel++;
    }
    /* end - BLOCK MEMASUKAN DATABASE*/

    /* start - BLOCK MEMBUAT LINK DOWNLOAD*/
    header ( 'Content-Type: application/vnd.ms-excel' );
  //namanya adalah keluarga.xls
    header ( 'Content-Disposition: attachment;filename="daftar_pegawai.xls"' ); 
    header ( 'Cache-Control: max-age=0' );
    $writer = PHPExcel_IOFactory::createWriter ( $file, 'Excel5' );
    $writer->save ( 'php://output' );
    /* start - BLOCK MEMBUAT LINK DOWNLOAD*/
                // pagging setting
  }
}else{
  $pesan = 'Login terlebih dahulu';
  $this->session->set_flashdata('message', $pesan );
  redirect(base_url('index.php/login'));
}
}
function exceldaftargel2(){
  if ($this->ion_auth->logged_in()){
    $level = 'admin';  
    if (!$this->ion_auth->in_group($level)) {
     $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
     $this->session->set_flashdata('message', $pesan );
     redirect(base_url('index.php/admin/dashboard_c'));
   }else{
    $post = $this->input->post('');
    $data['title'] = 'Daftar Calon Peserta Mahasiswa Baru';
      // $data['page'] = 'admin/export-v';
      // $data['nav'] = 'nav/nav-admin';
      // $data['dtadm'] = $this->ion_auth->user()->row();
                // setting web server
    $file = new PHPExcel ();
    $file->getProperties ()->setCreator ( "Goblooge" );
    $file->getProperties ()->setLastModifiedBy ( "www.pmb.unidayan.ac.id" );
    $file->getProperties ()->setTitle ( "List Calon Peserta sudah membayar" );
    $file->getProperties ()->setSubject ( "Daftar Calon Peserta" );
    $file->getProperties ()->setDescription ( "Daftar Calon Peserta" );
    $file->getProperties ()->setKeywords ( "Daftar Calon Peserta" );
    $file->getProperties ()->setCategory ( "Calon Peserta" );
    /*end - BLOCK PROPERTIES FILE EXCEL*/

    /*start - BLOCK SETUP SHEET*/
    $file->createSheet ( NULL,0);
    $file->setActiveSheetIndex ( 0 );
    $sheet = $file->getActiveSheet ( 0 );
  //memberikan title pada sheet
    $sheet->setTitle ( "Daftar Dosen" );
    /*end - BLOCK SETUP SHEET*/

    /*start - BLOCK HEADER*/
    $sheet->setCellValue ( "A1", "No" );
    $sheet->setCellValue ( "B1", "Noreg" );
    $sheet->setCellValue ( "C1", "Nama" );
    $sheet->setCellValue ( "D1", "Pilihan 1" );
    $sheet->setCellValue ( "E1", "Pilihan 2" );
    $sheet->setCellValue ( "F1", "Pilihan 3" );
    $sheet->setCellValue ( "G1", "Kelompok" );
    $sheet->setCellValue ( "H1", "Jurusan" );
    $sheet->setCellValue ( "I1", "Email" );
    $sheet->setCellValue ( "J1", "No Hp" );
    $sheet->setCellValue ( "K1", "L/P" );
    $sheet->setCellValue ( "L1", "Agama" );
    $sheet->setCellValue ( "M1", "Tgl Lhr" );
    $sheet->setCellValue ( "N1", "Tmp Lhr" );
    $sheet->setCellValue ( "O1", "Asal Sekolah" );
    $sheet->setCellValue ( "P1", "NEM" );
    /*end - BLOCK HEADER*/

    /* start - BLOCK MEMASUKAN DATABASE*/
    $nomor = 1;
    $nocel = 2;
    $hasil = $data['hasil'] = $this->Peserta_m->databayargel2();
                // echo "<pre>";print_r($hasil);echo "</pre>";exit();
    foreach ($hasil as $data) {
      
        // echo "<pre>";print_r($this->Peserta_m->detagama($data->id_agama));echo "<pre/>";exit();
     
      if ($this->Peserta_m->detagama($data->id_agama) == TRUE) {
       $agama = $this->Peserta_m->detagama($data->id_agama)->nm_agama;
     }else{
      $agama = 'Tidak Diisi';
    }
    $sheet->setCellValue ( "A".$nocel, $nomor );
    $sheet->setCellValue ( "B".$nocel, $data->noreg );
    $sheet->setCellValue ( "C".$nocel, strtoupper($data->nama_mhs) );
    $abjad = 1;
    foreach ($this->Peserta_m->priopilgel2($data->id_mhs) as $datas) {
      if ($abjad == 1) {
       $abj = 'D';
     }elseif ($abjad == 2) {
       $abj = 'E';
     }else{
       $abj = 'F';
     }
     $sheet->setCellValue ( $abj.$nocel, strtoupper($datas->nama_prodi) );
     $abjad++;
   }
        // echo "<pre>";print_r($this->Peserta_m->priopil($data->id_mhs));echo "<pre/>";exit();
   if ($data->kelompok == 1 ) {
    $sheet->setCellValue ( "G".$nocel, 'IPA ');
  }elseif ($data->kelompok == 2) {
    $sheet->setCellValue ( "G".$nocel, 'IPS ');
  }else{
    $sheet->setCellValue ( "G".$nocel, 'IPC ');
  }
  $sheet->setCellValue ( "H".$nocel, $data->jurse);
  $sheet->setCellValue ( "I".$nocel, $data->email_mhs);
  $sheet->setCellValue ( "J".$nocel, $data->no_hp_mhs);
  $sheet->setCellValue ( "K".$nocel, strtoupper($data->gender_mhs));
  $sheet->setCellValue ( "L".$nocel, strtoupper($agama));
  $sheet->setCellValue ( "M".$nocel, $data->tgl_lhr_mhs);
  $sheet->setCellValue ( "N".$nocel, strtoupper($data->tmpt_lahir));
  $sheet->setCellValue ( "O".$nocel, strtoupper($data->asal_sekolah));
  $sheet->setCellValue ( "P".$nocel, $data->nem);
  $nomor++;
  $nocel++;
}
/* end - BLOCK MEMASUKAN DATABASE*/

/* start - BLOCK MEMBUAT LINK DOWNLOAD*/
header ( 'Content-Type: application/vnd.ms-excel' );
  //namanya adalah keluarga.xls
header ( 'Content-Disposition: attachment;filename="daftar lengkap calon peserta gelombang ke 2.xls"' ); 
header ( 'Cache-Control: max-age=0' );
$writer = PHPExcel_IOFactory::createWriter ( $file, 'Excel5' );
$writer->save ( 'php://output' );
/* start - BLOCK MEMBUAT LINK DOWNLOAD*/
                // pagging setting
}
}else{
  $pesan = 'Login terlebih dahulu';
  $this->session->set_flashdata('message', $pesan );
  redirect(base_url('index.php/login'));
}
}
function exceldaftargel3(){
  if ($this->ion_auth->logged_in()){
    $level = 'admin';  
    if (!$this->ion_auth->in_group($level)) {
     $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
     $this->session->set_flashdata('message', $pesan );
     redirect(base_url('index.php/admin/dashboard_c'));
   }else{
    $post = $this->input->post('');
    $data['title'] = 'Daftar Calon Peserta Mahasiswa Baru';
      // $data['page'] = 'admin/export-v';
      // $data['nav'] = 'nav/nav-admin';
      // $data['dtadm'] = $this->ion_auth->user()->row();
                // setting web server
    $file = new PHPExcel ();
    $file->getProperties ()->setCreator ( "Goblooge" );
    $file->getProperties ()->setLastModifiedBy ( "www.pmb.unidayan.ac.id" );
    $file->getProperties ()->setTitle ( "List Calon Peserta sudah membayar" );
    $file->getProperties ()->setSubject ( "Daftar Calon Peserta" );
    $file->getProperties ()->setDescription ( "Daftar Calon Peserta" );
    $file->getProperties ()->setKeywords ( "Daftar Calon Peserta" );
    $file->getProperties ()->setCategory ( "Calon Peserta" );
    /*end - BLOCK PROPERTIES FILE EXCEL*/

    /*start - BLOCK SETUP SHEET*/
    $file->createSheet ( NULL,0);
    $file->setActiveSheetIndex ( 0 );
    $sheet = $file->getActiveSheet ( 0 );
  //memberikan title pada sheet
    $sheet->setTitle ( "Daftar Dosen" );
    /*end - BLOCK SETUP SHEET*/

    /*start - BLOCK HEADER*/
    $sheet->setCellValue ( "A1", "No" );
    $sheet->setCellValue ( "B1", "Noreg" );
    $sheet->setCellValue ( "C1", "Nama" );
    $sheet->setCellValue ( "D1", "Pilihan 1" );
    $sheet->setCellValue ( "E1", "Pilihan 2" );
    $sheet->setCellValue ( "F1", "Pilihan 3" );
    $sheet->setCellValue ( "G1", "Kelompok" );
    $sheet->setCellValue ( "H1", "Jurusan" );
    $sheet->setCellValue ( "I1", "Email" );
    $sheet->setCellValue ( "J1", "No Hp" );
    $sheet->setCellValue ( "K1", "L/P" );
    $sheet->setCellValue ( "L1", "Agama" );
    $sheet->setCellValue ( "M1", "Tgl Lhr" );
    $sheet->setCellValue ( "N1", "Tmp Lhr" );
    $sheet->setCellValue ( "O1", "Asal Sekolah" );
    $sheet->setCellValue ( "P1", "NEM" );
    /*end - BLOCK HEADER*/

    /* start - BLOCK MEMASUKAN DATABASE*/
    $nomor = 1;
    $nocel = 2;
    $hasil = $data['hasil'] = $this->Peserta_m->databayargel3();
                // echo "<pre>";print_r($hasil);echo "</pre>";exit();
    foreach ($hasil as $data) {
      
        // echo "<pre>";print_r($this->Peserta_m->detagama($data->id_agama));echo "<pre/>";exit();
     
      if ($this->Peserta_m->detagama($data->id_agama) == TRUE) {
       $agama = $this->Peserta_m->detagama($data->id_agama)->nm_agama;
     }else{
      $agama = 'Tidak Diisi';
    }
    $sheet->setCellValue ( "A".$nocel, $nomor );
    $sheet->setCellValue ( "B".$nocel, $data->noreg );
    $sheet->setCellValue ( "C".$nocel, strtoupper($data->nama_mhs) );
    $abjad = 1;
    foreach ($this->Peserta_m->priopilgel2($data->id_mhs) as $datas) {
      if ($abjad == 1) {
        $abj = 'D';
      }elseif ($abjad == 2) {
        $abj = 'E';
      }else{
        $abj = 'F';
      }
      $sheet->setCellValue ( $abj.$nocel, strtoupper($datas->nama_prodi) );
      $abjad++;
    }
        // echo "<pre>";print_r($this->Peserta_m->priopil($data->id_mhs));echo "<pre/>";exit();
    if ($data->kelompok == 1 ) {
      $sheet->setCellValue ( "G".$nocel, 'IPA ');
    }elseif ($data->kelompok == 2) {
      $sheet->setCellValue ( "G".$nocel, 'IPS ');
    }else{
      $sheet->setCellValue ( "G".$nocel, 'IPC ');
    }
    $sheet->setCellValue ( "H".$nocel, $data->jurse);
    $sheet->setCellValue ( "I".$nocel, $data->email_mhs);
    $sheet->setCellValue ( "J".$nocel, $data->no_hp_mhs);
    $sheet->setCellValue ( "K".$nocel, strtoupper($data->gender_mhs));
    $sheet->setCellValue ( "L".$nocel, strtoupper($agama));
    $sheet->setCellValue ( "M".$nocel, $data->tgl_lhr_mhs);
    $sheet->setCellValue ( "N".$nocel, strtoupper($data->tmpt_lahir));
    $sheet->setCellValue ( "O".$nocel, strtoupper($data->asal_sekolah));
    $sheet->setCellValue ( "P".$nocel, $data->nem);
    $nomor++;
    $nocel++;
  }
  /* end - BLOCK MEMASUKAN DATABASE*/

  /* start - BLOCK MEMBUAT LINK DOWNLOAD*/
  header ( 'Content-Type: application/vnd.ms-excel' );
  //namanya adalah keluarga.xls
  header ( 'Content-Disposition: attachment;filename="daftar lengkap calon peserta gelombang ke 2.xls"' ); 
  header ( 'Cache-Control: max-age=0' );
  $writer = PHPExcel_IOFactory::createWriter ( $file, 'Excel5' );
  $writer->save ( 'php://output' );
  /* start - BLOCK MEMBUAT LINK DOWNLOAD*/
                // pagging setting
}
}else{
  $pesan = 'Login terlebih dahulu';
  $this->session->set_flashdata('message', $pesan );
  redirect(base_url('index.php/login'));
}
}
function excelalldaftar(){
  if ($this->ion_auth->logged_in()){
    $level = 'admin';  
    if (!$this->ion_auth->in_group($level)) {
     $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
     $this->session->set_flashdata('message', $pesan );
     redirect(base_url('index.php/admin/dashboard_c'));
   }else{
    $post = $this->input->post('');
    $data['title'] = 'Daftar Calon Peserta Mahasiswa Baru';
      // $data['page'] = 'admin/export-v';
      // $data['nav'] = 'nav/nav-admin';
      // $data['dtadm'] = $this->ion_auth->user()->row();
                // setting web server
    $file = new PHPExcel ();
    $file->getProperties ()->setCreator ( "Goblooge" );
    $file->getProperties ()->setLastModifiedBy ( "www.pmb.unidayan.ac.id" );
    $file->getProperties ()->setTitle ( "List Calon Peserta sudah membayar" );
    $file->getProperties ()->setSubject ( "Daftar Calon Peserta" );
    $file->getProperties ()->setDescription ( "Daftar Calon Peserta" );
    $file->getProperties ()->setKeywords ( "Daftar Calon Peserta" );
    $file->getProperties ()->setCategory ( "Calon Peserta" );
    /*end - BLOCK PROPERTIES FILE EXCEL*/

    /*start - BLOCK SETUP SHEET*/
    $file->createSheet ( NULL,0);
    $file->setActiveSheetIndex ( 0 );
    $sheet = $file->getActiveSheet ( 0 );
  //memberikan title pada sheet
    $sheet->setTitle ( "Daftar Peserta Mahasiswa Baru" );
    /*end - BLOCK SETUP SHEET*/

    /*start - BLOCK HEADER*/
    $sheet->setCellValue ( "A1", "No" );
    $sheet->setCellValue ( "B1", "Noreg" );
    $sheet->setCellValue ( "C1", "Nama" );
    $sheet->setCellValue ( "D1", "Status" );
    /*end - BLOCK HEADER*/

    /* start - BLOCK MEMASUKAN DATABASE*/
    $nomor = 1;
    $nocel = 2;
    $hasil = $data['hasil'] = $this->Peserta_m->alldaftar();
                // echo "<pre>";print_r($hasil);echo "</pre>";exit();
    foreach ($hasil as $data) {
      $sheet->setCellValue ( "A".$nocel, $nomor );
      $sheet->setCellValue ( "B".$nocel, $data->noreg );
      $sheet->setCellValue ( "C".$nocel, strtoupper($data->nama_mhs) );
      if ($data->pembayaran == 1) {
        $sheet->setCellValue ( "D".$nocel, 'Sudah Membayar' );
      }else{
        $sheet->setCellValue ( "D".$nocel, 'Belum Membayar' );
      }
      $nomor++;
      $nocel++;
    }
    /* end - BLOCK MEMASUKAN DATABASE*/

    /* start - BLOCK MEMBUAT LINK DOWNLOAD*/
    header ( 'Content-Type: application/vnd.ms-excel' );
  //namanya adalah keluarga.xls
    header ( 'Content-Disposition: attachment;filename="daftar lengkap calon peserta.xls"' ); 
    header ( 'Cache-Control: max-age=0' );
    $writer = PHPExcel_IOFactory::createWriter ( $file, 'Excel5' );
    $writer->save ( 'php://output' );
    /* start - BLOCK MEMBUAT LINK DOWNLOAD*/
                // pagging setting
  }
}else{
  $pesan = 'Login terlebih dahulu';
  $this->session->set_flashdata('message', $pesan );
  redirect(base_url('index.php/login'));
}
}
}
?>