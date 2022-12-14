<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Barang extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function tampil_data()
    {

        $query = 'SELECT tb.*,k.nama as kategori
        FROM tb_barang tb 
        INNER JOIN kategori k ON tb.kategori_id = k.id
        WHERE tb.status_id = 1';
        return $this->db->query($query)->result_array();
    }
    public function Kategori1()
    {

        $query = 'SELECT tb.*,k.nama as kategori
        FROM tb_barang tb 
        INNER JOIN kategori k ON tb.kategori_id = k.id
        WHERE tb.kategori_id = 1 AND tb.status_id = 1';
        return $this->db->query($query)->result_array();
    }
    public function Kategori2()
    {

        $query = 'SELECT tb.*,k.nama as kategori
        FROM tb_barang tb 
        INNER JOIN kategori k ON tb.kategori_id = k.id
        WHERE tb.kategori_id = 2 AND tb.status_id = 1';
        return $this->db->query($query)->result_array();
    }
    public function Kategori3()
    {

        $query = 'SELECT tb.*,k.nama as kategori
        FROM tb_barang tb 
        INNER JOIN kategori k ON tb.kategori_id = k.id
        WHERE tb.kategori_id = 3 AND tb.status_id = 1 ';
        return $this->db->query($query)->result_array();
    }
    public function getBarang()
    {
        $query = 'SELECT tb.*,k.nama as kategori, s.nama as status 
        FROM tb_barang tb 
        INNER JOIN kategori k ON tb.kategori_id = k.id
        INNER JOIN status s ON tb.status_id = s.id';
        return $this->db->query($query)->result_array();
        $this->db->select('*');
        $this->db->from('tb_barang');
        $get = $this->db->get();
        return $get->result_array();
    }
    public function tambah_barang($input, $gambar)
    {
        $path = "assets/uploads/";

        if (!is_dir($path)) {
            mkdir($path, 0777, true);
        }

        $path_file = "";

        if (!empty($gambar['name'])) {
            $config['upload_path'] = './' . $path;
            $config['allowed_types'] = "jpg|png|jpeg";
            $config['max_size'] = 2048;
            $this->upload->initialize($config);
            if ($this->upload->do_upload('gambar')) {
                $uploadData = $this->upload->data();
                $path_file = $uploadData['file_name'];
            }
        }

        $data = [
            'nama_barang' => $input->nama_barang,
            'description' => $input->description,
            'kategori_id' => $input->kategori,
            'harga' => $input->harga,
            'stok' => $input->stok,
            'status_id' =>  2,
            'gambar' => $path_file,
        ];

        $this->db->insert('tb_barang', $data);
        return $this->db->affected_rows();
    }

    public function getKategori()
    {
        return $this->db->get('kategori')->result_array();
    }

    public function getStatus()
    {
        return $this->db->get('status')->result_array();
    }

    public function getBarang_byid($id)
    {
        return $this->db->get_where('tb_barang', ['id' => $id])->row_array();
    }

    public function edit_data($input, $gambar)
    {
        $gb = $this->getBarang_byid($input->id);

        $path = "assets/uploads/";

        if (!is_dir($path)) {
            mkdir($path, 0777, true);
        }

        $path_file = "";

        if (!empty($gambar['name'])) {
            $config['upload_path'] = './' . $path;
            $config['allowed_types'] = "jpg|png|jpeg";
            $config['max_size'] = 2048;
            $this->upload->initialize($config);
            if ($this->upload->do_upload('gambar')) {
                @unlink('./' . $path . $gb['gambar']);
                $uploadData = $this->upload->data();
                $path_file = $uploadData['file_name'];
            }
        } else {
            $path_file = $gb['gambar'];
        }

        $data = [
            'nama_barang' => $input->nama_barang,
            'description' => $input->description,
            'kategori_id' => $input->kategori,
            'harga' => $input->harga,
            'stok' => $input->stok,
            'status_id' =>  2,
            'gambar' => $path_file,
        ];

        $this->db->where('id', $input->id);
        $this->db->update('tb_barang', $data);
        return $this->db->affected_rows();
    }
    public function hapusBarang($id)
    {
        $gambar = $this->getBarang_byid($id);

        $this->db->where('id', $id);
        $this->db->delete('tb_barang');
        $path = "assets/uploads/";
        $rows = $this->db->affected_rows();
        if ($rows > 0) {
            @unlink('./' . $path . $gambar['gambar']);
        }
        return true;
    }
    public function editBarang($input)
    {
        $this->getBarang_byid($input->id);

        $data = [
            'status_id' => $input->status
        ];

        $this->db->where('id', $input->id);
        $this->db->update('tb_barang', $data);
        return $this->db->affected_rows();
    }
}
