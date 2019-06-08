<?php 
use GuzzleHttp\Client;

class Mahasiswa_model extends CI_model {
    public function getAllMahasiswa()
    {
        // return $this->db->get('mahasiswa')->result_array();


        //http://localhost/API/5.RestServer_CI/RESTSERVER/api/Mahasiswa
        $client = new Client();
        $response = $client->request('GET','http://localhost/API/5.RestServer_CI/RESTSERVER/api/Mahasiswa',[
            'auth' => ['admin','1234'],
            'query' => [
                'X-API-KEY' => 'wpu123'
            ]
        ]);
        //  var_dump($response->getbody()->getcontents());
        
        $result = json_decode($response->getbody()->getcontents(), true);        

        // $result = json_decode($response->getbody()->getcontents()); //true=array;    
        // var_dump($result);

        return $result['data'];

    }

    public function tambahDataMahasiswa()
    {
        $data = [
            "nama" => $this->input->post('nama', true),
            "nrp" => $this->input->post('nrp', true),
            "email" => $this->input->post('email', true),
            "jurusan" => $this->input->post('jurusan', true)
        ];

        $this->db->insert('mahasiswa', $data);
    }

    public function hapusDataMahasiswa($id)
    {
        // $this->db->where('id', $id);
        $this->db->delete('mahasiswa', ['id' => $id]);
    }

    public function getMahasiswaById($id)
    {
        return $this->db->get_where('mahasiswa', ['id' => $id])->row_array();
    }

    public function ubahDataMahasiswa()
    {
        $data = [
            "nama" => $this->input->post('nama', true),
            "nrp" => $this->input->post('nrp', true),
            "email" => $this->input->post('email', true),
            "jurusan" => $this->input->post('jurusan', true)
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('mahasiswa', $data);
    }

    public function cariDataMahasiswa()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('nama', $keyword);
        $this->db->or_like('jurusan', $keyword);
        $this->db->or_like('nrp', $keyword);
        $this->db->or_like('email', $keyword);
        return $this->db->get('mahasiswa')->result_array();
    }
}