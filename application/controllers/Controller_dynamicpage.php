<?php
class Controller_dynamicpage extends CI_Controller {

        public function __construct()
         {
              parent::__construct();
              $this->load->model('model_sql');
              
         }



         public function showview()
         {
              #echo ('<script>alert("controllers_showview")</script>');
              
              $data['news_item'] = $this->model_sql->get_sql();
              
              if (empty($data['news_item']))
              {
               show_404();
              }

              $data['title'] = $data['news_item']['title'];

              $this->load->view('templates/header', $data);
              $this->load->view('dynamicpage/index', $data);
              $this->load->view('templates/footer');
         }
         public function showview_home()
         {
              $this->load->helper('form');
              $this->load->library('form_validation');
              $this->form_validation->set_rules('classN', 'classN', 'required');          
              
              $classname = $this->input->get('classN');
              $teachername = $this->input->get('teachername');
              $major = $this->input->get('major');  
              #echo ('<script>alert("'.$classname.'")</script>');
              #echo ('<script>alert("'.$teachername.'")</script>');
              #echo ('<script>alert("'.$major.'")</script>');
              if (!empty($classname))
              {
                header('Location:Sclassname?classname='.$classname); 
              }
              if (!empty($teachername))
              {
                header('Location:Steachername?teachername='.$teachername); 
              }
              if (!empty($major))
              {
                header('Location:Smajor?major='.$major); 
              }
              
              
              if (! file_exists(APPPATH.'views/dynamicpage/home.php'))
              {
               #echo ('<script>alert("file_exists")</script>');
               show_404();
              }
              
              $data['quert'] = $this->model_sql->get_sql_all('nfu',10);
              $this->model_sql->insert_login($list='LoginDoc',$LoginIP=$_SERVER['REMOTE_ADDR']);
              $this->load->view('templates/header');
              $this->load->view('dynamicpage/home',$data);
              $this->load->view('templates/footer');
         }
         public function showview_class()
         {
             
              
              $data['quert'] = $this->model_sql->get_sql_all('nfuclass','Null');
              if (empty($data['quert']))
              {
               show_404();
              }
              
              /* $data['teacherN'] = $data['quert']['teacherN']; */
              $this->load->view('templates/header');
              $this->load->view('dynamicpage/classlist',$data);
              $this->load->view('templates/footer');
         }
         public function showview_searchclassname()
         {
              #echo ('<script>alert("showview_searchclassname")</script>');
              $classname = $this->input->get('classname');
              #echo ('<script>alert("$classname ='.$classname.'")</script>');
              #echo ('<script>alert("showview_searchclassname")</script>');

              $data['quert'] = $this->model_sql->get_sql_like('nfu','classN',$classname,null);
              if (empty($data['quert']))
              {
               echo ('<script>alert("查無相關資料")</script>');
              }
              
              /* $data['teacherN'] = $data['quert']['teacherN']; */
              $this->load->view('templates/header');
              $this->load->view('dynamicpage/searchclassname',$data);
              $this->load->view('templates/footer');
         }
         public function showview_searchteachername()
         {
              #echo ('<script>alert("showview_searchclassname")</script>');
              $teachername = $this->input->get('teachername');
              #echo ('<script>alert("$teachername ='.$teachername.'")</script>');
              #echo ('<script>alert("showview_searchclassname")</script>');

              $data['quert'] = $this->model_sql->get_sql_like('nfu','teacherN',$teachername,null);
              if (empty($data['quert']))
              {
               echo ('<script>alert("查無相關資料")</script>');
              }
              
              /* $data['teacherN'] = $data['quert']['teacherN']; */
              $this->load->view('templates/header');
              $this->load->view('dynamicpage/searchclassname',$data);
              $this->load->view('templates/footer');
         }
         public function showview_searchmajor()
         {
              #echo ('<script>alert("showview_searchclassname")</script>');
              $major = $this->input->get('major');
              #echo ('<script>alert("$major ='.$major.'")</script>');
              #echo ('<script>alert("showview_searchclassname")</script>');

              $data['quert'] = $this->model_sql->get_sql_like('nfu','major',$major,null);
              if (empty($data['quert']))
              {
               echo ('<script>alert("查無相關資料")</script>');
              }
              
              /* $data['teacherN'] = $data['quert']['teacherN']; */
              $this->load->view('templates/header');
              $this->load->view('dynamicpage/searchclassname',$data);
              $this->load->view('templates/footer');
         }
         public function showview_more()
         {
             
              $page = $this->input->get('page', TRUE);
               if ($page<0)
              {
               header('Location:home'); 
              }
              if ($page>12)
              {
                 
              }
              $data['quert'] = $this->model_sql->get_sql('nfu','id','>',($page*10),10);
              /* $data['cownumber'] = count($this->model_sql->get_sql_all('nfu','Null')); */
              $allcow=(count($this->model_sql->get_sql_all('nfu','Null')))-1;
              $q=$this->model_sql->get_sql_all('nfu','Null');
              /* floor($q[$allcow]['id']/10) */
              
              
              
              
              
              #echo ('<script>alert("'.print_r($q).'")</script>');
              #echo ('<script>alert("'.floor($q[$allcow]['id']/10).'")</script>');
              #echo ('<script>alert("'.$page.'")</script>');
              $data['cownumber']=$q[$allcow]['id'];
              if (empty($data['quert']))
              {
               header('Location:home');
              }              
              $data['page'] = $page;
              
              /* $data['teacherN'] = $data['quert']['teacherN']; */
              $this->load->view('templates/header');
              $this->load->view('dynamicpage/more',$data);
              $this->load->view('templates/footer');
         }
         
         public function showview_insertsql()
         { 
            if (! file_exists(APPPATH.'views/dynamicpage/sqlinsert.php'))
            {
              show_404();
            }              
                  
                  
                  
            #echo ('<script>alert("$this->form_validation =false")</script>');
            $this->load->view('templates/header'); 
            $this->load->view('dynamicpage/insertpage');
            $this->load->view('templates/footer');
                       
                  
         }
         
        public function showview_detail()
         {

              $id = $this->input->get('id');
              $data['quert'] = $this->model_sql->get_sql($list='nfu','id',$logic='=',$id,1);
              $data['recall'] = $this->model_sql->get_sql($list='nfu_recall','Postid',$logic='=',$id);
              $data['quert'] = $data['quert'][0];
              if (empty($data['quert']))
              {
               #echo ('<script>alert("查無相關資料")</script>');
               header('Location:home');
              }
              if($data['quert']['classcall']==1){$data['quert']['classcall']="有";}else{$data['quert']['classcall']="無";}
              if($data['quert']['homework']==1){$data['quert']['homework']="有";}else{$data['quert']['homework']="無";}
              if($data['quert']['classexam']==1){$data['quert']['classexam']="有";}else{$data['quert']['classexam']="無";}
              /* $data['teacherN'] = $data['quert']['teacherN']; */
              $this->load->view('templates/header');
              $this->load->view('dynamicpage/detail',$data);
              $this->load->view('templates/footer_slim');
         }
         public function insertsql_nfu()
         {
                /* google 人類驗證 */
             // Register API keys at https://www.google.com/recaptcha/admin
             $siteKey = "6LcpjSETAAAAAHoNFC74VTS1SsH0sw7a_Xh5TJoW";
             $secret = "6LcpjSETAAAAAH0b48LrhMY1w-FelOHEq5RFUnxR";
             require_once APPPATH."lib/recaptchalib.php";
             // The response from reCAPTCHA
             $resp = null;
             // The error code from reCAPTCHA, if any
             $error = null;

             $reCaptcha = new ReCaptcha($secret);
                /* google 人類驗證結束 */
                
             #echo ('<script>alert("insertsql_nfu")</script>');   
             $g_recaptcha_response = $this->input->post('g-recaptcha-response');
             if (isset($g_recaptcha_response)){
              #echo ('<script>alert("$g_recaptcha_response不是空值")</script>');     
              $resp = $reCaptcha->verifyResponse($_SERVER["REMOTE_ADDR"],$_POST["g-recaptcha-response"]);
                 
             }
             if($resp!=null&& $resp->success){
                 #echo ('<script>alert("$g_recaptcha_response success")</script>'); 
                $classN = $this->input->post('classN');
                $teacherN = $this->input->post('teacherN'); 
                $major = $this->input->post('major'); 
                $classcall = $this->input->post('classcall'); 
                $classexam = $this->input->post('classexam'); 
                $homework = $this->input->post('homework'); 
                $midexam = $this->input->post('midexam'); 
                $endexam = $this->input->post('endexam'); 
                $cost = $this->input->post('cost'); 
                $value = $this->input->post('value'); 
                $say = $this->input->post('say');                 
                
                $this->model_sql->insert_nfu('nfu',$classN,$teacherN,$major,$midexam,$endexam,$say,$value,$cost,$classcall,$homework,$classexam);
                echo ('<script>alert("新增成功")</script>');
                header('Location:home');
                $this->load->view('templates/header');
                $this->load->view('dynamicpage/success');
                $this->load->view('templates/footer');
                
            }
            else{
                $this->load->view('templates/header');
                $this->load->view('dynamicpage/sqlinsert');
                $this->load->view('templates/footer');
            }
            
            
         }
        public function showview_insertrecall()
         {
             
             $id = $this->input->get('id');
             $data['quert'] = $this->model_sql->get_sql($list='nfu','id',$logic='=',$id,1);
             $data['quert'] = $data['quert'][0];
             if (! file_exists(APPPATH.'views/dynamicpage/sqlinsert.php'))
            {
              show_404();
            }              
                  
                  
                  
            #echo ('<script>alert("$this->form_validation =false")</script>');
            $this->load->view('templates/header'); 
            $this->load->view('dynamicpage/insertcall',$data);
            $this->load->view('templates/footer');
            
            
         }
       public function insertsql_recall()
         {
                /* google 人類驗證 */
             // Register API keys at https://www.google.com/recaptcha/admin
             $siteKey = "6LcpjSETAAAAAHoNFC74VTS1SsH0sw7a_Xh5TJoW";
             $secret = "6LcpjSETAAAAAH0b48LrhMY1w-FelOHEq5RFUnxR";
             require_once APPPATH."lib/recaptchalib.php";
             // The response from reCAPTCHA
             $resp = null;
             // The error code from reCAPTCHA, if any
             $error = null;

             $reCaptcha = new ReCaptcha($secret);
                /* google 人類驗證結束 */
                
             #echo ('<script>alert("insertsql_recall")</script>');   
             $g_recaptcha_response = $this->input->post('g-recaptcha-response');
             if (isset($g_recaptcha_response)){
              #echo ('<script>alert("$g_recaptcha_response不是空值")</script>');     
              $resp = $reCaptcha->verifyResponse($_SERVER["REMOTE_ADDR"],$_POST["g-recaptcha-response"]);
                 
             }
             if($resp!=null&& $resp->success){
                #echo ('<script>alert("$g_recaptcha_response success")</script>'); 
                $recall = $this->input->post('recall');
                $postid = $this->input->get('id');             
                
                $this->model_sql->insert_recall('nfu_recall',$recall,$postid);
                echo ('<script>alert("新增成功")</script>');
                header('Location:detail?id='.$postid);
                $this->load->view('templates/header');
                $this->load->view('dynamicpage/success');
                $this->load->view('templates/footer');
                
            }
            else{
                $this->load->view('templates/header');
                $this->load->view('dynamicpage/sqlinsert');
                $this->load->view('templates/footer');
            }
            
            
         }
        
}
