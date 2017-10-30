<?php
class User extends MY_Controller
{

  public function index()
  {
    $data['dataArray2']=$this->User_model->displayAll();
    $data['dataArray4']=$this->User_model->mostDownloaded();
    $this->load->view('User/index',$data);
  }
  public function __construct()
  {
        parent::__construct();
      $this->load->model('User_model');
  }

    public function user_session_start()
  {
     if($this->session->userdata('user_id'))
      return $this->session->userdata('user_id');
     else
         return $this->index();
  }
  public function login()
  {
      $this->load->view('user/login');
  }
  public function logout()
  {
      $this->session->sess_destroy();
      $this->index();
  }
  public function user_signup()
  {
    $this->load->view('user/user_signup');
    
  }
  public function signup()
  {
      $this->load->view('user/signup');
  }
  public function val_signup()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name','Name','required|alpha');
        $this->form_validation->set_rules('email','Email','required|valid_email|trim');
        $this->form_validation->set_rules('password','Password','required|alpha_numeric|trim');
        $this->form_validation->set_rules('password1','Confirm Password','required|alpha_numeric|trim');
        if($this->form_validation->run())
        {
            $name=$this->input->post('name');
            $email=$this->input->post('email');
            $password=$this->input->post('password');
            $data=array('name'=>$name,'email'=>$email,'password'=>$password);
            $this->load->model('User_model');
            if($this->User_model->user_signup($data))
                return redirect('User/');
        }
        else
        {
            $this->load->view('dev/dev_signup');
        }
    }
  public function user_login()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username','Username','required|trim');
        $this->form_validation->set_rules('password','Password','required|alpha_numeric|trim');
        if($this->form_validation->run())
           {
                $username=$this->input->post('username');
                $password=$this->input->post('password');
                $this->load->model('User_model');
                $user_session_id=$this->User_model->login_valid($username,$password);
                if($user_session_id)
                {
                    $this->session->set_userdata('user_id',$user_session_id);
                    return redirect('User/index');
                }

                else
                    {
                        $this->load->model('dev_model');
                        $session_id=$this->dev_model->devLoginValid($username,$password);

                        if($session_id)
                        {
                            $this->session->set_userdata('dev_id',$session_id);
                            return redirect('Dev/dashboard');
                        }
                        else
                        {
                            $this->session->set_flashdata('login_failed','Incorrect Username or Password');
                            return redirect('user/login');
                        }
                      
                    }

                }
            else
           {
               $this->load->view('user/login');

           }
    }
    public function profile()
    {
        if($this->session->userdata('user_id'))
        {
            $session_id = $this->user_session_start();
            $this->load->model('User_model');
            $data['dataArray'] = $this->User_model->userProfile($session_id);
            $this->load->view('user/user_profile', $data);
        }
        else
            return redirect('User/index');

    }
    public function updateProfile()
    {   if($this->session->userdata('user_id')) {
        $this->user_session_start();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'required');
        if ($this->form_validation->run()) {
            $name = $this->input->post('name');
//            $company=$this->input->post('company');
//            $skills=$this->input->post('skills');
            if ($_FILES['pic']['size'] == 0) {
                $pic = $this->input->post('old_pic');
            } else {
                $data = $this->do_upload();
                foreach ($data as $dataArray) {
                    $pic = $dataArray['file_name'];
                }
            }
            $this->load->model('User_model');
            $data = array('name' => $name, 'profile_pic' => $pic);
            $this->User_model->updateProfile($data);
            $this->profile();
        } else {
            $session_id = $this->user_session_start();
            $this->load->model('User_model');
            $data['dataArray'] = $this->User_model->userProfile($session_id);
            $this->load->view('user/user_profile', $data);
        }
    }
    else
    {
        return redirect('User/index');
    }

    }
    public function do_upload()
    {
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['encrypt_name']         = True;
        $config['max_size']             = 1000000000;
        $config['max_width']            = 10240000;
        $config['max_height']           = 76800000;
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('pic'))
        {
            $error = array('error' => $this->upload->display_errors());
            print_r($error);
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
            return $data;
        }
    }
    public function appProfile($id=null)
    {
        $this->load->model('User_model');
        $data['dataArray']=$this->User_model->appProfile($id);
        $data['dataArray2']=$this->User_model->relatedApps(array_column($data['dataArray'],'category'));
        $this->load->view('user/appProfile',$data);
    }
    public function changePassword($mode,$email)
    {
        if($this->session->userdata('user_id')||$this->session->userdata('dev_id'))
        {
            $data['dataArray'] = array($mode, $email);
            $this->load->view('user/changePassword', $data);
        }
        else
            return redirect('User/index');
    }
    public function val_changePassword()
    {
        if($this->session->userdata('user_id')||$this->session->userdata('dev_id'))
        {
            $mode = $this->input->post('mode');
            $email = $this->input->post('email');
            $data['dataArray'] = array($mode, $email);
            $this->form_validation->set_rules('old_password', 'Old Password', 'required|trim');
            $this->form_validation->set_rules('password', 'New password', 'required|trim|min_length[5]');
            $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|trim|matches[password]|min_length[5]');
            if ($this->form_validation->run())
            {
                $oldPassword = $this->input->post('old_password');
                $newPassword = $this->input->post('password');
                if ($this->User_model->checkPassword($mode, $oldPassword, $email, $newPassword)) {
                    $this->session->set_flashdata('download', 'Password changed successfully');
                    $this->index();
                } else {
                    $this->session->set_flashdata('password_mismatch', 'Your old password is incorrect');
                    $this->load->view('user/changePassword', $data);
                }

            } else {
                $this->load->view('user/changePassword', $data);
            }
        }
        else
        {
            return redirect('User/index');
        }

    }
    public function selectedApps($selection=null)
    {
        $data['dataArray2']=$this->User_model->selectedApps($selection);
        if($selection==1)
            $data['heading']='windows';
        if($selection==2)
            $data['heading']='android';
        return $this->load->view('user/index',$data);

    }
    public function search()
    {
        if(isset($_POST['search']))
        {
            $search=$this->input->post('search');
            $data['dataArray2']=$this->User_model->search($search);
            $data['heading']='search';
            return $this->load->view('user/index',$data);
        }
        else
            return redirect('User/index');
    }


}
?>
