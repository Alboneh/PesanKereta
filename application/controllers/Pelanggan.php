<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('MPelanggan');
		$this->load->model('Madmin');
		if($this->session->userdata('status') != "pelanggan"){
            redirect('login');
		}
		}
	public function index(){
		$this->template->load('navbar', 'pelanggan/dashboard');
	}
	public function pemesanan()
	{
		$data = array(
            "asal" => $this->input->get('asal'),
			"tujuan" => $this->input->get('tujuan'),
        );
		$data['tiket'] = $this->MPelanggan->cari_tiket($data)->result();
		$data['penumpang'] = $this->input->get('jumlah');
		if ($data['penumpang'] == null) {
			$data['penumpang'] = 1;
		}
		$data['terminal'] = $this->Madmin->get_data('terminal')->result();
		$this->template->load('navbar','pemesanan',$data);
	}
		public function datadiri($id){
			$data['tiket'] = $this->MPelanggan->get_data_jadwal_id($id)->row();
			$data['penumpang'] = $this->input->post('jumlah');
			$this->template->load('navbar', 'pelanggan/data_diri',$data);
	}
	public function pesan_tiket(){
		$cek = $this->Madmin->get_data('tiket')->num_rows()+1;
		$no_tiket = 'B00'.$cek;
		$penumpang = $this->input->post('jumlah');
		$id_jadwal = $this->input->post('id_jadwal');
		for ($i=1; $i <= $penumpang; $i++) { 
			$data = array(
				"no_tiket" => $no_tiket,
				"nama" => $this->input->post('nama'.$i),
				"no_identitas" => $this->input->post('identitas'.$i),
				"gender" => $this->input->post('gender'.$i),
		);

		$this->Madmin->insert('penumpang',$data);
			//tambah_kursi
		$this->MPelanggan->insert_penumpang($id_jadwal,$no_tiket);
		}

		$harga = $this->input->post('harga');
		$total = $harga * $penumpang;
		$data = array(
			"no_tiket" => $no_tiket,
			"id_jadwal" => $id_jadwal,
			"tanggal_pesan" => date('Y-m-d'),
			"pelanggan_id" => $this->session->userdata('id'),
			"total" => $total,   
		);
		$this->Madmin->insert('tiket',$data);
		$pemesanan = $this->MPelanggan->get_tiket_id();
		if($this->db->affected_rows()){
            redirect('pelanggan/konfirmasi_id/'.$pemesanan['id'].'?no_tiket='.$no_tiket);
        } else {
            redirect('pelanggan/data_diri/'.$this->input->post("jadwal_id"));
        }
	}
	public function konfirmasi_id($id){
		$dataWhere = array('id' => $id);
        $data['pemesanan'] = $this->Madmin->get_id('tiket', $dataWhere)->row_object();
		$data['jadwal_id'] = $this->MPelanggan->get_tiket_data($id)->row();
		$no_tiket = $_GET['no_tiket'];
		$data['penumpang'] = $this->MPelanggan->get_penumpang($no_tiket)->result();
		$data['max'] = $this->MPelanggan->get_penumpang($no_tiket)->num_rows();
		$this->template->load('navbar', 'pelanggan/konfirmasi',$data);
	}
	public function pembayaran($id){
		$dataWhere = array('id' => $id);
        $data['pemesanan'] = $this->Madmin->get_id('tiket', $dataWhere)->row_object();
		$no_tiket = $_GET['no_tiket'];
		$data['kode'] = preg_replace('/\D/', '', $no_tiket);
		$this->template->load('navbar', 'pelanggan/pembayaran',$data);
	}
	public function history($id){
		$data['tiket'] = $this->MPelanggan->get_data_pemesananan($id)->result();
		$this->template->load('navbar', 'pelanggan/history',$data);
	}
	public function profile($id){
		$dataWhere = array('id' => $id);
		$data['pelanggan'] = $this->Madmin->get_id('pelanggan',$dataWhere)->row_object();
		$this->template->load('navbar', 'pelanggan/profile',$data);
	}
	public function profile_update(){
		$id = $this->input->post('id');
		$data = array(
			'username' => $this->input->post('username'),
			'namalengkap' => $this->input->post('namalengkap'),
			'no_telpon' => $this->input->post('no_telpon'),
			'email' => $this->input->post('email'),
			'password' => $this->input->post('password'),
	);
	$this->Madmin->update('pelanggan',$data,'id',$id);
	redirect('pelanggan/logout');
	}
	public function pilihkursi($id,$id_jadwal){
		$no_tiket = $_GET['no_tiket'];
		$data['no_tiket'] = $_GET['no_tiket'];
		$data['tiket2'] = $id;
		$data['jadwal'] =  $id_jadwal;
		// get jumlah kursi yang ada pada bus
		$bus = $this->MPelanggan->get_jumlahkursi($id_jadwal)->row();
		$data['penumpang'] = $this->MPelanggan->get_penumpang($no_tiket)->result();
		
		$kursi_a = $this->MPelanggan->get_kursi('A',$id_jadwal)->result();
		$kursi_b = $this->MPelanggan->get_kursi('B',$id_jadwal)->result();

		$jml_kursi_A = $bus->kursi_a; 
		$jml_kursi_B = $bus->kursi_b;

		$kursi_terpilih_a= array_column($kursi_a, 'kode_kursi');
		$kursi_terpilih_b= array_column($kursi_b, 'kode_kursi');

        for ($i=1; $i <= $jml_kursi_A; $i++) { 
            $bagian_a[$i] = $i;
        }
		for ($i=1; $i <= $jml_kursi_B; $i++) { 
            $bagian_b[$i] = $i;
        }
        // Buat array baru untuk kursi yang belum terpilih
		$data['kursi_a'] = array_diff($bagian_a,$kursi_terpilih_a);
		$data['kursi_b'] = array_diff($bagian_b,$kursi_terpilih_b);
		$data['kursi'] = $this->MPelanggan->get_bagiankursi($no_tiket)->num_rows();
		$this->template->load('navbar', 'pelanggan/kursi',$data);
	}
	public function aksipilihkursi(){
		$tiket2 = $this->input->post('tiket');
		$no_tiket = $this->input->post('no_tiket');
		$jadwal_id =  $this->input->post('jadwal');
		$id = $this->input->post('id');
		$datainsert = array(
			'bagian' => $this->input->post('bagian'),
			'kode_kursi' => $this->input->post('kursi'),
		);
		$this->Madmin->update('kursi',$datainsert,'id',$id);
		if($this->db->affected_rows()){
			$this->session->set_flashdata('flash','success');
		}
		redirect('pelanggan/pilihkursi/'.$tiket2.'/'.$jadwal_id.'?no_tiket='.$no_tiket);	
		//validasi kursi
		// $kode = $this->MPelanggan->get_penumpang($no_tiket)->row();
		// $tiket = $this->MPelanggan->gettiketwhere($kode->no_tiket)->row();
		// $cek = $this->MPelanggan->validasi($datainsert,$tiket->id_jadwal)->num_rows();
		// if($cek > 0){ // Jika ada
		// 	$this->session->set_flashdata('flash','error');
		// }else{ // Jika tidak ada
		// $this->Madmin->update('penumpang',$datainsert,'id',$id);
		// $this->session->set_flashdata('flash','success');
		// }
	}
	public function print(){
		$no_tiket = $this->input->post('no_tiket');
		$data['tiket'] = $this->MPelanggan->printtiket($no_tiket)->result_array();
		$this->template->load('navbar', 'pelanggan/print',$data);
	}
	public function hapus_pemesanan($no_tiket,$id){
		$this->MPelanggan->hapus_pemesanan('tiket',$no_tiket,'no_tiket');
		$this->MPelanggan->hapus_pemesanan('penumpang',$no_tiket,'no_tiket');
		$this->MPelanggan->hapus_pemesanan('kursi',$no_tiket,'no_tiket');
		redirect('pelanggan/history/'.$id);
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect('login');
    }
}
