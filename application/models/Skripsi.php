<?php
class Skripsi extends CI_Model {


public function ambil_penelitian(){
		$this->db->where('kategori','1');
		return $this->db->get('penelitian');
}

public function ambil_pengabdian(){
		$this->db->where('kategori','2');
		return $this->db->get('penelitian');
}
public function update_penelitian($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);

}


}

?>