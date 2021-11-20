<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('M_Login');
        $this->load->model('M_Akun');
        $this->load->model('M_Publikasi');
    }

    public function index()
    {
        $nomor = $this->input->get('page');
        $q = $this->input->get('q');
        $previous = (int)$nomor-1;
        $next = (int)$nomor+1;

        if(empty($q)){
            redirect(base_url('welcome'));
        }

        if(empty($nomor))
        {
            redirect("admin/data_publikasi?q=$q&page=1");
        }

        $cek = $this->M_Publikasi->get_publikasi($nomor, $q)->result();
        
            $data['search'] = $cek;
            //CEK PREVIOUS BUTTON
            if($previous==0){
                $data['previous']=0;
            }
            else{
                $previous_cek = $this->M_Publikasi->get_publikasi($previous, $q)->result();
                if (empty($previous_cek)){
                    $data['previous']=0;
                }
                else{
                    $data['previous']=1;
                }
            }

            //CEK NEXT BUTTON
            $next_cek = $this->M_Publikasi->get_publikasi($next, $q)->result();
            if (empty($next_cek)){
                $data['next']=0;
            }
            else{
                $data['next']=1;
            }

        $data['cari'] = $q;
        $data['page'] = $nomor;
        $head['cek'] = "search";
        $data['hasil'] = $this->M_Publikasi->hasil($q);
        $this->load->view('layout/header', $head);
        $this->load->view('result', $data);
        // $this->load->view('layout/footer');
    }

    // function checkPrevious(){
    //     $page = $this->input->post('page');
    //     $nomor = (int)$page - 1;
    //     $q = $this->input->post('search');
    //     print "$q";
    //     $if_exists = $this->M_Publikasi->check($nomor, $q);
    //     if ($if_exists > 0) {
    //         echo json_encode("1");
    //     } else {
    //         echo json_encode("0");
    //     }
    // }

    // function checkNext(){
    //     $page = $this->input->post('page');
    //     $nomor = (int)$page + 1;
    //     $q = $this->input->post('search');
    //     print "$q";
    //     $if_exists = $this->M_Publikasi->check($nomor, $q);
    //     if ($if_exists > 0) {
    //         echo json_encode("1");
    //     } else {
    //         echo json_encode("0");
    //     }
    // }

    public function ris($id)
    {
        $ris = $this->M_Publikasi->getwhere_publikasi($id)->row();
        $authors = " $ris->authors_name";
        $auth = explode(',', $authors);
        $tmp=null;
        foreach ($auth as $a){
            $first = explode(' ',trim($a));
            $last = str_replace("$first[0] ","","$a");
            $nama = "$first[0],$last";
            $au = "$tmp"."\nAU - $nama";
            $tmp = $au;
        }
        // Cek Type
        if (($ris->document)=="Book Chapter"){
            $type = "CHAP";
        }
        else {
            $type = "JOUR";
        }
        // Cek issue
        if (empty($ris->issue)){
            $issue = "";
        }
        else {
            $issue = $ris->issue;
        }
        // Cek Volume
        if (empty($ris->volume)){
            $vol = "";
        }
        else {
            $vol = $ris->volume;
        }
        // Cek ISSN
        if (empty($ris->issn)){
            $issn = "";
        }
        else{
            $issn = "$ris->issn (ISSN);";
        }
        // Cek ISBN
        if (empty($ris->isbn)){
            $isbn = "";
        }
        else {
            $isbn = "$ris->isbn (ISBN)";
        }
        //Cek SP
        if (empty($ris->page_start)){
            $sp = "";
        }
        else {
            $sp = "$ris->page_start";
        }
        //Cek EP
        if (empty($ris->page_end)){
            $ep = "";
        }
        else {
            $ep = "$ris->page_end";
        }
        $content = "TY - $type \nT1 - $ris->title $au \nJO - $ris->source_title \nVL - $vol \nSP - $sp \nEP - $ep \nIS - $issue \nPY - $ris->year \nUR - $ris->link \nAB - $ris->abstract \nDO - $ris->doi \nSN - $issn $isbn";
        $file = "mend-undip.ris";
        $txt = fopen($file, "w") or die("Unable to open file!");
        fwrite($txt, $content);
        fclose($txt);

        header('Content-Description: File Transfer');
        header('Content-Disposition: attachment; filename='.basename($file));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file));
        header("Content-Type: text/plain");
        readfile($file);

    }

    // public function cite()
    // {
    //     $id=$this->input->post('id');
    //     $cite = $this->M_Publikasi->getwhere_publikasi($id)->row();
    //     $authors = explode(',', $cite->authors_name);
    //     print_r($authors);
    //     for ($i=0; $i<=count($authors)-1; $i++){
    //         $first = explode(' ',trim($authors[$i]));
    //         $last = str_replace("$first[0] ","","$authors[$i]"); 
    //         $nama = "$last .$first[0]";
    //         echo "$nama ";
    //         }
    //     for ($j=0; $j<=count($nama); $j++){
    //         $cite=$cite.$nama[$j];
    //         }
    //         echo"$cite";

    // }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('welcome');
    }
}
