<?php

class Jobs_data extends CI_Model{

	public function getjobcategory(){	
            $query = $this->db->query("SELECT * FROM job_cat");
			return $query->result();		
	}
	public function checkcat()
	{
        $query = $this->db->query("SELECT * FROM jobdetails");
		return $query->result();
	}	
	public function get_loc_list(){	
            $query = $this->db->query("SELECT * FROM loc_list");
			return $query->result();	
	}
	public function get_top_jobs(){	
            $query = $this->db->query("SELECT * FROM top_jobs");
			return $query->result();	
	}
    public function category_jobs_view($id)
		{
       
			 	$this->db->select('*');
			    $this->db->from('jobdetails');
			    $this->db->join('Company', 'Company.Name = jobdetails.Company','left');
			    $this->db->join('TimeofWork','TimeofWork.JobID = jobdetails.JobID', 'left');
				$this->db->where('jobdetails.Category', $id);
				 //$this->db->limit($limit, $start);
				  $query = $this->db->get();

				  if($query->num_rows > 0)
				  {

		  		foreach($query->result() as $row)
						{
					  		$data[] = $row; 
						}
						return $data;
					}
                  else
                  {
                      echo "no data";
                  }
		}
	public function get_cat_rows($cat)
		{
	        $query = $this->db->query("SELECT * FROM jobdetails WHERE Category = '$cat'");
		
			return $query->num_rows();
		}	
	public function get_jobs_list(){	
		
		
	    $this->db->select('*');
	    $this->db->from('jobdetails');
	    $this->db->join('Company', 'Company.Name = jobdetails.Company','left');
        $this->db->join('job_cat', 'job_cat.title = jobdetails.Category','left');
	    $this->db->join('TimeofWork','TimeofWork.JobID = jobdetails.JobID','left');
	
	    $query = $this->db->get();
	  
	  if($query->num_rows > 0){
		 
   		foreach($query->result() as $row)
			{
		  		$data[] = $row; 
			}
		}
	  //return $data;
	
	}
	
	public function get_jobs_exp($id){

			$this->db->select('*');
		    $this->db->from('jobdetails');
		   	$this->db->where('jobdetails.JobID', $id);
		
		$query = $this->db->query("SELECT * FROM jobdetails WHERE JobID='$id'");
		foreach ($query->result() as $row)
		{
		    $exp = $row->Experience;
		
			if($exp <= 0){
				   return "no experienced needed";
				}
			elseif($exp == 1){
		    		return  $exp . " yr experienced";
				}
	    	elseif($exp >= 2){
			    return  $exp . " yrs experienced";
				}
			}
		}
		public function check_search($drop,$search){
			
			if($drop == "searchid")
			{
					$query = $this->db->query("SELECT * FROM search WHERE searchid='$search'");
					return $query->result();
			}
		}
		public function check_user($email,$password){
				$query = $this->db->query("SELECT * FROM users WHERE username='$email' AND password='$password'");
				return $query->result();	
		}
		public function check_admin_access($id)
		{
			$query = $this->db->query("SELECT * FROM users WHERE username='$id' AND Administrator='1'");
			
			if($query->num_rows() > 0)
			{
				return TRUE;
			}
			else
			{
				return FALSE;
			}
		}
		//category
		public function show_category()
		{
				$query = $this->db->query("SELECT * FROM job_cat");
				return $query->result();
		}
		public function show_company()
		{
				$query = $this->db->query("SELECT * FROM Company");
				return $query->result();
		}
		public function create_category($user,$title,$desc,$date)
		{
			   	$data = array('Administrator' => $user,'title' => $title, 'description' => $desc, 'date' => $date);

					$this->db->insert('job_cat', $data);
						return TRUE;
		}
		//post job
		public function post_job($cat,$details,$exp,$deadline,$position,$postdate,$company,$sched,$worktime,$start, $end, $shift)
		{
			
			$array = array('Category' => $cat, 'Details' => $details, 'Position' => $position, 'Experience' => $exp,'Company' => $company, 'Status' => $deadline, 'DatePosted' => $postdate,);

			$this->db->set($array);
			$this->db->insert('jobdetails');
			
	    	$data = array(
			'Schedule' => $sched, 'DailySched' => $worktime, 'StartDate' => $start, 'EndDate' => $end, 'Shift' => $shift, 'JobID' => $this->db->insert_id());

			$this->db->set($data);
			$this->db->insert('TimeofWork');
			
			$query = $this->db->query("SELECT curEntry FROM job_cat WHERE categoryID = $cat");
			
			foreach ($query->result() as $row)
			{
			     $entry = $row->curEntry;
			 
			}
			$entry = $entry + 1;
			
			$query = $this->db->query("UPDATE job_cat SET curEntry = $entry WHERE categoryID = $cat");
			
		
			
			return TRUE;
		}
		public function insert_work_sched($sched, $worktime, $start, $end, $shift)
		{
		    	$data = array(
				'Schedule' => $sched, 'DailySched' => $worktime, 'StartDate' => $start, 'EndDate' => $end, 'Shift' => $shift, 'JobID' => $this->db->insert_id());

				$this->db->insert('TimeofWork', $data);
		}
		public function manage_category($what, $id)
		{
				if($what == "add")
				{
				
				}
					elseif($what == "edit")
					{
							$query = $this->db->query("SELECT * FROM job_cat where categoryID='$id'");
							return $query->result();
		
					}
					elseif($what == "delete")
					{

					}
					else
					{
						return "sorry this is not allowed";
					}
		}
		
		public function edit_category($id,$user,$title,$desc,$date)
		{
				$array = array('title' => $title, 'description' => $desc, 'Administrator' => $user);

				$this->db->where('categoryID', $id);
				$this->db->update('job_cat', $array);

				return TRUE;
		}
		//end of category section
		
		
		public function show_page()
		{
				$query = $this->db->query("SELECT * FROM page");
				return $query->result();
		}
		public function page_update($id,$user,$title,$content,$date)
		{
					$array = array('Title' => $title, 'Content' => $content, 'user' => $user);

					$this->db->where('pageID', $id);
					$this->db->update('page', $array);

					return TRUE;
			
		}
		public function display_page($id)
		{
				$query = $this->db->query("SELECT * FROM page WHERE PageID='$id'");
				return $query->result();
		}
		public function show_single_page($title)
		{
				$query = $this->db->query("SELECT * FROM page WHERE title='$title'");
				return $query->result();
		}
		//company section
		public function display_company()
		{
				$query = $this->db->query("SELECT * FROM Company");
				return $query->result();
		}
		public function update_company($id)
		{
							$query = $this->db->query("SELECT * FROM Company WHERE companyID='$id'");
							return $query->result();
		}
		public function company_update_data($id,$name,$loc,$contact,$web,$cat,$desc)
		{
						$array = array('Name' => $name, 'Location' => $loc, 'Contact' => $contact, 'Website' => $web, 'Description' => $desc, 'Category' => $cat);

						$this->db->where('companyID', $id);
						$this->db->update('Company', $array);

						return TRUE;
		}
		public function add_company($name,$loc,$contact,$web,$cat,$desc)
		{
				$array = array('Name' => $name, 'Location' => $loc, 'Contact' => $contact, 'Website' => $web, 'Description' => $desc, 'Category' => $cat);
					$this->db->insert('Company', $array);

					return TRUE;
		}
		
		
		//pagination
		
	    public function record_count() {
	        return $this->db->count_all("jobdetails");
	    }
 
	    public function fetch_page($limit, $start) {

           
			
			
			$this->db->select('*');
		    $this->db->from('jobdetails');	
		    $this->db->join('Company', 'Company.Name = jobdetails.Company', 'left');
		    $this->db->join('TimeofWork','TimeofWork.JobID = jobdetails.JobID', 'left'); 
			$this->db->order_by('jobdetails.JobID');
	        $this->db->limit($limit, $start);
	       $query = $this->db->get();
	
 
	        if ($query->num_rows() > 0) {
	           foreach ($query->result() as $row) {
	               $data[] = $row;
	            }
	           return $data;
	      }
		  else{
			  return FALSE;
		  }
		
	 
			
	   }
    public function select_job_category($title)
    {
           $id = $this->db->query("SELECT categoryID FROM job_cat WHERE title='$title'");
							return $query->result();
    }
    public function fetch_cat_list($limit, $start, $id) {
		

	    $this->db->select('*');
	    $this->db->from('jobdetails');
	    $this->db->join('Company', 'Company.Name = jobdetails.Company', 'left');
	    $this->db->join('TimeofWork','TimeofWork.JobID = jobdetails.JobID', 'left');
		$this->db->where('jobdetails.Category', $id);
        $this->db->limit($limit, $start);
		
        $query = $this->db->get();
		
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
		else
		{
        return false;
		}
   }
   public function company_details($name)
   {
	$query = $this->db->query("SELECT * FROM company WHERE Name='$name'");   
	return $query->result();
   }
}