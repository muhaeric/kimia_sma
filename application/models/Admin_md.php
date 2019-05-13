<?php
class Admin_md extends CI_Model {


	function count_blogs(){
		return $this->db->count_all_results('blogs');
	}
	function count_komen(){
		return $this->db->count_all_results('komentar');
	}
	function count_suka(){
		return $this->db->count_all_results('suka');
	}
	function tampil_all_post($config){

    $this->db->limit(6);
      $this->db->order_by('created_at','DESC');
      $hasilquery=$this->db->get('blogs', $config['per_page'], $this->uri->segment(3));
      if ($hasilquery->num_rows() > 0) {
          foreach ($hasilquery->result() as $value) {
              $data[]=$value;
          }
          return $data;
      }

      }
      function md_sub2(){
          $this->db->order_by('waktu', 'DESC');
		$this->db->where('status_parent', '3');
		return $this->db->get('tata')->result();
	}
	function md_sub3(){
	    $this->db->order_by('waktu', 'DESC');
		$this->db->where('status_parent', '4');
		return $this->db->get('tata')->result();
	}
    function ambil_edit_post($id,$penulis){
		$this->db->where('id',$id);
		$this->db->where('penulis',$penulis);
		return $this->db->get('blogs')->result();
	}  
	function hapus_kategori($id){
		$this->db->where('id',$id);
		$this->db->delete('kategori');
		$this->db->where('id_menu',$id);
		$this->db->where('keterangan','kategori');
		$this->db->delete('tata');
	}
	function hapus_halaman($id){
		$this->db->where('id_halaman',$id);
		$this->db->delete('halaman');
		$this->db->where('id_menu',$id);
		$this->db->where('keterangan','halaman');
		$this->db->delete('tata');
	}
	function hapus_parent($id){
		$this->db->where('id',$id);
		$this->db->delete('parent');
		$this->db->where('id_menu',$id);
		$this->db->where('keterangan','parent');
		$this->db->delete('tata');
	}
	function update_kategori($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function ambil_slider(){
		return $this->db->get('slides')->result();
	}
    function ambil_halaman(){
		return $this->db->get('halaman')->result();
	}
	function ambil_parent(){
		return $this->db->get('parent')->result();
	}
	function ambil_tata(){
		$this->db->order_by('urut', 'ASC');
		return $this->db->get('tata')->result();
	}
	  function ambil_kat(){
     	$this->db->where('level',0);
		return $this->db->get('kategori')->result();
	}
     function ambil_edit_halaman($id){
     	$this->db->where('id_halaman',$id);
		return $this->db->get('halaman')->row();
	}
	 function drop($id){
     	$this->db->where('nama_parent',$id);
     	$this->db->where('status_parent',1);
		return $this->db->get('tata')->result();
	}
     function cek_login($table,$where){		
		return $this->db->get_where($table,$where);
	}
	function update_slides($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
		function ambil_agenda($config){
		$ini =$this->session->userdata("admin");
		
		$this->db->limit(6);
      	$this->db->where('kategori','4');
      	$this->db->where('penulis',$ini);
      $this->db->order_by('DATE(updated_at)','DESC');
      $hasilquery=$this->db->get('blogs', $config['per_page'], $this->uri->segment(3));
      if ($hasilquery->num_rows() > 0) {
          foreach ($hasilquery->result() as $value) {
              $data[]=$value;
          }
          return $data;
      }



	}
	public function ambil_mhs() {
		$query = $this->db->query('SELECT * FROM mahasiswa WHERE nim != 1 ORDER BY nim ASC');
		return $query->result();
	}
	function ambil_edit_mhs($id){
		$this->db->where('nim',$id);
		return $this->db->get('mahasiswa')->row();
	}  

}