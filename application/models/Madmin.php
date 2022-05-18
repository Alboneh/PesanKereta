<?php

class Madmin extends CI_Model{
  public function get_data($tabel){
    $q=$this->db->get($tabel);
    return $q;
}
  public function insert($tabel, $data){
    $this->db->insert($tabel, $data);
  }
  public function get_where($id, $data ,$tabel){
    $this->db->where($id, $data);
    $this->db->from($tabel);
    return $this->db->get();
  }
  public function get_kursi($bagian){
      $this->db->where('bagian',$bagian);
    return $this->db->get('kursi');
  }
    public function delete($tabel, $id, $pk){
        $this->db->where($pk, $id);
        $this->db->delete($tabel);
    }
    public function get_id($tabel, $id){
      return $this->db->get_where($tabel, $id);
  }
    public function update($tabel, $data, $pk, $id){
      $this->db->where($pk, $id);
      $this->db->update($tabel, $data);
  }

  public function get_data_jadwal(){
      $this->db->select('jadwal.*,jadwal.kelas AS KELAS,
      bus.nama_bus AS BUS,Asal.nama_terminal AS ASAL, Tujuan.nama_terminal As TUJUAN');
      $this->db->from('jadwal');
          $this->db->join('bus','bus.id = jadwal.bus_id', 'left');
      $this->db->join('terminal as Asal','jadwal.asal = Asal.id', 'left');
      $this->db->join('terminal as Tujuan','jadwal.tujuan = Tujuan.id', 'left');
      return $this->db->get();
  }

  public function get_data_jadwal_edit($id){
    $data = array(
			'jadwal.id' => $id, 
		);
    $this->db->select('jadwal.*,jadwal.kelas AS KELAS,bus.nama_bus AS BUS,Asal.nama_terminal AS ASAL, Tujuan.nama_terminal As TUJUAN');
    $this->db->from('jadwal');
    $this->db->where($data);
    $this->db->join('bus','bus.id = jadwal.bus_id', 'left');
    $this->db->join('terminal as Asal','jadwal.asal = Asal.id', 'left');
    $this->db->join('terminal as Tujuan','jadwal.tujuan = Tujuan.id', 'left');
    return $this->db->get();
}
  public function pemesanan(){
    $data = array('status' => 0, );
   $this->db->select('tiket.*,jadwal.*,pelanggan.*,Asal.nama_terminal AS ASAL,Tujuan.nama_terminal AS TUJUAN
   ,tiket.id AS ID');
    $this->db->from('tiket');
    $this->db->where($data);
    $this->db->join('jadwal','jadwal.id = tiket.id_jadwal', 'left');
    $this->db->join('pelanggan','pelanggan.id = tiket.pelanggan_id', 'left');
    $this->db->join('bus','bus.id = jadwal.bus_id', 'left');
    $this->db->join('terminal as Asal','jadwal.asal = Asal.id', 'left');
    $this->db->join('terminal as Tujuan','jadwal.tujuan = Tujuan.id', 'left');
    return $this->db->get();
  }
  public function laporan(){
    $this->db->select('transaksi.*,admin.namalengkap AS nama');
    $this->db->from('transaksi');
    $this->db->join('admin', 'admin.id = transaksi.admin_id', 'left');
    return $this->db->get();
  }
  public function laporan_edit($id){
    $this->db->select('transaksi.*,admin.namalengkap AS nama');
    $this->db->from('transaksi');
    $this->db->where('transaksi.id', $id);
    $this->db->join('admin', 'admin.id = transaksi.admin_id', 'left');
    return $this->db->get();
  }
  public function pemesanan_all(){
    $data = array('status' => 1, );
   $this->db->select('tiket.*,jadwal.*,pelanggan.*,Asal.nama_terminal AS ASAL,Tujuan.nama_terminal AS TUJUAN
   ,tiket.id AS ID');
    $this->db->from('tiket');
    $this->db->where($data);
    $this->db->join('jadwal','jadwal.id = tiket.id_jadwal', 'left');
    $this->db->join('pelanggan','pelanggan.id = tiket.pelanggan_id', 'left');
    $this->db->join('bus','bus.id = jadwal.bus_id', 'left');
    $this->db->join('terminal as Asal','jadwal.asal = Asal.id', 'left');
    $this->db->join('terminal as Tujuan','jadwal.tujuan = Tujuan.id', 'left');
    return $this->db->get();
  }
  public function get_data_kursi(){
    $this->db->select('*');
    $this->db->from('kursi');
    $this->db->join('penumpang','penumpang.id = kursi.penumpang_id','left');
    $this->db->join('jadwal','jadwal.id = kursi.id_jadwal','left');
    return $this->db->get();
  }
  public function get_admin($id){
    $this->db->from('admin');
    $this->db->where('id', $id);
    return $this->db->get();
  }
}

?>