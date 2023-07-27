<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
		$this->load->library('form_validation');
        if (!$this->session->userdata('username')) {
            redirect('auth');
        }else {
            $role = $this->session->userdata('role');
            if($role != '1'){
                $this->session->set_flashdata('message', '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Akses Terlarang.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
                ');
                redirect('berita');
            }
        }
    }
	public function index()
	{
            $data['judul'] = 'Halaman CMS';
            $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
            $kecuali = $data['user']['id'];
            //$data['admin'] = $this->db->get('user')->result_array();
            $query = $this->db->query("SELECT * FROM user WHERE id NOT IN ($kecuali)");
            $data['admin'] = $query->result_array();
            $this->load->view('templates/cms_header',$data);
            $this->load->view('templates/cms_sidebar');
            $this->load->view('templates/cms_topbar');
            $this->load->view('utama/admin',$data);
            $this->load->view('templates/cms_footer');
      
        

	}

	public function tambah()
	{

		$this->form_validation->set_rules(
            'username',
            'Username',
            'required|trim|is_unique[user.username]',
            array(
                'required' => 'Username tidak boleh kosong!',
                'is_unique' => 'Username yang digunakan telah terdaftar!'
            )
        );
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', array('required' => 'Field tidak boleh kosong',)); 

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Halaman CMS';
			$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
			$data['admin'] = $this->db->get('user')->result_array();
			$this->load->view('templates/cms_header',$data);
			$this->load->view('templates/cms_sidebar');
			$this->load->view('templates/cms_topbar');
			$this->load->view('utama/admin',$data);
			$this->load->view('templates/cms_footer');
        } else {
            $data = [
                'username' => htmlspecialchars($this->input->post('username')),
                'nama' => htmlspecialchars($this->input->post('nama')),
                'password' => password_hash('admin', PASSWORD_DEFAULT),
                'role' => htmlspecialchars($this->input->post('role'))
            ];
            $this->db->insert('user',$data);
            $this->session->set_flashdata('message', '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            User berhasil dibuat.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
            ');
            redirect('admin');
        }
	}

    public function hapus($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user');
        $this->session->set_flashdata('message', '
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                    User berhasil dihapus.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    ');
        redirect('admin');
    }

    public function ubah($id)
    {
        $data['judul'] = 'Halaman CMS';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['admin'] = $this->db->get_where('user',['id'=> $id])->row_array();
        $data['role'] = ['1','2'];

        
        $this->form_validation->set_rules('username', 'username', 'required|trim');
        $this->form_validation->set_rules('nama', 'nama', 'required|trim');
        $this->form_validation->set_rules('role', 'role', 'required|trim');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/cms_header',$data);
            $this->load->view('templates/cms_sidebar');
            $this->load->view('templates/cms_topbar');
            $this->load->view('form/editadmin',$data);
            $this->load->view('templates/cms_footer');
        } else {
            $role = $this->input->post('role');
            $id = $this->input->post('id');
            $reset = $this->input->post('reset');
            
            if($reset=='1')
            {
                $password = password_hash('admin', PASSWORD_DEFAULT);
                $this->db->set('password', $password);
                $pesan = 'Password telah direset, ';
            }
            if($role <> $data['admin']['role'])
            {
                $this->db->set('role', $role);
                $pesan = $pesan.'Role berhasil ubah. ';
            }
            if(!$pesan)
            {
                $this->session->set_flashdata('message', '
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        Silahkan lakukan perubahan terlebih dahulu
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        ');
                redirect('admin/ubah/'.$id);
            }else{
                $this->db->where('id',$id);
                $this->db->update('user');
                $this->session->set_flashdata('message', '
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                        '. $pesan. ' 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        ');
                redirect('admin');
            }
            
        }
    }
}
