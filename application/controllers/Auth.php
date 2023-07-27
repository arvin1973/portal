<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
	public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Masuk CMS';
            $this->load->view('templates/login_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/login_footer');
        } else {
            $this->login();
        }
    }

    private function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['username' => $username])->row_array();

        
        if ($user) {
            if (password_verify($password, $user['password'])) {
                $data = [
                    'username' => $user['username'],
                    'role' => $user['role']
                ];
                $this->session->set_userdata($data);
                redirect('berita');
            } else {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger" role="alert">
                Password salah
                </div>'
                );
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger" role="alert">
            Username tidak terdaftar
            </div>'
            );
            redirect('auth');
        }
    }


    public function register()
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
        $this->form_validation->set_rules(
            'password1',
            'Password',
            'required|trim|min_length[3]|matches[password2]',
            array(
                'required' => 'Password tidak boleh kosong!',
                'min_length' => '{field} Harus lebih dari {param} karakter!',
                'matches' => 'Password tidak sama dengan re-password!'
            )
        );
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Registrasi akun';
            $this->load->view('templates/login_header', $data);
            $this->load->view('auth/register');
            $this->load->view('templates/login_footer');
        } else {
            $data = [
                'username' => htmlspecialchars($this->input->post('username')),
                'nama' => htmlspecialchars($this->input->post('nama')),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role' => '1'
            ];
            $this->db->insert('user',$data);
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert">
            Selamat akun berhasil dibuat.
            </div>'
            );
            redirect('auth');
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('username');

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success" role="alert">
        Anda berhasil logout
        </div>'
        );
        redirect('auth');
    }
}
