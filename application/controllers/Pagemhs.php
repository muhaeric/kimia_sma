<?php
class Pagemhs extends CI_Controller {
	public $data = array();
	function __construct(){
		parent::__construct();
		$this->load->model('Blogs_md');
		$this->load->model('Pagemhs_md');
		$this->load->library('pagination');
		$this->load->helper('captcha');
		$this->load->library('upload');
		$this->load->helper('url');
		$this->load->model('Admin_md');
		$this->load->helper(array('form', 'url'));
		if($this->session->userdata('status') != "login"){
			redirect(base_url("/"));
			$this->session->set_userdata('username','1');
		}

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
	

	public function adminmhs() {

		$data['mantap']=$this->Pagemhs_md->count_pemberitahuan();
		$data['menu'] = $this->Blogs_md->get_menu();
		$ini=$this->session->userdata("nama");
		$data['nama_mhs'] = $this->Pagemhs_md->ambil_mhs();
		$data['h']= $this->Pagemhs_md->count_blogs($ini);
		$data['l']= $this->Pagemhs_md->count_suka($ini);
		$data['k']= $this->Pagemhs_md->count_komentar();
		$data['navbar']= $this->Admin_md->ambil_tata();
		$data['dropdown']=$this->Admin_md->ambil_tata();
		       $data['sub2isi'] = $this->Admin_md->ambil_tata();
		$data['sub3isi'] = $this->Admin_md->ambil_tata();
		$data['sub2'] = $this->Admin_md->md_sub2();
		$data['sub3'] = $this->Admin_md->md_sub3();
		$this->load->view('header', $data);
		$this->load->view('mhs/adminmhs', $data);
		$this->load->view('footer', $data);
	}


	public function kirim_agenda(){
			$slug = $this->input->post('judul');
		
		$ini=$this->session->userdata("nama");
		$slug_low = strtolower($slug);
		$diminke = preg_replace('/[^A-Za-z0-9-]+/', '-', $slug_low);

		$data = array(
			'id' =>'',
			'judul' =>$this->input->post('judul'),
			'content' => $this->input->post('content'),
			'gambar' =>'',
			'slug' =>  $diminke.date("Y-m-dH-i-s", strftime(date("Y-m-dH-i-s")) + (2*60 * 60)),
			'viewer' =>  '0',
			'suka'   => '0',
			'status_blog' =>$this->input->post('status'),
			'penulis' => $ini,	
			'komentar'   => '0',
			'created_at' => date("Y-m-d H:i:s"),
			'updated_at' => $this->input->post('tgl_agenda'),
			'kategori'=> '4'			
		);
		$this->Pagemhs_md->buat_agenda($data,'blogs');
		redirect('Pagemhs/allagendamhs');  

	}
	function update_agenda(){
		$slug = $this->input->post('judul');
		$ini=$this->session->userdata("nama");
		$diminke = str_replace(' ', '-', $slug);
		$id = $this->input->post('id');
		$data = array(
			'id' => $this->input->post('id'),
			'judul' =>$this->input->post('judul'),
			'content' => $this->input->post('content'),
			'gambar' =>'',
			'slug' =>  $diminke.date("Y-m-dH-i-s", strftime(date("Y-m-dH-i-s")) + (2*60 * 60)),
			'viewer' =>  '0',
			'suka'   => '0',
			'status_blog' =>$this->input->post('status'),
			'penulis' => $ini,	
			'komentar'   => '0',
			'created_at' => date("Y-m-d H:i:s"),
			'updated_at' => $this->input->post('tgl_agenda'),
			'kategori'=> '4'
		);

		$where = array(
			'id' => $id
		);
		$this->Pagemhs_md->update_agenda($where,$data,'blogs');
		redirect(base_url("Pagemhs/allagendamhs")); 
	}
/*
    public function kirim_post(){
  	$config['upload_path']          = './assets/img/';
	$config['allowed_types']        = 'gif|jpg|png';
	$config['max_size']             = 10000;
	$config['max_width']            = 10234;
	$config['max_height']           = 7684;
    $config['encrypt_name']= true;
	$this->upload->initialize($config);
	$this->load->library('upload', $config);
	$this->upload->do_upload('gambar');
	$data=$this->upload->data();
          //mengambil data di form
         $slug = $this->input->post('judul');
         $diminke = str_replace(' ', '-', $slug);
      
         $data = array(
						'id' =>'',
						'judul' =>$this->input->post('judul'),
						'content' => $this->input->post('content'),
						'gambar' =>$data['file_name'],
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
         $data1 = array(
         'id_pemberitahuan'	=>'',
         'nim' => $this->session->userdata("nama"),
         'kategori_pemberitahuan' => '1',
         'slug_pemberitahuan' => $diminke.date("Y-m-dH-i-s"),
         'tgl_pemberitahuan' => date("Y-m-d H:i:s"),
         'status' => '0'
         );
         $this->Pagemhs_md->kirim_pemberitahuan_komentar($data1,'pemberitahuan');	
          $this->Pagemhs_md->posting_blog($data); //memasukan data ke database
          redirect(base_url("Pagemhs/allpostmhs"));   
  }
  */
  public function aksi_file(){
		$config['upload_path']          = './assets/berkas/';
		$config['allowed_types']        = 'pdf';
  		$config['encrypt_name']= true;
		
		$this->load->library('upload', $config);
  		$this->upload->initialize($config);
    		$slug = $this->input->post('judul');
		
		$slug_low = strtolower($slug);
		$diminke = preg_replace('/[^A-Za-z0-9-]+/', '-', $slug_low);
		if (!$this->upload->do_upload('berkas')){
			$data= array(
			'id' =>'',
  			'judul' =>$this->input->post('judul'),
  			'content' => $this->input->post('content'),
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

			$data1 = array(
  			'id_pemberitahuan'	=>'',
  			'nim' => $this->session->userdata("nama"),
  			'kategori_pemberitahuan' => '1',
  			'slug_pemberitahuan' => $diminke.date("Y-m-dH-i-s"),
  			'tgl_pemberitahuan' => date("Y-m-d H:i:s"),
  			'status' => '0'
  		);

  		$this->Pagemhs_md->kirim_pemberitahuan_komentar($data1,'pemberitahuan');	


			$this->Pagemhs_md->posting_blog($data);
			redirect(base_url('Pagemhs/allpostmhs'));
			
		}else{

  		$datas = $this->upload->data();

			$data= array(
			'id' =>'',
  			'judul' =>$this->input->post('judul'),
  			'content' => $this->input->post('content'),
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

			$data1 = array(
  			'id_pemberitahuan'	=>'',
  			'nim' => $this->session->userdata("nama"),
  			'kategori_pemberitahuan' => '1',
  			'slug_pemberitahuan' => $diminke.date("Y-m-dH-i-s"),
  			'tgl_pemberitahuan' => date("Y-m-d H:i:s"),
  			'status' => '0'
  		);

  		$this->Pagemhs_md->kirim_pemberitahuan_komentar($data1,'pemberitahuan');	


			$this->Pagemhs_md->posting_blog($data);
			redirect(base_url('Pagemhs/allpostmhs'));
		}
	}


	public function edit_file(){
				$config['upload_path']          = './assets/berkas/';
				$config['allowed_types']        = 'pdf';
  				$config['encrypt_name']= true;
		
				$this->load->library('upload', $config);
  				$this->upload->initialize($config);

				if(!$this->upload->do_upload('berkas')){

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
					redirect(base_url("Pagemhs/allpostmhs")); 

				}else{
					$path_to_file = './assets/berkas/'.$this->input->post('gambar_lama');
					unlink($path_to_file);            

					$datas = $this->upload->data();
					$text1 = $this->db->escape_str($this->input->post('judul'));
					$data = array(
						'id' =>$this->input->post('id'),
						'judul' =>$text1,
						'content' =>$this->input->post('content'),
						'status_blog' =>$this->input->post('status_blog'),
						'gambar' =>$datas['file_name'],
						'kategori' =>$this->input->post('kategori')

					);

					$where = array(
						'id' =>$this->input->post('id'));			
					$this->Pagemhs_md->update_blog($where,$data,'blogs');

					redirect(base_url("Pagemhs/allpostmhs"));
				}
			}



  public function post_pros(){
  	$config['upload_path'] = './assets/img/';
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
		$slug = $this->input->post('judul');
		
		$slug_low = strtolower($slug);
		$diminke = preg_replace('/[^A-Za-z0-9-]+/', '-', $slug_low);

  		$data = array(
  			'id' =>'',
  			'judul' =>$this->input->post('judul'),
  			'content' => $this->input->post('content'),
  			'gambar' =>$data['file_name'],
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
  		$data1 = array(
  			'id_pemberitahuan'	=>'',
  			'nim' => $this->session->userdata("nama"),
  			'kategori_pemberitahuan' => '1',
  			'slug_pemberitahuan' => $diminke.date("Y-m-dH-i-s"),
  			'tgl_pemberitahuan' => date("Y-m-d H:i:s"),
  			'status' => '0'
  		);
  		$this->Pagemhs_md->kirim_pemberitahuan_komentar($data1,'pemberitahuan');	
          $this->Pagemhs_md->posting_blog($data); //memasukan data ke database
          redirect(base_url("Pagemhs/allpostmhs")); 
      }
  }
  public function kirim_komentar(){
  	
  	$ini=$this->session->userdata("nama");
  	$clug=$this->input->post('clug');
  	$token=$ini.date("Y-m-dH-i-s");
  	$data = array(
  		'id_komentar' =>'',
  		'komentar' =>$this->input->post('isi-komentar'),
  		'id_blogs' => $this->input->post('id_blogs'),
  		'id_user' =>$ini,
  		'created_at' => date("Y-m-d H:i:s"),
  		'updated_at' => date("Y-m-d H:i:s"),
  		'token' =>$token

  	);
  	$data1 = array(
  		'id_pemberitahuan' =>'',
  		'nim' => $this->input->post('penulis'),
  		'kategori_pemberitahuan'=>'3',
  		'slug_pemberitahuan'=>$clug,
  		'tgl_pemberitahuan' => date("Y-m-d H:i:s"),
  		'status'=>'0',
  		'token'=>$token

  	);
  	if($ini==$this->input->post('penulis')){

  	}else {

  		$this->Pagemhs_md->kirim_pemberitahuan_komentar($data1,'pemberitahuan');
  	}
  	$this->Pagemhs_md->kirim_komentar($data,'komentar');
  	redirect(base_url("single/".$clug));  
  }
  public function hapus_komentar(){
  	$where=$this->input->get('id_komentar');
  	$slugk=$this->input->get('slugk');
  	$token=$this->input->get('token');

  	$this->db->delete('pemberitahuan', array('token'=>$token));
  	$this->Pagemhs_md->hapus_komentar($where,'komentar');
  	redirect('single/'.$slugk);
  }
/*
  public function blog_edit(){
        $config['upload_path'] = './assets/img/';
        $config['allowed_types'] = 'gif|jpg|png|bmp|jpeg';
        $config['max_size']    = '10000';
        $config['max_width']  = '0';
        $config['max_height']  = '0';
        $config['overwrite'] = true;
        $config['encrypt_name']= true;
        $this->upload->initialize($config);

                if ( ! $this->upload->do_upload('gambar'))
                {

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
						print_r($data);
						$where = array(
			        	'id' =>$this->input->post('id'));			
			            $this->Pagemhs_md->update_blog($where,$data,'blogs');
			           redirect(base_url("Pagemhs/allpostmhs"));  
			    }
                else
                {

                $path_to_file = './assets/img/'.$this->input->post('gambar_lama');
				unlink($path_to_file);


                  $gbr = $this->upload->data();
    			$data = $this->upload->data();
    			$config['image_library'] = 'gd2';
    			$config['quality']= '70';
			    $config['source_image'] = './assets/img/'.$gbr['file_name'];
			    $config['create_thumb'] = FALSE;
			    $config['maintain_ratio'] = FALSE;
			    $config['width']         = 640;
			    $config['height']       = 480;
			 	$this->load->library('image_lib', $config);
			    $this->image_lib->resize();
				$this->image_lib->initialize($config);
		
                        $this->load->model('Pagemhs_md');

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
    		
    		redirect(base_url("Pagemhs/allpostmhs"));
			}
			}
*/
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
					redirect(base_url("Pagemhs/allpostmhs")); 

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

					redirect(base_url("Pagemhs/allpostmhs"));
				}
			}




			public function delete($id){
				$fact=$this->db->query('select * from blogs where id="'.$id.'"');
				$crut=$fact->result();

				$path_to_file = './assets/img/'.$crut[0]->gambar;
				unlink($path_to_file);
				$path_to_file2 = './assets/img/thumb/'.$crut[0]->gambar;
				unlink($path_to_file2);   

				$this->db->delete('pemberitahuan', array('slug_pemberitahuan'=>$crut[0]->slug));

				$this->db->delete('suka', array('id_blogs'=>$id));

				$this->Pagemhs_md->hapus_blog($id,'blogs');

				redirect('Pagemhs/allpostmhs');
			}

			public function hapus_agenda($id){
				$fact=$this->db->query('select * from blogs where id="'.$id.'"');
				$crut=$fact->result();

				$this->db->delete('pemberitahuan', array('slug_pemberitahuan'=>$crut[0]->slug));

				$this->db->delete('suka', array('id_blogs'=>$id));

				$this->Pagemhs_md->hapus_agenda($id,'blogs');
				redirect('Pagemhs/allagendamhs');
			}


			public function pemberitahuanmhs() {
				$data['mantap']=$this->Pagemhs_md->count_pemberitahuan();
				$data['menu'] = $this->Blogs_md->get_menu();
				$data['navbar']= $this->Admin_md->ambil_tata();
				$ini=$this->session->userdata("nama");
				$data['ambil_pemberitahuan']= $this->Pagemhs_md->ambil_pemberitahuan();
				$data['dropdown']=$this->Admin_md->ambil_tata();
				       $data['sub2isi'] = $this->Admin_md->ambil_tata();
		$data['sub3isi'] = $this->Admin_md->ambil_tata();
		$data['sub2'] = $this->Admin_md->md_sub2();
		$data['sub3'] = $this->Admin_md->md_sub3();
				$this->Pagemhs_md->update_pemberitahuan($ini,'pemberitahuan');
				$this->load->view('header', $data);
				$this->load->view('mhs/pemberitahuanmhs', $data);
				$this->load->view('footer', $data);
			}

			public function allpostmhs() {
				$data['mantap']=$this->Pagemhs_md->count_pemberitahuan();
				$data['menu'] = $this->Blogs_md->get_menu();
				$data['navbar']= $this->Admin_md->ambil_tata();
				$data['dropdown']=$this->Admin_md->ambil_tata();
				$ini=$this->session->userdata("nama");
				$data['tampil_post_session'] = $this->Pagemhs_md->ambil_post_session($ini)->result();
				       $data['sub2isi'] = $this->Admin_md->ambil_tata();
		$data['sub3isi'] = $this->Admin_md->ambil_tata();
		$data['sub2'] = $this->Admin_md->md_sub2();
		$data['sub3'] = $this->Admin_md->md_sub3();
				$this->load->view('header', $data);
				$this->load->view('mhs/allpostmhs', $data);
				$this->load->view('footer', $data);
			}
			public function addpostmhs() {
				$data['menu'] = $this->Blogs_md->get_menu();
				$data['mantap']=$this->Pagemhs_md->count_pemberitahuan();
				$data['navbar']= $this->Admin_md->ambil_tata();
				$data['dropdown']=$this->Admin_md->ambil_tata();
				$data['kategori'] = $this->Pagemhs_md->ambil_kategori();
				       $data['sub2isi'] = $this->Admin_md->ambil_tata();
		$data['sub3isi'] = $this->Admin_md->ambil_tata();
		$data['sub2'] = $this->Admin_md->md_sub2();
		$data['sub3'] = $this->Admin_md->md_sub3();
				$this->load->view('header', $data);
				$this->load->view('mhs/addpostmhs', $data);
				$this->load->view('footer', $data);
			}
			public function editpostmhs($id = null) {
				$data['menu'] = $this->Blogs_md->get_menu();
				$data['mantap']=$this->Pagemhs_md->count_pemberitahuan();
				$data['kategori'] = $this->Pagemhs_md->ambil_kategori();
				$data['navbar']= $this->Admin_md->ambil_tata();
				$data['dropdown']=$this->Admin_md->ambil_tata();
				       $data['sub2isi'] = $this->Admin_md->ambil_tata();
		$data['sub3isi'] = $this->Admin_md->ambil_tata();
		$data['sub2'] = $this->Admin_md->md_sub2();
		$data['sub3'] = $this->Admin_md->md_sub3();
				$penulis=$this->session->userdata("nama");
				$data['edit_post'] = $this->Pagemhs_md->ambil_edit_post($id,$penulis);
				$this->load->view('header', $data);
				$this->load->view('mhs/editpostmhs', $data);
				$this->load->view('footer', $data);
			}
			public function allagendamhs() {
				$data['mantap']=$this->Pagemhs_md->count_pemberitahuan();
				$data['menu'] = $this->Blogs_md->get_menu();
				$data['agenda'] = $this->Pagemhs_md->ambil_agenda();
				$data['dropdown']=$this->Admin_md->ambil_tata();
				$data['navbar']= $this->Admin_md->ambil_tata();
				       $data['sub2isi'] = $this->Admin_md->ambil_tata();
		$data['sub3isi'] = $this->Admin_md->ambil_tata();
		$data['sub2'] = $this->Admin_md->md_sub2();
		$data['sub3'] = $this->Admin_md->md_sub3();
				$this->load->view('header', $data);
				$this->load->view('mhs/allagendamhs', $data);
				$this->load->view('footer', $data);
			}
			public function addagendamhs() {
				$data['menu'] = $this->Blogs_md->get_menu();
				$data['mantap']=$this->Pagemhs_md->count_pemberitahuan();
				$data['navbar']= $this->Admin_md->ambil_tata();
				$data['dropdown']=$this->Admin_md->ambil_tata();
				       $data['sub2isi'] = $this->Admin_md->ambil_tata();
		$data['sub3isi'] = $this->Admin_md->ambil_tata();
		$data['sub2'] = $this->Admin_md->md_sub2();
		$data['sub3'] = $this->Admin_md->md_sub3();
				$this->load->view('header', $data);
				$this->load->view('mhs/addagendamhs', $data);
				$this->load->view('footer', $data);
			}
			public function editagendamhs($id) {
				$data['mantap']=$this->Pagemhs_md->count_pemberitahuan();
				$data['menu'] = $this->Blogs_md->get_menu();
				$data['navbar']= $this->Admin_md->ambil_tata();
				$data['dropdown']=$this->Admin_md->ambil_tata();
				$penulis=$this->session->userdata("nama");
				$data['edit_post'] = $this->Pagemhs_md->ambil_edit_post($id,$penulis);
				       $data['sub2isi'] = $this->Admin_md->ambil_tata();
		$data['sub3isi'] = $this->Admin_md->ambil_tata();
		$data['sub2'] = $this->Admin_md->md_sub2();
		$data['sub3'] = $this->Admin_md->md_sub3();
				$this->load->view('header', $data);
				$this->load->view('mhs/editagendamhs', $data);
				$this->load->view('footer', $data);
			}

		}

		?>