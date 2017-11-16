<?php
class Model_sql extends CI_Model {

     public function __construct()
     {
                   $this->load->database();
     }
     
     public function get_sql($list='news',$Field='id',$logic='=',$slug='1',$number='null')
     {
                  #echo ('<script>alert("model_get_sql")</script>'); 
                  #echo ('<script>alert("list & Field & slug = '.$list.' & '.$Field.' & '.$slug.'")</script>');
                  #echo ('<script>alert("SQL limit '.$number.'")</script>');
                  
                  $query = $this->db->get_where($list, array($Field.$logic =>$slug),$number); 
                  
                  return $query->result_array();
     }
      public function get_sql_like($list='news',$Field='id',$slug='1',$number=1)
     {
                  #echo ('<script>alert("model_get_sql")</script>'); 
                  #echo ('<script>alert("list & Field & slug = '.$list.' & '.$Field.' & '.$slug.'")</script>');
                  #echo ('<script>alert("SQL limit '.$number.'")</script>');
                  
                  $this->db->select('*');
                  $this->db->from($list);
                  $this->db->like($Field, $slug);
                  $this->db->limit($number);                         
                  $query = $this->db->get();
                  #$query = $this->db->get_where($list, $query,$number); 
                  
                  return $query->result_array();
     }
     public function get_sql_all($list='news',$number='null')
     {
                  #echo ('<script>alert("model_get_sql_all")</script>'); 
                  #echo ('<script>alert("list = '.$list.'")</script>');                  
                  #echo ('<script>alert("SQL limit '.$number.'")</script>');
                  $query = $this->db->get($list,$number);  
                  
                  return $query->result_array();
     }

     public function insert_nfu($list='nfu',$classN="classN",$teacherN="teacherN",$major="major",$midexam="midexam",$endexam="endexam",$say="say",$value="value",$cost="cost",$classcall="1",$homework="1",$classexam="1",$posttime='CURRENT_TIMESTAMP',$error='null')
     {              
                  #echo ('<script>alert("model_insert_nfu")</script>');
                  $this->load->helper('url');
                  
                  $slug = url_title($this->input->post('title'), 'dash', TRUE);
                  
                  $data = array(
                   'classN' => $this->model_sql->textcheck($classN),
                   'teacherN' => $this->model_sql->textcheck($teacherN),
                   'major' => $this->model_sql->textcheck($major),
                   'midexam' => $this->model_sql->textcheck($midexam),
                   'endexam' => $this->model_sql->textcheck($endexam),
                   'say' => $this->model_sql->textcheck($say),
                   'value' => $this->model_sql->textcheck($value),
                   'cost' =>$this->model_sql->textcheck($cost),
                   'classcall' => $this->model_sql->textcheck($classcall),
                   'homework' => $this->model_sql->textcheck($homework),
                   'classexam' => $this->model_sql->textcheck($classexam),
                   /* 
                   'posttime' => $posttime,
                   'error' => $error, 
                   */
                  );
                  
                  return $this->db->insert($list, $data);
     }
     public function insert_recall($list='nfu',$recall="hello",$postid='0')
     {              
                  #echo ('<script>alert("model_insert_nfu")</script>');
                  $this->load->helper('url');
                  
                  $slug = url_title($this->input->post('title'), 'dash', TRUE);
                  
                  $data = array(
                   'content' => $this->model_sql->textcheck($recall),
                   'Postid' => $this->model_sql->textcheck($postid),
                   /* 
                   'posttime' => $posttime,
                   'error' => $error, 
                   */
                  );
                  
                  return $this->db->insert($list, $data);
     }
     public function insert_login($list='LoginDoc',$LoginIP="127.0.0.1")
     {              
                  #echo ('<script>alert("model_insert_nfu")</script>');
                  $this->load->helper('url');
                  
                  $slug = url_title($this->input->post('title'), 'dash', TRUE);
                  
                  $data = array(
                   'LoginIP' => $this->model_sql->textcheck($LoginIP),
                  );
                  
                  return $this->db->insert($list, $data);
     }
     public function textcheck($s){
            /* 非法字元 */
            $s = str_replace ("<","",$s);
            $s = str_replace ('"',"'",$s);
            $s = str_replace ("&","",$s);
            $s = str_replace ("%","",$s);
            $s = str_replace ("!","",$s);
            $s = str_replace ("#","",$s);
            $s = str_replace ("@","",$s);
            $s = str_replace ("^","",$s);
            $s = str_replace ("*","",$s);
            $s = str_replace ("_","",$s);
            $s = str_replace ("--","",$s);
            $s = str_replace (";","",$s);
            $s = str_replace (">","",$s);
            $s = str_replace ("?php","",$s);
            $s = str_replace ("href","",$s);
            $s = str_replace ("script","",$s);

            $s = str_replace ("and","",$s);
            $s = str_replace ("exec","",$s);
            $s = str_replace ("insert","",$s);
            $s = str_replace ("delete","",$s);
            $s = str_replace ("select","",$s);
            $s = str_replace ("update","",$s);
            $s = str_replace ("count","",$s);
            $s = str_replace ("chr","",$s);
            $s = str_replace ("mid","",$s);
            $s = str_replace ("master","",$s);
            $s = str_replace ("truncate","",$s);
            $s = str_replace ("char","",$s);
            $s = str_replace ("declare","",$s);
            $s = str_replace ("union","",$s);
            $s = str_replace ("alert","",$s);
            $s = str_replace ("src","",$s);
            
            /* SQL 欄位名 */
            $s = str_replace ("classN","",$s);
            $s = str_replace ("teacherN","",$s);
            $s = str_replace ("major","",$s);
            $s = str_replace ("midexam","",$s);
            $s = str_replace ("endexam","",$s);
            $s = str_replace ("say","",$s);
            $s = str_replace ("value","",$s);
            $s = str_replace ("cost","",$s);
            $s = str_replace ("classcall","",$s);
            $s = str_replace ("homework","",$s);
            $s = str_replace ("classexam","",$s);
            $s = str_replace ("posttime","",$s);
            
            
            /* 不堪字詞 */
            $s = str_replace ("垃圾"," OO ",$s);
            $s = str_replace ("幹你娘"," OOO",$s);
            $s = str_replace ("幹你老師"," OOOO ",$s);
            $s = str_replace ("廢物"," OO ",$s);
            $s = str_replace ("機歪"," OO ",$s);
            $s = str_replace ("尿"," O ",$s);
            $s = str_replace ("屎"," O ",$s);    
            $s = str_replace ("三小"," OO ",$s);
            $s = str_replace ("賤"," O ",$s);
            $s = str_replace ("神經病"," OOO ",$s);
            $s = str_replace ("屄"," O ",$s);
            $s = str_replace ("媽的"," OO ",$s);
            $s = str_replace ("幹"," O ",$s);
            $s = str_replace ("ㄍㄢˋ"," O ",$s);
            $s = str_replace ("不要臉"," OOO ",$s);
            $s = str_replace ("孬"," O ",$s);
            $s = str_replace ("畜牲"," OO ",$s);
            $s = str_replace ("雞歪"," OO ",$s);
            $s = str_replace ("雜交"," OO ",$s);
            $s = str_replace ("懶叫"," OO ",$s);
            
            return $s;
        }
}
