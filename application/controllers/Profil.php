<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
		$this->load->library('form_validation');
        if (!$this->session->userdata('username')) {
            redirect('auth');
        }
    }
	public function index()
	{
        $this->load->model('User_model');
        $data['judul'] = 'My Profil CMS';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', array('required' => 'Nama tidak boleh kosong!'));


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/cms_header',$data);
            $this->load->view('templates/cms_sidebar');
            $this->load->view('templates/cms_topbar');
            $this->load->view('form/profil',$data);
            $this->load->view('templates/cms_footer');
        }else{
            $data=[
                'nama' =>htmlspecialchars($this->input->post('nama')),
            ];
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('user',$data);
            $this->session->set_flashdata('message', '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                Nama lengkap berhasil diganti.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
                ');
            redirect('Profil');

        }
	}

    public function password()
    {
        
        $data['judul'] = 'My Profil CMS';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();


        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[3]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
        $this->load->view('templates/cms_header',$data);
        $this->load->view('templates/cms_sidebar');
        $this->load->view('templates/cms_topbar');
        $this->load->view('form/password',$data);
        $this->load->view('templates/cms_footer');   
        }else{
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Password Salah.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
                ');
                redirect('profil/password');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                Password tidak boleh sama dengan password sebelumnya.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
                ');
                    redirect('profil/password');
                } else {
                    // password sudah ok
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('username', $this->session->userdata('username'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Password berhasil diubah.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    ');
                redirect('profil/password');
                }
            }
        }
    }
}
