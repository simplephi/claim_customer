<?php if (! defined('BASEPATH')) exit('no direct script allowed');

class c_report extends CI_Controller{

    function index() {

    }
    public function report_buku() {
      $this->load->model('m_report');
      $bulan = $this->input->post('bulan');
      switch ($bulan) {
        case '1':
          $nama_bulan='Januari';
          break;
          case '2':
            $nama_bulan='Februari';
            break;
            case '3':
              $nama_bulan='Maret';
              break;
              case '4':
                $nama_bulan='April';
                break;
                case '5':
                  $nama_bulan='Mei';
                  break;
                  $nama_bulan='Juni';
                  case '6':
                    break;
                    case '7':
                      $nama_bulan='Juli';
                      break;
                      case '8':
                        $nama_bulan='Agustus';
                        break;
                        case '9':
                          $nama_bulan='Sebtember';
                          break;
                          case '10':
                            $nama_bulan='Oktober';
                            break;
                            case '11':
                              $nama_bulan='November';
                              break;
                              case '12':
                                $nama_bulan='Desember';
                                break;


      }
  		$tahun = $this->input->post('tahun');
      if($bulan<10){
        $bulan='0'.$bulan;
      }
  		$data = $this->m_report->get_buku($bulan, $tahun);


  		$this->load->library('excel');


  		//load PHPExcel library
  		$this->excel->setActiveSheetIndex(0);
                  //name the worksheet
                  $this->excel->getActiveSheet()->setTitle('Daftar Pelanggan');

  				//STYLING
  				$styleArray = array(
  					'borders' => array('allborders' =>
  						array('style' => PHPExcel_Style_Border::BORDER_THIN,'color' =>
  							array('argb' => '0000'),
  							),
  						),
  					);
  				//set report header

          $this->excel->getActiveSheet()->getStyle('A:F')->getFont()->setName('Times New Roman');
          $this->excel->getActiveSheet()->mergeCells('A1:N1');
              $this->excel->getActiveSheet()->setCellValue('A1', 'DAFTAR PELANGGAN BULAN '.strtoupper($nama_bulan).' TAHUN '.$tahun);
              $this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
              $this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
              $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
              $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(12);


                  //set column name
              $this->excel->getActiveSheet()->setCellValue('A2', 'No');
              $this->excel->getActiveSheet()->setCellValue('B2', 'Nama Pelanggan');
  			  $this->excel->getActiveSheet()->setCellValue('C2', 'Alamat Langganan');
              $this->excel->getActiveSheet()->setCellValue('D2', 'Nama Langganan');
              $this->excel->getActiveSheet()->setCellValue('E2', 'Pesawat');
  			  $this->excel->getActiveSheet()->setCellValue('F2', 'Telepon');
              $this->excel->getActiveSheet()->setCellValue('G2', 'Bulan');
              $this->excel->getActiveSheet()->setCellValue('H2', 'Status');
              $this->excel->getActiveSheet()->setCellValue('I2', 'Tagihan');
              $this->excel->getActiveSheet()->setCellValue('J2', 'TLD');
              $this->excel->getActiveSheet()->setCellValue('K2', 'Penjelasan');
              $this->excel->getActiveSheet()->setCellValue('L2', 'Kondisi');
              $this->excel->getActiveSheet()->setCellValue('M2', 'Segmentasi');
              $this->excel->getActiveSheet()->setCellValue('N2', 'Tanggal');

              $this->excel->getActiveSheet()->getStyle('A2:N2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

              $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(4);
              $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
              $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
              $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
              $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
              $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
              $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(15);
              $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(15);
              $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(15);
              $this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(15);
              $this->excel->getActiveSheet()->getColumnDimension('K')->setWidth(15);
              $this->excel->getActiveSheet()->getColumnDimension('L')->setWidth(15);
              $this->excel->getActiveSheet()->getColumnDimension('M')->setWidth(15);
              $this->excel->getActiveSheet()->getColumnDimension('N')->setWidth(15);

  				$no=3;
  				$nomor = 1;
  				foreach($data as $v){
            $this->excel->getActiveSheet()->getStyle('A'.$no)->getAlignment()->setWrapText(true);
            $this->excel->getActiveSheet()->getStyle('A'.$no)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $this->excel->getActiveSheet()->getStyle('A'.$no)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
				$this->excel->getActiveSheet()->setCellValue('A'.$no, $nomor);
            $this->excel->getActiveSheet()->getStyle('B'.$no)->getAlignment()->setWrapText(true);
            $this->excel->getActiveSheet()->getStyle('B'.$no)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $this->excel->getActiveSheet()->getStyle('B'.$no)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
  				$this->excel->getActiveSheet()->setCellValue('B'.$no, $v->nama_pelanggan);
            $this->excel->getActiveSheet()->getStyle('C'.$no)->getAlignment()->setWrapText(true);
            $this->excel->getActiveSheet()->getStyle('C'.$no)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $this->excel->getActiveSheet()->getStyle('C'.$no)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
  				$this->excel->getActiveSheet()->setCellValue('C'.$no, $v->alamat);
            $this->excel->getActiveSheet()->getStyle('D'.$no)->getAlignment()->setWrapText(true);
            $this->excel->getActiveSheet()->getStyle('D'.$no)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $this->excel->getActiveSheet()->getStyle('D'.$no)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
  				$this->excel->getActiveSheet()->setCellValue('D'.$no, $v->nama_langganan);
            $this->excel->getActiveSheet()->getStyle('E'.$no)->getAlignment()->setWrapText(true);
            $this->excel->getActiveSheet()->getStyle('E'.$no)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $this->excel->getActiveSheet()->getStyle('E'.$no)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
  				$this->excel->getActiveSheet()->setCellValue('E'.$no, $v->pesawat);
            $this->excel->getActiveSheet()->getStyle('F'.$no)->getAlignment()->setWrapText(true);
            $this->excel->getActiveSheet()->getStyle('F'.$no)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $this->excel->getActiveSheet()->getStyle('F'.$no)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
  				$this->excel->getActiveSheet()->setCellValue('F'.$no, $v->telp);
            $this->excel->getActiveSheet()->getStyle('G'.$no)->getAlignment()->setWrapText(true);
            $this->excel->getActiveSheet()->getStyle('G'.$no)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $this->excel->getActiveSheet()->getStyle('G'.$no)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
  				$this->excel->getActiveSheet()->setCellValue('G'.$no, $v->bulan);
            $this->excel->getActiveSheet()->getStyle('H'.$no)->getAlignment()->setWrapText(true);
            $this->excel->getActiveSheet()->getStyle('H'.$no)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $this->excel->getActiveSheet()->getStyle('H'.$no)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
  				$this->excel->getActiveSheet()->setCellValue('H'.$no, $v->status);
            $this->excel->getActiveSheet()->getStyle('I'.$no)->getAlignment()->setWrapText(true);
            $this->excel->getActiveSheet()->getStyle('I'.$no)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $this->excel->getActiveSheet()->getStyle('I'.$no)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
  				$this->excel->getActiveSheet()->setCellValue('I'.$no, $v->tagihan);
			$this->excel->getActiveSheet()->getStyle('J'.$no)->getAlignment()->setWrapText(true);
            $this->excel->getActiveSheet()->getStyle('J'.$no)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $this->excel->getActiveSheet()->getStyle('J'.$no)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
  				$this->excel->getActiveSheet()->setCellValue('J'.$no, $v->TLD);
			$this->excel->getActiveSheet()->getStyle('K'.$no)->getAlignment()->setWrapText(true);
            $this->excel->getActiveSheet()->getStyle('K'.$no)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $this->excel->getActiveSheet()->getStyle('K'.$no)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
  				$this->excel->getActiveSheet()->setCellValue('K'.$no, $v->kondisi);
			$this->excel->getActiveSheet()->getStyle('L'.$no)->getAlignment()->setWrapText(true);
            $this->excel->getActiveSheet()->getStyle('L'.$no)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $this->excel->getActiveSheet()->getStyle('L'.$no)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
  				$this->excel->getActiveSheet()->setCellValue('L'.$no, $v->penjelasan);
			$this->excel->getActiveSheet()->getStyle('M'.$no)->getAlignment()->setWrapText(true);
            $this->excel->getActiveSheet()->getStyle('M'.$no)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $this->excel->getActiveSheet()->getStyle('M'.$no)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
  				$this->excel->getActiveSheet()->setCellValue('M'.$no, $v->nama_segmentasi);
			$this->excel->getActiveSheet()->getStyle('N'.$no)->getAlignment()->setWrapText(true);
            $this->excel->getActiveSheet()->getStyle('N'.$no)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $this->excel->getActiveSheet()->getStyle('N'.$no)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
  				$this->excel->getActiveSheet()->setCellValue('N'.$no, $v->tanggal_pengadaan);



  					$no++;
  					$nomor++;
  				}
  				$this->excel->getActiveSheet()->getStyle('A2:N'.($no-1))->applyFromArray($styleArray);


  				ob_end_clean();
                  $filename='Rekap Pelanggan Masuk Bulan '.$bulan.' Tahun '.$tahun.'.xls'; //save our workbook as this file name
                  header('Content-Type: application/vnd.ms-excel'); //mime type
                  header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
                  header('Cache-Control: max-age=0'); //no cache

                  //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
                  //if you want to save it as .XLSX Excel 2007 format
                  $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');

  		$objWriter->save('php://output');

    }
	
    public function report_anggota(){
      $this->load->model('m_report');
      $bulan = $this->input->post('bulan');
      switch ($bulan) {
        case '1':
          $nama_bulan='Januari';
          break;
          case '2':
          $nama_bulan='Februari';
          break;
          case '3':
          $nama_bulan='Maret';
          break;
          case '4':
          $nama_bulan='April';
          break;
          case '5':
          $nama_bulan='Mei';
          break;
          $nama_bulan='Juni';
          case '6':
          break;
          case '7':
          $nama_bulan='Juli';
          break;
          case '8':
          $nama_bulan='Agustus';
          break;
          case '9':
          $nama_bulan='Sebtember';
          break;
          case '10':
          $nama_bulan='Oktober';
          break;
          case '11':
          $nama_bulan='November';
          break;
          case '12':
          $nama_bulan='Desember';
          break;
      }
      $tahun = $this->input->post('tahun');
      if($bulan<10){
        $bulan='0'.$bulan;
      }
      $data = $this->m_report->get_anggota($bulan, $tahun);

      $this->load->library('excel');


  		//load PHPExcel library
  		$this->excel->setActiveSheetIndex(0);
                  //name the worksheet
                  $this->excel->getActiveSheet()->setTitle('Daftar Klaim');

  				//STYLING
  				$styleArray = array(
  					'borders' => array('allborders' =>
  						array('style' => PHPExcel_Style_Border::BORDER_THIN,'color' =>
  							array('argb' => '0000'),
  							),
  						),
  					);
  				//set report header

          $this->excel->getActiveSheet()->getStyle('A:H')->getFont()->setName('Times New Roman');
          $this->excel->getActiveSheet()->mergeCells('A1:H1');
              $this->excel->getActiveSheet()->setCellValue('A1', 'DAFTAR KLAIM BULAN '.strtoupper($nama_bulan).' TAHUN '.$tahun);
              $this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
              $this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
              $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
              $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(12);


                  //set column name
              $this->excel->getActiveSheet()->setCellValue('A2', 'No');
              $this->excel->getActiveSheet()->setCellValue('B2', 'Nama');
  			  $this->excel->getActiveSheet()->setCellValue('C2', 'Alamat');
              $this->excel->getActiveSheet()->setCellValue('D2', 'Telepon');
              $this->excel->getActiveSheet()->setCellValue('E2', 'No. Internet');
  			  $this->excel->getActiveSheet()->setCellValue('F2', 'Alasan');
              $this->excel->getActiveSheet()->setCellValue('G2', 'restitusi');
              $this->excel->getActiveSheet()->setCellValue('H2', 'Tanggal');
      

              $this->excel->getActiveSheet()->getStyle('A2:H2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

              $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(4);
              $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
              $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
              $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
              $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
              $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(15);
              $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(15);
              $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(15);
              

  				$no=3;
  				$nomor = 1;
  				foreach($data as $v){
            $this->excel->getActiveSheet()->getStyle('A'.$no)->getAlignment()->setWrapText(true);
            $this->excel->getActiveSheet()->getStyle('A'.$no)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $this->excel->getActiveSheet()->getStyle('A'.$no)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
  					$this->excel->getActiveSheet()->setCellValue('A'.$no, $nomor);
            $this->excel->getActiveSheet()->getStyle('B'.$no)->getAlignment()->setWrapText(true);
            $this->excel->getActiveSheet()->getStyle('B'.$no)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $this->excel->getActiveSheet()->getStyle('B'.$no)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
  					$this->excel->getActiveSheet()->setCellValue('B'.$no, $v->nama);
            $this->excel->getActiveSheet()->getStyle('C'.$no)->getAlignment()->setWrapText(true);
            $this->excel->getActiveSheet()->getStyle('C'.$no)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $this->excel->getActiveSheet()->getStyle('C'.$no)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
  					$this->excel->getActiveSheet()->setCellValue('C'.$no, $v->alamat);
            $this->excel->getActiveSheet()->getStyle('D'.$no)->getAlignment()->setWrapText(true);
            $this->excel->getActiveSheet()->getStyle('D'.$no)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $this->excel->getActiveSheet()->getStyle('D'.$no)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
  					$this->excel->getActiveSheet()->setCellValue('D'.$no, $v->telepon);
            $this->excel->getActiveSheet()->getStyle('E'.$no)->getAlignment()->setWrapText(true);
            $this->excel->getActiveSheet()->getStyle('E'.$no)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $this->excel->getActiveSheet()->getStyle('E'.$no)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
  					$this->excel->getActiveSheet()->setCellValue('E'.$no, $v->internet);
            $this->excel->getActiveSheet()->getStyle('F'.$no)->getAlignment()->setWrapText(true);
            $this->excel->getActiveSheet()->getStyle('F'.$no)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $this->excel->getActiveSheet()->getStyle('F'.$no)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
  					$this->excel->getActiveSheet()->setCellValue('F'.$no, $v->alasan);
            $this->excel->getActiveSheet()->getStyle('G'.$no)->getAlignment()->setWrapText(true);
            $this->excel->getActiveSheet()->getStyle('G'.$no)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $this->excel->getActiveSheet()->getStyle('G'.$no)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
  					$this->excel->getActiveSheet()->setCellValue('G'.$no, $v->restitusi);
            $this->excel->getActiveSheet()->getStyle('H'.$no)->getAlignment()->setWrapText(true);
            $this->excel->getActiveSheet()->getStyle('H'.$no)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $this->excel->getActiveSheet()->getStyle('H'.$no)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
  					$this->excel->getActiveSheet()->setCellValue('H'.$no, $v->waktu);
            
  					$no++;
  					$nomor++;
  				}
  				$this->excel->getActiveSheet()->getStyle('A2:H'.($no-1))->applyFromArray($styleArray);


  				ob_end_clean();
                  $filename='Rekap Klaim Pelanggan Bulan '.$bulan.' Tahun '.$tahun.'.xls'; //save our workbook as this file name
                  header('Content-Type: application/vnd.ms-excel'); //mime type
                  header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
                  header('Cache-Control: max-age=0'); //no cache

                  //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
                  //if you want to save it as .XLSX Excel 2007 format
                  $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');

  		$objWriter->save('php://output');
    }

    public function report_peminjaman(){
      $this->load->model('m_report');
      $bulan = $this->input->post('bulan');
      switch ($bulan) {
        case '1':
          $nama_bulan='Januari';
          break;
          case '2':
          $nama_bulan='Februari';
          break;
          case '3':
          $nama_bulan='Maret';
          break;
          case '4':
          $nama_bulan='April';
          break;
          case '5':
          $nama_bulan='Mei';
          break;
          $nama_bulan='Juni';
          case '6':
          break;
          case '7':
          $nama_bulan='Juli';
          break;
          case '8':
          $nama_bulan='Agustus';
          break;
          case '9':
          $nama_bulan='Sebtember';
          break;
          case '10':
          $nama_bulan='Oktober';
          break;
          case '11':
          $nama_bulan='November';
          break;
          case '12':
          $nama_bulan='Desember';
          break;
      }
      $tahun = $this->input->post('tahun');
      if($bulan<10){
        $bulan='0'.$bulan;
      }
      $data = $this->m_report->get_peminjaman($bulan, $tahun);

      $this->load->library('excel');


  		//load PHPExcel library
  		$this->excel->setActiveSheetIndex(0);
                  //name the worksheet
                  $this->excel->getActiveSheet()->setTitle('Daftar Anggota');

  				//STYLING
  				$styleArray = array(
  					'borders' => array('allborders' =>
  						array('style' => PHPExcel_Style_Border::BORDER_THIN,'color' =>
  							array('argb' => '0000'),
  							),
  						),
  					);
  				//set report header

          $this->excel->getActiveSheet()->getStyle('A:I')->getFont()->setName('Times New Roman');
          $this->excel->getActiveSheet()->mergeCells('A1:I1');
              $this->excel->getActiveSheet()->setCellValue('A1', 'DAFTAR PEMINJAMAN BULAN '.strtoupper($nama_bulan).' TAHUN '.$tahun);
              $this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
              $this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
              $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
              $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(12);


                  //set column name
              $this->excel->getActiveSheet()->setCellValue('A2', 'No');
              $this->excel->getActiveSheet()->setCellValue('B2', 'Nama');
  					  $this->excel->getActiveSheet()->setCellValue('C2', 'NIM');
              $this->excel->getActiveSheet()->setCellValue('D2', 'Tanggal Pinjam');
              $this->excel->getActiveSheet()->setCellValue('E2', 'Tanggal Batas');
  				    $this->excel->getActiveSheet()->setCellValue('F2', 'Tanggal Kembali');
              $this->excel->getActiveSheet()->setCellValue('G2', 'Denda');
              $this->excel->getActiveSheet()->setCellValue('H2', 'Jenis Buku');
              $this->excel->getActiveSheet()->setCellValue('I2', 'Status Peminjaman');

              $this->excel->getActiveSheet()->getStyle('A2:I2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

              $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(4);
              $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
              $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
              $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
              $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
              $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(15);
              $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(15);
              $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(15);
              $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(15);

  				$no=3;
  				$nomor = 1;
  				foreach($data as $v){
            $this->excel->getActiveSheet()->getStyle('A'.$no)->getAlignment()->setWrapText(true);
            $this->excel->getActiveSheet()->getStyle('A'.$no)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $this->excel->getActiveSheet()->getStyle('A'.$no)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
  					$this->excel->getActiveSheet()->setCellValue('A'.$no, $nomor);
            $this->excel->getActiveSheet()->getStyle('B'.$no)->getAlignment()->setWrapText(true);
            $this->excel->getActiveSheet()->getStyle('B'.$no)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $this->excel->getActiveSheet()->getStyle('B'.$no)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
  					$this->excel->getActiveSheet()->setCellValue('B'.$no, $v->nama_anggota);
            $this->excel->getActiveSheet()->getStyle('C'.$no)->getAlignment()->setWrapText(true);
            $this->excel->getActiveSheet()->getStyle('C'.$no)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $this->excel->getActiveSheet()->getStyle('C'.$no)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
  					$this->excel->getActiveSheet()->setCellValue('C'.$no, $v->nim_nip);
            $this->excel->getActiveSheet()->getStyle('D'.$no)->getAlignment()->setWrapText(true);
            $this->excel->getActiveSheet()->getStyle('D'.$no)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $this->excel->getActiveSheet()->getStyle('D'.$no)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
  					$this->excel->getActiveSheet()->setCellValue('D'.$no, $v->tanggal_pinjam);
            $this->excel->getActiveSheet()->getStyle('E'.$no)->getAlignment()->setWrapText(true);
            $this->excel->getActiveSheet()->getStyle('E'.$no)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $this->excel->getActiveSheet()->getStyle('E'.$no)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
  					$this->excel->getActiveSheet()->setCellValue('E'.$no, $v->tanggal_batas);
            $this->excel->getActiveSheet()->getStyle('F'.$no)->getAlignment()->setWrapText(true);
            $this->excel->getActiveSheet()->getStyle('F'.$no)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $this->excel->getActiveSheet()->getStyle('F'.$no)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
  					$this->excel->getActiveSheet()->setCellValue('F'.$no, $v->tanggal_kembali);
            $this->excel->getActiveSheet()->getStyle('G'.$no)->getAlignment()->setWrapText(true);
            $this->excel->getActiveSheet()->getStyle('G'.$no)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $this->excel->getActiveSheet()->getStyle('G'.$no)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
  					$this->excel->getActiveSheet()->setCellValue('G'.$no, $v->denda);
            $this->excel->getActiveSheet()->getStyle('H'.$no)->getAlignment()->setWrapText(true);
            $this->excel->getActiveSheet()->getStyle('H'.$no)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $this->excel->getActiveSheet()->getStyle('H'.$no)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
  					$this->excel->getActiveSheet()->setCellValue('H'.$no, $v->nama_segmentasi);
            $this->excel->getActiveSheet()->getStyle('I'.$no)->getAlignment()->setWrapText(true);
            $this->excel->getActiveSheet()->getStyle('I'.$no)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $this->excel->getActiveSheet()->getStyle('I'.$no)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
  					$this->excel->getActiveSheet()->setCellValue('I'.$no, $v->status_peminjaman);

  					$no++;
  					$nomor++;
  				}
  				$this->excel->getActiveSheet()->getStyle('A2:I'.($no-1))->applyFromArray($styleArray);


  				ob_end_clean();
                  $filename='Rekap Peminjaman Masuk Bulan '.$bulan.' Tahun '.$tahun.'.xls'; //save our workbook as this file name
                  header('Content-Type: application/vnd.ms-excel'); //mime type
                  header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
                  header('Cache-Control: max-age=0'); //no cache

                  //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
                  //if you want to save it as .XLSX Excel 2007 format
                  $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');

  		$objWriter->save('php://output');
    }




}
?>
