<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Publikasi extends CI_Model
{
    public function get_publikasi($nomor,$q)
    {
        $page = (int)$nomor;
        $first = $page*10-10;
        $query = $this->db->select('*')
        ->from('tbk_cite')
        ->like('title', $q)
        ->or_like('authors_name', $q)
        ->limit(10, $first)
        ->get();
        return $query;
    }

    public function getwhere_publikasi($id)
    {
        $query = $this->db->select('*')
        ->from('tbk_cite')
        ->where('id',$id)
        ->get();
        return $query;
    }

    public function get_platform()
    {
        $query = $this->db->distinct()
        ->select('source')
        ->from('tbk_cite')
        ->get();
        return $query;
    }

    public function get_publikasi_source($nomor, $source)
    {
        $page = (int)$nomor;
        $first = $page*10-10;
        $query = $this->db->select('*')
        ->from('tbk_cite')
        ->where('source', $source)
        ->limit(10, $first)
        ->get();
        return $query;
    }

    public function get_publikasi_search($nomor, $source, $q)
    {
        $page = (int)$nomor;
        $first = $page*10-10;
        $query = $this->db->select('*')
        ->from('tbk_cite')
        ->like('title', $q)
        ->or_like('authors_name', $q)
        ->where('source', $source)
        ->limit(10, $first)
        ->get();
        return $query;
    }

    public function save($data,$cek)
    {
        $query = $this->db->select('*')
        ->from('tbk_cite')
        ->where($cek)
        ->get();
        $result = $query->result_array();
        $count = count($result);
        if (empty($count)){
            $this->db->insert('tbk_cite',$data);
        }
        else{
            $this->db->where($cek);
            $this->db->update('tbk_cite',$data);
        } 
        return 1;
        
    }

    public function update_data ($data, $id)
    {
        $this->db->where('id',"$id");
        $this->db->update('tbk_cite', $data);
    }

    public function hasil ($q)
    {
        $query = $this->db->select('*')
        ->from('tbk_cite')
        ->like('title', $q)
        ->or_like('authors_name', $q)
        ->count_all_results();
        return $query;
    }
}