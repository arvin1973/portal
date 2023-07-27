<?php

class ListBerita extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $query = $this->db->query("SELECT berita.id, berita.judul, berita.isi, berita.image, user.nama, berita.timestamp FROM berita INNER JOIN user ON berita.author=user.id ORDER BY berita.id DESC");
        $jumlah = $query->num_rows();
        
        $item = 6;

        $this->load->library('pagination');
        
        $config['base_url'] = 'http://localhost/portal/listberita/index';
        $config['total_rows'] = $jumlah;
        $config['per_page'] = $item;

        $config['full_tag_open'] = '<nav aria-label="Page navigation example"><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul></nav>';

        $config['last_link'] = 'last';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';
        
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';
        
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';

        $config['attributes'] = array('class' => 'page-link');

        $this->pagination->initialize($config);
        

        if(empty($start = $this->uri->segment(3))){
            $start = 0;
        }
        $query = $this->db->query("SELECT berita.id, berita.judul, berita.isi, berita.image, user.nama, berita.timestamp FROM berita LEFT JOIN user ON berita.author=user.id ORDER BY berita.id DESC LIMIT $item OFFSET $start");
        $data['berita'] = $query->result_array();

        $data['key'] = '';
        if($this->input->post('keyword1')){
            $cari = $this->input->post('keyword1');
            $data['key'] = $cari;
            $query = $this->db->query("SELECT berita.id, berita.judul, berita.isi, berita.image, user.nama, berita.timestamp FROM berita LEFT JOIN user ON berita.author=user.id WHERE berita.judul like '%$cari%' or berita.isi like '%$cari%' ORDER BY berita.id DESC;");
            $data['berita'] = $query->result_array();

        }
        
        $data['judul'] = 'Berita Desa Laksanamekar';
        //$data['berita'] = $this->db->get('berita')->result_array();
        $data['kontak'] = $this->db->get('aboutus')->result_array();
        
    
        // load view portal List berita
        $this->load->view("portal/partial/header",$data);
        $this->load->view("portal/listberita", $data);
        $this->load->view("portal/partial/footer", $data);
    }
    
    public function detail($id)
    {
        $query = $this->db->query("SELECT berita.id, berita.judul, berita.isi, berita.image, user.nama, berita.timestamp FROM berita INNER JOIN user ON berita.author=user.id WHERE berita.id='$id'");
        $data['berita'] = $query->row_array();
        $query = $this->db->query('SELECT berita.id, berita.judul, berita.isi, berita.image, user.nama, berita.timestamp FROM berita INNER JOIN user ON berita.author=user.id ORDER BY berita.id DESC;');
        $data['recent'] = $query->result_array();
        $data['kontak'] = $this->db->get('aboutus')->result_array();
        $data['judul'] = $data['berita']['judul'];
        // load view portal List berita
        $this->load->view("portal/partial/header",$data);
        $this->load->view("portal/tampilberita", $data);
        $this->load->view("portal/partial/footer", $data);
    }
}
