<?php

class HubungiKami extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['kontak'] = $this->db->get('aboutus')->result_array();
        $data['judul'] = 'Hubungi Desa Laksanamekar';

        // load view 
        $this->load->view("portal/partial/header",$data);
        $this->load->view("portal/hubungikami", $data);
        $this->load->view("portal/partial/footer", $data);
    }
}
