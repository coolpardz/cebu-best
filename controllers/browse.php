<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Browse extends CI_Controller {
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

	//$this->data["countJ"] = $this->db->count_all('JobDetails');
	

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
//header navigation area    
public function company()
{
  $this->data["show_company"] = $this->jobs_data->display_company();	      
  $this->choose_header();
  $this->load->view("show_company", $this->data);
}
    
public function trainings()
{          
      $this->choose_header();
      $this->load->view("trainings", $this->data);
}
//sidebar job category
public function category($id)
{
    $countjobs = $this->jobs_data->get_cat_rows($id);
		$config['total_rows'] = $countjobs;
		$config['per_page'] = 5; 
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = '&gt;';
		$config['prev_link'] = '&lt;';
		$config['base_url'] = base_url('main/category/'. $id .'/page/');
		$config['full_tag_open'] = '<ul class="pagination pagination-sm pull-right ul-page">';
		$config['full_tag_close'] = '</ul>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li><a><b>';
		$config['cur_tag_close'] = '</b></a></li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
        $config['uri_segment'] = 5 ;
    
	//	$this->choose_header();
		
         
    // $this->data["viewcat"] = $this->jobs_data>fetch_cat_list($config["per_page"], $this->uri->segment(5),$id);
		   //$this->data["cat_rows"] = $this->pagination->create_links();
            $this->choose_header();
			$this->data["viewpage"] = $this->jobs_data->category_jobs_view($id);   
			$this->load->view('main', $this->data);
                
		
			//	$this->data["listofjobs"] = $this->jobs_data->category_jobs_view($id);
             //   $this->data["currentID"] = $id;
             
			//	$this->load->view('no_pagination', $this->data);
		
	
  
}
public function details($what, $name)
	{
	  	 $this->choose_header();
        
		if($what == "company")
		{
		    $this->data["company_details"] = $this->jobs_data->company_details($name);
	
			$this->load->view("company_details", $this->data);	
		}
		else
		{
			
		}
		 
	}
    
    
}//end of the class