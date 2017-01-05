<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

    private $logged_in;
    private $disputes;

    public function __construct()
    {
        parent::__construct();

        $this->load->model('admin_model');
        $this->load->model('crud_model');

        if($this->session->userdata('logged_in')==1){
            $this->logged_in = TRUE;
        }
        else{
            $this->logged_in = FALSE;
        }
    }


    public function index()
    {
        if($this->logged_in == TRUE){
            redirect(base_url('admin/panel'),'location');
        }
        else{
            $this->load->view("admin/login");
        }

    }

    public function login()
    {
        if($this->input->post('login')){

            $result=$this->admin_model->login('admin');
            if($result=='success'){
                $url=base_url()."admin/panel";
                redirect($url,'location');
            }
            elseif($result=='fail'){
                $this->session->set_flashdata('msg', 'Username or Password is incorrect');
                redirect(base_url('admin'), 'location');
            }
        }
        if($this->input->post('fsubmit')){

            $email = $this->input->post('email');
            $get_rows = $this->crud_model->numrows('admin','email',$email);
            if($get_rows==1){

                $password=rand(111,9999999);

                $mdpass=md5($password);

                $this->crud_model->update(array('password'=>$mdpass),"id","1","admin");

                $this->load->library('email');

                $this->email->from('admin@kreditkoncepts.com', 'Kredit Koncepts');
                $this->email->to($email);
                $this->email->subject('Forget Password');
                $msg='Your New Password: '.$password;

                $this->email->message($msg);
                $this->email->send();
                $data['fmsg']="New password has been generated and successfully sent to your email id";
            }
            else{
                $data['fmsg']="Email id not found";
            }
        }

        $this->load->view("admin/login",$data);
    }

    public function logout()
    {
        $this->admin_model->logout();
        $url=base_url()."admin";
        redirect($url,'location');
    }

    public function change_password()
    {
        $data['msg']='';
        $data['fmsg']='';
        //get admin details
        $id=$this->session->userdata('userid');

        if($this->input->post('csubmit')){

            $this->form_validation->set_rules("oldpassword","Old Password","trim|required|xss_clean");
            $this->form_validation->set_rules("password","Password","trim|required|xss_clean|min_length[6]");
            $this->form_validation->set_rules('cpassword', 'Password Confirmation', 'trim|required|xss_clean');

            if($this->form_validation->run()==TRUE)
            {
                $old_pwd = $this->input->post('oldpassword');
                $old_pwd_hash = md5($old_pwd);

                $check_old_pwd=$this->crud_model->numrows('admin','password',$old_pwd_hash);

                if($check_old_pwd != 0){
                    $pwd = $this->input->post('password');
                    $pwd_hash = md5($pwd);
                    $cpwd = $this->input->post('cpassword');

                    if($pwd==$cpwd){
                        $update = array(
                            'password'=>$pwd_hash,
                            'updated_time'=>date("Y-m-d H:i:s")
                        );

                        $result=$this->crud_model->update($update,'id',$id,'admin');
                        if($result==TRUE){
                            $data['msg']='success';
                        }
                        elseif($result==FALSE){
                            $data['msg']='fail';
                        }
                    }
                    else{
                        $data['msg']='Please retype your new password';
                    }
                }
                else{
                    $data['msg']='Your old password is incorrect';
                }
            }

        }

        $data['result']=$this->crud_model->select_row('id',$id,'admin');

        $data['logged_in']=$this->logged_in;

        //CSS REQUIRED FOR THIS PAGE ONLY
        $data['page_css']=null;
        $data['page_id']=1;
        $data['title']="Admin Panel | Change Password";
        $data['page_title']="Change Password";//page title
        $data['page_desc']="";//page desc
        $data['beforebreadcrumb']=array('Dashboard'=>'admin/panel');//breadcrumb
        $data['breadcrumb']="Change Password";//breadcrumb

        $this->load->view("admin/common/head",$data);
        $this->load->view("admin/common/menubar",$data);
        $this->load->view("admin/common/rightside",$data);
        $this->load->view("admin/common/title",$data);
        $this->load->view("admin/change_password",$data);
        $this->load->view("admin/common/footer");
    }

    public function panel()
    {
        //CSS REQUIRED FOR THIS PAGE ONLY
        $data['page_css']=array('assets/plugins/weather-icons/css/weather-icons.min.css','assets/plugins/nvd3/nv.d3.min.css');
        $data['page_id']=1;
        $data['logged_in']=$this->logged_in;
        $data['title']="Admin Panel";
        $data['page_title']="Dashboard";//page title
        $data['page_desc']="overview &amp; stats";//page desc
        $data['beforebreadcrumb']=null;
        $data['breadcrumb']="Dashboard";//breadcrumb

        //get admin details
        $id=$this->session->userdata('userid');
        $data['result']=$this->crud_model->select_row('id',$id,'admin');

        //get user details
        $data['users']=$this->crud_model->select('user');
        $data['website_details']=$this->crud_model->select('website_details');
        $this->load->view("admin/common/head",$data);
        $this->load->view("admin/common/menubar",$data);
        $this->load->view("admin/common/rightside",$data);
        $this->load->view("admin/common/title",$data);
        $this->load->view("admin/panel",$data);
        $this->load->view("admin/common/footer");
    }

    public function my_profile()
    {
        //get admin details
        $id=$this->session->userdata('userid');

        if($this->input->post('update')){
            $update = array(
                'firstname'=>$this->input->post('firstname'),
                'lastname'=>$this->input->post('lastname'),
                'address'=>$this->input->post('address'),
                'city'=>$this->input->post('city'),
                'email'=>$this->input->post('email'),
                'updated_time'=>date("Y-m-d H:i:s")
            );

            $result=$this->admin_model->update($update,'id',$id,'user');
            if($result=="yes"){
                $this->session->set_flashdata('msg', 'Successfully Register');
            }
            elseif($result=="no"){
                $this->session->set_flashdata('msg', 'Sorry, Something went to wrong');
            }

        }

        $data['result']=$this->admin_model->select_row('id',$id,'user');

        $data['logged_in']=$this->logged_in;

        //CSS REQUIRED FOR THIS PAGE ONLY
        $data['page_css']=null;
        $data['page_id']=1;
        $data['title']="Admin Panel | Profile";
        $data['page_title']="User Profile";//page title
        $data['page_desc']="user profile page";//page desc
        $data['beforebreadcrumb']=array('Dashboard'=>'admin/panel');//breadcrumb
        $data['breadcrumb']="User Profile";//breadcrumb

        $this->load->view("common/head",$data);
        $this->load->view("common/menubar",$data);
        $this->load->view("common/rightside",$data);
        $this->load->view("common/title",$data);
        $this->load->view("profile",$data);
        $this->load->view("common/footer");
    }

    public function users($page)
    {

        if($this->input->post('id')){

            $id= $this->input->post('id');
            $notes= $this->input->post('notes');
            $count= count($id);

            for($i=0;$i<=$count;$i++){
                //echo $id[$i].",".$notes[$i]."<br/>";
                $uid = $id[$i];
                $data = array(
                    'notes' =>$notes[$i]
                );
                $this->crud_model->update($data,'id',$uid,'user');
            }

        }
        //CSS REQUIRED FOR THIS PAGE ONLY
        $data['page_css']=array('assets/plugins/select2/select2.css');

        $data['title']="Admin Panel | Users list";
        if($page=="details_and_reports"){
            $data['page_id']=2;
            $data['page_title']="Users";//page title
            $data['page_desc']="Users list";//page desc
            $data['breadcrumb']="Users ";//breadcrumb
        }
        elseif($page=="mails_and_notes"){
            $data['page_id']=3;
            $data['page_title']="Users Mails and Notes";//page title
            $data['page_desc']="Users mails list and notes";//page desc
            $data['breadcrumb']="Users mails and notes ";//breadcrumb
        }

        $data['beforebreadcrumb']=array('Dashboard'=>'admin/panel');//breadcrumb


        $data['logged_in']=$this->logged_in;
        $data['result']=$this->crud_model->select_orderby('user','id','desc');
        $data['website_details']=$this->crud_model->select('website_details');

        $this->load->view("admin/common/head",$data);
        $this->load->view("admin/common/menubar",$data);
        $this->load->view("admin/common/rightside",$data);
        $this->load->view("admin/common/title",$data);
        $this->load->view('admin/users',$data);
        $this->load->view("admin/common/footer_for_table");
    }


    public function user_profile($id=null)
    {

        if($this->input->post('update')){

            $plan=$this->input->post('plan');
            if($plan){
                $update = array(
                    'payment_status'=>"yes",
                    'amount'=>$this->input->post('plan'),
                    'updated_time'=>date("Y-m-d H:i:s")
                );

                $result=$this->crud_model->update($update,'id',$id,'user');
                if($result=="yes"){
                    $dispute_d = $this->input->post('paymentdate');
                    if(!$dispute_d){
                        $dispute_d = date("Y-m-d H:i:s");
                    }

                    $update_website_table=array(
                        'dispute_status'=>1,
                        'dispute_date'=>$dispute_d,
                        'days_count'=>45,
                    );
                    $this->crud_model->update($update_website_table,'user_id',$id,'website_details');

                    $data['msg'] ="success";
                }
                elseif($result=="no"){
                    $data['msg'] ="fail";
                }
            }else{

                $update = array(
                    'payment_status'=>"",
                    'amount'=>$this->input->post('plan'),
                    'updated_time'=>date("Y-m-d H:i:s")
                );

                $result=$this->crud_model->update($update,'id',$id,'user');
                if($result==TRUE){

                    $update_website_table=array(
                        'dispute_status'=>0,
                        'dispute_date'=>"",
                        'days_count'=>0,
                    );
                    $this->crud_model->update($update_website_table,'user_id',$id,'website_details');

                    $data['msg'] ="success";
                }
                elseif($result==FALSE){
                    $data['msg'] ="fail";
                }
            }



            //proof id upload
            $upload_path='uploads/';
            $config['upload_path'] = './'.$upload_path;
            $config['allowed_types'] = 'gif|jpg|png|pdf';
            $config['max_size']	= '3024';
            $config['max_width']  = '2024';
            $config['max_height']  = '1768';

            $this->load->library('upload', $config);

            $field_name1 = "ssecurity_verification";
            $field_name2 = "address_proof";
            $field_name3 = "photo_id";



            /*$result=$this->crud_model->update($update,'id',$id,'user');
            if($result==TRUE){
                $data['msg']='success';
            }
            elseif($result==FALSE){
                $data['msg']='fail';
            }*/

            //upload user proof details
            if (!empty($_FILES['ssecurity_verification']['name']) && ! $this->upload->do_upload($field_name1))
            {
                $data['fmsg'] = array('error' => $this->upload->display_errors());
                $imagepath1=$this->input->post('ssecurity_verification_old');
            }
            else
            {
                if(!empty($_FILES['ssecurity_verification']['name'])){
                    $upload_data1=$this->upload->data();
                    $imagepath1 = $upload_path.$upload_data1['file_name'];
                }
                else{

                    if($this->input->post('ssecurity_verification_old')){
                        $imagepath1=$this->input->post('ssecurity_verification_old');
                    }
                    else{
                        $imagepath1=NULL;
                    }
                }
            }

            if (!empty($_FILES['address_proof']['name']) && ! $this->upload->do_upload($field_name2))
            {
                $data['fmsg'] = array('error' => $this->upload->display_errors());
                $imagepath2=$this->input->post('address_proof_old');
            }
            else
            {

                if(!empty($_FILES['address_proof']['name'])){
                    $upload_data2=$this->upload->data();
                    $imagepath2 = $upload_path.$upload_data2['file_name'];
                }
                else{
                    if($this->input->post('address_proof_old')){
                        $imagepath2=$this->input->post('address_proof_old');
                    }
                    else{
                        $imagepath2=NULL;
                    }
                }
            }

            if (!empty($_FILES['photo_id']['name']) && ! $this->upload->do_upload($field_name3))
            {
                $data['fmsg'] = array('error' => $this->upload->display_errors());
                $imagepath3=$this->input->post('photo_id_old');
            }
            else
            {
                if(!empty($_FILES['photo_id']['name'])){
                    $upload_data3=$this->upload->data();
                    $imagepath3 = $upload_path.$upload_data3['file_name'];
                }
                else{
                    if($this->input->post('photo_id_old')){
                        $imagepath3=$this->input->post('photo_id_old');
                    }
                    else{
                        $imagepath3=NULL;
                    }

                }
            }

            $insert['user_id']=$id;
            $insert['ssecurity_verification']=$imagepath1;
            $insert['address_proof']=$imagepath2;
            $insert['photo_id']=$imagepath3;

            //echo $imagepath1." ".$imagepath2." ".$imagepath3; die();

            $user_row = $this->crud_model->numrows('verification_proof','user_id',$id);	//check user proof details if already exist or not		
            if($user_row==1){
                $result=$this->crud_model->update($insert,'user_id',$id,'verification_proof');
            }
            else{
                $result=$this->crud_model->insert($insert,'verification_proof');
            }

        }


        $r=$this->crud_model->select_row('id',$id,'user');
        $data['result']=$r;
        $data['website_details']=$this->crud_model->select_row('user_id',$id,'website_details');
        $data['proofresult']=$this->crud_model->select_row('user_id',$id,'verification_proof');

        foreach($r as $get_read_status){
            if($get_read_status->read_status==0){
                $this->crud_model->update(array('read_status'=>1),'id',$id,'user');
            }
        }

        //CSS REQUIRED FOR THIS PAGE ONLY
        $data['page_css']=array("assets/plugins/datepicker/css/datepicker.css","assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css","assets/plugins/jQuery-Tags-Input/jquery.tagsinput.css");

        //JS REQUIRED FOR THIS PAGE ONLY
        $data['page_js']=array("assets/plugins/jquery-inputlimiter/jquery.inputlimiter.1.3.1.min.js","assets/plugins/autosize/jquery.autosize.min.js","assets/plugins/select2/select2.min.js","assets/plugins/jquery.maskedinput/src/jquery.maskedinput.js","assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js","assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js","assets/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js","assets/js/form-elements.js");


        $data['page_id']=2;
        $data['title']="Admin Panel | User Details";
        $data['page_title']="User Details";//page title
        $data['page_desc']="Users View / Edit";//page desc
        $data['beforebreadcrumb']=array('Dashboard'=>'admin/panel','Users'=>'admin/users/details_and_reports');//breadcrumb
        $data['breadcrumb']="users info";//breadcrumb

        $data['logged_in']=$this->logged_in;

        $this->load->view("admin/common/head",$data);
        $this->load->view("admin/common/menubar",$data);
        $this->load->view("admin/common/rightside",$data);
        $this->load->view("admin/common/title",$data);
        $this->load->view('admin/user_profile',$data);
        $this->load->view("admin/common/footer");
    }

    public function reports($id=null)
    {
        //CSS REQUIRED FOR THIS PAGE ONLY
        $data['page_css']=array('jquery.countdownTimer.css');
        $data['page_id']=2;
        $data['logged_in']=$this->logged_in;
        $data['title']="Admin Panel | Website Info";
        $data['page_title']="Credit Reports";//page title
        $data['page_desc']="Credit reports";//page desc
        $data['beforebreadcrumb']=array('Dashboard'=>'admin/panel','Users'=>'admin/users/details_and_reports');//breadcrumb
        $data['breadcrumb']="Reports";//breadcrumb

        if($this->input->post('update_timer')){

            $update = array('days_count'=>$this->input->post('days'));

            $result=$this->crud_model->update($update,'user_id',$id,'website_details');
            if($result==TRUE){
                $this->session->set_flashdata('msg', 'Successfully Updated');
            }
            elseif($result==FALSE){
                $this->session->set_flashdata('msg', 'Sorry, Something went to wrong');
            }

        }
        if($this->input->post('submitpdf')){
            //proof id upload
            $upload_path='uploads/';
            $config['upload_path'] = './'.$upload_path;
            $config['allowed_types'] = 'gif|jpg|png|pdf';
            $config['max_size']	= '5024';

            $this->load->library('upload', $config);

            $field_name = "pdffile";

            if (!empty($_FILES['pdffile']['name']) && ! $this->upload->do_upload($field_name))
            {
                $data['msg'] = array('error' => $this->upload->display_errors());
            }
            else
            {
                if(!empty($_FILES['pdffile']['name'])){
                    $upload_data1=$this->upload->data();
                    $imagepath1 = $upload_path.$upload_data1['file_name'];

                    $insert['user_id']=$id;
                    $insert['filepath']=$imagepath1;
                    $insert['created_time']=date("Y-m-d H:i:s");

                    $result=$this->crud_model->insert($insert,'user_files');
                }
                else{
                    $data['msg']['error']="File is not empty";
                }

            }

        }

        if($this->input->post('submit')){
            if($this->input->post('report_url')){
                $usermail=$this->input->post('usermail');
                $ds=$this->input->post('dispute_status');
                $update = array('report_url'=>$this->input->post('report_url'),'dispute_status'=>'0','days_count'=>'0');
            }

            $result=$this->crud_model->update($update,'user_id',$id,'website_details');
            if($result==TRUE){

                $this->load->library('email');

                $this->email->from('admin@kreditkoncepts.com', 'Kredit Koncepts');
                $this->email->to($usermail);

                if($ds==1){
                    $this->email->subject('Kredit Koncepts â€“ Getting Results');
                    $msg="It is likely that you have already begun to see responses from the three major credit bureaus and from creditors as well. Remember that these letters, revised credit reports, explanations, apologies and inquiries will be mailed directly to you, and we well update your Client Portal using the information updated from your credit monitoring site.\r\n\r\n
					Once your bureau and creditor responses are received, we will process a data entry function and organize your next group of disputes and interventions.
					If you have any questions what so ever, please do not hesitate to e-mail or messages us in your Contact Us tab.\r\n\r\n
					Received Letter From CRA Requesting ID\r\n\r\n
					You may have received a letter from a credit bureau requesting you to provide proof of your address and identity.  A lot of times the credit bureau will send these letters to stall a consumer's case, thereby giving them more time.  However, they also send these letters if a person has moved within the last year or so.\r\n\r\n
					Sincerely,\r\n\r\n
					Your Credit Team";
                }
                else{
                    $this->email->subject('Kredit Koncepts  - Welcome to the portal!!!');
                    $msg="We here at Kredit Koncepts are extremely excited about the portal and we think that you are going to love it too! Here in the portal you can quickly and easily see the progress you have made and will continue to make in your personal credit recovery. If you have any questions or comments, you can instantly send them to us by entering them into the â€œContact Usâ€ section in your portal.\r\n\r\n"
                        ."You can login here: www.kreditkoncepts.com/portal/login \r\n\r\n"
                        ."We are convinced that the portal will improve the quality and the amount of time it takes to reach your goals. \r\n\r\n"
                        ."We thank you for continuing to be a part of Kredit Koncepts and we look forward to helping you to reach the credit score that you desire!\r\n\r\n"
                        ."Sincerely,\r\n"
                        ."Your Credit Team";
                }
                $this->email->message($msg);
                $this->email->send();



                $updatestatus=array('status'=>1);
                $this->crud_model->update($updatestatus,'id',$id,'user');
                $this->session->set_flashdata('msg', 'Successfully Updated');
            }
            elseif($result==FALSE){
                $this->session->set_flashdata('msg', 'Sorry, Something went to wrong');
            }

        }



        $data['result']=$this->crud_model->select_row('user_id',$id,'website_details');
        $data['userfiles']=$this->crud_model->select_row('user_id',$id,'user_files');
        $data['userlist']=$this->crud_model->select_row('id',$id,'user');
        $r=$this->crud_model->select_row('id',$id,'user');
        foreach($r as $get_read_status){
            if($get_read_status->read_status==0){
                $this->crud_model->update(array('read_status'=>1),'id',$id,'user');
            }
        }

        $this->load->view("admin/common/head",$data);
        $this->load->view("admin/common/menubar",$data);
        $this->load->view("admin/common/rightside",$data);
        $this->load->view("admin/common/title",$data);
        $this->load->view("admin/reports",$data);
        $this->load->view("admin/common/footer");
    }


    public function scheduled_emails_list()
    {
        //CSS REQUIRED FOR THIS PAGE ONLY
        $data['page_css']=array('assets/plugins/select2/select2.css');

        $data['title']="Admin Panel | Scheduled Emails";
        $data['page_title']="Scheduled Emails";//page title
        $data['page_desc']="Scheduled Emails List";//page desc
        $data['breadcrumb']="Scheduled Emails";//breadcrumb		
        $data['page_id']=9;

        $data['beforebreadcrumb']=array('Dashboard'=>'admin/panel');//breadcrumb

        $data['logged_in']=$this->logged_in;
        $data['smailslist']=$this->crud_model->select_orderby('scheduled_emails',"id","desc");
        $data['mailslist']=$this->crud_model->select_orderby('email_templates',"id","desc");
        $this->load->view("admin/common/head",$data);
        $this->load->view("admin/common/menubar",$data);
        $this->load->view("admin/common/rightside",$data);
        $this->load->view("admin/common/title",$data);
        $this->load->view("admin/scheduled_emails",$data);
        $this->load->view("admin/common/footer_for_table");
    }
    public function datepicker(){
        //CSS REQUIRED FOR THIS PAGE ONLY
        $data['page_css']=array('assets/plugins/select2/select2.css','assets/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css','assets/plugins/bootstrap-modal/css/bootstrap-modal.css',"assets/plugins/datepicker/css/datepicker.css","assets/plugins/jQuery-Tags-Input/jquery.tagsinput.css");

        $data['title']="Admin Panel | Email - Templates";
        $data['page_title']="Email Templates";//page title
        $data['page_desc']="Email templates";//page desc
        $data['breadcrumb']="Email Templates";//breadcrumb		
        $data['page_id']=9;
        $data['user_id']=$id;
        $data['submenus']=$this->email_submenus($id);

        $data['beforebreadcrumb']=array('Dashboard'=>'admin/panel','Users Mails and Notes'=>'admin/users/mails_and_notes');//breadcrumb

        $data['logged_in']=$this->logged_in;
        $data['mailslist']=$this->crud_model->select_orderby('email_templates',"id","desc");

        $this->load->view("admin/common/head",$data);
        $this->load->view("admin/common/menubar",$data);
        $this->load->view("admin/common/rightside",$data);
        $this->load->view("admin/common/title",$data);
        $this->load->view("admin/datepicker",$data);
        $this->load->view("admin/common/footer_for_table");
    }
    public function choose_template_for_schedule_email()
    {
        if($this->input->post('schedule')){

            $sdate = $this->input->post('sdate');
            $sdate = date("Y-m-d",strtotime($sdate));

            $insert['email_template_id'] = $this->input->post('schedule');
            $insert['user_type'] = $this->input->post('ucategory');
            $insert['scheduled_date']  = $sdate;
            //$insert['created_time'] = date("Y-m-d H:i:s");

            $result = $this->crud_model->insert($insert,'scheduled_emails');
            if($result==TRUE){
                $data['msg']="success";
            }
            else{
                $data['msg']="fail";
            }
        }

        //CSS REQUIRED FOR THIS PAGE ONLY
        $data['page_css']=array('assets/plugins/select2/select2.css','assets/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css','assets/plugins/bootstrap-modal/css/bootstrap-modal.css',"assets/plugins/datepicker/css/datepicker.css","assets/plugins/jQuery-Tags-Input/jquery.tagsinput.css");

        $data['title']="Admin Panel | Email - Templates";
        $data['page_title']="Email Templates";//page title
        $data['page_desc']="Email templates";//page desc
        $data['breadcrumb']="Email Templates";//breadcrumb		
        $data['page_id']=9;
        $data['user_id']=$id;
        $data['submenus']=$this->email_submenus($id);

        $data['beforebreadcrumb']=array('Dashboard'=>'admin/panel','Users Mails and Notes'=>'admin/users/mails_and_notes');//breadcrumb

        $data['logged_in']=$this->logged_in;
        $data['mailslist']=$this->crud_model->select_orderby('email_templates',"id","desc");

        $this->load->view("admin/common/head",$data);
        $this->load->view("admin/common/menubar",$data);
        $this->load->view("admin/common/rightside",$data);
        $this->load->view("admin/common/title",$data);
        $this->load->view("admin/email_history_or_templates",$data);
        $this->load->view("admin/common/footer_for_table");
    }

    public function send_promocode()
    {
        if($this->input->post('email')){

            if($this->input->post('promo')):
                $to = $this->input->post('email');
                $message="Your PROMO CODE IS ".$this->input->post('promo');

                $this->load->library('email');

                $this->email->from('michi@example.com', 'Michi');
                $this->email->to($to);
                //$this->email->cc('another@another-example.com');
                //$this->email->bcc('them@their-example.com');

                $this->email->subject('PROMO CODE');
                $this->email->message($message);

                $this->email->send();

                $response_array['status'] = 'success';
                $response_array['email'] = $this->input->post('email');
                $response_array['promo'] = $this->input->post('promo');


            else:
                $response_array['status'] = 'fail';
            endif;
            header('Content-type: application/json');
            echo json_encode($response_array);
        }
    }

    public function delete_pdf_report($id){

        if($this->logged_in)
        {
            //delete reports pdf
            $get_reportpdf_path=$this->crud_model->select_row('id',$id,'user_files');
            foreach($get_reportpdf_path as $imgpath_rpdf):

                $uid=$imgpath_rpdf->user_id;

                $rpdf=$imgpath_rpdf->filepath;
                if($rpdf){
                    $rpdf_path=base_url().$rpdf;
                    unlink($rpdf);
                    $this->crud_model->delete('id',$id,'user_files');
                    //echo "success".$rpdf_path."<br/>";
                    $this->session->set_flashdata('flashmsg', 'success');
                }
                else{
                    $this->session->set_flashdata('flashmsg', 'fail');
                }
            endforeach;

            $url=base_url()."admin/reports/".$uid;
            redirect($url,'location');

        }else{
            $url=base_url()."admin/";
            redirect($url,'location');
        }

    }

    public function delete_user($id){

        if($this->logged_in)
        {
            //delete profile photo
            $get_photo_path=$this->crud_model->select_row('id',$id,'user');
            foreach($get_photo_path as $imgpath_photo):
                $photo=$imgpath_photo->photo;
                if($photo){
                    $photo_path=base_url().$photo;
                    unlink($photo_path);
                }
            endforeach;
            //delete reports pdf
            $get_reportpdf_path=$this->crud_model->select_row('user_id',$id,'user_files');
            foreach($get_reportpdf_path as $imgpath_rpdf):
                $rpdf=$imgpath_rpdf->filepath;
                if($rpdf){
                    $rpdf_path=base_url().$rpdf;
                    unlink($rpdf);
                    //echo "success".$rpdf_path."<br/>";
                }
                //else{
                //echo "fail";
                //}			
            endforeach;
            //delete verification proof
            $get_vp_path=$this->crud_model->select_row('user_id',$id,'verification_proof');
            foreach($get_vp_path as $imgpath_vp):
                $ss_v=$imgpath_vp->ssecurity_verification;
                if($ss_v){
                    $ss_v_path=base_url().$ss_v;
                    unlink($ss_v);
                    //echo "success".$rpdf_path."<br/>";
                }
                //else{
                //echo "fail";
                //}
                $ap_v=$imgpath_vp->address_proof;
                if($ap_v){
                    $ap_v_path=base_url().$ap_v;
                    unlink($ap_v);

                    //echo "success".$ap_v_path."<br/>";
                }
                //else{
                //echo "fail";
                //}		
                $pi_v=$imgpath_vp->photo_id;
                if($ap_v){
                    $pi_v_path=base_url().$pi_v;
                    unlink($pi_v);
                    //echo "success".$ap_v_path."<br/>";
                }
                //else{
                //echo "fail";
                //}		
            endforeach;

            $delete_result=$this->crud_model->delete('id',$id,'user');

            if($delete_result==TRUE){
                $delete_result1=$this->crud_model->delete('user_id',$id,'website_details');
                $this->crud_model->delete('user_id',$id,'verification_proof');
                $this->crud_model->delete('user_id',$id,'user_files');


            }
            $url=base_url()."admin/users/details_and_reports";
            redirect($url,'location');

        }else{
            $url=base_url()."admin/";
            redirect($url,'location');
        }


    }

    /////////////////////////////////////////////////////////////////////
    //Email//
    ////////////////////////////////////////////////////////////////////
    public function email_submenus($id){
        $submenus=array("Compose Email"=>"admin/compose_email/{$id}","Email History"=>"admin/email_history/{$id}","Email Templates"=>"admin/email_templates/{$id}");
        return $submenus;
    }

    public function delete($pagename,$id,$userid){

        if($this->logged_in)
        {
            $delete_result=$this->crud_model->delete('id',$id,$pagename);

            $url=base_url()."admin/{$pagename}/{$userid}";
            redirect($url,'location');

        }else{
            $url=base_url()."admin/";
            redirect($url,'location');
        }


    }


    public function compose_email($id=null,$template_id=null){

        $getuser_details=$this->crud_model->select_row('id',$id,'user');
        foreach($getuser_details as $get_mailid){
            $usermail = $get_mailid->email;
            $data['usermail'] = $usermail;
        }

        if($this->input->post('submit')){

            $subject = $this->input->post('subject');
            $msg1 = $this->input->post('content');
            if(strpos($msg1,'../../../') == true) {
                $msg = str_replace("../../../", "http://kreditkoncepts.com/portal/", $msg1);
            }
            elseif(strpos($msg1,'../../') == true) {
                $msg = str_replace("../../", "http://kreditkoncepts.com/portal/", $msg1);
            }else{
                $msg = $msg1;
            }

            $this->load->library('email');
            $config['mailtype'] = 'html';
            $this->email->initialize($config);

            $this->email->from('admin@kreditkoncepts.com', 'Kredit Koncepts');
            $this->email->to($usermail);
            $this->email->subject($subject);
            $this->email->message($msg);

            $data['msg'] = "Sending Failed";
            $st= "Sending Failed";
            if($this->email->send()){
                $data['msg'] = "Mail sent...";
                $st= "Mail Sent";
            }
            $insert = array(
                'user_id'=>$id,
                'email'=>$usermail,
                'subject'=>$this->input->post('subject'),
                'content'=>$msg,
                'created_time'=>date("Y-m-d H:i:s"),
                'status'=>$st
            );
            $result=$this->crud_model->insert($insert,'email_history');
        }
        if($template_id){
            $data['gettemplate_details']=$this->crud_model->select_row('id',$template_id,'email_templates');
        }
        $data['title']="Admin Panel | Email - New";
        $data['page_title']="Compose Email";//page title
        $data['page_desc']="Compose new email";//page desc
        $data['breadcrumb']="Compose Email";//breadcrumb
        $data['page_id']="sp1";
        $data['submenus']=$this->email_submenus($id);

        $data['beforebreadcrumb']=array('Dashboard'=>'admin/panel','Users Mails And Notes'=>'admin/users/mails_and_notes');//breadcrumb

        $data['logged_in']=$this->logged_in;
        $data['result']=$this->crud_model->select_orderby('user','id','desc');

        $this->load->view("admin/common/head",$data);
        $this->load->view("admin/common/menubar",$data);
        $this->load->view("admin/common/rightside",$data);
        $this->load->view("admin/common/title",$data);
        $this->load->view("admin/mail_new_mail",$data);
        $this->load->view("admin/common/footer");

    }

    public function email_template($id=null,$template_id=null){

        if($this->input->post('submit')){
            $insert['title'] = $this->input->post('title');
            $insert['subject'] = $this->input->post('subject');
            $msg1 = $this->input->post('content');
            if(strpos($msg1,'../../../') == true) {
                $msg = str_replace("../../../", "http://kreditkoncepts.com/portal/", $msg1);
            }
            elseif(strpos($msg1,'../../') == true) {
                $msg = str_replace("../../", "http://kreditkoncepts.com/portal/", $msg1);
            }
            else{
                $msg = $msg1;
            }
            $insert['content'] = $msg;

            if($template_id){
                $insert['last_modified'] = date("Y-m-d H:i:s");
                $result=$this->crud_model->update($insert,'id',$template_id,'email_templates');
            }
            else{
                $insert['created_time'] = date("Y-m-d H:i:s");
                $result=$this->crud_model->insert($insert,'email_templates');
            }

            if($result==TRUE){
                $data['msg']="Email Template Successfully Stored";
            }
            else{
                $data['msg']="fail";
            }
        }
        //echo "id:".$id; die();
        $data['title']="Admin Panel | Email Templates";
        $data['page_title']="Email Templates";//page title
        $data['page_desc'] = "";//page desc
        $data['breadcrumb']="Email Templates";//breadcrumb
        $data['page_id']="sp4";
        $data['submenus']=$this->email_submenus($id);

        $data['beforebreadcrumb']=array('Dashboard'=>'admin/panel','Users Mails And Notes'=>'admin/users/mails_and_notes');//breadcrumb

        $data['logged_in']=$this->logged_in;

        if($template_id){
            $data['gettemplate_details']=$this->crud_model->select_row('id',$template_id,'email_templates');
        }

        $this->load->view("admin/common/head",$data);
        $this->load->view("admin/common/menubar",$data);
        $this->load->view("admin/common/rightside",$data);
        $this->load->view("admin/common/title",$data);
        $this->load->view("admin/mail_new_mail",$data);
        $this->load->view("admin/common/footer");

    }

    public function email_history($id=null){

        //CSS REQUIRED FOR THIS PAGE ONLY
        $data['page_css']=array('assets/plugins/select2/select2.css');

        $data['title']="Admin Panel | Email - History";
        $data['page_title']="Email History";//page title
        $data['page_desc']="List of sent emails";//page desc
        $data['breadcrumb']="Email History";//breadcrumb
        $data['page_id']="sp2";
        $data['user_id']=$id;
        $data['submenus']=$this->email_submenus($id);

        $data['beforebreadcrumb']=array('Dashboard'=>'admin/panel','Users Mails and Notes'=>'admin/users/mails_and_notes');//breadcrumb

        $data['logged_in']=$this->logged_in;
        $where = array('user_id'=>$id);
        $data['mailslist']=$this->crud_model->select_orderby_where($where,'email_history','id','desc');

        $this->load->view("admin/common/head",$data);
        $this->load->view("admin/common/menubar",$data);
        $this->load->view("admin/common/rightside",$data);
        $this->load->view("admin/common/title",$data);
        $this->load->view("admin/email_history_or_templates",$data);
        $this->load->view("admin/common/footer_for_table");
    }

    public function email_templates($id=null){

        //CSS REQUIRED FOR THIS PAGE ONLY
        $data['page_css']=array('assets/plugins/select2/select2.css');

        $data['title']="Admin Panel | Email - Templates";
        $data['page_title']="Email Templates";//page title
        $data['page_desc']="Email templates";//page desc
        $data['breadcrumb']="Email Templates";//breadcrumb		
        $data['page_id']="sp3";
        $data['user_id']=$id;
        $data['submenus']=$this->email_submenus($id);

        $data['beforebreadcrumb']=array('Dashboard'=>'admin/panel','Users Mails and Notes'=>'admin/users/mails_and_notes');//breadcrumb

        $data['logged_in']=$this->logged_in;
        $data['mailslist']=$this->crud_model->select_orderby('email_templates',"id","desc");

        $this->load->view("admin/common/head",$data);
        $this->load->view("admin/common/menubar",$data);
        $this->load->view("admin/common/rightside",$data);
        $this->load->view("admin/common/title",$data);
        $this->load->view("admin/email_history_or_templates",$data);
        $this->load->view("admin/common/footer_for_table");
    }



    /////////////////////////////////////////////////////////////////////
    //cms pages//
    ////////////////////////////////////////////////////////////////////


    public function register_cms(){


        if($this->input->post('update')){


            //proof id upload
            $upload_path='images/';
            $config['upload_path'] = './'.$upload_path;
            $config['allowed_types'] = 'gif|jpg|png|pdf';
            $config['max_size']	= '3024';
            $config['max_width']  = '2024';
            $config['max_height']  = '1768';

            $this->load->library('upload', $config);


            $photo="photo";
            if (!empty($_FILES['photo']['name']) && ! $this->upload->do_upload($photo))
            {
                $data['fmsg'] = array('error' => $this->upload->display_errors());
            }
            else
            {
                if(!empty($_FILES['photo']['name'])){
                    $upload_data1=$this->upload->data();
                    $photopath = $upload_path.$upload_data1['file_name'];
                }
                else{
                    $photopath=$this->input->post('photo_old');
                }
            }

            $update = array(
                'bg_image'=>$photopath,
                'content'=>$this->input->post('content'),
                'button_name'=>$this->input->post('button_name'),
                'button_link'=>$this->input->post('button_link'),
            );

            $result=$this->crud_model->update($update,'id','1','cms_register');
            if($result==TRUE){
                $data['msg']='success';
            }
            elseif($result==FALSE){
                $data['msg']='fail';
            }
        }

        //CSS REQUIRED FOR THIS PAGE ONLY


        $data['title']="Admin Panel | CMS";
        $data['page_id']=3;
        $data['page_title']="Register Page | cms";//page title
        $data['page_desc']="client register page cms";//page desc
        $data['beforebreadcrumb']=array('Dashboard'=>'admin/panel');//breadcrumb
        $data['breadcrumb']="Register";//breadcrumb

        $data['logged_in']=$this->logged_in;
        $data['result']=$this->crud_model->select_orderby('user','id','desc');

        $data['cms_results'] = $this->crud_model->select('cms_register');

        $this->load->view("admin/common/head",$data);
        $this->load->view("admin/common/menubar",$data);
        $this->load->view("admin/common/rightside",$data);
        $this->load->view("admin/common/title",$data);
        $this->load->view("admin/cms_register",$data);
        $this->load->view("admin/common/footer");

    }



    public function client_panel_cms(){


        if($this->input->post('update')){
            //proof id upload
            $upload_path='images/';
            $config['upload_path'] = './'.$upload_path;
            $config['allowed_types'] = 'gif|jpg|png|pdf';
            $config['max_size']	= '3024';
            $config['max_width']  = '2024';
            $config['max_height']  = '1768';

            $this->load->library('upload', $config);


            $image="image";
            if (!empty($_FILES['image']['name']) && ! $this->upload->do_upload($image))
            {
                $data['fmsg'] = array('error' => $this->upload->display_errors());
            }
            else
            {
                if(!empty($_FILES['image']['name'])){
                    $upload_data1=$this->upload->data();
                    $photopath = $upload_path.$upload_data1['file_name'];
                }
                else{
                    $photopath=$this->input->post('image_old');
                }
            }

            $update = array(
                'image'=>$photopath,
                'c_title'=>$this->input->post('c_title'),
                'content'=>$this->input->post('content'),
                'title1'=>$this->input->post('title1'),
                'image'=>$photopath,
                'title2'=>$this->input->post('title2'),
                'summary'=>$this->input->post('summary'),
                'status'=>$this->input->post('status'),
                'attachments'=>$this->input->post('attachments'),
                'contactus'=>$this->input->post('contactus'),
                'knowledge'=>$this->input->post('knowledge'),
                'referclients'=>$this->input->post('referclients'),
                'bottom_content'=>$this->input->post('bottom_content'),
                'last_modified'=>date("Y-m-d H:i:s")
            );

            $result=$this->crud_model->update($update,'id','1','cms_client_dashboard');
            if($result==TRUE){
                $data['msg']='success';
            }
            elseif($result==FALSE){
                $data['msg']='fail';
            }
        }

        //CSS REQUIRED FOR THIS PAGE ONLY


        $data['title']="Admin Panel | CMS";
        $data['page_id']=4;
        $data['page_title']="Client Panel Home | cms";//page title
        $data['page_desc']="Client Panel cms";//page desc
        $data['beforebreadcrumb']=array('Dashboard'=>'admin/panel');//breadcrumb
        $data['breadcrumb']="Client Panel";//breadcrumb

        $data['logged_in']=$this->logged_in;
        $data['result']=$this->crud_model->select_orderby('user','id','desc');

        $data['cms_results'] = $this->crud_model->select_row('id',1,'cms_client_dashboard');

        $this->load->view("admin/common/head",$data);
        $this->load->view("admin/common/menubar",$data);
        $this->load->view("admin/common/rightside",$data);
        $this->load->view("admin/common/title",$data);
        $this->load->view("admin/cms_client_panel",$data);
        $this->load->view("admin/common/footer");

    }

    public function dispute_cms(){


        if($this->input->post('update')){

            $update = array(
                'title'=>$this->input->post('title'),
                'content'=>$this->input->post('contentt'),
                'package1'=>$this->input->post('price1'),
                'package2'=>$this->input->post('price2'),
                'package3'=>$this->input->post('price3'),
                'bottom_content'=>$this->input->post('bottom_content'),
                'last_modified'=>date("Y-m-d H:i:s")
            );

            $result=$this->crud_model->update($update,'id','1','cms_dispute');
            if($result==TRUE){
                $data['msg']='success';
            }
            elseif($result==FALSE){
                $data['msg']='fail';
            }
        }

        //CSS REQUIRED FOR THIS PAGE ONLY


        $data['title']="Admin Panel | CMS";
        $data['page_id']=5;
        $data['page_title']="Dispute | cms";//page title
        $data['page_desc']="Dispute cms";//page desc
        $data['beforebreadcrumb']=array('Dashboard'=>'admin/panel');//breadcrumb
        $data['breadcrumb']="Dispute";//breadcrumb

        $data['logged_in']=$this->logged_in;
        $data['result']=$this->crud_model->select_orderby('user','id','desc');

        $data['cms_results'] = $this->crud_model->select_row('id',1,'cms_dispute');

        $this->load->view("admin/common/head",$data);
        $this->load->view("admin/common/menubar",$data);
        $this->load->view("admin/common/rightside",$data);
        $this->load->view("admin/common/title",$data);
        $this->load->view("admin/cms_dispute",$data);
        $this->load->view("admin/common/footer");

    }



    //common pages cms
    public function pages($page_name){

        if($this->input->post('update')){
            $id=$this->input->post('id');
            $update = array(
                'title'=>$this->input->post('title'),
                'content'=>$this->input->post('content'),
                'last_modified'=>date("Y-m-d H:i:s")
            );
            $result=$this->crud_model->update($update,'id',$id,'cms_pages');
            if($result==TRUE){
                $data['msg']='success';
            }
            elseif($result==FALSE){
                $data['msg']='fail';
            }
        }

        if($page_name=="dispute_tactics_cms"){
            $data['title']="Admin Panel | CMS - Dispute Tactices";
            $data['page_title']="Dispute Tactices Page | cms";//page title
            $data['page_desc']="Client Dispute Tactices page cms";//page desc
            $data['breadcrumb']="Dispute Tactices";//breadcrumb
            $data['page_id']=4;
            $data['cms_results'] = $this->crud_model->select_row('id',1,'cms_pages');
        }
        elseif($page_name=="recipt_cms"){
            $data['title']="Admin Panel | CMS - Recipt";
            $data['page_title']="Receipt Page | cms";//page title
            $data['page_desc']="Client Recipts page cms";//page desc
            $data['breadcrumb']="Receipt";//breadcrumb
            $data['page_id']=5;
            $data['cms_results'] = $this->crud_model->select_row('id',2,'cms_pages');
        }

        $data['beforebreadcrumb']=array('Dashboard'=>'admin/panel');//breadcrumb

        $data['logged_in']=$this->logged_in;
        $data['result']=$this->crud_model->select_orderby('user','id','desc');

        $this->load->view("admin/common/head",$data);
        $this->load->view("admin/common/menubar",$data);
        $this->load->view("admin/common/rightside",$data);
        $this->load->view("admin/common/title",$data);
        $this->load->view("admin/cms_pages",$data);
        $this->load->view("admin/common/footer");

    }

}