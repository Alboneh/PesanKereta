<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Madmin');
		if($this->session->userdata('status') != "admin"){
            redirect('login');
		}
		}

	public function index()
	{
		$data['pemesanan'] = $this->Madmin->pemesanan()->result();
		$this->template->load('admin/template','admin/dashboard',$data);
	}
	public function pemesanan_all(){
		$data['pemesanan'] = $this->Madmin->pemesanan_all()->result();
		$this->template->load('admin/template','admin/pemesanan',$data);
	}
	public function konfirmasi(){
		$id = $this->input->post('id');
		$data = array('status' => 1 );
		$this->Madmin->update('tiket',$data,'id',$id);
		$data =  array(
			'admin_id' => $this->session->userdata('id'),
			'nama_pemesan' => $this->input->post('pemesan'),
			'total' => $this->input->post('total'),
			'tanggal_konfirmasi' => date('Y-m-d H:i:s')
		);
		$this->Madmin->insert('transaksi',$data);
		redirect('admin');
	}
	public function batal(){
		$id = $this->input->post('id');
		$data = array('status' => 0 );
		$this->Madmin->update('tiket',$data,'id',$id);
		redirect('admin/pemesanan_all');
	}
	public function terminal()
	{
		$data['terminal'] = $this->Madmin->get_data('terminal')->result();
		$this->template->load('admin/template', 'admin/crud_terminal',$data);
	}
	public function terminal_id($id){
		$dataWhere = array('id' => $id);
        $data['terminal'] = $this->Madmin->get_id('terminal', $dataWhere)->row_object();
        $this->template->load('admin/template', 'admin/terminal_edit', $data);

	}
	public function terminal_edit(){
		$id = $this->input->post('id');
		$nama = $this->input->post('nama_terminal');
		$kota = $this->input->post('kota');
		$update = array(
			'nama_terminal' => $nama,
			'kota' => $kota,);
		$this->Madmin->update('terminal', $update, 'id', $id);
		redirect('admin/terminal');
	}
	public function terminal_add(){
		$nama = $this->input->post('nama_terminal');
		$kota= $this->input->post('kota');
		$dataInsert = array(
            "nama_terminal" => $nama,
			"kota" => $kota
        );
		$this -> Madmin->insert('terminal',$dataInsert);
		redirect('admin/terminal');
	}
	public function terminal_delete($id){
		$this->Madmin->delete('terminal', $id, 'id');
		$this->session->set_flashdata('flash','Data Berhasil Dihapus');
		redirect('admin/terminal');
	}
	public function bus()
	{
		$data['bus'] = $this->Madmin->get_data('bus')->result();
		$this->template->load('admin/template', 'admin/crud_bus',$data);
	}
	public function bus_add()
	{
		$nama = $this->input->post('nama_bus');
		$data= array(
            "nama_bus" => $nama,
			"kursi_a" => $this->input->post('kursi_a'),
			"kursi_b" => $this->input->post('kursi_b'),
        );
		$this -> Madmin->insert('bus',$data);
		redirect('admin/bus');
	}
	public function bus_id($id){
		$dataWhere = array('id' => $id);
        $data['bus'] = $this->Madmin->get_id('bus', $dataWhere)->row_object();
        $this->template->load('admin/template', 'admin/bus_edit', $data);
	}
	public function bus_edit(){
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$update = array("nama_bus" => $nama,
		"kursi_a" => $this->input->post('kursi_a'),
		"kursi_b" => $this->input->post('kursi_b'),);
		$this->Madmin->update('bus',$update,'id',$id);
		redirect('admin/bus');
	}
	public function bus_delete($id){
		$this->Madmin->delete('bus',$id,'id');
		$this->session->set_flashdata('flash','success');
		redirect('admin/bus');
	}
	public function jadwal()
	{
		$data['jadwal'] = $this->Madmin->get_data_jadwal()->result();
		$this->template->load('admin/template', 'admin/crud_jadwal',$data);
	}
	public function jadwal_add(){
		$data['bus'] = $this->Madmin->get_data('bus')->result();
		$data['terminal'] = $this->Madmin->get_data('terminal')->result();
		$this->template->load('admin/template','admin/jadwal_add',$data);
	}
	public function jadwal_add_aksi(){
		$data = array(
			"bus_id" => $this->input->post('bus'),
			"asal" => $this->input->post('asal'),
			"tujuan" => $this->input->post('tujuan'),
			"tgl_berangkat" => $this->input->post('tanggal'),
			"kelas" => $this->input->post('kelas'),
			"harga" => $this->input->post('harga'),
		);
		$this -> Madmin->insert('jadwal',$data);
		redirect('admin/jadwal');
	}
	public function jadwal_id($id){
		$data['bus'] = $this->Madmin->get_data('bus')->result();
		$data['terminal'] = $this->Madmin->get_data('terminal')->result();
        $data['jadwal'] = $this->Madmin->get_data_jadwal_edit($id)->row();
		$this->template->load('admin/template','admin/jadwal_edit',$data);
	}
	public function jadwal_edit(){
		$id = $this->input->post('id');
		$update = array(
			"bus_id" => $this->input->post('bus'),
			"asal" => $this->input->post('asal'),
			"tujuan" => $this->input->post('tujuan'),
			"tgl_berangkat" => $this->input->post('tanggal'),
			"kelas" => $this->input->post('kelas'),
			"harga" => $this->input->post('harga'),
			);
		$this->Madmin->update('jadwal',$update,'id',$id);
		redirect('admin/jadwal');
	}
	public function kelola_kursi(){
	 $data['kursi'] = $this->Madmin->get_data_kursi()->result();
	$this->template->load('admin/template','admin/kelolakursi',$data);
	}

	public function jadwal_delete($id){
		$this->Madmin->delete('jadwal',$id,'id');
		redirect('admin/jadwal');
	}

	public function transaksi(){
		$data['transaksi'] = $this->Madmin->laporan()->result();
		$this->template->load('admin/template','admin/laporantranskasi',$data);
	}
	
	public function transaksi_edit($id){
		$data['admin'] = $this->Madmin->get_data('admin')->result();
		$data['transaksi'] = $this->Madmin->laporan_edit($id)->row_object();
		$this->template->load('admin/template','admin/laporantranskasi_edit',$data);
	}
	public function transaksi_edit_aksi(){
		$id = $this->input->post('id');
		
		$data = array(
			'admin_id' => $this->input->post('admin'),
			'nama_pemesan' => $this->input->post('pemesan'),
			'total' => $this->input->post('total')
		);
		$this->Madmin->update('transaksi',$data,'id',$id);
		redirect('admin/transaksi');
	}
	public function transaksi_delete($id){
		$this->Madmin->delete('transaksi',$id,'id');
		redirect('admin/transaksi');
	}
}
