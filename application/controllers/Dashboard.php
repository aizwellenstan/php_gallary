<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Admin_Controller {

    public function __construct()
    {

        parent::__construct();

        /* Load :: Common */
        $this->load->helper('number');
        $this->load->model('admin/core_model');
        if ( ! $this->session->userdata('is_logged_in'))
        {
            redirect('auth', 'refresh');
        }
        $this->data['projects'] = $this->core_model->get_project_list();
    }

    public function default_page(){
        if(get_cookie("last_url")){
            redirect(get_cookie("last_url"),"refresh");
        }else{
            redirect('dashboard',"refresh");
        }
    }

	public function index()
	{
        
        /* Title Page */
        $this->page_title->push(lang('menu_dashboard'));
        $this->data['pagetitle'] = $this->page_title->show();

        /* Breadcrumbs */
        $this->data['breadcrumb'] = $this->breadcrumbs->show();

        /* Load Template */
        $this->template->admin_render('dashboard/index', $this->data);
	}

    public function add(){
        if ($this->input->server('REQUEST_METHOD') === 'POST'){
            $data_to_store = array(
                'name' => $this->input->post('project_name'),
                'path' => str_replace('\\', '/', $this->input->post('project_path'))
            );
            $insert_id = $this->core_model->insert_project($data_to_store);
            $this->data['error'] = '<div class="alert alert-success">'.'<a class="close" data-dismiss="alert">×</a>'.'<strong>已新增成功.</strong></div>';
        }
        redirect('dashboard/index', 'refresh');
    }

    public function del($id)
    {
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $this->core_model->del_project($id);
        redirect('dashboard/index', 'refresh');
    }
}
