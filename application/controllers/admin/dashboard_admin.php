<?php

class Dashboard_admin extends CI_Controller {

    public function index()
    {
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dashboard');
        $this->load->view('templates_admin/footer');
       
    }

    public function proses_pesanan()
    {
        $is_processed = $this->model_invoice->index();
        if($is_processed){      
            $this->cart->destroy(); 
            $this->load->view('templates_admin/header');
            $this->load->view('templates_admin/sidebar');
            $this->load->view('proses_pesanan');
            $this->load->view('templates_admin/footer');
        } else {
            echo "Maaf, pesanan anda gagal di proses";
        }
    }
}