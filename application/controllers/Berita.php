<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita extends CI_Controller
{

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
        $data['nav'] = 'Berita';
        $data['judul'] = 'Halaman CMS';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $query = $this->db->query('SELECT berita.id, berita.judul, berita.isi, berita.image, user.nama, berita.timestamp FROM berita LEFT JOIN user ON berita.author=user.id ORDER BY berita.timestamp DESC;');
        $data['berita'] = $query->result_array();
        //$data['berita'] = $this->db->get('berita')->result_array();


        $this->load->view('templates/cms_header', $data);
        $this->load->view('templates/cms_sidebar');
        $this->load->view('templates/cms_topbar');
        $this->load->view('utama/berita', $data);
        $this->load->view('templates/cms_footer');
    }

    public function tambah()
    {
        $data['judul'] = 'Halaman CMS';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('judul', 'Judul', 'required|trim', array('required' => 'Judul tidak boleh kosong!'));
        $this->form_validation->set_rules('isi', 'Isi', 'required|trim', array('required' => 'Isi tidak boleh kosong!'));

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/cms_header', $data);
            $this->load->view('templates/cms_sidebar');
            $this->load->view('templates/cms_topbar');
            $this->load->view('form/berita', $data);
            $this->load->view('templates/cms_footer');
        } else {
            $judul = $this->input->post('judul');
            $isi = $this->input->post('isi');
            $author = $data['user']['id'];

            $config['upload_path'] = './assets/img/berita';
            $config['allowed_types'] = 'jpg|png|jpeg|gif';
            $config['file_name'] = $_FILES['image']['name'];

            $this->upload->initialize($config);

            if (!empty($_FILES['image']['name'])) {
                if ($this->upload->do_upload('image')) {
                    $foto = $this->upload->data();
                    $data = array(
                        'judul' => $judul,
                        'isi' => $isi,
                        'image' => $foto['file_name'],
                        'author' => $author
                    );
                    $this->db->insert('berita', $data);
                } else {
                    echo $this->upload->display_errors();
                }
            } else {
                echo $this->upload->display_errors();
            }

            $this->session->set_flashdata('message', '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            Post berhasil dibuat.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
            ');
            redirect('berita');
        }
    }

    public function ubah($id)
    {
        $this->load->model('User_model');
        $data['judul'] = 'Edit berita CMS';

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['berita'] = $this->User_model->getberitaid($id);
        $data['isi'] = $data['berita']['isi'];

        $this->form_validation->set_rules('judul', 'judul', 'required|trim');
        $this->form_validation->set_rules('isi', 'isi', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/cms_header', $data);
            $this->load->view('templates/cms_sidebar');
            $this->load->view('templates/cms_topbar');
            $this->load->view('form/editberita', $data);
            $this->load->view('templates/cms_footer', $data);
        } else {
            $eee = $this->input->post('id');
            $judul = $this->input->post('judul');
            $isi = $this->input->post('isi');

            $this->db->set('judul', $judul);
            $this->db->set('isi', $isi);
            $this->db->where('id', $eee);
            $this->db->update('berita');
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert">
            Edit profile berhasil.
            </div>'
            );
            redirect('berita');
        }
    }

    public function setdata()
    {
        $upload_image = $_FILES['image']['name'];
        if ($upload_image) {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']     = '3000';
            $config['upload_path'] = './assets/img/berita';

            $this->upload->initialize($config);

            $path = './assets/img/berita/';
            $foto = $this->input->post('foto');
            //$lokasi = $path.$foto




            if ($this->upload->do_upload('image')) {
                $new_image = $this->upload->data('file_name');
                $this->db->set('image', $new_image);
                @unlink($path . $foto);
            } else {
                echo $this->upload->display_errors();
            }
        }
        $id = $this->input->post('id');
        $judul = $this->input->post('judul');
        $isi = $this->input->post('edit');
        $timestamp = date("Y-m-d H:i:s");

        $this->db->set('judul', $judul);
        $this->db->set('isi', $isi);
        $this->db->set('timestamp', $timestamp);
        $this->db->where('id', $id);
        $this->db->update('berita');
        $this->session->set_flashdata('message', '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            Berita berhasil diubah.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
            ');
        redirect('berita');
    }


    public function hapus($id, $image)
    {
        $path = './assets/img/berita/';
        @unlink($path . $image);


        $this->db->where('id', $id);
        $this->db->delete('berita');
        $this->session->set_flashdata('message', '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        Berita berhasil dihapus.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
        ');
        redirect('berita');
    }
}
