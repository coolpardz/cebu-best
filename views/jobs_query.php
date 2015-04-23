<?php

class Jobs_query extends CI_Model{
    
public function get_jobs_detail($id)
{
        $this->db->select('*');
	    $this->db->from('jobdetails');
		$this->db->where('jobdetails.JobID', $id);
        $this->db->join('Company','Company.Name = jobdetails.Company','left');
        $this->db->join('TimeofWork','TimeofWork.JobID = jobdetails.JobID','left');
	
        $query = $this->db->get();
  
	  if($query->num_rows > 0){

   		foreach($query->result() as $row)
			{
		  		$data[] = $row; 
			}
		}	
	  return $data;
}
public function get_search_data($search){
    
    $query1 = $this->db->query("SELECT * FROM jobdetails WHERE Position LIKE '%$search%'");
       if($query1 == TRUE){
            return $query1->result();      
       }
    
}    		            
}