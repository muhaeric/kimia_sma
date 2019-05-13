<?php
class Blogs_md extends CI_Model {

  public $title;
  public $content;
  public $date;

  public function get_menu() {
    $query = $this->db->get('menu');
    return $query->result_array();
  }
public function kate($id) {
    $this->db->where('id',$id);
    return $this->db->get('kategori')->row();
  }
  public function get_submn($id) {
    $query = $this->db->get_where('menu', ['sub_head'=>$id]);
    return $query->result_array();
  }
  public function blogPopuler() {
    $this->db->select('blogs.judul, blogs.content, blogs.gambar, blogs.slug,blogs.status_blog, maha.nama AS penulis, blogs.created_at, (blogs.viewer+blogs.suka+blogs.komentar) AS total');
    $this->db->from('blogs');
    $this->db->join('mahasiswa as maha', 'maha.nim = blogs.penulis');
    $this->db->order_by('total', 'desc')->limit(6,0);
    return $this->db->get();
  }
  public function get_data(){
    $hal=$this->uri->segment(2);

    $this->db->where('slug',$hal);
    $this->db->order_by('id','asc');
    return $query = $this->db->get('blogs')->result_array();
  }
  public function ambil_hlm($id) {
    $this->db->where('id_halaman',$id);
    $query = $this->db->get('halaman');
    return $query->row();
  }


  public function ambil_penelitian(){
    $this->db->where('kategori','1');
    $this->db->limit('5');
    return $this->db->get('penelitian');
  }
  public function ambil_penelitian_all(){
    $this->db->where('kategori','1');
    return $this->db->get('penelitian');
  }

  public function ambil_pengabdian(){
    $this->db->where('kategori','2');
    return $this->db->get('penelitian');
  }
  public function ambil_pengabdian_all(){
    $this->db->where('kategori','2');
    return $this->db->get('penelitian');
  }

  public function blogTerbaik() {
    $this->db->select('blogs.judul, blogs.content, blogs.gambar, blogs.slug, blogs.penulis AS nim, maha.nama AS penulis, blogs.created_at, blogs.suka AS total');
    $this->db->from('blogs');
    $this->db->join('mahasiswa as maha', 'maha.nim = blogs.penulis');
    $this->db->order_by('total', 'desc')->limit(4,0);
    return $this->db->get();
  }

  public function blogBaru() {
    $this->db->select('blogs.judul, blogs.content, blogs.gambar, blogs.slug, maha.nama AS penulis, blogs.created_at');
    $this->db->from('blogs');
    $this->db->join('mahasiswa as maha', 'maha.nim = blogs.penulis');
    $this->db->order_by('blogs.created_at', 'desc')->limit(5,0);
    return $this->db->get();
  }
  function ambil_penulis($penulis,$config){
    $this->db->limit(6);
    $this->db->where('penulis',$penulis);
    $this->db->where('status_blog','1');
    $this->db->order_by('DATE(updated_at)','DESC');
    $hasilquery=$this->db->get('blogs', $config['per_page'], $this->uri->segment(3));
    if ($hasilquery->num_rows() > 0) {
      foreach ($hasilquery->result() as $value) {
        $data[]=$value;
      }
      return $data;
    }


  }

  public function bestMaha() {
    $this->db->select("maha.nama, maha.nim, count('blogs.penulis') AS total");
    $this->db->from('blogs');
    $this->db->join('mahasiswa as maha', 'maha.nim = blogs.penulis');
    $this->db->group_by("nim");
    $this->db->order_by('total', 'desc')->limit(4,0);
    return $this->db->get();
  }

  public function slides() {
    return $this->db->get('slides');
  }

  public function lists($id) {
    $this->db->join('kategori','kategori.id = blogs.kategori');
    $this->db->where('kategori',$id);
    $this->db->join('mahasiswa as maha', 'maha.nim = blogs.penulis');
      $this->db->order_by('created_at','DESC');
    return $this->db->get('blogs')->result_array();
  }
  public function agenda() {
    $this->db->where('status_blog','1');
    return $this->db->get_where('blogs',['kategori'=>4]);
  }

  public function single($slug) {
    return $this->db->select('blogs.id, blogs.judul, blogs.penulis AS nime, blogs.content, blogs.gambar, maha.nama AS penulis, blogs.created_at as tanggal, blogs.viewer AS total, kat.nama as kategori, blogs.kategori as ktgr')
    ->from('blogs')
    ->join('mahasiswa as maha', 'maha.nim = blogs.penulis')
    ->join('kategori as kat', 'kat.id = blogs.kategori')
    ->where('blogs.slug',$slug)->get();
                //return $this->db->get();
  }
  public function cek_like(){
    $nim =$this->session->userdata("nama");
    $page=$this->uri->segment(2);
    return $this->db->select('*')
    ->from('suka')
    ->join('blogs','suka.id_blogs = blogs.id')
    ->where('nim',$nim)
    ->where('blogs.slug',$page)->get();
  }
  public function like($slug,$id) {
    $blog = $this->single($slug)->result_array();
    return $this->db->get_where('suka',['id_blogs'=>$blog[0]['id'],'nim'=>$id]);
  }

  public function releated($slug) {
    $ktgr = $this->single($slug)->result_array();
    return $this->db->limit(4,0)->get_where('blogs',['kategori'=>$ktgr[0]['ktgr'],'id !='=>$ktgr[0]['id']]);
  }

  public function daftar($id,$kondisi,$limit,$start) {
    $id = urldecode($id);
    return $this->db->select('*')
    ->from('blogs')
    ->join('kategori','kategori.id = blogs.kategori')
    ->where($kondisi,$id)
    ->limit($limit,$start)->get();
  }

  public function total_rows($kategori,$kondisi) {
    $kategori = urldecode($kategori);
    return $this->db->select('*')
    ->from('blogs')
    ->join('kategori','kategori.id = blogs.kategori')
    ->where($kondisi, $kategori)->get()->num_rows();
  }

  public function insert_entry()
  {
                $this->title    = $_POST['title']; // please read the below note
                $this->content  = $_POST['content'];
                $this->date     = time();

                $this->db->insert('entries', $this);
              }

              public function update_entry()
              {
                $this->title    = $_POST['title'];
                $this->content  = $_POST['content'];
                $this->date     = time();

                $this->db->update('entries', $this, array('id' => $_POST['id']));
              }
              public function caripost()
              {
                $cari = $this->input->GET('cari', TRUE);
                $this->db->like('judul', $cari);

                $this->db->select('blogs.judul, blogs.content, blogs.gambar, blogs.slug, maha.nama AS penulis, blogs.created_at');
                $this->db->from('blogs');
                $this->db->join('mahasiswa as maha', 'maha.nim = blogs.penulis');
                $this->db->order_by('blogs.created_at', 'desc')->limit(4,0);
                return $this->db->get()->result_array();

              }

      /*
  
         function caripost($config){
    $this->db->limit(3);
      $this->db->order_by('DATE(created_at)','DESC');
      $hasilquery=$this->db->get('blogs', $config['per_page'], $this->uri->segment(2));
      if ($hasilquery->num_rows() > 0) {
          foreach ($hasilquery->result() as $value) {
              $data[]=$value;
          }
          return $data;
      }
      }
*/

    }
    ?>
