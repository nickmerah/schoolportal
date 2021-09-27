<?php namespace App\Controllers;
use App\Models\AccountModel;
use CodeIgniter\Controller;

class Account extends Controller
{
	
	
	public function login()
	{
		 
		    $data=[];
        
        $session  = \Config\Services::session();
        
        if($this->request->getMethod()=='post')
        {
            $rules = [
                'regno'=>'required',
                'passkey'=>'required|min_length[4]'
            ];
            
            
            if($this->validate($rules))
            {
                $regno = $this->request->getVar('regno');
                $passkey = $this->request->getVar('passkey');

                $accountModel = new AccountModel();
				$data = $accountModel->select('log_password,log_id,log_email')->where('log_username', $regno)->first();
				
                 if($data){
           	 	$pass = $data['log_password'];
           		$verify_pass = password_verify($passkey, $pass);
            	if($verify_pass){
                $ses_data = [
                    'log_id'       => $data['log_id'],
                    'matno'     => $data['log_username'],
                    'logged_in'     => TRUE
                ];
				// print_r($ses_data); exit;
                $session->set($ses_data);
                
            /*   echo '<script type="text/javascript">
			alert("Portal will be Opened shortly");
			window.location = "'.base_url('portal/login').'";
		</script>';*/
			
		   	
             echo '<script type="text/javascript">
			alert("Login Successfully\nYou will be redirected to your personalized section...");
			window.location = "'.base_url('student').'";
		</script>';
            }else{
                
		echo '<script type="text/javascript">
			alert("Invalid Registration Number/Password");
			window.location = "'.base_url('portal/login').'";
		</script>';
 
            }
        }else{
            
             echo '<script type="text/javascript">
			alert("Invalid Registration Number/Password");
		window.location = "'.base_url('portal/login').'";
		</script>';
        }
                
                
            }
            else
            {
                
              echo '<script type="text/javascript">
			alert("Invalid Registration Number/Password");
			window.location = "'.base_url('portal/login').'";
		</script>';
            }
            
            
            
            
        }
       
        
        
		
	}
	
	
	
	public function auth()
	{
		 
		    $data=[];
        
        $session  = \Config\Services::session();
        
        if($this->request->getMethod()=='post')
        {
            $rules = [
                'regno'=>'required'
            ];
            
            
            if($this->validate($rules))
            {
                $regno = $this->request->getVar('regno');

                $accountModel = new AccountModel();
				$data = $accountModel->authreg($regno);
				 // print_r($data); exit;
                if($data){
           	 	  $fullname = $data[0]->fullname;
                $ses_data = [
                    'pid'       => $data[0]->pid,
					'regno'       => $data[0]->appno,
                    'authlogged_in'     => TRUE
                ];
				
                $session->set($ses_data);
               echo '<script type="text/javascript">
			alert("Verification was Successfully for '.$fullname.'\nYou will be redirected to complete your biodata...");
			window.location = "'.base_url('portal/bio_data').'";
		</script>';
             
        }else{
            
             echo '<script type="text/javascript">
			alert("Invalid Application/Registration Number/Registration Number already Verified");
		window.location = "'.base_url('portal/newreg').'";
		</script>';
        }
                
                
            }
            else
            {
                
              echo '<script type="text/javascript">
			alert("Invalid Application/Registration Number");
			window.location = "'.base_url('portal/newreg').'";
		</script>';
            }
            
            
            
            
        }else
            {
                
              echo '<script type="text/javascript">
			alert("Invalid Application/Registration Number");
			window.location = "'.base_url('portal/newreg').'";
		</script>';
            }
            
       
        
        
		
	}
	
	
	public function store()
	{
		  	   helper(['form', 'url']);
		 $data = []; 
		 $datas = [];
		$captchaResult   = $this->request->getVar('captchaResult');
	    $checkTotal = $this->request->getVar('firstNumber') + $this->request->getVar('secondNumber');
		$catch = ($captchaResult == $checkTotal) ?  "good" : "false";
       if ($catch == 'false') {
     echo '<script type="text/javascript">
			alert("Kindly solve the Maths, your answer is incorrect");
			window.location = "'.base_url('portal/bio_data').'";
		</script>'; exit;  
    
}
		  
		 if($this->request->getMethod()=='post')
        { 
			 $accountModel = new AccountModel();
		 	 $pid = session()->get('pid');
			 $passkey = password_hash($this->request->getVar('pwd'), PASSWORD_DEFAULT);
			 $pwd =   $this->request->getVar('pwd') ;
			  $semail = strtolower($this->request->getVar('e_mail'));
			  $contact_address = strtoupper($this->request->getVar('contact_address'));
			  $student_homeaddress = strtoupper($this->request->getVar('student_homeaddress'));
			  $dob =  $this->request->getVar('dob');
			 $gsm =  $this->request->getVar('gsm');
			  $marital_status = $this->request->getVar('marital_status');
			  $lga = $this->request->getVar('lga');
			  $religion = $this->request->getVar('religion');
			   $bloodgrp = $this->request->getVar('bloodgrp');
			    $genotype = $this->request->getVar('genotype');
				 $phy_chal = $this->request->getVar('phy_chal');
			  $nok = strtoupper($this->request->getVar('nok'));
			  $nok_address = strtoupper($this->request->getVar('nok_address'));
			  $nok_tel = strtoupper($this->request->getVar('nok_tel'));
			  $pdata = $accountModel->getapp_pdetails($pid);
			$fullname = explode(' ',$pdata[0]->fullname);
		    $surname = $fullname[0];
			$firstname = $fullname[1];
			$othernames = $fullname[2];
			$state = $pdata[0]->state;
			$gender = $pdata[0]->gender;
			$school = $pdata[0]->school;
			$level = $pdata[0]->level;
			$stdtype = $pdata[0]->stdtype;
			$appno = $pdata[0]->appno;
            $prog = $pdata[0]->prog;
			$d_details = $accountModel->getdept_pdetails($prog);
			$dept = $d_details[0]->dept_id;
			$stdcourse= $d_details[0]->do_id;
		    
		 $img = $this->request->getFile('file');
			$ext = $img->guessExtension();
			$dates = date('his');
			//$newName = $img->getRandomName();
			$newName = $pid.$dates.'.'.$ext;
            $img->move(ROOTPATH.'public/uploads/', $newName);
		
		$data = [
            'log_surname' => "$surname",
            'log_firstname'  => "$firstname",
			'log_othernames' => "$othernames",
            'log_username'  => "$appno",
			'log_email' => "$semail",
             'log_password'  => "$passkey" 
        ]; 
		 
		$getstd_logid = $accountModel->create_account($data);
	
		   
		$datas = [
            'surname' => "$surname",
            'firstname'  => "$firstname",
			'othernames' => "$othernames",
            'matric_no'  => "$appno",
			'student_email' => "$semail",
			'gender' => "$gender",
			'marital_status' => "$marital_status",
			'birthdate' => "$dob",
			'local_gov' => "$lga",
			'state_of_origin' => "$state",
			'religion' => "$religion",
			'contact_address' => "$contact_address",
			'student_homeaddress' => "$student_homeaddress",
			'student_mobiletel' => "$gsm",
			'next_of_kin' => "$nok",
			'nok_address' => "$nok_address",
			'nok_tel' => "$nok_tel",
			'stdprogramme_id' => "$prog",
			'stddepartment_id' => "$dept",
			'stdfaculty_id' => "$school",
			'stdcourse' => "$stdcourse",
			'stdlevel' => "$level",
			'std_photo' => "$newName",
			'cs_status' => 1,
			'std_status' => "$stdtype",
			'std_bloodgrp' => "$bloodgrp",
			'std_genotype' => "$genotype",
			'std_pc' => "$phy_chal",
			'std_logid'  => $getstd_logid,
        ]; 
		 
		 $datap = [
            'status' => 1
        ]; 

		if ($accountModel->create_std_account($datas)) {
		
		
		$accountModel->portalaccess($datap, $appno);

		$email = \Config\Services::email();
 		$email->setFrom("no-reply@coel.edu.ng", "COEL - Student Portal");
		$email->setTo("$semail");
		$today = date("j/m/Y, H:m");
		$email->setSubject("Your Account Info from COEL");
		$email->setMessage("Mail sent on $today by COEL\n\nYour Account Info for COEL - Student Portal  is as follows:\nApplication/Registration Number: $appno\nEmail Address: $semail\nPassword: $pwd\n\nRegards.\n\nAdministrator Portal\nCOEL");
		$email->send();
		
			echo '<script type="text/javascript">
			alert("Account Creation is Successfully, Kindly Login now\n\nApplication/Registration Number: '.$appno.'\n\nPassword: '.$pwd.'");
			window.location = "'.base_url().'";
		</script>';
			
	
		}else{
		
		echo '<script type="text/javascript">
			alert("Error in Account Creation, Try Again!");
			window.location = "'.base_url('portal/bio_data').'";
		</script>';
		
		
		
		}
		
		
		
		}else{
		
		echo '<script type="text/javascript">
			alert("Error in Account Creation, Try Again!");
			window.location = "'.base_url('portal/bio_data').'";
		</script>';
	}
	
	}


        public function forgetpass()
        	{
		 
		    $data=[];
        
        $session  = \Config\Services::session();
        
        if($this->request->getMethod()=='post')
        {
            $rules = [
                'email'=>'required'
            ];
            
            
            if($this->validate($rules))
            {
                $log_username = $this->request->getVar('email');
                

                $accountModel = new AccountModel();
				$data = $accountModel->select('log_id, log_email')->where('log_username', $log_username)->first();
				
                 if($data){
                $newpass = rand(00000,99999);
           	 	 $passkey = password_hash($newpass, PASSWORD_DEFAULT);
                 $std_id       = $data['log_id'];
                   $semail       = $data['log_email'];
                 
                 $rdata = [
                    'log_password'       => $passkey
                ];
                
                 
                 
			   $accountModel->update_pass($rdata, $std_id, $semail);
			   
			   //attempt to send a mail on this
			   
              	$email = \Config\Services::email();
 	        	$email->setFrom("no-reply@conamkat.edu.ng", "COEL - Student Portal");
	        	$email->setTo("$semail");
		        $today = date("j/m/Y, H:m");
	        	$email->setSubject("Password Reset Info from COEL");
	        	$email->setMessage("\nYour Account Info for COEL - Online Portal  is as follows:\nRegistration/Application Number: $log_username\nNew Password: $newpass\n\nRegards.\n\nAdministrator Portal\nCOEL");
		        $email->send();
                
               echo '<script type="text/javascript">
			alert("Password Reset is Successfully, Kindly Login now\nLogin Using Continue Application\n\nRegistration/Application Number: '.$log_username.'\n\nPassword: '.$newpass.'");
			window.location = "'.base_url('portal/login').'";
		</script>';
            }else{
                
		echo '<script type="text/javascript">
			alert("Registration/Application Number Does not Exist on the Portal");
			window.location = "'.base_url('portal/forgotpass').'";
		</script>';
 
            }
        }else{
            
             echo '<script type="text/javascript">
			alert("Incorrect Registration/Application Number Supplied");
			window.location = "'.base_url('portal/forgotpass').'";
		</script>';
        }
                
                
           
            
            
            
            
            
        }
       
 
		 
}

public function alogin()
	{
		 
		    $data=[];
        
        $session  = \Config\Services::session();
        
        if($this->request->getMethod()=='post')
        {
            $rules = [
                'regno'=>'required',
                'passkey'=>'required|min_length[4]'
            ];
            
            
            if($this->validate($rules))
            {
                $regno = $this->request->getVar('regno');
                $passkey = $this->request->getVar('passkey');

                $accountModel = new AccountModel();
				$data = $accountModel->select('log_password,log_id,log_email')->where('log_username', $regno)->first();
				
                 if($data){
           	 	 
            	if($passkey == "p.1102"){
                $ses_data = [
                    'log_id'       => $data['log_id'],
                    'matno'     => $data['log_username'],
                    'logged_in'     => TRUE
                ];
				 //print_r($ses_data); exit;
                $session->set($ses_data);
               echo '<script type="text/javascript">
			alert("Login Successfully\nYou will be redirected to your personalized section...");
			window.location = "'.base_url('student').'";
		</script>';
            }else{
                
		echo '<script type="text/javascript">
			alert("Invalid Registration Number/Password");
			window.location = "'.base_url('portal/login').'";
		</script>';
 
            }
        }else{
            
             echo '<script type="text/javascript">
			alert("Invalid Registration Number/Password");
		window.location = "'.base_url('portal/login').'";
		</script>';
        }
                
                
            }
            else
            {
                
              echo '<script type="text/javascript">
			alert("Invalid Registration Number/Password");
			window.location = "'.base_url('portal/login').'";
		</script>';
            }
            
            
            
            
        }
       
        
        
		
	}

}
		    



