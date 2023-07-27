<?php

class Penduduk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['judul'] = 'Kependudukan Desa Laksamekar';
        $data['kontak'] = $this->db->get('aboutus')->result_array();
        $data['penduduk'] = $this->db->get('kependudukan')->result_array();
        $this->db->order_by("jumlah_warga", "asc");
        $penduduk = $this->db->get('kependudukan')->result_array(); 

        foreach ($penduduk as $row){
            $data['chartrw'][] = 'RW. '.$row['rw'];
            $data['chartjumlah_warga'][] = $row['jumlah_warga'];
            $data['chartjumlah_kk'][] = $row['jumlah_kk'];
            $data['chartjumlah_rt'][] = $row['jumlah_rt'];
        }

        $this->db->select_sum('jumlah_warga');
        $this->db->select_sum('jumlah_kk');
        $this->db->select_sum('jumlah_rt');
        $data['sum'] = $this->db->get('kependudukan')->row_array();
        $data['rw'] = $this->db->get('kependudukan')->num_rows();
        // load view portal Overview
        $this->load->view("portal/partial/header",$data);
        $this->load->view("portal/penduduk", $data);
        $this->load->view("portal/partial/footer", $data);
    }
}
