<?php
class User_model extends CI_Model
{
    public function login_valid($username,$password)
    {
        $query=$this->db->where(['email'=>$username,'password'=>$password])
                    ->from('user_db')
                    ->get();

                    
        if($query->num_rows())
        {	
            return $query->row()->id;
        }
        else
        {	
            return false;
        }
    }
    public function user_signup($data)
    {


        $query=$this->db->where('email',$data['email'])
            ->get('dev_db')
            ->result_array();
        $query=$this->db->where('email',$data['email'])
            ->get('user_db')
            ->result_array();

        if($query)
        {
            echo "User exist";
        }
        else
        {
            $query=$this->db->insert('user_db',$data);
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
    public function displayAll()
    {
        return $this->db->get('software_db')->result_array();

    }
    public function appProfile($id=null)
    {
       return $this->db->where('software_db.id',$id)
                        ->from('software_db')
                        ->join('dev_db','software_db.dev_id=dev_db.id','right')
                        ->select(['dev_db.name as dev_db_name','dev_db.id as dev_db_id','software_db.id','software_db.name','software_db.file_name','software_db.image_name','software_db.description','software_db.category','software_db.downloads'])
                        ->get()
                        ->result_array();

    }
    public function relatedApps($category=null)
    {

        return $this->db->select(['name','id','file_name','image_name'])
                        ->where('category',$category['0'])
                        ->limit('5')
                        ->from('software_db')
                        ->get()
                        ->result_array();
    }
    public function userProfile($id=null)
    {
        return $this->db->where('id',$id)
                        ->from('user_db')
                        ->get()
                        ->result_array();
    }
    public function updateProfile($data)
    {
        $query=$this->db->set($data)
            ->update('user_db');
        if($query)
        {
            return $data;
        }
        else
        {
            echo 'not updated';
        }

    }
    public function checkPassword($mode=null,$oldPassword,$email,$newPassword)
    {

        if ($mode == 1) {
            if ($this->db->where(['email' => $email, 'password' => $oldPassword])
                ->from('user_db')
                ->get()
                ->num_rows()) {
                return $this->db->where('email', $email)
                    ->set('password', $newPassword)
                    ->update('user_db');
            } else {
                return false;

            }
        }
        if ($mode == 2)
        {
            if ($this->db->where(['email' => $email, 'password' => $oldPassword])
                ->from('dev_db')
                ->get()
                ->num_rows()) {
                return $this->db->where('email', $email)
                    ->set('password', $newPassword)
                    ->update('dev_db');
            } else {
                return false;

            }
        }
    }

    public function selectedApps($selection=null)
    {
        if($selection=='1')
        {
            return $this->db->where('platform','windows')
                            ->get('software_db')
                            ->result_array();
        }
        if($selection=='2')
        {
            return $this->db->where('platform','android')
                            ->get('software_db')
                            ->result_array();
        }
    }
    public function search($search=null)
    {
        return $this->db->where("name LIKE '%$search%'")
                        ->get('software_db')
                        ->result_array();
    }
    public function mostDownloaded()
    {
        return $this->db->order_by('downloads','DESC')
                        ->get('software_db')
                        ->result_array();
    }


}


