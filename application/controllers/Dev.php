<?php
class Dev extends MY_Controller
{
  public function __construct()
    {
        parent::__construct();
        $this->load->model('Dev_model');

    }
  public function index()
    {
        return redirect('User/index');
    }
    public function signup()
    {
        $this->load->view('dev/dev_signup');

    }
    public function sessionStart()
    {
        return $this->session->userdata('dev_id');
    }
    public function val_signup()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name','Name','required|alpha');
        $this->form_validation->set_rules('email','Email','required|valid_email|trim');
        $this->form_validation->set_rules('password','Password','required|alpha_numeric|trim');
        $this->form_validation->set_rules('password1','Confirm Password','required|alpha_numeric|trim|matches[password]');
        if($this->form_validation->run())
        {
            $name=$this->input->post('name');
            $email=$this->input->post('email');
            $password=$this->input->post('password');
            $data=array('name'=>$name,'email'=>$email,'password'=>$password);
            $this->load->model('dev_model');
            $this->dev_model->dev_signup($data);
        }
        else
        {
            $this->load->view('dev/dev_signup');
        }
    }
        public function contact()
        {
            $this->load->view('dev/contact');
        }
        public function profile()
        {
            $session_id=$this->sessionStart();
            $this->load->model('Dev_model');
            $data['dataArray']=$this->Dev_model->profile($session_id);
            $data['dataArray2']= $this->Dev_model->profile($this->sessionStart());
            $this->load->view('dev/profile',$data);

        }
        public function updateProfile()
        {
          if($this->session->userdata('dev_id')) {
              $this->load->library('form_validation');
              $this->form_validation->set_rules('name', 'Name', 'required');
              $this->form_validation->set_rules('company', 'Company', 'required');
              $this->form_validation->set_rules('skills', 'Skill', 'required');
              if ($this->form_validation->run()) {
                  $name = $this->input->post('name');
                  $company = $this->input->post('company');
                  $skills = $this->input->post('skills');
                  if ($_FILES['pic']['size'] == 0) {
                      $pic = $this->input->post('old_pic');
                  } else {
                      $data = $this->do_upload();
                      foreach ($data as $dataArray) {
                          $pic = $dataArray['file_name'];
                      }
                  }
                  $this->load->model('dev_model');
                  $data = array('name' => $name, 'company' => $company, 'skills' => $skills, 'pic' => $pic);
                  $this->dev_model->updateProfile($data);
                  $this->profile();
              } else {
                  $sesion_id = $this->sessionStart();
                  $this->load->model('Dev_model');
                  $data['dataArray'] = $this->Dev_model->profile($sesion_id);
                  $this->load->view('dev/profile', $data);
              }
          }
          else
              return redirect('User/index');

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

        public function dashboard()
        {
            if($this->session->userdata('dev_id'))
            {
                $data['dataArray2'] = $this->sessionStart();
                $data['dataArray']= $this->Dev_model->profile($this->sessionStart());
                $this->load->view('dev/dashboard', $data);
            }
            else
                return redirect('User/index');
        }
        public function apps()
        {
            if($this->session->userdata('dev_id'))
            {
                $data['dataArray1'] = $this->sessionStart();
                $data['dataArray']=$this->Dev_model->profile($this->sessionStart());
                $data['dataArray2'] = $this->Dev_model->apps($data['dataArray1']);
                $this->load->view('dev/apps', $data);
            }
            else
                return redirect('User/index');
        }
        public function addApp($id=null)
        {
            if($id>0)
                $data['dataArray2']=$this->Dev_model->app_details($id);
            else
                $data['dataArray2']=0;
            $data['dataArray']=$this->Dev_model->profile($this->sessionStart());
            $this->load->view('dev/addApp',$data);
        }
        public function addAppdetails($id=null)
        {
            if($this->session->userdata('dev_id'))
            {   $data['dataArray']=$this->Dev_model->profile($this->sessionStart());
                $dev_id = $this->sessionStart();
                $this->load->library('form_validation');
                $this->form_validation->set_rules('appname', 'App Name', 'required');
                $this->form_validation->set_rules('platform', 'Platform', 'required');
                $this->form_validation->set_rules('description', 'App Description', 'required');
                if ($this->form_validation->run()) {
                    $appname = $this->input->post('appname');
                    $platform = $this->input->post('platform');
                    $category1 = $this->input->post('category');
                    $descripton = $this->input->post('description');
                    if (empty($category1))
                        $category = "Entertainment";
                    else
                        $category = implode(",", $category1);
                    if ($id > 0) {
                        if ($_FILES['app_pic']['size'] == 0) {
                            $imageName = $this->input->post('old_pic');
                        } else {
                            $data2 = $this->appImageupload();
                            foreach ($data2 as $dataArray) {
                                $imageName = $dataArray['file_name'];
                            }
                        }
                        if ($_FILES['file']['size'] == 0) {
                            $fileName = $this->input->post('old_app');

                        } else {
                            $data1 = $this->appFileupload();
                            foreach ($data1 as $dataArray) {
                                $fileName = $dataArray['file_name'];
                            }
                        }

                    } else {
                        $data1 = $this->appFileupload();
                        $data2 = $this->appImageupload();
                        foreach ($data1 as $dataArray) {
                            $fileName = $dataArray['file_name'];
                        }
                        foreach ($data2 as $dataArray) {
                            $imageName = $dataArray['file_name'];
                        }

                    }
                    $data = array('name' => $appname, 'platform' => $platform, 'description' => $descripton, 'category' => $category, 'file_name' => $fileName, 'image_name' => $imageName, 'dev_id' => $dev_id);

                    if ($this->Dev_model->addApp($data, $id))
                    {
                        return redirect('Dev/apps');
                    }

                } else {
                    //$data['dataArray'] = $this->sessionStart();
                    $category = $this->input->post('category');
                    if ($id > 0)
                        $data['dataArray2'] = $this->Dev_model->app_details($id);
                    else
                        $data['dataArray2'] = 0;

                    $this->load->view('dev/addApp', $data);
                }
            }
            else
                return redirect('User/index');
        }

    public function appFileupload()
    {
        $config1['upload_path']          = './uploads/files';
        $config1['allowed_types']        = 'apk|exe';
        $config['encrypt_name']          = True;

        $this->load->library('upload', $config1);

        if ( ! $this->upload->appFileUpload('file'))
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
    public function appImageupload()
    {
        $config2['upload_path']          = './uploads/appImages';
        $config2['allowed_types']        = 'jpg|jpeg|png|gif|bmp|GIF';
        $config['encrypt_name']          = True;
        $config2['max_size']             = 1000000000;
        $this->load->library('upload', $config2);
        $this->upload->initialize($config2);
        if ( ! $this->upload->appImageUpload('app_pic'))
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
    public function download($id=null,$file_name=null)
    {
        if($this->session->userdata('dev_id')||$this->session->userdata('user_id'))
        {   $data['downloads']='`downloads` + 1';
            $this->Dev_model->addApp($data,$id);
            $this->load->helper('download');
            force_download(FCPATH . '/uploads/files/' . $file_name, null);
        }
        else
            $this->session->set_flashdata('download','Please login to download any app');
            return redirect($_SERVER['HTTP_REFERER']);
    }


}




  ?>
