<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kependudukan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model("User_model");
        $this->load->library('upload');
        if (!$this->session->userdata('username')) {
            redirect('auth');
        }
    }

	public function index()
	{
		$data['judul'] = 'Kependudukan Laksanamekar';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['penduduk'] = $this->db->get('kependudukan')->result_array();

        //$data['jumlah_kk'] = $this->db->get('kependudukan')->row_array();
        //$data['jumlah_rt'] = $this->db->get('kependudukan')->row_array();
        $this->load->view('templates/cms_header',$data);
        $this->load->view('templates/cms_sidebar');
        $this->load->view('templates/cms_topbar');
        $this->load->view('utama/kependudukan');
        $this->load->view('templates/cms_footer');
	}

    public function tambah()
    {
        $this->form_validation->set_rules('rw', 'Rukun Warga', 'required|trim', array('required' => 'Field tidak boleh kosong',)); 
        $this->form_validation->set_rules('ketua', 'Ketua', 'required|trim', array('required' => 'Field tidak boleh kosong',)); 
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required|trim', array('required' => 'Field tidak boleh kosong',)); 
        $this->form_validation->set_rules('warga', 'Warga', 'required|trim', array('required' => 'Field tidak boleh kosong',)); 
        $this->form_validation->set_rules('kk', 'Kartu Keluarga', 'required|trim', array('required' => 'Field tidak boleh kosong',)); 
        $this->form_validation->set_rules('rt', 'Rukun Tetangga', 'required|trim', array('required' => 'Field tidak boleh kosong',)); 


        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Kependudukan Laksanamekar';
            $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
            $data['penduduk'] = $this->db->get('kependudukan')->result_array();

            
            $this->load->view('templates/cms_header',$data);
            $this->load->view('templates/cms_sidebar');
            $this->load->view('templates/cms_topbar');
            $this->load->view('utama/kependudukan');
            $this->load->view('templates/cms_footer');
        } else {
            $data = [
                'rw' => htmlspecialchars($this->input->post('rw')),
                'ketua_rw' => htmlspecialchars($this->input->post('ketua')),
                'lokasi_rw' => htmlspecialchars($this->input->post('lokasi')),
                'jumlah_warga' => htmlspecialchars($this->input->post('warga')),
                'jumlah_kk' => htmlspecialchars($this->input->post('kk')),
                'jumlah_rt' => htmlspecialchars($this->input->post('rt'))
            ];
            $this->db->insert('kependudukan',$data);
            $this->session->set_flashdata('message', '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            Kependudukan berhasil dibuat.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
            ');
            redirect('kependudukan');
        }
        
    }

    public function ubah($id)
    {
        $this->form_validation->set_rules('rw', 'Rukun Warga', 'required|trim', array('required' => 'Field tidak boleh kosong',)); 
        $this->form_validation->set_rules('ketua', 'Ketua', 'required|trim', array('required' => 'Field tidak boleh kosong',)); 
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required|trim', array('required' => 'Field tidak boleh kosong',)); 
        $this->form_validation->set_rules('warga', 'Warga', 'required|trim', array('required' => 'Field tidak boleh kosong',)); 
        $this->form_validation->set_rules('kk', 'Kartu Keluarga', 'required|trim', array('required' => 'Field tidak boleh kosong',)); 
        $this->form_validation->set_rules('rt', 'Rukun Tetangga', 'required|trim', array('required' => 'Field tidak boleh kosong',)); 

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Edit Kependudukan Rukun Tetangga';
            $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
            $data['penduduk'] = $this->db->get_where('kependudukan',['id'=> $id])->row_array();

            
            $this->load->view('templates/cms_header',$data);
            $this->load->view('templates/cms_sidebar');
            $this->load->view('templates/cms_topbar');
            $this->load->view('form/editkependudukan');
            $this->load->view('templates/cms_footer');
        } else {
            $data = [
                'rw' => htmlspecialchars($this->input->post('rw')),
                'ketua_rw' => htmlspecialchars($this->input->post('ketua')),
                'lokasi_rw' => htmlspecialchars($this->input->post('lokasi')),
                'jumlah_warga' => htmlspecialchars($this->input->post('warga')),
                'jumlah_kk' => htmlspecialchars($this->input->post('kk')),
                'jumlah_rt' => htmlspecialchars($this->input->post('rt'))
            ];
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('kependudukan', $data);
            $this->session->set_flashdata('message', '
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Data Kependudukan Berhasil diubah. 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        ');
                redirect('kependudukan');
        }
    }

    public function hapus($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('kependudukan');
        $this->session->set_flashdata('message', '
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Kependudukan berhasil dihapus.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    ');
        redirect('kependudukan');
    }
}
