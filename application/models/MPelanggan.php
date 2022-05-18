<?php

class MPelanggan extends CI_Model{
  public function cari_tiket($data){
    $this->db->select('jadwal.*,jadwal.kelas AS KELAS,bus.nama_bus AS BUS,Asal.nama_terminal AS ASAL, Tujuan.nama_terminal As TUJUAN');
		$this->db->like('tgl_berangkat', $this->input->get('tanggal'));
    $this->db->like('asal', $data['asal']);
    $this->db->like('tujuan', $data['tujuan']);
		$this->db->from('jadwal');
    $this->db->join('bus','bus.id = jadwal.bus_id', 'left');
		$this->db->join('terminal as Asal','jadwal.asal = Asal.id', 'left');
		$this->db->join('terminal as Tujuan','jadwal.tujuan = Tujuan.id', 'left');
    $this->db->where('tgl_berangkat >= NOW()');
		return $this->db->get();
}
public function tiket_tersedia(){
  $this->db->select('jadwal.*,jadwal.kelas AS KELAS,bus.nama_bus AS BUS,Asal.nama_terminal AS ASAL, Tujuan.nama_terminal As TUJUAN');
  $this->db->from('jadwal');
  $this->db->join('bus','bus.id = jadwal.bus_id', 'left');
  $this->db->join('terminal as Asal','jadwal.asal = Asal.id', 'left');
  $this->db->join('terminal as Tujuan','jadwal.tujuan = Tujuan.id', 'left');
  $this->db->where('tgl_berangkat >= NOW()');
  return $this->db->get();
}
public function get_data_jadwal_id($id){
    $this->db->select('jadwal.*,jadwal.kelas AS KELAS,bus.nama_bus 
    AS BUS,Asal.nama_terminal AS ASAL, Tujuan.nama_terminal As TUJUAN');
    $this->db->from('jadwal');
    $this->db->where('jadwal.id',$id);
    $this->db->join('bus','bus.id = jadwal.bus_id', 'left');
    $this->db->join('terminal as Asal','jadwal.asal = Asal.id', 'left');
    $this->db->join('terminal as Tujuan','jadwal.tujuan = Tujuan.id', 'left');
    return $this->db->get();
}
public function get_tiket_id(){
  $insert_id = $this->db->insert_id();
  $result = $this->db->get_where('tiket', array('id' => $insert_id));
  return $result->row_array();
}
public function insert_penumpang($jadwal_id,$no_tiket){
  $insert_id = $this->db->insert_id();
  $insert = $this->db->insert('kursi',array(
    "no_tiket" => $no_tiket,
    'penumpang_id' => $insert_id,
    'id_jadwal' => $jadwal_id
  ));
  return $insert;
}
//ambil data Konfirmasi Pembayaran
public function get_tiket_data($id){
  $this->db->select('tiket.*,jadwal.*,jadwal.kelas AS KELAS,bus.nama_bus AS BUS,Asal.nama_terminal AS ASAL, Tujuan.nama_terminal As TUJUAN
  ');
  $this->db->from('tiket');
  $this->db->where('tiket.id',$id);
  $this->db->join('jadwal','jadwal.id = tiket.id_jadwal', 'left');
  $this->db->join('bus','bus.id = jadwal.bus_id', 'left');
  $this->db->join('terminal as Asal','jadwal.asal = Asal.id', 'left');
  $this->db->join('terminal as Tujuan','jadwal.tujuan = Tujuan.id', 'left');
  return $this->db->get();
}
//ambil data riwayat pemesanan
public function get_data_pemesananan($id){
  $this->db->select('tiket.*,jadwal.*,jadwal.kelas AS KELAS,
  bus.nama_bus AS BUS,Asal.nama_terminal AS ASAL, Tujuan.nama_terminal As TUJUAN,
  tiket.id AS ID,');
  $this->db->from('tiket');
  $this->db->where('pelanggan_id',$id);
  $this->db->join('jadwal','jadwal.id = tiket.id_jadwal', 'left');
  $this->db->join('bus','bus.id = jadwal.bus_id', 'left');
  $this->db->join('terminal as Asal','jadwal.asal = Asal.id', 'left');
  $this->db->join('terminal as Tujuan','jadwal.tujuan = Tujuan.id', 'left');
  return $this->db->get();
}
//ambil data Penumpang sesuai nomer tiket
public function get_penumpang($no_tiket){
  $this->db->select('kursi.*,penumpang.*,kursi.id AS kursi_id');
  $this->db->from('kursi');
  $this->db->where('penumpang.no_tiket',$no_tiket);
  $this->db->join('penumpang','penumpang.id = kursi.penumpang_id', 'left');
  return $this->db->get();
}
public function get_jumlahkursi($jadwal){
  $this->db->select('kursi_a,kursi_b');
  $this->db->from('jadwal');
  $this->db->where('jadwal.id',$jadwal);
  $this->db->join('bus','bus.id = jadwal.bus_id','left');
  return $this->db->get();
}
public function get_bagiankursi($no_tiket){
  $this->db->select('bagian');
  $this->db->from('kursi');
  $this->db->where('no_tiket',$no_tiket);
  $this->db->where('bagian',"");
  return $this->db->get();
}
public function get_kursi($bagian,$jadwal){
  $this->db->select('kode_kursi');
  $this->db->from('kursi');
  $this->db->where('id_jadwal',$jadwal);
  $this->db->where('bagian',$bagian);
  return $this->db->get();
}
public function printtiket($no_tiket){
  $this->db->select(
    '*,
    Asal.nama_terminal AS ASAL,
    Tujuan.nama_terminal As TUJUAN,
    tiket.id AS ID,
    penumpang.nama AS nama_penumpang,
    kursi.id AS kursi_id  
     ');
  $this->db->from('tiket');
  $this->db->where('tiket.no_tiket',$no_tiket);
  $this->db->join('penumpang','penumpang.no_tiket = tiket.no_tiket', 'left');
  $this->db->join('pelanggan','pelanggan.id = tiket.pelanggan_id', 'left');
  $this->db->join('kursi','kursi.penumpang_id = penumpang.id', 'left');
  $this->db->join('jadwal','jadwal.id = tiket.id_jadwal', 'left');
  $this->db->join('bus','bus.id = jadwal.bus_id', 'left');
  $this->db->join('terminal as Asal','jadwal.asal = Asal.id', 'left');
  $this->db->join('terminal as Tujuan','jadwal.tujuan = Tujuan.id', 'left');
  return $this->db->get();
}
// public function get_kursi($bagian,$id_jadwal){
//   $this->db->where('bagian',$bagian);
// return $this->db->get('kursi');
// }
// public function get_kursi($bagian,$id_jadwal){
//   $this->db->select('*, kursi.kode_kursi AS KURSI');
//   $this->db->where('kursi.bagian',$bagian);
//    $this->db->where('kursi.id_jadwal', $id_jadwal);
//    $this->db->where('kursi.status', 0);
//    return $this->db->get('kursi');
//  }
 public function updateKursi($id){
   $data = array(
     'status' => 1
   );
   $this->db->where('id', $id);
   return $this->db->update('kursi', $data);
 }
 public function hapus_pemesanan($tabel, $where, $value){
  $this->db->where($value,$where);
  $this->db->delete($tabel);
}
}
?>