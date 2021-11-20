<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require 'vendor/autoload.php';
class Admin extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Login');
        $current_user=$this->M_Login->is_role();
        //cek session dan level user
        if($this->M_Login->is_role() != "1"){
            redirect("welcome/");
        }
        //load model admin
        $this->load->model('M_Login');
        $this->load->model('M_Akun');
        $this->load->model('M_Publikasi');
        $this->load->helper('file');
    }

    public function index()
    {
        $data['view']= $this->M_Publikasi->get_platform()->result();
        $this->load->view('layout/header_admin');
        $this->load->view('admin/daftar_publikasi', $data);
        // $this->load->view('layout/footer');
    }

    public function import() {
        $this->load->library('Csvimport');
        $source = $this->input->post('source');
        //Check file is uploaded in tmp folder
        if (is_uploaded_file($_FILES['file']['tmp_name'])) {
            //validate whether uploaded file is a csv file
            $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
            $mime = get_mime_by_extension($_FILES['file']['name']);
            $fileArr = explode('.', $_FILES['file']['name']);
            $ext = end($fileArr);
            if (($ext == 'csv') && in_array($mime, $csvMimes)) {
                $file = $_FILES['file']['tmp_name'];
                $csvData = $this->csvimport->get_array($file);
                
                        $first = array_key_first($csvData[0]);
                        foreach ($csvData as $row) {
                            $cek = [
                                "title" => $row['Title'],
                                "source" => "$source",
                            ];
                            $data = array(
                                "authors_name" => $row["$first"],
                                "authors" => $row['Author(s) ID'],
                                "title" => $row['Title'],
                                "year" => $row['Year'],
                                "source_title" => $row['Source title'],
                                "volume" => $row['Volume'],
                                "issue" => $row['Issue'],
                                "no_art" => $row['Art. No.'],
                                "page_start" => $row['Page start'],
                                "page_end" => $row['Page end'],
                                "cite" => $row['Cited by'],
                                "doi" => $row['DOI'],
                                "link" => $row['Link'],
                                "abstract" => $row['Abstract'],
                                "document" => $row['Document Type'],
                                "issn" => $row['ISSN'],
                                "isbn" => $row['ISBN'],
                                "source" => $source
                            );
                            $save = $this->M_Publikasi->save($data, $cek);
                        }
                        if ($save==1){
                            $this->session->set_flashdata('message','<div class="alert alert-success" style="margin-top: 3px">
                            <div class="header"><center>Data berhasil ter-import</center></div></div>');
                            redirect('admin');
                        }
                        else {
                            $this->session->set_flashdata('message','<div class="alert alert-danger" style="margin-top: 3px">
                            <div class="header"><b><center><i class="fa fa-exclamation-circle"></i> ERROR</b> Format template tidak sesuai</center></div></div>');
                            redirect('admin');
                        }
                    
                }
            
        } else {
            // $this->session->set_flashdata("error_msg", "Please select a CSV file to upload.");
            $this->session->set_flashdata('message','<div class="alert alert-danger" style="margin-top: 3px">
            <div class="header"><b><center><i class="fa fa-exclamation-circle"></i> ERROR</b> Silahkan pilih CSV file terlebih dahulu</center></div></div>');
            redirect('admin');
        }
    }

    public function data_publikasi()
    {
        $nomor = $this->input->get('page');
        $source = $this->input->get('source');
        $q = $this->input->get('q');

        if(empty($source))
        {
            redirect("admin");
        }

        if(empty($nomor))
        {
            redirect("admin/data_publikasi?source=$source&page=1");
        }
        

        $previous = (int)$nomor-1;
        $next = (int)$nomor+1;

        if(empty($q)){

            $cek = $this->M_Publikasi->get_publikasi_source($nomor, $source)->result();
            
                $data['search'] = $cek;
                //CEK PREVIOUS BUTTON
                if($previous==0){
                    $data['previous']=0;
                }
                else{
                    $previous_cek = $this->M_Publikasi->get_publikasi_source($previous, $source)->result();
                    if (empty($previous_cek)){
                        $data['previous']=0;
                    }
                    else{
                        $data['previous']=1;
                    }
                }

                //CEK NEXT BUTTON
                $next_cek = $this->M_Publikasi->get_publikasi_source($next, $source)->result();
                if (empty($next_cek)){
                    $data['next']=0;
                }
                else{
                    $data['next']=1;
                }
        }
        
        else{
            $cek = $this->M_Publikasi->get_publikasi_search($nomor, $source, $q)->result();
            
                $data['search'] = $cek;
                //CEK PREVIOUS BUTTON
                if($previous==0){
                    $data['previous']=0;
                }
                else{
                    $previous_cek = $this->M_Publikasi->get_publikasi_search($previous, $source, $q)->result();
                    if (empty($previous_cek)){
                        $data['previous']=0;
                    }
                    else{
                        $data['previous']=1;
                    }
                }

                //CEK NEXT BUTTON
                $next_cek = $this->M_Publikasi->get_publikasi_search($next, $source, $q)->result();
                if (empty($next_cek)){
                    $data['next']=0;
                }
                else{
                    $data['next']=1;
                }
            
        }

        $data['cari'] = $q;
        $data['source'] = $source;
        $data['page'] = $nomor;
        $head['cek'] = "search";
        $head['source'] = $source;
        $this->load->view('layout/header_admin', $head);
        $this->load->view('admin/result', $data);
        // $this->load->view('layout/footer');

    }

    public function update_data_publikasi()
    {
        $id = $this->input->post('id');
        $q = $this->input->post('q',true);
        $page = $this->input->post('page',true);
        $source = $this->input->post('source',true);
        $title = $this->input->post('title',true);
        $abstract = $this->input->post('abstract',true);
        $year = $this->input->post('year',true);
        $source_title = $this->input->post('source_title',true);
        $volume = $this->input->post('volume',true);
        $issue = $this->input->post('issue',true);
        $no_art = $this->input->post('no_art',true);
        $page_start = $this->input->post('page_start',true);
        $page_end = $this->input->post('page_end',true);
        $cite = $this->input->post('cite',true);
        $doi = $this->input->post('doi',true);
        $link = $this->input->post('link',true);
        $issn = $this->input->post('issn',true);
        $isbn = $this->input->post('isbn',true);
        
        $data = [
            "title"=>$title,
            "abstract"=>$abstract,
            "year"=>$year,
            "source_title"=>$source_title,
            "volume"=>$volume,
            "issue"=>$issue,
            "no_art"=>$no_art,
            "issn"=>$issn,
            "isbn"=>$isbn,
            "page_start"=>$page_start,
            "page_end"=>$page_end,
            "cite"=>$cite,
            "doi"=>$doi,
            "link"=>$link,
        ];
        $this->M_Publikasi->update_data($data,$id);
        
        redirect (base_url("Admin/data_publikasi?q=$q&source=$source&page=$page")); 

    }
      
}