<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Photos extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();

        /* Title Page :: Common */
        $this->load->model('core_model');
        $this->data['pagetitle'] = $this->page_title->show();
        // if ( ! $this->session->userdata('is_logged_in'))
        // {
        //     redirect('auth', 'refresh');
        // }
        $this->data['projects'] = $this->core_model->get_project_list();
        set_cookie("last_url", "http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}", 100*86400);
    }


	public function index($pj_id=0, $pick_sequence=0)
	{
        if ($pj_id==0) redirect('dashboard',"refresh");
        $this->data['project'] = $this->core_model->get_project_list($pj_id);

        $this->data['breadcrumb'] = $this->breadcrumbs->show();

        $path = "/var/www/html/tomotoon/".$this->data['project'][0]['path'];
        //====check if image folder exist ===========
        $seq_folders = glob($path . '/*' , GLOB_ONLYDIR);
        $sequences = array();
        foreach ($seq_folders as $seq) {
            if(is_dir($seq."/images"))
                array_push($sequences, $seq);
        }
        $this->data['sequences'] = $sequences;
        if(count($this->data['sequences']) == 0) $this->data['sequences'][0] = 'No Data';
        $pick_sequence = (!$pick_sequence)? basename($this->data['sequences'][0]) : $pick_sequence;
        $this->data['files'] = glob($path."/".$pick_sequence."/images/*.[jJ][pP][gG]");
        $this->data['pick_sequence'] = $pick_sequence;
        $this->page_title->push($this->data['project'][0]['name']." - ".$pick_sequence);
        $this->data['pagetitle'] = $this->data['project'][0]['name']." - ".$pick_sequence;
        $this->template->admin_render('main', $this->data);
	}


    public function dirToArray($dir) { 
           $result = array(); 

           $cdir = scandir($dir); 
           foreach ($cdir as $key => $value) 
           { 
              if (!in_array($value,array(".",".."))) 
              { 
                 if (is_dir($dir . DIRECTORY_SEPARATOR . $value)) 
                 { 
                    $result[$value] = $this->dirToArray($dir . DIRECTORY_SEPARATOR . $value); 
                 } 
                 else 
                 { 
                    $result[] = $value; 
                 } 
              } 
           } 
           
           return $result; 
    }

    function getDirectoryTree( $outerDir , $x){ 
        $dirs = array_diff( scandir( $outerDir ), Array( ".", ".." ) ); 
        $dir_array = Array(); 
        foreach( $dirs as $d ){ 
            if( is_dir($outerDir."/".$d)  ){ 
                $dir_array[ $d ] = $this->getDirectoryTree( $outerDir."/".$d , $x); 
            }else{ 
             if (($x)?ereg($x.'$',$d):1) 
                $dir_array[ $d ] = $d; 
                } 
        } 
        return $dir_array; 
    }  
}
