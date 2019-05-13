<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('pagination');
		$this->load->model('Pagemhs_md');
		$this->load->model('Admin_md');
    $this->load->model('Skripsi');
		$this->load->library('upload');


		$this->load->helper(array('form', 'url'));
		if($this->session->userdata('status_admin') != "login_admin"){
			redirect(base_url("login/login_admin"));
			$this->session->set_userdata('username','1');
		}

	}
	public function index() {

		$data['blg']= $this->Admin_md->count_blogs();
		$data['komen']= $this->Admin_md->count_komen();
		$data['suka']= $this->Admin_md->count_suka();
		

		$this->load->view('admin/header-admin');
		$this->load->view('admin/admin',$data);
		$this->load->view('admin/footer-admin');
	}
	public function allpost($id= null) {
		$config['base_url']=base_url()."admin/allpost";
		$config['total_rows']= $this->db->query("SELECT * FROM blogs where status_blog=1")->num_rows();
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

		$data['tampil_all']=$this->Admin_md->tampil_all_post($config);
		
		$this->load->view('admin/header-admin');
		$this->load->view('admin/all-post',$data);
		$this->load->view('admin/footer-admin');
	}
	public function addpost() {
		$data['kategori'] = $this->Pagemhs_md->ambil_kategori();
		$this->load->view('admin/header-admin');
		$this->load->view('admin/add-post',$data);
		$this->load->view('admin/footer-admin');
	}
	public function post_pros(){
		// $config['upload_path'] = './assets/img/';
		// $config['allowed_types'] = 'gif|jpg|png|bmp|jpeg';
		// $config['max_size']    = '0';
		// $config['max_width']  = '0';
		// $config['max_height']  = '0';
		// $config['encrypt_name']= true;
		// $this->upload->initialize($config);
		// if(!$this->upload->do_upload('gambar')){
		// }else{
		// 	$gbr = $this->upload->data();
		// 	$data = $this->upload->data();
		// 	$config['image_library'] = 'gd2';
		// 	$config['quality']= '100';
		// 	$config['source_image'] = './assets/img/'.$gbr['file_name'];
		// 	$config['create_thumb'] = FALSE;
		// 	$config['maintain_ratio'] = FALSE;
		// 	$config['width']         = 640;
		// 	$config['height']       = 480;
		// 	$this->load->library('image_lib', $config);
		// 	$this->image_lib->resize();
		// 	$conf['image_library'] = 'gd2';
		// 	$config['quality']= '70';
		// 	$conf['source_image'] = './assets/img/'.$gbr['file_name'];
		// 	$conf['new_image'] = './assets/img/thumb/'.$gbr['file_name'];
		// 	$conf['create_thumb'] = TRUE;
		// 	$conf['maintain_ratio'] = FALSE;
		// 	$conf['width'] = 300;
		// 	$conf['height'] = 200;
		// 	$this->load->library('image_lib', $conf);
		// 	$this->image_lib->initialize($conf);
		// 	$this->image_lib->resize();

		// 	$slug = $this->input->post('judul');
		// 	$diminke = str_replace(' ', '-', $slug);

		// 	$data = array(
		// 		'id' =>'',
		// 		'judul' =>$this->input->post('judul'),
		// 		'content' => $this->input->post('isi'),
		// 		'gambar' =>$data['file_name'],
		// 		'slug' =>  $diminke.date("Y-m-dH-i-s"),
		// 		'viewer' =>  '0',
		// 		'suka'   => '0',
		// 		'status_blog' =>$this->input->post('status_blog'),
		// 		'penulis' => $this->input->post('penulis'),	
		// 		'komentar'   => '0',
		// 		'crated_at' => date("Y-m-d H:i:s", strftime(date("Y-m-d H:i:s")) + (2*60 * 60)),
		// 		'updated_at' => date("Y-m-d H:i:s", strftime(date("Y-m-d H:i:s")) + (2*60 * 60)),					
		// 		'kategori'=> $this->input->post('kategori')			
		// 	);
		// 	$data1 = array(
		// 		'id_pemberitahuan'	=>'',
		// 		'nim' => $this->session->userdata("admin"),
		// 		'kategori_pemberitahuan' => '1',
		// 		'slug_pemberitahuan' => $diminke.date("Y-m-dH-i-s"),
		// 		'tgl_pemberitahuan' => date("Y-m-d H:i:s"),
		// 		'status' => '0'
		// 	);
		// 	$this->Pagemhs_md->kirim_pemberitahuan_komentar($data1,'pemberitahuan');	
  //         $this->Pagemhs_md->posting_blog($data); //memasukan data ke database
  //         redirect(base_url("admin/allpost")); 
  //     }
		$slug = $this->input->post('judul');
		

		$slug_low = strtolower($slug);
		$diminke = preg_replace('/[^A-Za-z0-9-]+/', '-', $slug_low);
    $config['upload_path']          = './assets/berkas/';
    $config['allowed_types']        = 'pdf';
      $config['encrypt_name']= true;
    
    $this->load->library('upload', $config);
      $this->upload->initialize($config);

    if (!$this->upload->do_upload('gambar')){
      $data= array(
      'id' =>'',
        'judul' =>$this->input->post('judul'),
        'content' => $this->input->post('isi'),
        'gambar' =>'kosong',
        'slug' =>  $diminke.date("Y-m-dH-i-s"),
        'viewer' =>  '0',
        'suka'   => '0',
        'status_blog' =>$this->input->post('status_blog'),
        'penulis' => $this->input->post('penulis'), 
        'komentar'   => '0',
        'crated_at' => date("Y-m-d H:i:s", strftime(date("Y-m-d H:i:s")) + (2*60 * 60)),
        'updated_at' => date("Y-m-d H:i:s", strftime(date("Y-m-d H:i:s")) + (2*60 * 60)),         
        'kategori'=> $this->input->post('kategori')   
      );


      $this->Pagemhs_md->posting_blog($data);
      redirect(base_url('admin/allpost'));
      
    }else{

      $datas = $this->upload->data();

      $data= array(
      'id' =>'',
        'judul' =>$this->input->post('judul'),
        'content' => $this->input->post('isi'),
        'gambar' =>$datas['file_name'],
        'slug' =>  $diminke.date("Y-m-dH-i-s"),
        'viewer' =>  '0',
        'suka'   => '0',
        'status_blog' =>$this->input->post('status_blog'),
        'penulis' => $this->input->post('penulis'), 
        'komentar'   => '0',
        'crated_at' => date("Y-m-d H:i:s", strftime(date("Y-m-d H:i:s")) + (2*60 * 60)),
        'updated_at' => date("Y-m-d H:i:s", strftime(date("Y-m-d H:i:s")) + (2*60 * 60)),         
        'kategori'=> $this->input->post('kategori')   
      );


      $this->Pagemhs_md->posting_blog($data);
      redirect(base_url('admin/allpost'));
    }
  }

  public function edit_pos(){
  	$config['upload_path'] = './assets/img/';
  	$config['allowed_types'] = 'gif|jpg|png|bmp|jpeg';
  	$config['max_size']    = '0';
  	$config['max_width']  = '0';
  	$config['max_height']  = '0';
  	$config['encrypt_name']= true;
  	$this->upload->initialize($config);
  	if(!$this->upload->do_upload('gambar')){

  		$ambil = array('upload_data' => $this->upload->data());
  		$this->load->model('Pagemhs_md');

  		$text1 = $this->db->escape_str($this->input->post('judul'));
  		$data = array(
  			'id' =>$this->input->post('id'),
  			'judul' =>$text1,
  			'content' =>$this->input->post('content'),
  			'status_blog' =>$this->input->post('status_blog'),
  			'gambar' =>$this->input->post('gambar_lama'),
  			'kategori' =>$this->input->post('kategori')
  		);
  		$where = array(
  			'id' =>$this->input->post('id'));			
  		$this->Pagemhs_md->update_blog($where,$data,'blogs');
  		redirect(base_url("admin/allpost")); 

  	}else{

  		$path_to_file = './assets/img/'.$this->input->post('gambar_lama');
  		unlink($path_to_file);
  		$path_to_file2 = './assets/img/thumb/'.$this->input->post('gambar_lama');
  		unlink($path_to_file2);            

  		$gbr = $this->upload->data();
  		$data = $this->upload->data();
  		$config['image_library'] = 'gd2';
  		$config['quality']= '100';
  		$config['source_image'] = './assets/img/'.$gbr['file_name'];
  		$config['create_thumb'] = FALSE;
  		$config['maintain_ratio'] = FALSE;
  		$config['width']         = 640;
  		$config['height']       = 480;
  		$this->load->library('image_lib', $config);
  		$this->image_lib->resize();
  		$conf['image_library'] = 'gd2';
  		$config['quality']= '70';
  		$conf['source_image'] = './assets/img/'.$gbr['file_name'];
  		$conf['new_image'] = './assets/img/thumb/'.$gbr['file_name'];
  		$conf['create_thumb'] = TRUE;
  		$conf['maintain_ratio'] = FALSE;
  		$conf['width'] = 300;
  		$conf['height'] = 200;

  		$this->load->library('image_lib', $conf);
  		$this->image_lib->initialize($conf);
  		$this->image_lib->resize();
  		$text1 = $this->db->escape_str($this->input->post('judul'));
  		$data = array(
  			'id' =>$this->input->post('id'),
  			'judul' =>$text1,
  			'content' =>$this->input->post('content'),
  			'status_blog' =>$this->input->post('status_blog'),
  			'gambar' =>$this->upload->data('file_name'),
  			'kategori' =>$this->input->post('kategori')

  		);

  		$where = array(
  			'id' =>$this->input->post('id'));			
  		$this->Pagemhs_md->update_blog($where,$data,'blogs');

  		redirect(base_url("admin/allpost"));
  	}
  }

  public function delete_slides($id){
  	$fact=$this->db->query('select * from slides where id="'.$id.'"');
  	$crut=$fact->result();

  	$path_to_file = './assets/img/slides/'.$crut[0]->gambar;
  	unlink($path_to_file);

  	$this->db->delete('slides', array('id'=>$id));

  	redirect('admin/allslider');
  }


  public function kategoripost() {
  	$data['kategori'] = $this->Pagemhs_md->ambil_kategori();
  	$this->load->view('admin/header-admin');
  	$this->load->view('admin/all-kategori',$data);
  	$this->load->view('admin/footer-admin');
  }
  public function edit_kategori(){
  	$id=$this->input->post('id_kategori');
  	$data = array(
  		'id' => $this->input->post('id_kategori'),
  		'nama' =>$this->input->post('nama'),
  		'level' => $this->input->post('level')
  	);

  	$where = array(
  		'id' => $id
  	);
  	$this->Admin_md->update_kategori($where,$data,'kategori');
  	redirect(base_url("admin/kategoripost")); 

  }
  public function tambah_kategori(){
  	$data=array('id'=>'',
  		'nama'=>$this->input->post('nama'),
  		'level'=>$this->input->post('level')
  	);
  	$this->db->insert('kategori',$data);

  	redirect('admin/kategoripost');
  }
  public function hapus_kategori($id){
  	$this->Admin_md->hapus_kategori($id,'kategori');
  	redirect('admin/kategoripost');
  }

  public function delete_post($id){
  	$fact=$this->db->query('select * from blogs where id="'.$id.'"');
  	$crut=$fact->result();

  	$path_to_file = './assets/img/'.$crut[0]->gambar;
  	unlink($path_to_file);
  	$path_to_file2 = './assets/img/thumb/'.$crut[0]->gambar;
  	unlink($path_to_file2);   

  	$this->Pagemhs_md->hapus_blog($id,'blogs');

  	redirect('Admin/allpost');
  }

  public function edit_post($id=null){
  	$penulis=$this->session->userdata("admin");
  	$data['edit_post'] = $this->Admin_md->ambil_edit_post($id,$penulis);
  	$data['kategori'] = $this->Pagemhs_md->ambil_kategori();
  	$this->load->view('admin/header-admin');
  	$this->load->view('admin/edit_post',$data);
  	$this->load->view('admin/footer-admin');
  }
  public function allhalaman() {




  	$data['halaman'] = $this->Admin_md->ambil_halaman();
  	$this->load->view('admin/header-admin');
  	$this->load->view('admin/all-halaman',$data);
  	$this->load->view('admin/footer-admin');
  }
  public function addhalaman() {

  	$this->load->view('admin/header-admin');
  	$this->load->view('admin/add-halaman');
  	$this->load->view('admin/footer-admin');
  }
  public function addpenelitian() {

    $this->load->view('admin/header-admin');
    $this->load->view('admin/add-penelitian');
    $this->load->view('admin/footer-admin');
  }

  public function input_penelitian() {
    $data=array(
      'nama'=>$this->input->post('nama'),
      'judul'=>$this->input->post('judul'),
      'jenis'=>$this->input->post('jenis'),
      'sumber_dana'=>$this->input->post('sumber_dana'),
      'alamat_journal'=>$this->input->post('alamat_journal'),
      'kategori'=>$this->input->post('kategori')
    );
    $this->db->insert('penelitian',$data);
    redirect('admin/allslider');
  }
  public function delete_penelitian($id){
      $this->db->delete('penelitian', array('id_penelitian'=>$id));
    redirect('Admin/allslider');

  }
  public function edit_penelitian(){
   

    $id=$this->input->post('id_penelitian');
    $data = array(
      'id_penelitian'=>$this->input->post('id_penelitian'),
      'nama'=>$this->input->post('nama'),
      'judul'=>$this->input->post('judul'),
      'jenis'=>$this->input->post('jenis'),
      'sumber_dana'=>$this->input->post('sumber_dana'),
      'alamat_journal'=>$this->input->post('alamat_journal')
    );

    $where=array('id_penelitian'=>$id);
    $this->Skripsi->update_penelitian($where,$data,'penelitian');
    redirect(base_url("admin/allslider"));
  }
  public function addpengabdian() {

    $this->load->view('admin/header-admin');
    $this->load->view('admin/add-pengabdian');
    $this->load->view('admin/footer-admin');
  }
  public function edit_halaman($id) {
  	$data['halaman'] = $this->Admin_md->ambil_edit_halaman($id);
  	$this->load->view('admin/header-admin');
  	$this->load->view('admin/edit-halaman',$data);
  	$this->load->view('admin/footer-admin');
  }
  public function proses_edit_halaman($id){
  	 $config['upload_path']          = './assets/berkas/';
    $config['allowed_types']        = 'pdf';
    $config['encrypt_name']= true;
    $slug = $this->input->post('judul');
    $diminke = str_replace(' ', '-', $slug);
    
    $this->load->library('upload', $config);
      $this->upload->initialize($config);
      $ini=$this->input->post('berkas_lama');
    if (!$this->upload->do_upload('berkas')){
      $data=array(
      'judul_hlm'=>$this->input->post('judul'),
      'isi_hlm'=>$this->input->post('isi'),
      'slug'=>$diminke,
      'berkas'=>$ini
    );

    $this->db->where('id_halaman', $id);
    $this->db->update('halaman',$data);
    redirect('admin/allhalaman');

    }else{
      $path_to_file = './assets/berkas/'.$this->input->post('berkas_lama');
          unlink($path_to_file);     
      $data = $this->upload->data();

      $data=array(
      'judul_hlm'=>$this->input->post('judul'),
      'isi_hlm'=>$this->input->post('isi'),
      'slug'=>$diminke,
      'berkas'=>$data['file_name']
    );
  	$this->db->where('id_halaman', $id);
  	$this->db->update('halaman',$data);
  	redirect('admin/allhalaman');

  }
}
  

  public function halaman_file(){
    $config['upload_path']          = './assets/berkas/';
    $config['allowed_types']        = 'pdf';
    $config['encrypt_name']= true;
    $slug = $this->input->post('judul');
    $diminke = str_replace(' ', '-', $slug);
    
    $this->load->library('upload', $config);
      $this->upload->initialize($config);
      $ini='Kosong';
    if (!$this->upload->do_upload('berkas')){
      $data=array(
      'judul_hlm'=>$this->input->post('judul'),
      'isi_hlm'=>$this->input->post('isi'),
      'slug'=>$diminke,
      'berkas'=>$ini);

     $this->db->insert('halaman',$data);
    redirect('admin/allhalaman');

    }else{

      $data = $this->upload->data();

      $data=array(
      'judul_hlm'=>$this->input->post('judul'),
      'isi_hlm'=>$this->input->post('isi'),
      'slug'=>$diminke,
      'berkas'=>$data['file_name']
    );

     $this->db->insert('halaman',$data);
    redirect('admin/allhalaman');
    }
  }


  public function tambah_parent(){
  	$data=array(
  		'nama_parent'=>$this->input->post('nama')
  	);
  	$this->db->insert('parent',$data);
  	redirect('admin/tataletak');

  }
  public function allslider() {
    
    $data['penelitian']=$this->Skripsi->ambil_penelitian()->result();
  	$data['pengabdian']=$this->Skripsi->ambil_pengabdian()->result();
    $this->load->view('admin/header-admin');
  	$this->load->view('admin/penelitian',$data);
  	$this->load->view('admin/footer-admin');
  }
  public function allagenda() {

  	$config['base_url']=base_url()."admin/allagenda";
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


  	$data['agenda'] = $this->Admin_md->ambil_agenda($config);
  	$this->load->view('admin/header-admin');
  	$this->load->view('admin/all-agenda',$data);
  	$this->load->view('admin/footer-admin');
  }
  public function addagenda() {

  	$this->load->view('admin/header-admin');
  	$this->load->view('admin/add-agenda');
  	$this->load->view('admin/footer-admin');
  }

  public function kirim_agenda(){
  	$slug = $this->input->post('judul');

  	$ini=$this->session->userdata("admin");
  	$diminke = str_replace(' ', '-', $slug);

  	$data = array(
  		'id' =>'',
  		'judul' =>$this->input->post('judul'),
  		'content' => $this->input->post('isi'),
  		'gambar' =>'',
  		'slug' =>  $diminke.date("Y-m-dH-i-s", strftime(date("Y-m-dH-i-s")) + (2*60 * 60)),
  		'viewer' =>  '0',
  		'suka'   => '0',
  		'status_blog' =>$this->input->post('status_blog'),
  		'penulis' => $ini,	
  		'komentar'   => '0',
  		'created_at' => date("Y-m-d H:i:s"),
  		'updated_at' => $this->input->post('tgl_agenda'),
  		'kategori'=> '4'			
  	);
  	$this->Pagemhs_md->buat_agenda($data,'blogs');
  	redirect('Admin/allagenda');  

  }

  public function hapus_agenda($id){
  	$this->db->delete('blogs', array('id'=>$id));

  	redirect('Admin/allagenda');
  }


  public function addslider() {

  	$this->load->view('admin/header-admin');
  	$this->load->view('admin/add-slider');
  	$this->load->view('admin/footer-admin');
  }
  public function tambah_slider(){
  	$config['upload_path'] = './assets/img/slides/';
  	$config['allowed_types'] = 'gif|jpg|png|bmp|jpeg';
  	$config['max_size']    = '0';
  	$config['max_width']  = '0';
  	$config['max_height']  = '0';
  	$config['encrypt_name']= true;
  	$this->upload->initialize($config);
  	if(!$this->upload->do_upload('gambar')){
  	}else{
  		$gbr = $this->upload->data();
  		$data = $this->upload->data();
  		$config['image_library'] = 'gd2';
  		$config['quality']= '100';
  		$config['source_image'] = './assets/img/slides/'.$gbr['file_name'];
  		$config['create_thumb'] = FALSE;
  		$config['maintain_ratio'] = FALSE;
  		$config['width']         = 740;
  		$config['height']       = 680;
  		$this->load->library('image_lib', $config);
  		$this->image_lib->initialize($config);
  		$this->image_lib->resize();


  		$data = array(
  			'id' =>'',
  			'status' =>$this->input->post('judul'),
  			'caption' => $this->input->post('caption'),
  			'gambar' =>$data['file_name']		
  		);
         $this->db->insert('slides',$data);//memasukan data ke database
         redirect(base_url("admin/allslider")); 
     }
 }

 public function edit_slider(){
 	$config['upload_path'] = './assets/img/slides/';
 	$config['allowed_types'] = 'gif|jpg|png|bmp|jpeg';
 	$config['max_size']    = '0';
 	$config['max_width']  = '0';
 	$config['max_height']  = '0';
 	$config['encrypt_name']= true;
 	$this->upload->initialize($config);
 	if(!$this->upload->do_upload('gambar')){
 		$data = array(
 			'id' =>$this->input->post('id'),
 			'status' =>$this->input->post('judul'),
 			'caption' => $this->input->post('caption'),
 			'gambar' => $this->input->post('gambar_lama')		
 		);

 		$where = array(
 			'id' =>$this->input->post('id'));			
 		$this->Admin_md->update_slides($where,$data,'slides');

 	}else{
 		$path_to_file = './assets/img/slides/'.$this->input->post('gambar_lama');
 		unlink($path_to_file);

 		$gbr = $this->upload->data();
 		$data = $this->upload->data();
 		$config['image_library'] = 'gd2';
 		$config['quality']= '100';
 		$config['source_image'] = './assets/img/slides/'.$gbr['file_name'];
 		$config['create_thumb'] = FALSE;
 		$config['maintain_ratio'] = FALSE;
 		$config['width']         = 740;
 		$config['height']       = 680;
 		$this->load->library('image_lib', $config);
 		$this->image_lib->initialize($config);
 		$this->image_lib->resize();


 		$data = array(
 			'id' =>$this->input->post('id'),
 			'status' =>$this->input->post('judul'),
 			'caption' => $this->input->post('caption'),
 			'gambar' =>$data['file_name']		
 		);
 		$where = array(
 			'id' =>$this->input->post('id'));			
 		$this->Admin_md->update_slides($where,$data,'slides');

 		redirect(base_url("admin/allslider")); 
 	}
 }



 public function tataletak() {
 	$data['hlm']=$this->Admin_md->ambil_halaman();
 	$data['kategori'] = $this->Admin_md->ambil_kat();
 	$data['parent'] = $this->Admin_md->ambil_parent();
 	$data['navbar'] = $this->Admin_md->ambil_tata();
  $data['dropdown']=$this->Admin_md->ambil_tata();
  $data['sub2']=$this->Admin_md->ambil_tata();
    $data['sub3']=$this->Admin_md->ambil_tata();
 	$this->load->view('admin/header-admin');
 	$this->load->view('admin/tataletak',$data);
 	$this->load->view('admin/footer-admin');
 }
 public function simpan_tata($id,$ket){
 
 		$que = $this->db->get('tata');
 		$query = $que->result();
 		foreach ($query as $q) {
 			if($q->urut == $this->input->post('urut')){
 				?>
 				<script>

 					alert('Nomor Urut Sudah Digunakan');

 					history.go(-1);

 				</script>
 				<?php	
 				return true;
 			}
 		}
 		foreach ($query as $q) {
  		# code...
 			if($id == $q->id_menu && $ket == $q->keterangan){
 				if($this->input->post('parent') != "-- Tidak Ada Parent --"){
 					if($this->input->post('urut') != "-- Tidak Tampil --"){
 						$data=array(
 							'id_menu'=>$id,
 							'nama_menu'=>$this->input->post('nama'),
 							'status_parent'=> 1,
 							'nama_parent'=>$this->input->post('parent'),
 							'urut'=>0,
 							'keterangan'=>$this->input->post('ket'),
 							'status_menu'=>0
 						);
 					}else{
 						$data=array(
 							'id_menu'=>$id,
 							'nama_menu'=>$this->input->post('nama'),
 							'status_parent'=> 1,
 							'nama_parent'=>$this->input->post('parent'),
 							'urut'=>0,
 							'keterangan'=>$this->input->post('ket'),
 							'status_menu'=>0
 						);
 					}
 				}else{
 					if($this->input->post('urut') != "-- Tidak Tampil --"){
 						$data=array(
 							'id_menu'=>$id,
 							'nama_menu'=>$this->input->post('nama'),
 							'status_parent'=> 0,
 							'nama_parent'=>$this->input->post('parent'),
 							'urut'=>$this->input->post('urut'),
 							'keterangan'=>$this->input->post('ket'),
 							'status_menu'=>1
 						);
 					}else{
 						$data=array(
 							'id_menu'=>$id,
 							'status_parent'=> 0,
 							'nama_menu'=>$this->input->post('nama'),
 							'nama_parent'=>$this->input->post('parent'),
 							'urut'=>0,
 							'keterangan'=>$this->input->post('ket'),
 							'status_menu'=>0
 						);
 					}
 				}
 				$this->db->where('id_menu',$id);
 				$this->db->where('keterangan',$ket);
 				$this->db->update('tata',$data);

 				redirect('admin/tataletak');
 				return true;
 			}
 		}
 			if($this->input->post('urut') == "-- Tidak Tampil --" && $this->input->post('parent') == "-- Tidak Ada Parent --"){
 		?>
 		<script>

 			alert('Data Tidak Boleh Kosong');

 			history.go(-1);

 		</script>
 		<?php	
 		
 	}else{
 		if($this->input->post('parent') != "-- Tidak Ada Parent --"){
 			if($this->input->post('urut') != 0){
 				$data=array(
 					'id_menu'=>$id,
 					'nama_menu'=>$this->input->post('nama'),
 					'status_parent'=> 1,
 					'nama_parent'=>$this->input->post('parent'),
 					'urut'=>0,
 					'keterangan'=>$this->input->post('ket'),
 					'status_menu'=>0
 				);
 			}else{
 				$data=array(
 					'id_menu'=>$id,
 					'nama_menu'=>$this->input->post('nama'),
 					'status_parent'=> 1,
 					'nama_parent'=>$this->input->post('parent'),
 					'urut'=>0,
 					'keterangan'=>$this->input->post('ket'),
 					'status_menu'=>0
 				);
 			}
 		}else{
 			if($this->input->post('urut') != 0){
 				$data=array(
 					'id_menu'=>$id,
 					'nama_menu'=>$this->input->post('nama'),
 					'status_parent'=> 0,
 					'nama_parent'=>$this->input->post('parent'),
 					'urut'=>$this->input->post('urut'),
 					'keterangan'=>$this->input->post('ket'),
 					'status_menu'=>1
 				);
 			}else{
 				$data=array(
 					'id_menu'=>$id,
 					'status_parent'=> 0,
 					'nama_menu'=>$this->input->post('nama'),
 					'nama_parent'=>$this->input->post('parent'),
 					'urut'=>0,
 					'keterangan'=>$this->input->post('ket'),
 					'status_menu'=>0
 				);
 			}
 		}

 		$this->db->insert('tata',$data);

 		redirect('admin/tataletak');
 	}
 }
 public function simpan_tata_p($id){
 	
 		$que = $this->db->get('tata');
 		$query = $que->result();
 		foreach ($query as $q) {
 			if($q->urut == $this->input->post('urut')){
 				?>
 				<script>

 					alert('Nomor Urut Sudah Digunakan');

 					history.go(-1);

 				</script>
 				<?php	
 				return true;
 			}
 		}
 		$ket = $this->input->post('ket');
 		foreach ($query as $q) {
  		# code...
 			if($id == $q->id_menu && $ket == $q->keterangan){
 				
 				if($this->input->post('urut') != "-- Tidak Tampil --"){
 				$data=array(
 					'id_menu'=>$id,
 					'status_parent'=> 2,
 					'nama_menu'=>$this->input->post('nama'),
 					'nama_parent'=>$this->input->post('nama'),
 					'urut'=>$this->input->post('urut'),
 					'keterangan'=>$this->input->post('ket'),
 					'status_menu'=>1
 				);
 			}else{
 				$data=array(
 					'id_menu'=>$id,
 					'status_parent'=> 0,
 					'nama_menu'=>$this->input->post('nama'),
 					'nama_parent'=>$this->input->post('nama'),
 					'urut'=>0,
 					'keterangan'=>$this->input->post('ket'),
 					'status_menu'=>0
 				);
 			}
 				
 				$this->db->where('id_menu',$id);
 				$this->db->where('keterangan',$ket);
 				$this->db->update('tata',$data);

 				redirect('admin/tataletak');
 				return true;
 			}
 		}
 	if($this->input->post('urut') != "-- Tidak Tampil --"){
 		$data=array(
 			'id_menu'=>$id,
 			'status_parent'=> 2,
 			'nama_menu'=>$this->input->post('nama'),
 			'nama_parent'=>$this->input->post('nama'),
 			'urut'=>$this->input->post('urut'),
 			'keterangan'=>$this->input->post('ket'),
 			'status_menu'=>1
 		);
 		$this->db->insert('tata',$data);

 		redirect('admin/tataletak');
 	}else{
 		?>
 		<script>

 			alert('Data Tidak Boleh Kosong');

 			history.go(-1);

 		</script>
 		<?php	
 	}
 }
 public function hapus_tata_p($id){
 	$this->Admin_md->hapus_parent($id,'parent');
 	redirect('admin/tataletak');
 }
  public function hapus_halaman($id){
 $fact=$this->db->query('select * from halaman where id_halaman="'.$id.'"');
        $crut=$fact->result();

        $path_to_file = './assets/berkas/'.$crut[0]->berkas;
        unlink($path_to_file);

 	$this->Admin_md->hapus_halaman($id);
 	redirect('admin/allhalaman');
 }

 public function dropdowns($id){
 	$output = $this->Admin_md->drop($id);
 	echo json_encode($output);
 }
  public function dropdown($id){
  $output = $this->Admin_md->drop($id);
  echo json_encode($output);
 }
  public function mahasiswa() {
  $data['mahasiswa'] = $this->Admin_md->ambil_mhs();
  $this->load->view('admin/header-admin');
  $this->load->view('admin/mahasiswa',$data);
  $this->load->view('admin/footer-admin');
}
public function tambah_mahasiswa(){
 $nim = $this->input->post('nim');
 $password = $this->input->post('password');
 $nama = $this->input->post('nama');
 $data = array(
  'nim' => $nim,
  'nama' => $nama,
  'password' => md5($password));
 $this->db->insert('mahasiswa',$data);
 redirect('admin/mahasiswa');

}
public function ambil_edit_mhs($id) {
  $data['mhs'] = $this->Admin_md->ambil_edit_mhs($id);
  $this->load->view('admin/header-admin');
  $this->load->view('admin/edit-mhs',$data);
  $this->load->view('admin/footer-admin');
}
public function proses_edit_mahasiswa($id){
  if($this->input->post('password')==null){
    $data=array(
      'nama'=>$this->input->post('nama'),
    );
  }else{
    $data=array(
      'nama'=>$this->input->post('nama'),
      'password'=>md5($this->input->post('password')),
    );
  }
  
  $this->db->where('nim', $id);
  $this->db->update('mahasiswa',$data);
  redirect('admin/mahasiswa');
}
public function hapus_mhs($id){
  $this->db->where('nim', $id);
  $this->db->delete('mahasiswa');
  redirect('admin/mahasiswa');
}
public function tambah_sub2($id,$ket){

  $que = $this->db->get('tata');
  $query = $que->result();
  foreach ($query as $q) {
      # code...
    if($id == $q->id_menu && $ket == $q->keterangan){


      $data=array(
        'status_parent'=> 3,
        'nama_parent'=>'sub2',
        'urut'=>0,
        'status_menu'=>2,
        'parent2'=>$this->input->post('id')
      );
      

      $this->db->where('id_menu',$id);
      $this->db->where('keterangan',$ket);
      $this->db->update('tata',$data);

      redirect('admin/tataletak');
      return true;
    }
  }
   $data=array(
        'id_menu'=>$id,
        'status_parent'=> 3,
        'nama_menu'=>$this->input->post('nama'),
        'nama_parent'=>'sub2',
        'urut'=>0,
        'keterangan'=>$ket,
        'status_menu'=>2,
        'parent2'=>$this->input->post('id')
      );
  $this->db->insert('tata',$data);

  redirect('admin/tataletak');
  
}
public function tambah_sub3($id,$ket){

  $que = $this->db->get('tata');
  $query = $que->result();
  foreach ($query as $q) {
      # code...
    if($id == $q->id_menu && $ket == $q->keterangan){


      $data=array(
        'status_parent'=> 4,
        'nama_parent'=>'sub3',
        'urut'=>0,
        'status_menu'=>3,
        'parent3'=>$this->input->post('id')
      );
      

      $this->db->where('id_menu',$id);
      $this->db->where('keterangan',$ket);
      $this->db->update('tata',$data);

      redirect('admin/tataletak');
      return true;
    }
  }
   $data=array(
        'id_menu'=>$id,
        'status_parent'=> 4,
        'nama_menu'=>$this->input->post('nama'),
        'nama_parent'=>'sub3',
        'urut'=>0,
        'keterangan'=>$ket,
        'status_menu'=>3,
        'parent3'=>$this->input->post('id')
      );
  $this->db->insert('tata',$data);

  redirect('admin/tataletak');
  
}
public function hps_submenu($id){
  $this->db->where('id_tata_letak', $id);
  $this->db->delete('tata');
  redirect('admin/tataletak');
}
public function tambah_link($id){
  if($this->input->post('password')==null){
    $data=array(
      'link'=>$this->input->post('link')
    );
  }
  
  $this->db->where('id_tata_letak', $id);
  $this->db->update('tata',$data);
  redirect('admin/tataletak');
}
}