<?php if (! defined('BASEPATH')) exit('no direct script allowed');

class c_anggota extends CI_Controller{

    function index() {

    }
    public function input() {
        $this->load->model('m_anggota');

        $data['nama_anggota']=  $this->input->post('nama_anggota');
        $data['alamat_anggota']=  $this->input->post('alamat_anggota');
        $data['telepon_anggota']=  $this->input->post('telepon_anggota');
        $data['email_anggota']=  $this->input->post('email_anggota');
        $data['tanggal_daftar']=  date("Y-m-d");
        $d=strtotime("+12 Months");
        $data['tanggal_expired']=  date("Y-m-d", $d);
        $data['nim_nip']=  $this->input->post('nim_nip');
        $data['status']=  $this->input->post('status');
        $data['password_anggota']=  md5($this->input->post('password_anggota'));
        $data['anggota']='tidak';

        $this->m_anggota->insert($data);
        redirect('admin/daftar_anggota');
    }

    public function delete() {
            $this->load->model('m_anggota');
            if($this->uri->segment(3,0)!="") {
                $this->m_anggota->delete($this->uri->segment(3, 0));
            }
            redirect('admin/daftar_anggota');
    }
    public function accept(){
            $this->load->model('m_anggota');
            $data['anggota']='ya';
            $data['id_anggota']=$this->uri->segment(3,0);
            $id_anggota=$this->uri->segment(3,0);
            $this->m_anggota->accept($data);
            //$this->anggota_baru($id_anggota);
            $this->denda_baru($id_anggota);
            redirect('admin/daftar_anggota');
    }
    private function denda_baru($id_anggota){
            $this->load->model('m_denda');
            $data['id_anggota']=$id_anggota;
            $data['total_denda']="0";
            $this->m_denda->insert($data);

    }
    private function anggota_baru($id_anggota){
            $datauser['entry']=$this->m_anggota->get($id_anggota);
            $entry=$datauser['entry'][0];
            $this->m_anggota->insert_member($entry);
    }
    public function cetak_kartu(){
				
            $id_pelanggan=$this->input->get_post('id');
            $this->load->model(array('m_buku'));
            $datauser=$this->m_buku->sembarang($id_pelanggan);
			
			require_once('./assets/html2pdf/html2pdf.class.php');

			
            $template='
			
			<table border="0" cellpadding="5" cellspacing="1" style="width:90px;" >
                      	<tbody>
                      		<tr>
                      			<td>
                      			<table border="0" cellpadding="1" cellspacing="1" align="center" style="width:600px;" >
                      				<tbody>
									<tr>
										<td align="right">
											<img src="./assets/telkom.jpg" width="120" height="80">
   										</td>
                      				</tr>
                      					<tr>
                      						<td >
                      						<p style="text-align: center;margin-top:-10px;"><span style="font-size:14px;"><h2><strong>Surat Pengaduan</strong></h2></span></p><br>
                      						<hr style="margin-top:-30px;"/>
                      						<p>&nbsp;</p>
                      						</td>
											
                      					</tr>
										
                      					<tr>
                      						<td>
                      						<table border="0" cellpadding="1" cellspacing="1" style="width:480px;margin-top:-30px;">
                      							<tbody cellpadding="5">

                      								<tr>
													
                      									<td valign="top" style="width: 30%;margin-left:20px;height=25px;">Nama Pengadu</td>
                      									<td valign="top" style="width: 2%;height=25px;">:</td>
                      									<td valign="top" style="width: 90%;margin-left:20px;height=25px;">nama_pelanggan</td>
														
                      								</tr>
													
                      								<tr>

                      									<td valign="top" style="width: 30%;margin-left:20px;height=25px;">Alamat Pengadu</td>
                      									<td valign="top" style="width: 2%;height=25px;">:</td>
                      									<td valign="top" style="width: 90%;margin-left:20px;height=25px;">alamat</td>
                      								</tr>
                      								<tr>
													
                      									<td valign="top" style="width: 30%;margin-left:20px;height=25px;">Nama Langganan &nbsp;</td>
                      									<td valign="top" style="width: 2%;height=25px;">:</td>
                      									<td valign="top" style="width: 90%;margin-left:20px;height=25px;">nama_langganan</td>
                      								</tr>
                      								<tr>
                      									<td valign="top" style="width: 30%;margin-left:20px;height=25px;">Alamat Pesawat</td>
                      									<td valign="top" style="width: 2%;height=25px;">:</td>
                      									<td valign="top" style="width: 90%;margin-left:20px;height=25px;">pesawat</td>
                      								</tr>
													<tr>
                      									<td valign="top" style="width: 30%;margin-left:20px;height=25px;">Nomor Telepon / HP</td>
                      									<td valign="top" style="width: 2%;height=25px;" >:</td>
                      									<td valign="top" style="width: 90%;margin-left:20px;height=25px;">telp</td>
                      								</tr>
													<tr>
                      									<td valign="top" style="width: 30%;margin-left:20px;height=25px;">Segmentasi</td>
                      									<td valign="top" style="width: 2%;height=25px;">:</td>
                      									<td valign="top" style="width: 90%;margin-left:20px;height=25px;">nama_segmentasi</td>
                      								</tr>
													<tr>
                      									<td valign="top" style="width: 30%;margin-left:20px;height=25px;">Status Pengadu</td>
                      									<td valign="top" style="width: 2%;height=25px;">:</td>
                      									<td valign="top" style="width: 90%;margin-left:20px;height=25px;">status</td>
                      								</tr>
													<tr>
                      									<td valign="top" style="width: 30%;margin-left:20px;height=25px;">Tagihan Bulan</td>
                      									<td valign="top" style="width: 2%;height=25px;">:</td>
                      									<td valign="top" style="width: 90%;margin-left:20px;height=25px;">bulan</td>
                      								</tr>
													<tr>
                      									<td valign="top" style="width: 30%;margin-left:20px;height=25px;">Jumlah Tagihan</td>
                      									<td valign="top" style="width: 2%;height=25px;">:</td>
                      									<td valign="top" style="width: 90%;margin-left:20px;height=25px;">tagihan</td>
                      								</tr>
													<tr>
                      									<td valign="top"  style="width: 30%;margin-left:20px;height=25px;">Tagihan Luar Dugaan</td>
                      									<td valign="top" style="width: 2%;height=20px;">:</td>
                      									<td valign="top" style="width: 90%;margin-left:20px;height=25px;">TLD</td>
                      								</tr>
													<tr>
                      									<td valign="top" style="width: 30%;margin-left:20px;height=25px;">Kondisi Telepon</td>
                      									<td valign="top" style="width: 2%;height=20px;">:</td>
                      									<td valign="top" style="width: 90%;margin-left:20px;height=25px;">kondisi</td>
                      								</tr>
													<tr>
                      									<td  valign="top" style="width: 30%;margin-left:20px;height=25px;">Penjelasan</td>
                      									<td valign="top" style="width: 2%;height=20px;">:</td>
                      									<td valign="top" style="width: 90%;margin-left:20px;height=25px;">penjelasan</td>
                      								</tr>
													<tr>
														<td 
														<br><br><br><b>Demikian Pengaduan Kami</b>
														</td>
													</tr>
                      							</tbody>
                      						</table>

                      						<table border="0" cellpadding="1" cellspacing="1" style="width:100%;margin-top:10px">
                      							<tbody>
                      								<tr>
														
														<td style="width: 60%;">
                      									
                      									</td>
														
														<td style="width: 10%;">
                      									
                      									</td>
														
														<td style="width: 30%;">
                      									<p align="center"><strong>Kendari, tanggal_pengadaan
														</strong></p>
														<br>
														<br>
														<br>
														<br>
														<p align="center"><strong>nama_pelanggan
														</strong></p>
                      									</td>
														
                      								</tr>
													
													<tr>
													
														<td>
														<br>
														<br>
														<br>
														<p align = "left"><strong>Kantor Telekomunikasi Witel Sutra<br>PT. Telekomunikasi Indonesia Tbk. T. 0401-3121000<br>Jl. Ahmad Yani No.8 Kendari F. 0401-3122456</strong></p>
														</td>
														
													</tr>
                      							</tbody>
                      						</table>

                      						</td>
                      					</tr>
                      				</tbody>
                      			</table>
                      			</td>
                      		</tr>
                      	</tbody>
                      </table>
					  
					
                      ';
            //echo $template;
            //print_r($datauser);

            require_once('./assets/html2pdf/html2pdf.class.php');
            ob_start();
            foreach ($datauser as $key => $value) {
              $nama_pelanggan = $value->nama_pelanggan;
              $alamat = $value->alamat;
              $nama_langganan = $value->nama_langganan;
              $pesawat = $value->pesawat;
              $telp = $value->telp;
              $nama_segmentasi = $value->nama_segmentasi;
              $status = $value->status;
              $bulan = $value->bulan;
              $tagihan = $value->tagihan;
              $TLD = $value->TLD;
              $kondisi = $value->kondisi;
              $penjelasan = $value->penjelasan;
			  
              $date = date_create($value->tanggal_pengadaan);
              $tanggal_pengadaan= date('d-m-Y');
            }
			require_once('./assets/html2pdf/html2pdf.class.php');
			
            $template = str_replace('nama_pelanggan',$nama_pelanggan, $template);
            $template = str_replace('alamat',$alamat, $template);
            $template = str_replace('nama_langganan',$nama_langganan, $template);
            $template = str_replace('pesawat',$pesawat, $template);
            $template = str_replace('telp',$telp, $template);
            $template = str_replace('nama_segmentasi',$nama_segmentasi, $template);
            $template = str_replace('status',$status, $template);
            $template = str_replace('bulan',$bulan, $template);
            $template = str_replace('tagihan',$tagihan, $template);
            $template = str_replace('TLD',$TLD, $template);
            $template = str_replace('kondisi',$kondisi, $template);
            $template = str_replace('penjelasan',$penjelasan, $template);
            $template = str_replace('tanggal_pengadaan',$tanggal_pengadaan, $template);

            echo $template;

            $content = ob_get_contents();
            ob_clean();
            try
            {
               $html2pdf = new HTML2PDF('p', 'A4', 'en', true, 'UTF-8');
               $html2pdf->pdf->SetDisplayMode('fullpage');
               $html2pdf->setDefaultFont('Arial');
               $html2pdf->writeHTML($content);
               $html2pdf->Output('Surat-Pengaduan'.'-'.$nama_pelanggan.'.pdf');
            }
            catch(HTML2PDF_exception $e) {
               echo $e;
               exit;
            }
    }
	
	
	public function cetak_kartu_baru(){
				
            $id_klaim=$this->input->get_post('id');
            $this->load->model(array('m_buku'));
            $datauser=$this->m_buku->select_baru1($id_klaim);
			
            $template='
			
			<table border="0" align="center" cellpadding="1" cellspacing="1" style="width:100px;" >
                      	<tbody>
                      		<tr>
                      			<td>
                      			<table align="center" border="0" cellpadding="1" cellspacing="1" style="width:700px;">
                      				<tbody style="width:1000px;>
										<tr>
											<td>
											
											</td>
										</tr>
                      					<tr>
                      						<td>
												<p style="text-align: center;"><span style="font-size:14px;"><h2><strong>BERITA ACARA CLAIM TAGIHAN</strong></h2></span></p><br>
												<hr style="margin-top:-30px;"/>
                      						</td>							
											
                      					</tr>
										<tr>
												<td  style="width: 500px;align="center" >&nbsp;&nbsp;&nbsp;Pada hari ini : today,  bln/tgl/thn	telah dilaksanakan Claim tagihan dari pelanggan Telkom</td>															
													</tr>    

                      					<tr>
                      						<td>
                      						<table align="center" border="0" cellpadding="0" cellspacing="1" style="width:1150px;">
											
                      							<tbody>
																							  												
                      								<tr>

                      									<td style="width: 10%;margin-left:20px">Atas Nama</td>
                      									<td style="width: 2%;margin-left:20px">:</td>
                      									<td style="width: 50%;margin-left:20px">nama</td>
                      									
                      								</tr>
                      								<tr>
													
                      									<td style="width: 10%;margin-left:20px">Alamat Pengadu </td>
                      									<td style="width: 2%;margin-left:20px">:</td>
                      									<td style="width: 50%;margin-left:20px">alamat</td>
                      									
                      								</tr>
                      								<tr>
                      									<td valign="top" style="width: 10%;margin-left:20px;">No. Handphone </td>
                      									<td valign="top" style="width: 2%;margin-left:20px;">:</td>
                      									<td valign="top" style="width: 50%;margin-left:20px;">telepon</td>
                      									
                      								</tr>
													<tr>
                      									<td style="width: 10%;margin-left:20px">No. Pots / Internet </td>
                      									<td style="width: 2%;margin-left:20px">:</td>
                      									<td style="width: 50%;margin-left:20px">internet</td>
                      									
                      								</tr>
													<tr>
                      									<td style="width: 10%;margin-left:20px">Dengan Alasan </td>
                      									<td style="width: 2%;margin-left:20px">:</td>
                      									<td style="width: 50%;margin-left:20px">alasan</td>
                      									
                      								</tr>
													<tr>
                      									<td style="width: 10%;margin-left:20px">Restitusi </td>
                      									<td style="width: 2%;margin-left:20px">:</td>
                      									<td style="width: 50%;margin-left:20px">restitusi</td>
                      									
                      								</tr>
													
													
                      							</tbody>
												
                      						</table>
											<table>
											<tr>
													
                      									<td style="width: 0%;margin-left:20px">&nbsp;&nbsp;&nbsp;Demikian Berita Acara ini dibuat untuk dapat dipergunakan sebagaimana mestinya.</td>
                      									
                      								</tr>
											</table>
                      						<table border="0" cellpadding="1" cellspacing="1" style="width:750px;margin-top:10px">
                      							<tbody>
                      								<tr>
														
														<td style="width: 60%;">
                      									<br>
                      									<br>
														<strong>&nbsp;&nbsp;&nbsp;Unit CC,</strong>
														<br>
														<br>
														<br>
														<br>
														&nbsp;&nbsp;&nbsp;...................
                      									</td>
														
														<td style="width: 15%;">
                      									
                      									</td>
														
														<td style="width: 20%;">
                      									<p align="center"><strong>Mengetahui, <br>
														</strong></p>
														<p align="center"><strong>&nbsp;&nbsp;JM CC
														</strong>
														<br>
														<br>
														<br></p>
														&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;...........................
														
														<p align="left"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NIK: 
														</strong></p>
                      									</td>
														
                      								</tr>
													
													<tr>
													
														<td>
														<p align = "left"><strong>&nbsp;&nbsp;&nbsp;Catatan : <br>&nbsp;&nbsp;&nbsp;Pelanggan Claim Tagihan.</strong></p>
														</td>
														
													</tr>
                      							</tbody>
                      						</table>

                      						</td>
                      					</tr>
                      				</tbody>
                      			</table>
                      			</td>
                      		</tr>
                      	</tbody>
                      </table>
					  
					
                      ';
            //echo $template;
            //print_r($datauser);

            require_once('./assets/html2pdf/html2pdf.class.php');
            ob_start();
			
            foreach ($datauser as $key => $value) {
              $nama = $value->nama;
              $alamat = $value->alamat;
              $telepon = $value->telepon;
              $internet = $value->internet;
              $alasan = $value->alasan;
              $restitusi = $value->restitusi;
			  
              $date = $value->waktu;
              $waktu=explode("-",$date);  
			  
			  $tanggal = $value->waktu;
				$day = date('l', strtotime($tanggal));
				$dayList = array(
					'Sunday' => 'Minggu',
					'Monday' => 'Senin',
					'Tuesday' => 'Selasa',
					'Wednesday' => 'Rabu',
					'Thursday' => 'Kamis',
					'Friday' => 'Jumat',
					'Saturday' => 'Sabtu'
				);
            }
			
			    			
			
            $template = str_replace('nama',$nama, $template);
            $template = str_replace('alamat',$alamat, $template);
            $template = str_replace('telepon',$telepon, $template);
            $template = str_replace('internet',$internet, $template);
            $template = str_replace('alasan',$alasan, $template);
            $template = str_replace('restitusi',$restitusi, $template);
            
			$template = str_replace('today',$dayList[$day], $template);
            
			$template = str_replace('tgl',$waktu[1], $template);
            $template = str_replace('bln',$waktu[2], $template);
            $template = str_replace('thn',$waktu[0], $template);
            
            //$template = str_replace('tanggal_pengadaan',$waktu, $template);

            echo $template;

            $content = ob_get_contents();
            ob_clean();
            try
            {
               $html2pdf = new HTML2PDF('p', 'A4', 'en', true, 'UTF-8');
               $html2pdf->pdf->SetDisplayMode('fullpage');
               $html2pdf->setDefaultFont('Arial');
               $html2pdf->writeHTML($content);
               $html2pdf->Output('Surat-Klaim'.'-'.$nama.'.pdf');
            }
            catch(HTML2PDF_exception $e) {
               echo $e;
               exit;
            }
    }
	
	
    public function edit() {
            $this->load->model('m_anggota');
            $data['id_anggota']= $this->input->post('id_anggota');
            $data['nama_anggota']=  $this->input->post('nama_anggota');
            $data['alamat_anggota']=  $this->input->post('alamat_anggota');
            $data['telepon_anggota']=  $this->input->post('telepon_anggota');
            $data['email_anggota']=  $this->input->post('email_anggota');

            $data['nim_nip']=  $this->input->post('nim_nip');
            $data['status']=  $this->input->post('status');

            $data['anggota']=  $this->input->post('anggota');

            $this->m_anggota->update($data);
            redirect('admin/daftar_anggota');
        }


}
?>
