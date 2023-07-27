<?php

class VisiMisi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['kontak'] = $this->db->get('aboutus')->result_array();
        $data['judul'] = 'Visi & Misi Desa Laksanamekar';
        // load view admin/overview.php
        $this->load->view("portal/partial/header",$data);
        $this->load->view("portal/visimisi", $data);
        $this->load->view("portal/partial/footer", $data);
    }
}
