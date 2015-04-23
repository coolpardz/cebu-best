<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {
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
	public function index()
	{
		//$countjobs = $this->db->count_all('JobDetails');
		//$config['total_rows'] = $countjobs;
		$config['per_page'] = 6; 
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = '&gt;';
		$config['prev_link'] = '&lt;';
		$config['base_url'] = base_url('main/index');
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
		$this->pagination->initialize($config); 
		$this->data["viewpage"] = $this->jobs_data->fetch_page($config["per_page"], $this->uri->segment(3));
	    $this->data["page"] = $this->pagination->create_links();
        $this->choose_header();
		
		$this->load->view('main', $this->data);

	}
	public function category($cat)
	{
	
		$countjobs = $this->jobs_data->get_cat_rows($cat);
		$config['total_rows'] = $countjobs;
		$config['per_page'] = 5; 
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = '&gt;';
		$config['prev_link'] = '&lt;';
		$config['base_url'] = base_url('main/category/'. $cat .'/page/');
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

		
		  	  $this->choose_header();
			
			if($countjobs > $config['per_page'])
			{
			$this->pagination->initialize($config); 
			$this->data["viewcat"] = $this->jobs_data->fetch_cat_list($config["per_page"], $this->uri->segment(5), $cat);
		   $this->data["cat_rows"] = $this->pagination->create_links();
			
			$this->load->view('categorylist', $this->data);
			}
			else
			{
				$this->data["listofjobs"] = $this->jobs_data->get_jobs_cat($cat);
				$this->load->view('cat_less', $this->data);
			}
	
		
	}
	public function jobs($id){
		
		    $this->data['id'] = $id;
		    $this->data["getjobdetails"] = $this->jobs_data->get_jobs_detail($id);
		    $this->data["getjobexp"] = $this->jobs_data->get_jobs_exp($id);
		
            $this->choose_header();
		   	$this->load->view('jobs', $this->data);
	}
	public function login()
	{	
			if($this->session->userdata('logged_in') == TRUE)
			{
           		redirect('main/members');
                echo "go";
			}
			else
			{   
                
                $this->choose_header();
			    $this->load->view('login',$this->data);	
			}
	}
	public function process_user(){
		
		$this->load->library('form_validation');		
		$this->form_validation->set_rules('email','Email','required|trim|xss_clean');
	    $this->form_validation->set_rules('password','Password','required|trim|callback_validate_login['. $this->input->post('email') .']');
		
		if($this->form_validation->run() == TRUE)
		{
			   $sessnew = array(
				   'email' => $this->input->post('email'),
			  'logged_in' => 1);

	  		$this->session->set_userdata($sessnew);
	
			redirect('main/members');
		}
		else
			{

				$this->login();
		}
	}
	
	public function create_user()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username','Username','required|trim|xss_clean');
	    $this->form_validation->set_rules('password','Password','required|trim|callback_validate_new_user['. $this->input->post('email') .']');
		
		if($this->form_validation->run() == TRUE)
		{
			   $sessnew = array(
				   'email' => $this->input->post('email'),
			  'logged_in' => 1);

	  		$this->session->set_userdata($sessnew);
	
			redirect('main/members');
		}
		else
			{

				$this->login();
		}
		
	}
	public function validate_new_user($email, $password)
	{
		$checkaccount = $this->jobs_data->check_user($password, $email);
		
			if($checkaccount != true){
			return TRUE;
				}
				else
				{
					$this->form_validation->set_message('validate_login','incorrect password/username');
					return FALSE;
				}
	}
	public function validate_login($email, $password){
		
	$checkuser = $this->jobs_data->check_user($password, $email);
		
		if($checkuser == true){
		return TRUE;
			}
			else
			{
				$this->form_validation->set_message('validate_login','incorrect password/username');
				return FALSE;
			}
	}
	public function members()
	{
		if($this->session->userdata('logged_in') == TRUE)
		{
	        $admin = $this->jobs_data->check_admin_access($this->session->userdata('email'));
			if($admin == TRUE)
			{
			
			  $this->load->view("admin", $this->data);
			}
			else
			{
				  $this->load->view("members", $this->data);
			}
		}
		else
		{
			redirect('main/');
		}
	 
	}
	public function create_jobs(){
		
		if($this->session->userdata('logged_in') == TRUE)
		{
	        $admin = $this->jobs_data->check_admin_access($this->session->userdata('email'));
			if($admin == TRUE)
			{
  
			   $this->data["show_company"] = $this->jobs_data->show_company();
			  $this->load->view("create-job", $this->data);
			}
			else
			{
				  $this->load->view("members", $this->data);
			}
		}
		else
		{
			redirect('main/');
		}
	}
	public function post_success()
	{
			if(!$this->input->post('submit') == TRUE)
			{
		        $admin = $this->jobs_data->check_admin_access($this->session->userdata('email'));
				if($admin == TRUE)
				{

				  $this->load->view("post_success", $this->data);
				}
				else
				{
					  $this->load->view("members", $this->data);
				}
			}
			else
			{
				redirect('main/');
			}
		
	}
  public function add_job()
	{
		$this->load->library('form_validation');		
		$this->form_validation->set_rules('category','Category','required|trim|xss_clean');
		$this->form_validation->set_rules('details','Details','required|trim|xss_clean');
		$this->form_validation->set_rules('company','Company','required|trim|xss_clean');
		$this->form_validation->set_rules('experienced','Experienced','required|trim|xss_clean');
		$this->form_validation->set_rules('deadline','Deadline','required|trim|xss_clean');
		$this->form_validation->set_rules('position','Position','required|trim|xss_clean');
								   
			if($this->form_validation->run() == TRUE)
			{
					$cat =	$this->input->post('category');
					$details =	$this->input->post('details');
					$exp =	$this->input->post('experienced');
					$deadline =	$this->input->post('deadline');
					$position =	$this->input->post('position');
					$postdate =	date('Y-m-d');
					$company =	$this->input->post('company');
				
				
					$sched = "9:00 - 6:00 AM";
					$worktime = $this->input->post('sched-position');
					$start = date('Y-m-d');
					$end = date('Y-m-d');
					$shift = $this->input->post('shift');
					
                $this->choose_header();
                 	$check = $this->jobs_data->post_job($cat,$details,$exp,$deadline,$position,$postdate,$company,$sched,$worktime,$start, $end,$shift);
					 $this->load->view("post_success", $this->data);
            }
      else
      {
        	$this->create_jobs();
      }
			
	}
   public function edit_categories()
	{
	 		if($this->session->userdata('logged_in') == TRUE)
			{
		        $admin = $this->jobs_data->check_admin_access($this->session->userdata('email'));
				if($admin == TRUE)
				{
				  $this->load->view("edit-category", $this->data);
				}
				else
				{
					  $this->load->view("members", $this->data);
				}
			}
			else
			{
				redirect('main/');
			}	
	}
   public function logout()
	{
	$this->session->sess_destroy();
	 
	 	redirect('main/');
	}
	
	// admin category 
	// management section
	public function manage_category($what, $id)
	{
 	
      if($what == "add" && $id == "category")
		{
			  $this->data["do_manage"] = $this->jobs_data->manage_category($what, $id);
		
					  	if($this->session->userdata('logged_in') == TRUE)
						{
							 $this->load->view("manage_category", $this->data);
						}
						else
						{
							 redirect('main/');
						}
		}
		else if($what == "edit" && $id == TRUE)
		{
			 $this->data["do_edit"] = $this->jobs_data->manage_category($what, $id);
				if($this->session->userdata('logged_in') == TRUE)
				{
					 $this->load->view("modify_category", $this->data);
				}
				else
				{
					 redirect('main/');
				}
			
		}
	}
	public function edit_cat()
	{
			$this->load->library('form_validation');		
			$this->form_validation->set_rules('title','Title','required|trim|xss_clean');
			$this->form_validation->set_rules('description','Description','required|trim|xss_clean');
			
					if($this->form_validation->run() == TRUE)
					{
							$date = date('Y-m-d');
							$user = "july";
							$title = $this->input->post('title');
							$id = $this->input->post('id');
							$desc =	$this->input->post('description');	
							
							$check = $this->jobs_data->edit_category($id,$user,$title,$desc,$date);
							
							if($check == TRUE)
							{
								redirect('main/edit_categories');
							}
							
					}
		
	}
	public function create_cat()
	{
			$this->load->library('form_validation');		
			$this->form_validation->set_rules('title','Title','required|trim|xss_clean');
			$this->form_validation->set_rules('description','Description','required|trim|xss_clean');
			
					if($this->form_validation->run() == TRUE)
					{
							$date = date('Y-m-d');
							$user = "july";
							$title = $this->input->post('title');
							$desc =	$this->input->post('desc');	
							
							$check = $this->jobs_data->create_category($user,$title,$desc,$date);
							
							if($check == TRUE)
							{
								redirect('main/edit_categories');
							}
							
					}
	}
	//page area
 	public function page()
	{
		 $this->data["show_page"] = $this->jobs_data->show_page();
	
	 			$this->load->view("page", $this->data);
 	
    }

 	public function page_change($change,$id)
	{
		  $str = str_replace('-',' ', $id);
		
		 $this->data["edit_page"] = $this->jobs_data->display_page($id);
		 $this->load->view("page-edit", $this->data);
			
    }
	public function page_update()
	{
				$this->load->library('form_validation');		
				$this->form_validation->set_rules('title','Title','required|trim|xss_clean');
				$this->form_validation->set_rules('content','Content','required|trim|xss_clean');
				
						if($this->form_validation->run() == TRUE)
						{
								$date = date('Y-m-d');
								$user = "july";
								$id = $this->input->post('id');
								$title = $this->input->post('title');
								$content =	$this->input->post('content');	
								
								$check = $this->jobs_data->page_update($id,$user,$title,$content,$date);
								
								if($check == TRUE)
								{
									redirect('main/page');
								}		
						}
					
	}
	//company management section
	public function company()
	{
			 $this->data["show_company"] = $this->jobs_data->display_company();	
		     $this->choose_header();
			 $this->load->view("company", $this->data);
	}
	
	public function company_modify($change,$id)
	{

		 $this->data["edit_company"] = $this->jobs_data->update_company($id);
		 $this->load->view("company-update", $this->data);	
    }
	public function company_update()
	{
			$this->load->library('form_validation');		
			$this->form_validation->set_rules('name','Name','required|trim|xss_clean');
			$this->form_validation->set_rules('location','Location','required|trim|xss_clean');
			$this->form_validation->set_rules('contact','Contact','required|trim|xss_clean');
			$this->form_validation->set_rules('website','Website','required|trim|xss_clean');
					$this->form_validation->set_rules('category','Category','required|trim|xss_clean');
					$this->form_validation->set_rules('description','Description','required|trim|xss_clean');
			
					if($this->form_validation->run() == TRUE)
					{
							$date = date('Y-m-d');
							$user = "july";
							$id = $this->input->post('id');
							$name = $this->input->post('name');
							$loc =	$this->input->post('location');	
									$contact = $this->input->post('contact');
									$web = $this->input->post('website');
									$cat =	$this->input->post('category');
									$desc =	$this->input->post('description');
							
							$check = $this->jobs_data->company_update_data($id,$name,$loc,$contact,$web,$cat,$desc);
							
							if($check == TRUE)
							{
								redirect('main/company');
							}		
					}
		
	}
	public function manage_company($change,$id)
	{

		 $this->load->view("company-add", $this->data);	
    }
	public function create_company()
	{
			$this->load->library('form_validation');		
			$this->form_validation->set_rules('name','Name','required|trim|xss_clean');
			$this->form_validation->set_rules('location','Location','required|trim|xss_clean');
			$this->form_validation->set_rules('contact','Contact','required|trim|xss_clean');
			$this->form_validation->set_rules('website','Website','required|trim|xss_clean');
					$this->form_validation->set_rules('category','Category','required|trim|xss_clean');
					$this->form_validation->set_rules('description','Description','required|trim|xss_clean');
			
					if($this->form_validation->run() == TRUE)
					{
							$date = date('Y-m-d');
							$user = "july";
							$name = $this->input->post('name');
							$loc =	$this->input->post('location');	
									$contact = $this->input->post('contact');
									$web = $this->input->post('website');
									$cat =	$this->input->post('category');
									$desc =	$this->input->post('description');
									
							$check = $this->jobs_data->add_company($name,$loc,$contact,$web,$cat,$desc);
							
							if($check == TRUE)
							{
								redirect('main/company');
							}		
					}
		
		
	}
	//end of company management section
	//
	//Add news section
	public function news()
	{
			 $this->load->view("news", $this->data);	
	} 

	public function trainings()
	{
	   $this->choose_header();
       $this->load->view("trainings", $this->data);	
		
	}
	public function register()
	{
	  	 $this->choose_header();	
         $this->load->view("register", $this->data);	
		
	}

}
