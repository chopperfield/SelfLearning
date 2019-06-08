<?php

class Mahasiswa_Model extends CI_Model{

    //default id = null
    public function getMahasiswa($id = null ){
        if ($id === null){
            return $this->db->get('mahasiswa')->result_array();
        }else{
            return $this->db->get_where('mahasiswa',['id'=>$id])->result_array();
        }

        
    }

    public function deleteMahasiswa($id){
        $this->db->delete('mahasiswa',['id' => $id]);
        return $this->db->affected_rows();
    }

    public function createMahasiswa($data){
        //asumsi data sudah rapi, berdasarkan data kolom
        $this->db->insert('mahasiswa',$data);
        return $this->db->affected_rows();
    }

    public function updateMahasiswa($data,$id){
        $this->db->update('mahasiswa', $data , ['id'=>$id]);
        return $this->db->affected_rows();
    }
}