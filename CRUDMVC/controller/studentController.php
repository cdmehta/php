<?php
    require 'model/studentsModel.php';
    require 'model/students.php';
    require_once 'config.php';

//    session_status() === PHP_SESSION_ACTIVE ? TRUE : session_start();
    
	class studentsController 
	{

 		function __construct() 
		{          
			$this->objconfig = new config();
			$this->objsm =  new studentsModel($this->objconfig);
		}
        // mvc handler request
		public function mvcHandler() 
		{
			$act = isset($_GET['act']) ? $_GET['act'] : NULL;
			switch ($act) 
			{
                case 'add' :                    
					$this->insert();
					break;						
				case 'update':
					$this->update();
					break;				
				case 'delete' :					
					$this -> delete();
					break;								
				default:
                    $this->lists();
			}
		}		
        // page redirection
		public function pageRedirect($url)
		{
			header('Location:'.$url);
		}	
        // check validation
/*		public function checkValidation($studenttb)
        {    $noerror=true;
            // Validate category        
            if(empty($studenttb->dept)){
                $studenttb->stud_msg = "Field is empty.";$noerror=false;
            } elseif(!filter_var($studenttb->category, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
                $studenttb->stud_msg = "Invalid entry.";$noerror=false;
            }else{$studenttb->stud_msg ="";}            
            // Validate name            
            if(empty($studenttb->name)){
                $studenttb->name_msg = "Field is empty.";$noerror=false;     
            } elseif(!filter_var($studenttb->name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
                $studenttb->name_msg = "Invalid entry.";$noerror=false;
            }else{$studenttb->name_msg ="";}
            return $noerror;
        }*/
        // add new record
		public function insert()
		{
            try{
                $studenttb=new students();
                if (isset($_POST['addbtn'])) 
                {   
                    // read form value
                    
                    $studenttb->stud_name = trim($_POST['stud_name']);
                    $studenttb->stud_dept = trim($_POST['stud_dept']);
					//call validation
                    $chk= true; //$this->checkValidation($studenttb);                    
                    if($chk)
                    {   
                        //call insert record            
                        $sid = $this -> objsm ->insertRecord($studenttb);
                        if($sid>0){			
                            $this->lists();
                        }else{
                            echo "Somthing is wrong..., try again.";
                        }
                    }else
                    {    
                        $_SESSION['studenttbl0']=serialize($studenttb);//add session obj           
                        $this->pageRedirect("view/insert.php");                
                    }
                }
            }catch (Exception $e) 
            {
                $this->close_db();	
                throw $e;
            }
        }
        // update record
        public function update()
		{
            try
            {
                
                if (isset($_POST['updatebtn'])) 
                {
                    $studenttb=unserialize($_SESSION['studenttbl0']);
                    $studenttb->stud_id = trim($_POST['stud_id']);
                    $studenttb->stud_name = trim($_POST['stud_name']);                    
                    $studenttb->stud_dept = trim($_POST['stud_dept']);                    
                    // check validation  
                    $chk=$this->checkValidation($studenttb);
                    if($chk)
                    {
                        $res = $this -> objsm ->updateRecord($studenttb);	                        
                        if($res){			
                            $this->list();                           
                        }else{
                            echo "Somthing is wrong..., try again.";
                        }
                    }else
                    {         
                        $_SESSION['studenttbl0']=serialize($studenttb);      
                        $this->pageRedirect("view/update.php");                
                    }
                }
				else if(isset($_GET["id"])){
                    $stud_id=$_GET['id'];
                    $result=$this->objsm->selectRecord($stud_id);
                    $row=mysqli_fetch_array($result);  
                    $studenttb=new students();                  
                    $studenttb->stud_id=$row["stud_id"];
                    $studenttb->stud_name=$row["stud_name"];
                    $studenttb->stud_dept=$row["stud_dept"];
                    
                    $_SESSION['studenttbl0']=serialize($studenttb);
                    $this->pageRedirect('view/update.php');
                }else{
                    echo "Invalid operation.";
                }
            }
            catch (Exception $e) 
            {
                $this->close_db();				
                throw $e;
            }
        }
        // delete record
        public function delete()
		{
            try
            {
                if (isset($_GET['id'])) 
                {
                    $id=$_GET['id'];
                    $res=$this->objsm->deleteRecord($id);                
                    if($res){
                        $this->pageRedirect('index.php');
                    }else{
                        echo "Somthing is wrong..., try again.";
                    }
                }else{
                    echo "Invalid operation.";
                }
            }
            catch (Exception $e) 
            {
                $this->close_db();				
                throw $e;
            }
        }
        public function lists(){
            $result=$this->objsm->selectRecord(0);
            include "view/list.php";                                        
        }
    }
		
	
?>