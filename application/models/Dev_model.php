<?php
class Dev_model extends CI_model
{

	public function dev_signup($data)
	{


        $query=$this->db->where('email',$data['email'])
                        ->get('dev_db')
                        ->result_array();

			if($query)
			{
				echo "User exist";
			}
			else
				{
					$query=$this->db->insert('dev_db',$data);
					if($query)
						{
							echo "done";
						}
					else
						{
							echo "not done";
						}
				}

	}
	public function devLoginValid($username,$password)
	{
        $q=$this->db->where(['email'=>$username,'password'=>$password])
            ->from('dev_db')
            ->get();


        if($q->num_rows())
        {
            return $q->row()->id;
        }
        else
        {
            return false;
        }
	}
	public function profile($session_id)
	{
		$query=$this->db->where('id',$session_id)
						->get('dev_db')
						->result_array();
		return $query;
	}

	public function updateProfile($data)
    {
        $query=$this->db->set($data)
                        ->update('dev_db');
            if($query)
            {
              return $data;
            }
            else
            {
                echo 'not updated';
            }

    }
    public function apps($dev_id=null)
	{
		$query=$this->db->where('dev_id',$dev_id)
						->get('software_db')
						->result_array();
		return $query;
	}
	public function app_details($id=null)
	{
		return $this->db->where('id',$id)
						->get('software_db')
						->result_array();

	}
    public function addApp($data,$id=null)
	{
		if($id>0)
		{	if(!empty($data['downloads']))
			{
                $query = $this->db->set('downloads','`downloads`+1',false)
                    ->where('id',$id)
                    ->update('software_db');
			}
			else
			{
                $query = $this->db->set($data, false)
                    ->where('id', $id)
                    ->update('software_db');
            }


        }
		else
		{$query=$this->db->insert('software_db',$data);}
        if($query)
		{
			return TRUE;
		}
		else
		{
			echo "Not Done";
		}
	}



}	
?>



