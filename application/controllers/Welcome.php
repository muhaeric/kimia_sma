<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public $data = array();
	function __construct(){
		parent::__construct();
		$this->load->model('Admin_md');
		$this->load->model('Blogs_md');
		$this->load->model('Pagemhs_md');
		$this->load->library('pagination');
		$this->load->helper('captcha');

		$this->data['populer'] = $this->Blogs_md->blogPopuler()->result_array();
		$this->data['agenda'] = $this->Blogs_md->agenda()->result_array();
		$this->data['new'] = $this->Blogs_md->blogBaru()->result_array();
		$this->data['menu'] = $this->Blogs_md->get_menu();
		$this->data['navbar'] = $this->Admin_md->ambil_tata();
		$this->data['dropdown'] = $this->Admin_md->ambil_tata();
		$this->data['sub2isi'] = $this->Admin_md->ambil_tata();
		$this->data['sub3isi'] = $this->Admin_md->ambil_tata();
		$this->data['sub2'] = $this->Admin_md->md_sub2();
		$this->data['sub3'] = $this->Admin_md->md_sub3();
	}

	public function index() {
		$this->data['tampil_pengabdian']= $this->Blogs_md->ambil_pengabdian()->result_array();
		$this->data['tampil_penelitian']= $this->Blogs_md->ambil_penelitian()->result_array();
		$this->data['best'] = $this->Blogs_md->blogTerbaik()->result_array();
		//print_r($this->data['new']);
		$this->data['new'] = $this->Blogs_md->blogBaru()->result_array();
		$this->load->view('index', $this->data);

	}
	public function single($slug="") {
		$id="16650021";
		// Unset previous captcha and store new captcha word
		$this->data['donelike']=$this->Blogs_md->cek_like()->result_array();
        $this->data['get_data']= $this->Blogs_md->get_data();
		// Send captcha image to view
		$this->data['komentar'] = $this->Pagemhs_md->ambil_komentar($slug);
		$this->data['post'] = $this->Blogs_md->single($slug)->result_array();
		$this->data['releated'] = $this->Blogs_md->releated($slug)->result_array();

		$this->load->view('single-post', $this->data);
	}
	public function penelitian() {
		// Unset previous captcha and store new captcha word
		$this->data['ambil_penelitian']=$this->Blogs_md->ambil_penelitian_all()->result_array();
		$this->load->view('penelitian', $this->data);
	}
	public function pengabdian() {
		// Unset previous captcha and store new captcha word
		
		$this->data['ambil_pengabdian']=$this->Blogs_md->ambil_pengabdian_all()->result_array();
		$this->load->view('pengabdian', $this->data);
	}
	public function simpan_like()
    {
    $likers=$this->session->userdata("nama");
    $id_blog=$this->input->post('id_blogs');
    

    $fact=$this->db->query('select * from blogs where id="'.$id_blog.'"');
    $crut=$fact->result();
     $fact2=$this->db->query('select * from suka where id_blogs="'.$id_blog.'" and nim="'.$likers.'" ');
    $crut2=$fact2->result();

    $fetchlikes=$this->db->query('select suka from blogs where id="'.$id_blog.'"');
    $result=$fetchlikes->result();
    $mantap=$likers.date("Y-m-dH-i-s");
      $data1=array(
    	'id_pemberitahuan'=>'',
    	'nim'=>$crut[0]->penulis,
    	'kategori_pemberitahuan'=>'2',
    	'slug_pemberitahuan'=>$crut[0]->slug,
    	'tgl_pemberitahuan'=>date("Y-m-d H:i:s"),
    	'status'=>'0',
    	'token'=>$mantap
    );

    $checklikes = $this->db->query('select * from suka 
                                    where id_blogs="'.$id_blog.'" 
                                    and nim = "'.$likers.'"');
    $resultchecklikes = $checklikes->num_rows();

    if($resultchecklikes == '0' ){
    if($result[0]->suka=="" || $result[0]->suka=="NULL")
    {
        $this->db->query('update blogs set suka=1 where id="'.$id_blog.'"');
    }
    else
    {
        $this->db->query('update blogs set suka=suka+1 where id="'.$id_blog.'"');
    }

    $data=array('id_blogs'=>$id_blog,'nim'=>$likers,'token'=>$mantap);
    $this->db->insert('suka',$data);

   
    $this->db->insert('pemberitahuan',$data1);

    }else{
    $this->db->delete('suka', array('id_blogs'=>$id_blog,
                                          'nim'=>$likers));
    $this->db->delete('pemberitahuan', array('token'=>$crut2[0]->token));
   
    $this->db->query('update blogs set suka=suka-1 where id="'.$id_blog.'"');
    }

    $this->db->select('suka');
    $this->db->from('blogs');
    $this->db->where('id',$id_blog);
    $query=$this->db->get();
    $result=$query->result();

    echo $result[0]->suka;
    }
	
	


	public function daftar($id='Agenda') {
		//print_r($this->data['daftar']->result_array());
		$config['total_rows'] = $this->Blogs_md->total_rows($id,"kategori.nama");
		$config['per_page'] = 5;  //show record per halaman
    $config["uri_segment"] = 2;  // uri parameter
    $choice = $config["total_rows"] / $config["per_page"];
    $config["num_links"] = floor($choice);
		$config['full_tag_open'] = '<ul class="pagination">';
		 $config['full_tag_close'] = '</ul>';
		 $config['first_link'] = false;
		 $config['last_link'] = false;
		 $config['first_tag_open'] = '<li>';
		 $config['first_tag_close'] = '</li>';
		 $config['prev_link'] = '&laquo';
		 $config['prev_tag_open'] = '<li class="prev">';
		 $config['prev_tag_close'] = '</li>';
		 $config['next_link'] = '&raquo';
		 $config['next_tag_open'] = '<li>';
		 $config['next_tag_close'] = '</li>';
		 $config['last_tag_open'] = '<li>';
		 $config['last_tag_close'] = '</li>';
		 $config['cur_tag_open'] = '<li class="active"><a href="#">';
		 $config['cur_tag_close'] = '</a></li>';
		 $config['num_tag_open'] = '<li>';
		 $config['num_tag_close'] = '</li>';
		$this->data['page'] = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
		$this->data['daftar'] = $this->Blogs_md->daftar($id,'kategori.nama',$config["per_page"],$this->data['page'])->result_array();

		if ($id=='Agenda') {
				$config['base_url'] = site_url('agenda');
				$this->pagination->initialize($config);
				$this->data['pagination'] = $this->pagination->create_links();

				$this->load->view('list-agenda', $this->data);
		} else {
				$config['base_url'] = site_url('kategori');
				$this->pagination->initialize($config);
				$this->data['pagination'] = $this->pagination->create_links();
				//print_r($this->data['daftar']);
				$this->load->view('list-post', $this->data);
		}
	}

		public function halaman($id) {
			$this->data['hlm']= $this->Blogs_md->ambil_hlm($id);

		$this->load->view('halaman', $this->data);
	}
	public function agenda($slug="") {
			$this->data['post'] = $this->Blogs_md->single($slug)->result_array();

			$this->load->view('isiagenda', $this->data);
	}
	public function hasil_search() {
		//Konfigurasi Paginasi
			
        $data['populer'] = $this->Blogs_md->blogPopuler()->result_array();
		$data['agenda'] = $this->Blogs_md->agenda()->result_array();
		$data['new'] = $this->Blogs_md->blogBaru()->result_array();
		$data['menu'] = $this->Blogs_md->get_menu();
		$data['navbar'] = $this->Admin_md->ambil_tata();
        $data['cari']=$this->Blogs_md->caripost();
        $data['sub2isi'] = $this->Admin_md->ambil_tata();
		$data['sub3isi'] = $this->Admin_md->ambil_tata();
		$data['sub2'] = $this->Admin_md->md_sub2();
		$data['sub3'] = $this->Admin_md->md_sub3();
        $data['dropdown']=$this->Admin_md->ambil_tata();
		$this->load->view('hasil_search', $data);
	}
	public function mhs_aktif($penulis) {
		$ur=$this->uri->segment(2);
		
		$config['base_url']=base_url()."penulis/".$ur;
		$config['total_rows']= $this->db->query("SELECT * FROM agenda")->num_rows();
		$config['per_page']=6;
        $config['num_links'] = 1;
        $config['uri_segment']=3;
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] ="</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        $config['first_link']='< Pertama ';
        $config['last_link']='Terakhir > ';
        $config['next_link']='» ';
        $config['prev_link']='« ';
        $this->pagination->initialize($config);
        $data['navbar'] = $this->Admin_md->ambil_tata();

		$data['pilih_penulis'] = $this->Blogs_md->ambil_penulis($penulis,$config);
		$data['sub2isi'] = $this->Admin_md->ambil_tata();
		$data['sub3isi'] = $this->Admin_md->ambil_tata();
		$data['sub2'] = $this->Admin_md->md_sub2();
		$data['sub3'] = $this->Admin_md->md_sub3();
		$data['populer'] = $this->Blogs_md->blogPopuler()->result_array();
		$data['agenda'] = $this->Blogs_md->agenda()->result_array();
		$data['new'] = $this->Blogs_md->blogBaru()->result_array();
		$data['menu'] = $this->Blogs_md->get_menu();
		$data['dropdown']=$this->Admin_md->ambil_tata();
		$this->load->view('mhs_aktif', $data);
	}
	public function list_post($id) {
		$data['sub2isi'] = $this->Admin_md->ambil_tata();
		$data['sub3isi'] = $this->Admin_md->ambil_tata();
		$data['sub2'] = $this->Admin_md->md_sub2();
		$data['sub3'] = $this->Admin_md->md_sub3();
        $data['navbar'] = $this->Admin_md->ambil_tata();
		$data['daftar'] = $this->Blogs_md->lists($id);
		$data['populer'] = $this->Blogs_md->blogPopuler()->result_array();
		$data['agenda'] = $this->Blogs_md->agenda()->result_array();
		$data['new'] = $this->Blogs_md->blogBaru()->result_array();
		$data['dropdown']=$this->Admin_md->ambil_tata();
		$data['kat'] = $this->Blogs_md->kate($id);
		$this->load->view('list-post', $data);
	}
	public function komentar() {
		if($this->input->post('submit')){
			$inputCaptcha = $this->input->post('captcha');
			$sessCaptcha = $this->session->userdata('captchaCode');
			if($inputCaptcha === $sessCaptcha){
				echo 'Captcha code matched.';
			}else{
				echo 'Captcha code was not match, please try again.';
			}
		}
	}

	

	
}
