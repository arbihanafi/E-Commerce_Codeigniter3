<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_heroUnit extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getHero()
    {
        $this->db->select('*');
        $this->db->from('hero_unit');
        $this->db->where('status_id', 1);
        $get = $this->db->get();
        return $get->result_array();
    }

    public function getData()
    {
        $query = 'SELECT hu.*,s.nama as status 
        FROM hero_unit hu 
        INNER JOIN status s ON hu.status_id = s.id';
        return $this->db->query($query)->result_array();
        $this->db->select('*');
        $this->db->from('hero_unit');
        $get = $this->db->get();
        return $get->result_array();
    }

    public function getStatus()
    {
        return $this->db->get('status')->result_array();
    }

    public function getHero_byid($id)
    {
        return $this->db->get_where('hero_unit', ['id' => $id])->row_array();
    }

    public function tambah_hero($input, $gambar)
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
            if ($this->upload->do_upload('file_foto')) {
                $uploadData = $this->upload->data();
                $path_file = $uploadData['file_name'];
            }
        }

        $data = [
            'label' => $input->label,
            'description' => $input->description,
            'file_foto' => $path_file,
            'status_id' => 2
        ];

        $this->db->insert('hero_unit', $data);
        return $this->db->affected_rows();
    }

    public function edit_data($input, $gambar)
    {
        $gb = $this->getHero_byid($input->id);

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
            if ($this->upload->do_upload('file_foto')) {
                @unlink('./' . $path . $gb['file_foto']);
                $uploadData = $this->upload->data();
                $path_file = $uploadData['file_name'];
            }
        } else {
            $path_file = $gb['file_foto'];
        }

        $data = [
            'label' => $input->label,
            'description' => $input->description,
            'file_foto' => $path_file,
            'status_id' => '2'
        ];

        $this->db->where('id', $input->id);
        $this->db->update('hero_unit', $data);
        return $this->db->affected_rows();
    }
    public function hapusHero($id)
    {
        $gambar = $this->getHero_byid($id);

        $this->db->where('id', $id);
        $this->db->delete('hero_unit');
        $path = "assets/uploads/";
        $rows = $this->db->affected_rows();
        if ($rows > 0) {
            @unlink('./' . $path . $gambar['file_foto']);
        }
        return true;
    }
    public function editHero($input)
    {
        $this->getHero_byid($input->id);

        $data = [
            'status_id' => $input->status
        ];

        $this->db->where('id', $input->id);
        $this->db->update('hero_unit', $data);
        return $this->db->affected_rows();
    }
}
