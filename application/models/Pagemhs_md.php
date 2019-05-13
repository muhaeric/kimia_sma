<?php
class Pagemhs_md extends CI_Model {

	function cek_login($table,$where){		
		return $this->db->get_where($table,$where);
	}
	function ambil_mhs(){
		$nim =$this->session->userdata("nama");
		$this->db->where('nim',$nim);
		 $query = $this->db->get('mahasiswa');
                return $query->result();
	}

	function getpemberitahuan($ini){
		$this->db->where('nim',$ini);
		$query = $this->db->get('komentar');
	}
	function posting_blog($data){
		return $this->db->query("Insert into blogs value ('".$data['id']."','".$data['judul']."','".$data['content']."','".$data['gambar']."','".$data['slug']."','".$data['kategori']."','".$data['penulis']."','".$data['viewer']."','".$data['suka']."','".$data['status_blog']."','".$data['komentar']."',CURRENT_TIMESTAMP(),CURRENT_TIMESTAMP())");
	}
	function ambil_komentar($slug){
		$this->db->select('*');
		$this->db->from('blogs');
		$this->db->join('komentar as komen','komen.id_blogs = blogs.id');
		$this->db->join('mahasiswa as maha','maha.nim = komen.id_user');
		$this->db->order_by('komen.created_at', 'desc');
		$this->db->where('blogs.slug',$slug);

		return $query = $this->db->get()->result();
	}
	function kirim_komentar($data,$table){
		$this->db->insert($table,$data);
	}
	function kirim_pemberitahuan_komentar($data,$table){
		$this->db->insert($table,$data);
	}
	function ambil_kategori(){ 
		return $this->db->get('kategori')->result();
	}
	function count_blogs($ini){
		$this->db->where('penulis',$ini);
		return $this->db->count_all_results('blogs');
	}
	function count_suka($ini){
		$this->db->where('nim',$ini);
		return $this->db->count_all_results('suka');
	}
	function ambil_pemberitahuan(){
		$ini =$this->session->userdata("nama");
		$this->db->select('*');
		$this->db->from('blogs');
		$this->db->join('pemberitahuan as pemberi','pemberi.slug_pemberitahuan = blogs.slug');
		$this->db->where('nim',$ini);
		 $this->db->order_by('id_pemberitahuan', 'desc');
		return $query = $this->db->get()->result();
	}
	function count_pemberitahuan(){
		$ini =$this->session->userdata("nama");
		$this->db->where('nim',$ini);
		$this->db->where('status','0');
		return $this->db->count_all_results('pemberitahuan');
	}
	function count_komentar(){
		$ini =$this->session->userdata("nama");
		$this->db->select('blogs.id, blogs.penulis, komentar.id_blogs');
		$this->db->from('blogs');
		$this->db->join('komentar as komen', 'komentar.id_blogs = blogs.id');
		 $this->db->group_by('blogs.id');
		$this->db->where('penulis',$ini);
		return $this->db->count_all_results('komentar');
	}
	function update_pemberitahuan($ini){
		$ambil = array('status' => 1);
		$this->db->where('nim',$ini);
		return $this->db->update('pemberitahuan',$ambil);

	}
	
	function ambil_post_session($ini){
		 $this->db->select('blogs.id as idblog, blogs.status_blog, blogs.judul, blogs.suka, blogs.content, blogs.gambar, blogs.slug, blogs.kategori, kategori.level, blogs.komentar, blogs.penulis, blogs.viewer, blogs.suka, blogs.updated_at, kategori.id, kategori.nama');
		$this->db->from('blogs');
		$this->db->join('kategori', 'kategori.id = blogs.kategori');
		$this->db->order_by('blogs.updated_at', 'desc');
		$this->db->where('penulis',$ini);

		return $query = $this->db->get();

			}
	function update_blog($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
	function update_agenda($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
	function ambil_agenda(){
		$ini =$this->session->userdata("nama");
		$this->db->where('penulis',$ini);
		$this->db->where('kategori','4');
		$this->db->order_by('updated_at','desc')->limit(5,0);
		return $this->db->get('blogs')->result();
	}
	
	function hapus_blog($id){
		$this->db->where('id',$id);
		$this->db->delete('blogs');
	}
	function hapus_agenda($id){
		$this->db->where('id',$id);
		$this->db->delete('blogs');
	}
	function hapus_komentar($where){
		$this->db->where('id_komentar',$where);
		$this->db->delete('komentar');
	}
	function ambil_edit_post($id,$penulis){
		 $this->db->select('blogs.id as id_blog, kategori.id as id_kat, blogs.status_blog, blogs.judul, blogs.suka, blogs.content, blogs.gambar, blogs.slug, blogs.kategori, kategori.level, blogs.komentar, blogs.penulis, blogs.viewer, blogs.suka, blogs.updated_at, kategori.id, kategori.nama');
		$this->db->where('blogs.id',$id);
		$this->db->where('penulis',$penulis);
		$this->db->join('kategori', 'kategori.id = blogs.kategori');
		return $this->db->get('blogs')->result();
	}
	function buat_agenda($data,$table){
		$this->db->insert($table,$data);

	}
	
}
?>
