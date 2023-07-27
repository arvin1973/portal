<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends CI_Controller {

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
		$data['judul'] = 'Informasi Kontak CMS';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['kontak'] = $this->db->get('aboutus')->result_array();
        
        $dbjam = $data['kontak']['0']['isi'];
        $dbemail = $data['kontak']['1']['isi'];
        $dbtlp = $data['kontak']['2']['isi'];
        $dbwa = $data['kontak']['3']['isi'];
        

        $this->form_validation->set_rules('jam', 'Jam', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        $this->form_validation->set_rules('tlp', 'No Telepon', 'required|trim');
        $this->form_validation->set_rules('wa', 'WhatsApp', 'required|trim');
        

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/cms_header',$data);
            $this->load->view('templates/cms_sidebar');
            $this->load->view('templates/cms_topbar');
            $this->load->view('utama/kontak',$data);
            $this->load->view('templates/cms_footer');
        }else{

            $jam = htmlspecialchars($this->input->post('jam'));
            $email = htmlspecialchars($this->input->post('email'));
            $tlp = htmlspecialchars($this->input->post('tlp'));
            $wa = htmlspecialchars($this->input->post('wa'));


            if($jam <> $dbjam)
            {
                $this->db->query("UPDATE aboutus SET isi = '$jam' WHERE id = 1");
                $pesan = $pesan.'Jam, ';
            }
            if($email <> $dbemail)
            {
                $this->db->query("UPDATE aboutus SET isi = '$email' WHERE id = 2");
                $pesan = $pesan.'Email, ';
            }
            if($tlp <> $dbtlp)
            {
                $this->db->query("UPDATE aboutus SET isi = '$tlp' WHERE id = 3");
                $pesan = $pesan.'No. Tlp, ';
            }
            if($wa <> $dbwa)
            {
                $this->db->query("UPDATE aboutus SET isi = '$wa' WHERE id = 4");
                $pesan = $pesan.'WhatsApp ';
            }

            if(empty($pesan)){
                $this->session->set_flashdata('message', '
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                Silahkan ubah data terlebih dahulu.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
                ');
            redirect('kontak');
            }else {
                $this->session->set_flashdata('message', '
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data '. $pesan. ' berhasil ubah.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    ');
                redirect('kontak');

            }
            

            
        }
	}
}
