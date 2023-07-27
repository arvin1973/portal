<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Desa extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
		$this->load->library('form_validation');
        $this->load->library('upload');
        if (!$this->session->userdata('username')) {
            redirect('auth');
        }
    }

	public function index()
	{
		$data['judul'] = 'Informasi Kontak CMS';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['kontak'] = $this->db->get('aboutus')->result_array();
        
        $dbvisi = $data['kontak']['4']['isi'];
        $dbmisi = $data['kontak']['5']['isi'];
        $dbstruktur = $data['kontak']['6']['isi'];
        
        

        $this->form_validation->set_rules('visi', 'visi', 'required|trim');
        $this->form_validation->set_rules('misi', 'misi', 'required|trim');
        

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/cms_header',$data);
            $this->load->view('templates/cms_sidebar');
            $this->load->view('templates/cms_topbar');
            $this->load->view('utama/desa',$data);
            $this->load->view('templates/cms_footer');
        }else{

            $visi = htmlspecialchars($this->input->post('visi'));
            $misi = htmlspecialchars($this->input->post('misi'));

            $upload_image = $_FILES['image']['name'];
            if($upload_image){
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '3000';
                $config['upload_path'] = './assets/img';

                $this->upload->initialize($config);

                $path = './assets/img/';
                $foto = $this->input->post('foto');
                
                if($this->upload->do_upload('image')){
                    $new_image = $this->upload->data('file_name');
                    $this->db->query("UPDATE aboutus SET isi = '$new_image' WHERE id = 7");
                    @unlink($path.$foto);
                    $pesan = $pesan.'Struktur Organisasi, ';
                }else{
                    echo $this->upload->display_errors();
                }
            }


            if($visi <> $dbvisi)
            {
                $this->db->query("UPDATE aboutus SET isi = '$visi' WHERE id = 5");
                $pesan = $pesan.'Visi, ';
            }
            if($misi <> $dbmisi)
            {
                $this->db->query("UPDATE aboutus SET isi = '$misi' WHERE id = 6");
                $pesan = $pesan.'Misi, ';
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
            redirect('desa');
            }else {
                $this->session->set_flashdata('message', '
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data '. $pesan. ' berhasil ubah.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    ');
                redirect('desa');

            }
            

            
        }
	}
}
