<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Show extends CI_Controller {
	public $data = array();
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		$this->load->database();
		$this->load->model('jobs_data');
		$this->data["jobcat"] = $this->jobs_data->getjobcategory();
		$this->data["loclist"] = $this->jobs_data->get_loc_list();
		$this->data["topjobs"] = $this->jobs_data->get_top_jobs();
	    $this->data["getjoblist"] = $this->jobs_data->get_jobs_list();
		$this->data["checkcat"] = $this->jobs_data->checkcat();
		$this->data["show_cat"] = $this->jobs_data->show_category();
	$this->load->library('pagination');

	$this->data["countJ"] = $this->db->count_all('jobdetails');
	

    }
    //choose header depending on session    
public function choose_header(){
    if($this->session->userdata('logged_in') == TRUE)
			{
				 $this->load->view('members-header', $this->data);
			}
			else
			{
				 $this->load->view('header', $this->data);
			}	                       
}   

//view jobs       
public function jobs($id)
{
    $this->data["getjobdetails"] = $this->jobs_query->get_jobs_detail($id);
    $this->choose_header();
    $this->load->view('jobs', $this->data);
}
public function info($title)
{
         $str_replace = str_replace('-',' ', $title);

         $this->data["display_page"] = $this->jobs_data->show_single_page($str_replace);
         $this->choose_header();	
         $this->load->view("page-show", $this->data);
}       
public function search()
{
	$this->load->library('form_validation');		
	$this->form_validation->set_rules('search','Search','required|trim');
    
   
								   
			if($this->form_validation->run() == TRUE)
			{
               $search = $this->input->post('search');
               $this->data["getsearchinfo"] = $this->jobs_query->get_search_data($search);
               $this->choose_header();
               $this->load->view("search-page", $this->data);
            }
    
}
    
}
