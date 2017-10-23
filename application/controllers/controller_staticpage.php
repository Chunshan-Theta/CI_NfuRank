<?php
class controller_staticpage extends CI_Controller {


        /* public function view($page = 'home') */
        public function showview($page = 'home')
        {
                echo('<script>alert("controller_staticpage/showview");</script>');
                if ( ! file_exists(APPPATH.'views/staticpage/'.$page.'.php'))
                {
                        // Whoops, we don't have a page for that!
                        show_404();
                }

                $data['title'] = ucfirst($page); // Capitalize the first letter
                $data['subtitle'] = 'subtitle'; // Capitalize the first letter

                $this->load->view('templates/header',$data);
                $this->load->view('staticpage/'.$page);
                $this->load->view('templates/footer');
        }
        
        
        
}
