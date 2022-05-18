<?php

class Mlogin extends CI_Model{
  public function cek_login($e,$p){
      $login = $this->db->get_where('admin',array('email' =>$e, 'password' => $p));
      return $login;
  }
  public function cek_login_member($e,$p){
    $login = $this->db->get_where('pelanggan',array('email' =>$e, 'password' => $p));
    return $login;
}
  public function register($data){
        $this->db->insert('pelanggan',$data);
        $insert_id = $this->db->insert_id();
        $result = $this->db->get_where('pelanggan',array('id' => $insert_id));
        return $result ->row_array();
  }
  public function cek_data_logins($e){
    $login = $this->db->get_where('pelanggan',array('email' =>$e));
    return $login;
  }
  public function cek_data_login($tabel){
    return  $this->db->get($tabel);;
  }
}
?>