<?php
class Login extends CI_Controller {
	public $data = array();
	function __construct(){
		parent::__construct();
		$this->load->model('Pagemhs_md');
		
		$this->load->model('Admin_md');
	}

	function aksi_login(){
		$nim = $this->input->post('nim');
		$password = $this->input->post('password');
		$where = array(
		'nim' => $nim,
		'password' => md5($password));
		$cek = $this->Pagemhs_md->cek_login("mahasiswa",$where)->num_rows();
		
		if($cek > 0){
			$data_session = array(
				'nama' => $nim,
				'status' => "login"
				);

		$this->session->set_userdata($data_session);
		
			redirect(base_url('Pagemhs'));

		}else{
		  
			?>
			<script>

				alert('Gagal Login !');

				history.go(-1);

			</script>
			<?php 
		}}
	function aksi_login_admin(){

		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
		'username' => $username,
		'password' => md5($password));
		$cek = $this->Admin_md->cek_login("admin",$where)->num_rows();
		$fact=$this->db->query('select * from admin where username="'.$username.'"');
    	$crut=$fact->result();
		if($cek > 0){
			$data_session = array(
				'admin' => $crut[0]->id_admin,
				'status_admin' => "login_admin"
				);

		$this->session->set_userdata($data_session);
		
			redirect(base_url('admin'));

		}else{
		  
			?>
			<script>

				alert('Gagal Login !');

				history.go(-1);

			</script>
			<?php 
		}}
	public function login_admin() {
		
		$this->load->view('admin/login');
	}
	function logout(){
		
		$this->session->sess_destroy();
		redirect(base_url('/'));
	}
	function logout_admin(){
		
		$this->session->sess_destroy();
		redirect(base_url('login/login_admin'));
	}	

	}