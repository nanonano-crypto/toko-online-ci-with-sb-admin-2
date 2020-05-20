<?php 

class Data_barang extends CI_Controller {

    public function index()
    {
        $data['barang']= $this->model_barang->tampil_data()->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/data_barang', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambah_aksi()
    {
        $nama_barang  = $this->input->post('nama_barang');
        $keterangan   = $this->input->post('keterangan');
        $kategori     = $this->input->post('kategori');
        $harga        = $this->input->post('harga');
        $stok         = $this->input->post('stok');
        $foto       = $_FILES['foto'];
        if ($foto=''){}else{
            $config['upload_path']    = './uploads';
            $config['allowed_types']  = 'jpg|png|gif';

            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('foto')){
                echo "upload Gagal"; die();
            }else{
                $foto = $this->upload->data('file_name');
            }
        }


        $data = array (
            'nama_barang'   => $nama_barang,
            'keterangan'    => $keterangan,
            'kategori'      => $kategori,
            'harga'         => $harga,
            'stok'          => $stok,
            'foto'          => $foto
        );      
        $this->model_barang->input_barang($data, 'tb_barang');
        redirect('admin/data_barang/index'); 
    }

    public function edit($id)
    {
        $where = array('id_brg'  =>  $id);
        $data['barang']  = $this->model_barang->edit_barang($where, 'tb_barang')->result();

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/edit_barang', $data);
        $this->load->view('templates_admin/footer');
    }

    public function update()
    {
        $id           = $this->input->post('id_brg');
        $nama_barang  = $this->input->post('nama_barang');
        $keterangan   = $this->input->post('keterangan');
        $kategori     = $this->input->post('kategori');
        $harga        = $this->input->post('harga');
        $stok         = $this->input->post('stok');


        $data = array (
            'nama_barang'   => $nama_barang,
            'keterangan'    => $keterangan,
            'kategori'      => $kategori,
            'harga'         => $harga,
            'stok'          => $stok
            
        );    

        $where = array('id_brg'  =>  $id);
        $this->model_barang->update_data($where, $data, 'tb_barang');
        redirect('admin/data_barang/index');       
        
    }

    public function hapus($id)
    {
        $where = array('id_brg'  =>  $id);
        $this->model_barang->hapus_data($where, 'tb_barang');
        redirect('admin/data_barang/index');
    }
}